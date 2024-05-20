<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $primaryKey='course_id';
    public $timestamps=false;

    protected $fillable = [
        'course_name',
        'course_description',
        'instructor_id',
        'start_date',
        'end_date',
        'max_capacity',
    ];

    // Definiowanie relacji z innymi modelami
    public function instructor()
    {
        return $this->belongsTo(Student::class, 'instructor_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
