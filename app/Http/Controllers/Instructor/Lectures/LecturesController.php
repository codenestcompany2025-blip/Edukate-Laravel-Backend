<?php

namespace App\Http\Controllers\Instructor\Lectures;

use App\Models\Course;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\LectureRequest;
use App\Models\Lecture;

class LecturesController extends Controller
{
    public function index(Course $course)
    {

        $lectures = $course->lectures()->orderBy('order')->get();

        return view('dashboard.instructor.courses.lectures.index', compact('lectures', 'course'));
    }

    /* public function show(Course $course)
    {
        return view('dashboard.admin.courses.show', compact('course'));
    }*/


    public function create(Course $course)
    {
        return view('dashboard.instructor.courses.lectures.create', compact('course'));
    }


    public function store(LectureRequest $request, Course $course)
    {
        $data = $request->validated();
        $data['course_id'] = $course->id;

        Lecture::create($data);

        return redirect()
            ->route('instructor.course.lectures.index', $course)
            ->with('success', 'Lecture created successfully!');
    }

    public function edit(Course $course, Lecture $lecture)
    {
        return view('dashboard.instructor.courses.lectures.edit', compact('course', 'lecture'));
    }

    
    public function update(LectureRequest $request, Course $course, Lecture $lecture)
    {

        $data = $request->validated();
        $lecture->update($data);

        return redirect()
            ->route('instructor.course.lectures.index', $course)
            ->with('success', 'Lecture updated successfully!');
    }

    public function destroy(Course $course, Lecture $lecture)
    {
        $lecture->delete();

        return redirect()->route('instructor.course.lectures.index', $course)
            ->with('success', 'Lecture deleted successfully!');
    } 
}
