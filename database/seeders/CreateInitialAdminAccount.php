<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateInitialAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();

        User::create([
            'email' => 'hashmap@gmail.com',
            'password' => bcrypt('123456'),
            'first_name' => 'Admin',
            'last_name' => 'Account',
            'is_active' => true,
            'username' => 'admin-account',
            'is_admin' => true,
        ]);
    }
}
