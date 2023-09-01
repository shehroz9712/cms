<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;
use DataTables;
// use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $faqs = Faq::all();
            return DataTables::of($faqs)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('faqs.show', ['faq' => $row->id]) . '" class="edit btn btn-primary btn-sm mr-3">View</a>';
                    $btn2 = '<a href="' . route('faqs.edit', ['faq' => $row->id]) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    return $btn . $btn2;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.faqs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::active()->get();
        $pages = Page::active()->get();
        return view('admin.faqs.store', compact('services', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);


        $data = [

            'service_id' => $request->service_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'page_id' => $request->page_id,
            'order' => $request->order,
        ];
        // Create a new FAQ
        Faq::create($data);

        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faqs.view', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $services = Service::active()->get();
        $pages = Page::active()->get();
        return view('admin.faqs.edit', compact('faq', 'services', 'pages'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);


        $data = [

            'service_id' => $request->service_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'page_id' => $request->page_id,
            'order' => $request->order,
        ];
        $faq = Faq::findOrFail($id);

        $faq->Update($data);

        return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
