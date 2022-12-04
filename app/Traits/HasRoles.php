<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRoles
{
    /**
     * A user may have multiple roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * Assign the given role to the user.
     *
     * @param  string  $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->sync(
            Role::whereName($role)->firstOrFail()
        );
    }

    /**
     * Determine if the user has the given role.
     *
     * @param  mixed  $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return (bool) $role->intersect($this->roles)->count();
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param  mixed|string  $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        if (is_string($permission)) {
            return $this->permissions()->contains('name', $permission);
        }

        return $this->hasRole($permission->roles);
    }

    /**
     * Get all user's permissions
     *
     * @return Permission $permission
     */
    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck('name')->unique();
    }

    public function hasRoles($roles = []){

        return $this->roles()->whereIn('name', [...$roles])->get()->isNotEmpty();
    }

    public function actAs($role)
    {
    }
}
