<?php

namespace App\Http\Controllers\Admin\StudentCourse;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentCourseController extends Controller
{
    public function index()
    {
        $studentCourses = StudentCourse::paginate(5);
        return view('dashboard.admin.student_courses.index', compact('studentCourses'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();

        return view('dashboard.admin.student_courses.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {

        $request->validate([
        'student_id' => ['required', 'exists:students,id'],
        'course_id'  => [
            'required',
            'exists:courses,id',
            Rule::unique('student_courses')->where(function ($query) use ($request) {
                return $query->where('student_id', $request->student_id);
            }),
        ],
        ]);


        StudentCourse::create([
            'student_id' => $request->student_id,
            'course_id'  => $request->course_id,
        ]);

        return redirect()->route('admin.student_courses.index')
            ->with('success', 'Student - Course created successfully!');
    } 

    public function edit(StudentCourse $studentCourse)
    {
        $students = Student::all();
        $courses = Course::all();
        
        return view('dashboard.admin.student_courses.edit', compact('students', 'courses', 'studentCourse'));
    }


    public function update(Request $request, StudentCourse $studentCourse)
    {
        $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'course_id'  => [
                'required',
                'exists:courses,id',
                Rule::unique('student_courses')
                    ->ignore($studentCourse->id) 
                    ->where(function ($query) use ($request) {
                        return $query->where('student_id', $request->student_id);
                    }),
            ],
        ]);

        $studentCourse->update($request->only(['student_id', 'course_id']));

        return redirect()->route('admin.student_courses.index')
            ->with('success', 'Student - Course updated successfully!');
    }

    public function destroy(StudentCourse $studentCourse)
    {
        $studentCourse->delete();

        return redirect()->route('admin.student_courses.index')
            ->with('success', 'Student - Course deleted successfully!');
    } 
}
