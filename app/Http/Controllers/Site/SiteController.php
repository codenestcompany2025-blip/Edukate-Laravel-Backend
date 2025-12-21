<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Lecture;
use App\Models\Student;
use App\Models\Testimonial;
use Illuminate\Http\Request;

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
}
