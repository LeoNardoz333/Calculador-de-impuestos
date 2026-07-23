<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();

        User::updateOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'first_last_name' => 'Admin',
            'second_last_name' => 'Admin',
            'username' => 'admin',
            'password' => '12345_admin',
            'role' => UserRole::ADMIN,
        ]);

        User::updateOrCreate([
            'email' => 'accountant@example.com',
        ], [
            'name' => 'Accountant',
            'first_last_name' => 'Accountant',
            'second_last_name' => 'Accountant',
            'username' => 'accountant',
            'password' => '12345_acc',
            'role' => UserRole::ACCOUNTANT,
        ]);
    }
}
