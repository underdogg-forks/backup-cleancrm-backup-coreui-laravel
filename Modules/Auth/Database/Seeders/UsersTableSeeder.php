<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users() as $data) {
            User::create($data);
        }

        $userRoot = User::find(1);
        $userRoot->assignRole('root');
    }

    protected function users()
    {
        return [
            [
                'id' => 1,
                'name' => 'Root Admin',
                'username' => 'root',
                'email' => 'root@email.com',
                'password' => \Hash::make('secret'),
                'active' => true,
            ]
        ];
    }
}
