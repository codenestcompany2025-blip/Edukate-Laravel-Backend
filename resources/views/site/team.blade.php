@extends('site.master')

@section('title', 'Edukate - Team')

@section('header-class', 'page-header')

@section('header')
    <h1 class="text-white display-1">Instructors</h1>
    <div class="d-inline-flex text-white mb-5">
        <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('site.index') }}">Home</a></p>
        <i class="fa fa-angle-double-right pt-1 px-3"></i>
        <p class="m-0 text-uppercase">Instructors</p>
    </div>
@endsection

@section('content')
    <!-- Team Start -->
    @include('site.parts.team', compact('instructors'))
    <!-- Team End -->
@endsection
