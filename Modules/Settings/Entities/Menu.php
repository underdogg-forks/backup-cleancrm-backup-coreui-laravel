<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Auth\Entities\User;
use Spatie\Permission\Traits\HasRoles;

class Menu extends Model
{
    use SoftDeletes, HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'url',
        'icon',
        'active',
        'order'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $with = [
        'permissions'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    /**
     * Determinte if user can access current menu
     *
     * @param User $user
     * @return bool
     */
    public function isAccessibleBy(User $user)
    {
        if ($user->isRoot()) {
            return true;
        }

        if ($this->permissions()->count()) {
            $permissions = $this->getAllPermissions()->pluck('name')->toArray();
            return $user->hasAnyPermission($permissions);
        }

        if ($this->childs()->exists()) {
            return !$this->childs->map->isAccessibleBy($user)->every(function ($accessbily) {
                return !$accessbily;
            });
        }

        return true;
    }

    public function childs()
    {
        return $this->hasMany(Menu::class, 'parent_id')
            ->with('childs', 'parent');
    }
}
