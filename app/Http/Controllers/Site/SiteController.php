<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Lecture;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    function index()
    {
        $courses = Course::all();
        $instructors = Instructor::all();
        $testimonials = Testimonial::all();
        $instructorsCount = Instructor::count();
        $studentsCount    = Student::count();
        $coursesCount    = Course::count();
        $categoriesCount  = Category::count();
        return view('site.index', compact('courses', 'instructors', 'testimonials', 'instructorsCount', 'studentsCount', 'coursesCount', 'categoriesCount'));
    }

    function about()
    {
        $instructorsCount = Instructor::count();
        $studentsCount    = Student::count();
        $coursesCount    = Course::count();
        $categoriesCount  = Category::count();
        return view('site.about', compact('instructorsCount', 'studentsCount', 'coursesCount', 'categoriesCount'));
    }

    function contact()
    {
        return view('site.contact');
    }

    function join()
    {
        return view('site.join');
    }

    function joinSubmit(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|email|max:255|unique:students,email',
            'password' => 'required|string|min:8|confirmed',
            'date_of_birth'  => 'required|date|before:today',
            'gender'      => 'required|in:m,f',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return redirect()->to(url()->previous() . '#joinus-form')
            ->with('success', "You are Joined Successfully !");
    }

    function course()
    {
        $courses = Course::all();
        return view('site.course', compact('courses'));
    }

    function detail($course_id)
    {
        $course = Course::findOrFail($course_id);
        $relatedCourses = Course::where('category_id', $course->category_id)->where('id', '!=', $course->id)->get();
        $categories = Category::all();
        $recentCourses = Course::latest()->take(4)->get();


        return view('site.detail', compact('course', 'categories', 'relatedCourses', 'recentCourses'));
    }

    function feature()
    {
        return view('site.feature');
    }

    function team()
    {
        $instructors = Instructor::all();
        return view('site.team', compact('instructors'));
    }

    function testimonial()
    {
        $testimonials = Testimonial::all();
        return view('site.testimonial', compact('testimonials'));
    }

    function registerCourse(Request $request)
    {
        /*
        $student = Student::query()->where('email', $request->email)->first();
        $message = 'You are successfully registered in the course!';
        if (!$student) {
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->name . '123'),
            ]);
            $message .= "\nYour password = your name followed by 123";
        } else if ($student->courses->contains($request->selected_course)) {
            $message = 'You are already registered in this course!';
            return redirect()->to(url()->previous() . '#signup-form')
                ->with('error', $message);
        }
        StudentCourse::create([
            'student_id' => $student->id,
            'course_id' => $request->selected_course,
        ]);
        return redirect()->to(url()->previous() . '#signup-form')
            ->with('success', $message);
        */

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'selected_course' => 'required|exists:courses,id',
        ]);

        $student = Student::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'password' => Hash::make($request->name . '123'),
            ]
        );

        if ($student->studentCourses()->where('course_id', $request->selected_course)->exists()) {
            return redirect()->to(url()->previous() . '#signup-form')
                ->with('error', 'You are already registered in this course!');
        }

        $student->courses()->attach($request->selected_course);

        $message = 'You are successfully registered in the course!';

        if ($student->wasRecentlyCreated) {
            $message .= "<br>Your password = your name followed by 123"; // or send email
        }

        return redirect()->to(url()->previous() . '#signup-form')
            ->with('success', $message);
    }
}
