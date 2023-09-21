<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\PdfToImage\Pdf;
use Spatie\PdfToImage\Exceptions\PdfDoesNotExist;

class IndexController extends Controller
{

    public function index()
    {


        $page = Page::where('slug', 'home')->first();
        if (!$page) {
            return view('front.404'); // Render your custom 404 error page view
        }
        $faqs_result = Faq::where('page_id', $page->id)->get();

        return view('front.index', compact('page', 'faqs_result', 'faqs_result'));
    }

    public function about()
    {

        $page = Page::where('slug', 'about')->first();
        if (!$page) {
            return view('front.404'); // Render your custom 404 error page view
        }
        $faqs_result = Faq::where('page_id', $page->id)->get();

        return view('front.about', compact('page', 'faqs_result'));
    }

    public function services()
    {

        $page = Page::where('slug', 'services')->first();
        if (!$page) {
            return view('front.404'); // Render your custom 404 error page view
        }
        $faqs_result = Faq::where('page_id', $page->id)->get();

        return view('front.services', compact('page', 'faqs_result'));
    }

    public function service($slug)
    {
        $service = Service::Active()->where('slug', $slug)->with('innerService')->first();
        $faqs_result = Faq::where('service_id', $service->id)->get();

        return view('front.service', compact('service', 'faqs_result'));
    }

    public function portfolio()
    {

        $page = Page::where('slug', 'portfolio')->first();
        if (!$page) {
            return view('front.404'); // Render your custom 404 error page view
        }
        $faqs_result = Faq::where('page_id', $page->id)->get();

        $portfolios = Service::active()
            ->with(['portfolios' => function ($query) {
                $query->main();
            }])
            ->get();
        // dd($portfolios);
        return view('front.portfolio', compact('page', 'portfolios', 'faqs_result'));
    }


    public function case_studies()
    {

        $page = Page::where('slug', 'case-studies')->first();
        if (!$page) {
            return view('front.404'); // Render your custom 404 error page view
        }

        $faqs_result = Faq::where('page_id', $page->id)->get();



        return view('front.case-studies', compact('page', 'faqs_result'));
    }

    public function blogs()
    {

        $page = Page::where('slug', 'blogs')->first();
        if (!$page) {
            return view('front.404'); // Render your custom 404 error page view
        }
        $faqs_result = Faq::where('page_id', $page->id)->get();

        $blogs = Blog::Active()->get();
        return view('front.blogs', compact('page', 'blogs', 'faqs_result'));
    }

    public function blog($slug)
    {
        $blog = Blog::Active()->where('slug', $slug)->first();
        $faqs_result = array();

        return view('front.blog', compact('blog', 'faqs_result'));
    }

    public function contact()
    {

        $page = Page::where('slug', 'contact')->first();
        if (!$page) {
            return view('front.404'); // Render your custom 404 error page view
        }
        $faqs_result = Faq::where('page_id', $page->id)->get();

        return view('front.contact', compact('page', 'faqs_result'));
    }

    public function page($slug)
    {

        $page = Page::where('slug', $slug)->first();
        if (!$page) {
            return view('front.404'); // Render your custom 404 error page view
        }

        $faqs_result = Faq::where('page_id', $page->id)->get();

        return view('front.pages', compact('page', 'faqs_result'));
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
        // Mail::to('your@email.com')->send(new \App\Mail\ContactFormMail($request->all(), 'faqs_result'));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
