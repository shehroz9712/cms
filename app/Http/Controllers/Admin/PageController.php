<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $pages = Page::get();
            return DataTables::of($pages)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('pages.show', ['page' => $row->id]) . '"class="mr-2 text-primary"><i class="fa fa-eye"></i></a>';
                    $btn2 = '<a href="' . route('pages.edit', ['page' => $row->id]) . '" class="text-primary"><i class="fa fa-pen"></i></a>';
                    // Delete button with a form for sending DELETE request
                    $deleteBtn = '<form action="' . route('pages.destroy', ['page' => $row->id]) . '" method="POST" class="d-inline">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="text-danger"><i class="fa fa-trash-alt"></i></button>
                    </form>';
                    return $btn . $btn2 . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.page.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {


        // Create a new service image record



        $data = [

            'title' => $request->title,
            'slug' => $request->slug,
            'heading' => $request->heading,
            'content' => $request->content,
            'link' => $request->link,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'status' => $request->status, 1,
        ];
        $data['image']  = image_upload($request->file('page'), 'pages');
        Page::create($data);

        return redirect()->route('pages.index')
            ->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);

        return view('page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view('page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $page = Page::find($id);


        $page->update($request->all());

        return redirect()->route('pages.index')->with('success', 'page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'page deleted successfully.');
    }
}
