<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_table')->insert([
            'name' => 'Admin',
            'email' => 'admin@edir.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
    }
}
