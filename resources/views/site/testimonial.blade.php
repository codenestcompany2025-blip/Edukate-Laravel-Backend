@extends('site.master')

@section('title', 'Edukate - Testimonial')

@section('header-class', 'page-header')

@section('header')
    <h1 class="text-white display-1">Testimonial</h1>
    <div class="d-inline-flex text-white mb-5">
        <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('site.index') }}">Home</a></p>
        <i class="fa fa-angle-double-right pt-1 px-3"></i>
        <p class="m-0 text-uppercase">Testimonial</p>
    </div>
@endsection

@section('content')
    <!-- Testimonial Start -->
    @include('site.parts.testimonial', compact('testimonials'))
    <!-- Testimonial Start -->
@endsection
