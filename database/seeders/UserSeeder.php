<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use App\Models\UserPreferences;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'developer@markitti.com',
            'password' => 'ugbanawaji',
            'store_id' => null
        ])->each(function ($user){
            UserPreferences::factory()->create(['user_id' => $user->id]);
            Role::factory()->create([
                'name' => 'super-admin',
                'label' => 'Super Admin'
            ]);
            $user->assignRole('super-admin');
        });



//        User::factory(10)->create([
//            'store_id' => $store->id
//        ])->each(function ($user){
//            Role::factory()->create([
//                'name' => 'user',
//                'label' => 'User'
//            ]);
//            $user->assignRole('user');
//            UserPreferences::factory()->create(['user_id' => $user->id]);
//        });

    }
}
