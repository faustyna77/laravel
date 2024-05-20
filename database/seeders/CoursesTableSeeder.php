<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create([
            'course_name' => 'Matematyka',
            'course_description' => 'Podstawowy kurs matematyki.',
            'instructor_id' => 1, // ID instruktora kursu (możesz dostosować)
            'start_date' => now(),
            'end_date' => now()->addMonths(6),
            'max_capacity' => 30,
        ]);

        Course::create([
            'course_name' => 'Język angielski',
            'course_description' => 'Kurs języka angielskiego dla początkujących.',
            'instructor_id' => 2, // ID instruktora kursu (możesz dostosować)
            'start_date' => now(),
            'end_date' => now()->addMonths(6),
            'max_capacity' => 25,
        ]);
    }
}
