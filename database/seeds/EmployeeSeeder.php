<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $fullName = $firstName . ' ' . $lastName;

            DB::table('employee')->insert([
                'employee_id' => $faker->numerify('###'),
                'firstname' => $firstName,
                'lastname' => $lastName,
                'fullname' => $fullName,
                'birthday' => $faker->dateTimeBetween($startDate = '1980-01-01', $endDate = '2000-01-01'),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'mobile' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'position' => 'Staff',
                'department_id' => 1,
                'status' => 1,
            ]);
        }
    }
}
