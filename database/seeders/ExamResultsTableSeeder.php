<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExamResult;
class ExamResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ExamResult::create([
            'student_id' => 1,
            'exam_name' => 'Matematyka',
            'exam_date' => now()->subDays(10),
            'subject' => 'Mathematics',
            'score' => 85,
        ]);

        ExamResult::create([
            'student_id' => 2,
            'exam_name' => 'Język angielski',
            'exam_date' => now()->subDays(5),
            'subject' => 'English',
            'score' => 90,
        ]);

    }
}
