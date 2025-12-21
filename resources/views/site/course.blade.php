@extends('site.master')

@section('title', 'Edukate - Courses')

@section('header-class', 'page-header')

@section('header')
    <h1 class="text-white display-1">Courses</h1>
    <div class="d-inline-flex text-white mb-5">
        <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('site.index') }}">Home</a></p>
        <i class="fa fa-angle-double-right pt-1 px-3"></i>
        <p class="m-0 text-uppercase">Courses</p>
    </div>
@endsection


@section('content')
    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Courses</h6>
                        <h1 class="display-4">Checkout New Releases Of Our Courses</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-lg-4 col-md-6 pb-4">
                        <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                            href="{{ route('site.detail', $course->id) }}">
                            <img class="img-fluid" src="{{ asset('uploads/images/courses/' . $course->image->url) }}" alt="">
                            <div class="courses-text">
                                <h4 class="text-center text-white px-3">{{ $course->name }}</h4>
                                <div class="border-top w-100 mt-3">
                                    <div class="d-flex justify-content-between p-4">
                                        <span class="text-white"><i class="fa fa-user mr-2"></i>{{ $course->instructor->name }}</span>
                                        <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                            <small>(250)</small></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                        href="{{ route('site.detail') }}">
                        <img class="img-fluid" src="{{ asset('site/img/courses-1.jpg') }}" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Web design & development courses for
                                beginners</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                    <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                        <small>(250)</small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                        href="{{ route('site.detail') }}">
                        <img class="img-fluid" src="{{ asset('site/img/courses-2.jpg') }}" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Web design & development courses for
                                beginners</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                    <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                        <small>(250)</small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                        href="{{ route('site.detail') }}">
                        <img class="img-fluid" src="{{ asset('site/img/courses-3.jpg') }}" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Web design & development courses for
                                beginners</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                    <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                        <small>(250)</small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                        href="{{ route('site.detail') }}">
                        <img class="img-fluid" src="{{ asset('site/img/courses-4.jpg') }}" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Web design & development courses for
                                beginners</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                    <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                        <small>(250)</small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                        href="{{ route('site.detail') }}">
                        <img class="img-fluid" src="{{ asset('site/img/courses-5.jpg') }}" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Web design & development courses for
                                beginners</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                    <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                        <small>(250)</small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                        href="{{ route('site.detail') }}">
                        <img class="img-fluid" src="{{ asset('site/img/courses-6.jpg') }}" alt="">
                        <div class="courses-text">
                            <h4 class="text-center text-white px-3">Web design & development courses for
                                beginners</h4>
                            <div class="border-top w-100 mt-3">
                                <div class="d-flex justify-content-between p-4">
                                    <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                    <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                        <small>(250)</small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                            <li class="page-item disabled">
                                <a class="page-link rounded-0" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-0" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->
@endsection
