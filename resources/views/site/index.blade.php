@extends('site.master')

@section('title', 'Edukate - Online Education Website')

@section('header')
    <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
    <h1 class="text-white display-1 mb-5">Education Courses</h1>
@endsection

@section('content')
    <!-- About Start -->
    @include(
        'site.parts.about',
        compact('instructorsCount', 'studentsCount', 'coursesCount', 'categoriesCount'))
    <!-- About End -->


    <!-- Feature Start -->
    @include('site.parts.feature')
    <!-- Feature Start -->


    <!-- Courses Start -->
    @include('site.parts.course', compact('courses'))

    <div class="row justify-content-center bg-image mx-0 mb-5" id="signup-form">
        <div class="col-lg-6 py-5">
            @if (session('success'))
                <div class="alert alert-success"
                    style="margin-bottom: 20px; padding: 15px; background-color: #d4edda; color: #155724; border-radius: 5px;">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger"
                    style="margin-bottom: 20px; padding: 15px; background-color: #f8d7da; color: #721c24; border-radius: 5px;">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white p-5 my-5">
                <h1 class="text-center mb-4">30% Off For New Students</h1>
                <form method="POST" action="{{ route('site.registerCourse') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control bg-light border-0"
                                    placeholder="Your Name" style="padding: 30px 20px;">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control bg-light border-0"
                                    placeholder="Your Email" style="padding: 30px 20px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="custom-select bg-light border-0 px-3" style="height: 60px;"
                                    name="selected_course">
                                    <option selected>Select A course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-primary btn-block" type="submit" style="height: 60px;">Sign
                                Up Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
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
