<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Registration;
class RegistrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registration::create([
            'student_id' => 1,
            'course_id' => 1,
            'registration_date' => now(),
            'status' => 'active',
        ]);

        Registration::create([
            'student_id' => 2,
            'course_id' => 2,
            'registration_date' => now(),
            'status' => 'active',
        ]);
        //
    }
}
