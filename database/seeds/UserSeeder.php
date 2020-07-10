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
        $faker = \Faker\Factory::create();

        DB::table('users_table')->insert([
            'name' => 'Admin',
            'email' => 'admin@edir.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
            'api_token' => \Illuminate\Support\Facades\Hash::make($faker->password(4,4))
        ]);
    }
}
