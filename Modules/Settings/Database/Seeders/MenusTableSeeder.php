<?php

namespace Modules\Settings\Database\Seeders;

use App\Helpers\Traits\DisableForeignKeys;
use App\Helpers\Traits\TruncateTable;
use Illuminate\Database\Seeder;
use Modules\Settings\Entities\Menu;
use Spatie\Permission\Models\Permission;

class MenusTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncate('menus');

        foreach ($this->menus() as $value) {
            $menu = Menu::create(array_except($value, 'permissions'));

            $permissions = $value['permissions'] ?? null;

            if (isset($permissions)) {
                foreach ($permissions as $permission) {
                    Permission::findOrCreate($permission);
                }

                $menu->syncPermissions($permissions);
            }
        }

        $this->enableForeignKeys();
    }

    public function menus()
    {
        return [
            [
                'id' => 1,
                'name' => 'Dashboard',
                'url' => '/',
                'icon' => 'fas fa-tachometer-alt',
                'order' => 0,
                'active' => true,
            ],
            [
                'id' => 2,
                'name' => 'Settings',
                'icon' => 'fas fa-cog',
                'order' => 99,
                'active' => true,
                'permissions' => [
                    'manage-settings'
                ]
            ],
            [
                'id' => 3,
                'parent_id' => 2,
                'name' => 'Secuity',
                'icon' => 'fas fa-shield-alt',
                'order' => 0,
                'active' => true,
                'permissions' => [
                    'manage-security'
                ]
            ],
            [
                'id' => 4,
                'parent_id' => 3,
                'name' => 'Manage Users',
                'icon' => 'fas fa-shield-alt',
                'url' => 'auth/users',
                'order' => 0,
                'active' => true,
            ],
            [
                'id' => 5,
                'parent_id' => 3,
                'name' => 'Roles & Permissions',
                'icon' => 'fas fa-lock',
                'order' => 1,
                'active' => true,
            ]
        ];
    }
}
