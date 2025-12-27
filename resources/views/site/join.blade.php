@extends('site.master')

@section('title', 'Edukate - Join Us')

@section('header-class', 'page-header')

@section('header')
    <h1 class="text-white display-1">Join Us</h1>
    <div class="d-inline-flex text-white mb-5">
        <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('site.join') }}">Home</a></p>
        <i class="fa fa-angle-double-right pt-1 px-3"></i>
        <p class="m-0 text-uppercase">Join Us</p>
    </div>
@endsection

@section('content')
    <!-- Join Start -->
    @include('site.parts.join')
    <!-- Join End -->
@endsection
