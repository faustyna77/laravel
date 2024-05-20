<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Student::create([
            'first_name' => 'Jan',
            'last_name' => 'Kowalski',
            'email' => 'jan@example.com',
            'date_of_birth' => '1990-01-01',
            'other_details' => 'Lorem ipsum dolor sit amet.',
        ]);

        Student::create([
            'first_name' => 'Anna',
            'last_name' => 'Nowak',
            'email' => 'anna@example.com',
            'date_of_birth' => '1992-05-15',
            'other_details' => 'Consectetur adipiscing elit.',
        ]);
    }
}
