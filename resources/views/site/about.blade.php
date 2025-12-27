@extends('site.master')

@section('title', 'Edukate - About')

@section('header-class', 'page-header')

@section('header')
    <h1 class="text-white display-1">About</h1>
    <div class="d-inline-flex text-white mb-5">
        <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('site.index') }}">Home</a></p>
        <i class="fa fa-angle-double-right pt-1 px-3"></i>
        <p class="m-0 text-uppercase">About</p>
    </div>
@endsection

@section('content')
    <!-- About Start -->
    @include('site.parts.about', compact('instructorsCount', 'studentsCount', 'coursesCount', 'categoriesCount'))

    <!-- About End -->


    <!-- Feature Start -->
    @include('site.parts.feature')
    <!-- Feature Start -->
@endsection
