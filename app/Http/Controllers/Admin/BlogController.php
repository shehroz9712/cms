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
                    $btn = '<a href="' . route('blogs.show', ['blog' => $row->id]) . '" class="edit btn btn-primary btn-sm mr-3">View</a>';
                    $btn2 = '<a href="' . route('blogs.edit', ['blog' => $row->id]) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    return $btn . $btn2;
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


        $imagePath = $request->file('image')->store('public/blog');


        if ($request->hasfile('thumbnail')) {
            $file = $request->file('thumbnail');
            $getImage = image_upload($file, frontImage('blog/'));
            $data['thumbnail'] = $getImage;
        } else {
            $data['thumbnail'] = 'no-image.jpg';
        }
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $getImage = image_upload($file, frontImage('blog/'));
            $data['image'] = $getImage;
        } else {
            $data['image'] = 'no-image.jpg';
        }

        $data = [

            'service_id' => $request->service_id,
            'status' => $request->status,
            'is_on_home' => $request->is_on_home,
            'platform_id`,' => $request->platform_id,
            'order' => $request->order,
        ];

        Blog::created($data);


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

        return view('blog.show', compact('blog'));
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

        return view('blog.edit', compact('blog'));
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
