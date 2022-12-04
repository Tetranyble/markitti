<?php

namespace Tests\Feature;

use App\Models\Store;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class StoreScopeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

        /** @test */
    public function a_model_has_a_store_id_on_the_migration(){

        $now = now();
        $this->artisan('make:model Test -m');
        //find the migration file and check it has a store_id on it
        $filename = $now->year . '_' . $now->format('m') . '_' . $now->format('d') . '_' .
            $now->format('h') . $now->format('i') . $now->format('s') .
            '_create_tests_table.php';

        $this->assertTrue(File::exists(database_path('migrations/'.$filename)));
        $this->assertStringContainsString('$table->unsignedBigInteger(\'store_id\')->nullable()->index();',
            File::get(database_path('migrations/'.$filename)));

        //clean up
        File::delete(database_path('migrations/'.$filename));
        File::delete(app_path('Models/Test.php'));
    }

    /** @test */
    public function a_user_can_only_see_users_in_the_same_store(){
        $store1 = Store::factory()->create();
        $store2 = Store::factory()->create();

        $user1 = User::factory()->create(['store_id' => $store1->id]);
        User::factory(9)->create(['store_id' => $store1->id]);

        User::factory(10)->create(['store_id' => $store2->id]);

        auth()->login($user1);

        $this->assertEquals(10, User::count());
    }
    /** @test */
    public function test_a_user_can_only_create_a_user_in_his_store(){
        $store1 = Store::factory()->create();
        $store2 = Store::factory()->create();

        $user1 = User::factory()->create(['store_id' => $store1->id]);

        auth()->login($user1);

        $createUser  = User::factory()->create();


        $this->assertTrue($createUser->store_id == $user1->store_id);


    }
    /** @test */
    public function test_a_user_can_only_create_a_user_in_his_store_even_if_other_store_is_provided(){
        $store1 = Store::factory()->create();
        $store2 = Store::factory()->create();

        $user1 = User::factory()->create(['store_id' => $store1->id]);

        auth()->login($user1);

        $createUser  = User::factory()->make();
        $createUser->store_id = $store2->id;
        $createUser->save();

        $this->assertTrue($createUser->store_id == $user1->store_id);


    }
}
