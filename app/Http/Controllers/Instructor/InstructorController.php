<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    function index()
    {
        return view('dashboard.instructor.index');
    }

    function courses()
    {
        $instructor = Auth()->guard('instructor')->user();
        $courses = $instructor->courses()->paginate(5);

        return view('dashboard.instructor.courses.index', compact('courses'));
    }

    function students(Course $course)
    {
        $students = $course->students()->paginate(5);
        return view('dashboard.instructor.courses.students', compact('course', 'students'));
    }
}
