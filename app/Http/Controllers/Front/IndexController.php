<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        return view('front.index');
    }

    public function about()
    {
        dd('about');
    }

    public function services()
    {
        dd('services');
    }

    public function service($slug)
    {
        dd('service');
    }

    public function portfolio()
    {
        dd('portfolio');
    }


    public function case_studies()
    {
        dd('case-studies');
    }

    public function blogs()
    {
        dd('blogs');
    }

    public function blog($slug)
    {
        dd('blog');
    }

    public function contact()
    {
        dd('contact');
    }

    public function page($slug)
    {
        dd('page');
    }
}
