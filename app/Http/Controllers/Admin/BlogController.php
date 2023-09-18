<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use DataTables;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {




        if ($request->ajax()) {
            $blogs = Blog::all();
            return DataTables::of($blogs)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $viewBtn = '<a href="' . route('blogs.show', ['blog' => $row->id]) . '" class="mr-3 text-primary"><i class="fa fa-eye"></i></a>';
                    $editBtn = '<a href="' . route('blogs.edit', ['blog' => $row->id]) . '"class=" text-primary mr-2"><i class="fa fa-pen"></i></a>';
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
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.blog.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $data = [

            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'status' => $request->status,
            'order' => $request->order,
        ];

        $data['thumbnail']  = image_upload($request->file('thumbnail'), 'blog/');
        $data['image']  = image_upload($request->file('image'), 'blog/');

        Blog::create($data);


        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);

        return view('admin.blog.view', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('admin.blog.edit', compact('blog'));
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

        $blog = Blog::find($id);


        $blog->update($request->all());

        return redirect()->route('blogs.index')->with('success', 'blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        return redirect()->route('blogs.index')->with('success', 'blog deleted successfully.');
    }
}
