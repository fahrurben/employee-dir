<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE employee  RESTART IDENTITY CASCADE");
        DB::statement("TRUNCATE TABLE department  RESTART IDENTITY CASCADE");
        DB::statement("TRUNCATE TABLE users_table  RESTART IDENTITY CASCADE");

        $this->call(UserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
