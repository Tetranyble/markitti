<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = collect(getModels())->map(function ($model) {
            $m = explode('\\', $model)[3];

            return [$m.' Create', $m.' View', $m.' Update', $m.' Delete'];
        })->flatten()->map(function ($permission) {
            return Permission::factory()->create([
                'name' => Str::slug($permission, '_'),
                'label' => $permission,
            ]);
        });
        Role::factory(6)->create()->each(function ($role) use ($permissions) {
            $permissions->map(function ($permission) use ($role) {
                $role->givePermissionTo($permission);
            });
        });
    }
}
