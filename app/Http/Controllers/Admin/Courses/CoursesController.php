<?php

namespace App\Http\Controllers\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Support\Facades\Hash;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(5);

        return view('dashboard.admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('dashboard.admin.courses.show', compact('course'));
    }

    public function create()
    {
        $categories = Category::all();
        $instructors = Instructor::all();

        return view('dashboard.admin.courses.create', compact('categories', 'instructors'));
    }

    public function store(CourseRequest $request)
    {

        // dd($request->all());
        $name = null;

        if ($request->image) {
            $name = 'Edukate' . '_' . time() . '_' . rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/images/courses'), $name);
        }

        $course = Course::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'duration'      => $request->duration,
            'skill_level'   => $request->skill_level,
            'instructor_id' => $request->instructor_id,
            'category_id'   => $request->category_id,
        ]);

        $course->image()->create([
            'url' => $name,
        ]);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully!');
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        $instructors = Instructor::all();

        return view('dashboard.admin.courses.edit', compact('course', 'categories', 'instructors'));
    }


    public function update(CourseRequest $request, Course $course)
    {

        if ($request->image) {
            $name = 'Edukate' . '_' . time() . '_' . rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/images/courses'), $name);

            $course->image()->updateOrCreate(
                [], // match condition (empty means "first related record")
                ['url' => $name]
            );
        }

        $course->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'duration'      => $request->duration,
            'skill_level'   => $request->skill_level,
            'instructor_id' => $request->instructor_id,
            'category_id'   => $request->category_id,
        ]);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}
