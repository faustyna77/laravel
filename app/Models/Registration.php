<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $primaryKey='registration_id';
    
    protected $fillable = [
        'student_id',
        'course_id',
        'registration_date',
        'status',
    ];

    // Definiowanie relacji z innymi modelami
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
