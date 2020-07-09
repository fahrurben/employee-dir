<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            'name' => 'Accounting',
        ]);
        DB::table('department')->insert([
            'name' => 'HR',
        ]);
        DB::table('department')->insert([
            'name' => 'IT',
        ]);
    }
}
