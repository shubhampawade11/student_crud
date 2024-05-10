<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Student::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'gender' => $faker->randomElement(['male', 'female']),
                'dob' => $faker->date,
                'doj' => $faker->date,
                'father_name' => $faker->name('male'),
                'mother_name' => $faker->name('female'),
                'address' => $faker->address,
                'roll_no' => $faker->unique()->randomNumber(),
            ]);
        }
    }
}
