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

            $faqs = Faq::with('service', 'page')->get();
            return DataTables::of($faqs)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $viewBtn = '<a href="' . route('faqs.show', ['faq' => $row->id]) . '" class="mr-3 text-primary"><i class="fa fa-eye"></i></a>';
                    $editBtn = '<a href="' . route('faqs.edit', ['faq' => $row->id]) . '" class=" text-primary mr-2"><i class="fa fa-pen"></i></a>';
                    $deleteBtn = '<form action="' . route('services.destroy', ['service' => $row->id]) . '" method="POST" class="d-inline">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="text-danger" style="border: none; background-color: transparent; cursor: pointer;"><i class="fa fa-trash-alt"></i></button>
                </form>';
                    return $viewBtn . $editBtn . $deleteBtn;
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

            'service_id' => $request->page_id ? 0 : $request->service_id,
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
        $faq = Faq::with('service', 'page')->where('id', $id)->first();
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

            'service_id' => $request->page_id ? 0 : $request->service_id,
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
