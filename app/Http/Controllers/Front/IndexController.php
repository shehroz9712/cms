<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{

    public function index()
    {

        $page = Page::where('slug', 'home')->first();


        return view('front.index', compact('page'));
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->first();

        return view('front.about', compact('page'));
    }

    public function services()
    {
        $page = Page::where('slug', 'services')->first();

        return view('front.services', compact('page'));
    }

    public function service($slug)
    {
        $service = Service::Active()->where('slug', $slug)->with('innerService')->first();
        // dd($service);
        return view('front.service', compact('service'));
    }

    public function portfolio()
    {
        $page = Page::where('slug', 'portfolio')->first();

        $portfolios = Service::active()
            ->with(['portfolios' => function ($query) {
                $query->main();
            }])
            ->get();
        // dd($portfolios);
        return view('front.portfolio', compact('page', 'portfolios'));
    }


    public function case_studies()
    {
        $page = Page::where('slug', 'case-studies')->first();

        return view('front.case-studies', compact('page'));
    }

    public function blogs()
    {
        $page = Page::where('slug', 'blogs')->first();
        $blogs = Blog::Active()->get();
        return view('front.blogs', compact('page', 'blogs'));
    }

    public function blog($slug)
    {
        $blog = Blog::Active()->where('slug', $slug)->first();
        return view('front.blog', compact('blog'));
    }

    public function contact()
    {
        $page = Page::where('slug', 'contact')->first();

        return view('front.contact', compact('page'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', 'contact')->first();

        return view('front.contact', compact('page'));
    }


    public function send(Request $request)
    {
        // Validate the form data here
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'msg' => 'required',
            'service' => 'required',
        ]);

        // Send email logic here using Laravel's Mail class
        // Example:
        // Mail::to('your@email.com')->send(new \App\Mail\ContactFormMail($request->all()));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
