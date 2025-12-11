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
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Want To Join Us?
                        </h6>
                        <h1 class="display-4">Enter Your Personal Details</h1>
                    </div>
                    <div class="contact-form">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0"
                                    placeholder="Your Name" required="required">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0"
                                    placeholder="Your Email" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control border-top-0 border-right-0 border-left-0 p-0"
                                    placeholder="Password" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password_confirmation"
                                    class="form-control border-top-0 border-right-0 border-left-0 p-0"
                                    placeholder="Password Confirmation" required="required">
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Join</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Join End -->
@endsection
