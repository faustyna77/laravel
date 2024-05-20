<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;
    protected $primaryKey = 'result_id';
    protected $fillable = [
        'student_id',
        'exam_name',
        'exam_date',
        'subject',
        'score',
    ];

    // Definiowanie relacji z innymi modelami
   /* public function student()
    {
        return $this->belongsTo(Student::class);
    }*/
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
