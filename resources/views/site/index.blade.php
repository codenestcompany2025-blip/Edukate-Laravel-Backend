@extends('site.master')

@section('title', 'Edukate - Online Education Website')

@section('header')
    <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
    <h1 class="text-white display-1 mb-5">Education Courses</h1>
@endsection

@section('content')
    <!-- About Start -->
    @include('site.parts.about', compact('instructorsCount', 'studentsCount', 'coursesCount', 'categoriesCount'))
    <!-- About End -->


    <!-- Feature Start -->
    @include('site.parts.feature')
    <!-- Feature Start -->


    <!-- Courses Start -->
    @include('site.parts.course', compact('courses'))
    <!-- Courses End -->


    <!-- Team Start -->
    @include('site.parts.team', compact('instructors'))
    <!-- Team End -->


    <!-- Testimonial Start -->
    @include('site.parts.testimonial', compact('testimonials'))
    <!-- Testimonial Start -->


    <!-- Contact Start -->
    @include('site.parts.contact')
    <!-- Contact End -->
@endsection
