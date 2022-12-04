<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(schema="Role")
 * {
 *   @OA\Property(
 *    property="name",
 *    type="string",
 *    description="The resource name."
 *    ),
 *    @OA\Property(
 *       property="label",
 *       type="string",
 *       description="The resource label."
 *    ),
 *    @OA\Property(
 *       property="is_system",
 *       type="boolean",
 *       description="The resource role is system."
 *    )
 * }
 */
class Role extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'label', 'is_system'];

    /**
     * @var string[]
     */
    protected $casts = [
        'is_system' => 'boolean'
    ];

    public function setIsSystemAttribute($value){

        $this->attributes['is_system'] = (int) $value;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->sync($permission, false);
    }

    /**
     * @param $query
     * @param $request
     */
    public function scopeFilter($query, $request)
    {
        $query->when($request->search ?? false, function ($q, $search) {
            $q->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('label', 'like', '%'.$search.'%');
            });
        });
    }
}
