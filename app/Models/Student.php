<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;



    protected $primaryKey='student_id';
   
    protected $fillable=['first_name','last_name','email','date_of_birth','other_details'];
    public $timestamps=false;
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
   

   
}
