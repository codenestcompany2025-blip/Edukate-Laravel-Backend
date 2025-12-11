<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    function index()
    {
        return view('site.index');
    }

    function about()
    {
        return view('site.about');
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
        return view('site.course');
    }

    function detail()
    {
        return view('site.detail');
    }

    function feature()
    {
        return view('site.feature');
    }

    function team()
    {
        return view('site.team');
    }
    
    function testimonial()
    {
        return view('site.testimonial');
    }
}
