<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles() as $roleName) {
            Role::create(['name' => $roleName]);
        }

        foreach ($this->permissions() as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }
    }

    protected function roles()
    {
        return [
            'root',
            'admin',
            'user'
        ];
    }

    public function permissions()
    {
        return [

        ];
    }
}
