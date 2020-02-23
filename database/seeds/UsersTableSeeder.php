<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin@admin.com'),
            'line' => '',
            'facebook' => '',
            'avatar' => '',
            'level' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
