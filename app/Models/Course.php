<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;


    protected $guarded = [];

    public function instructor() {
        return $this->belongsTo(Instructor::class);
    }

    public function lectures() {
        return $this->belongsTo(Lecture::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

     public function students()
    {
        return $this->belongsToMany(Student::class, 'student_courses');
    }

    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class);
    }

}
