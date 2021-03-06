<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $defaultPassword = 'restore1100';

        $users = [
            [
                'email' => 'roman.zhyla.lviv@gmail.com',
                'name' => 'Roman Zhyla',
                'role_id' => 7,
            ],
            [
                'email' => 'admin@ucr.com.ua',
                'name' => 'Orest Vertyporoh',
                'role_id' => 7,
            ],
            [
                'email' => 'demo',
                'name' => 'Demo User',
                'password' => 'demo123',
                'role_id' => 1,
            ]
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate([
                'email' => $userData['email'],
            ], array_merge($userData, [
                'password' => bcrypt($userData['password'] ?? $defaultPassword),
            ]));

            if ($user->wasRecentlyCreated) {
                $this->command->getOutput()->writeln("Created new user <comment>id.{$user->id}</comment>: <info>{$user->email}</info>");
            }
        }
    }
}
