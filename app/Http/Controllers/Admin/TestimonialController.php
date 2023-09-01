<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\TestimonialPlatform;
use Illuminate\Http\Request;
use DataTables;

class TestimonialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $testimonials = Testimonial::all();
            return DataTables::of($testimonials)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('testimonials.show', ['testimonial' => $row->id]) . '" class="edit btn btn-primary btn-sm mr-3">View</a>';
                    $btn2 = '<a href="' . route('testimonials.edit', ['testimonial' => $row->id]) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    return $btn . $btn2;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testimonialPlatforms = TestimonialPlatform::Active()->get();

        return view('admin.testimonial.store', compact('testimonialPlatforms'));
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
            'name' => 'required',
            'content' => 'required',
        ]);


        $data = [

            'name' => $request->name,
            'content' => $request->content,
            'platform_id`,' => $request->platform_id,
            'image' => $request->image,
            'order' => $request->order,
            'status' => $request->status,
        ];
        // Create a new testimonial image record
        Testimonial::create($request->all());

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::find($id);

        return view('admin.testimonial.view', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonialPlatforms = TestimonialPlatform::Active()->get();

        return view('admin.testimonial.edit', compact('testimonial', 'testimonialPlatforms'));
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


        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);


        $data = [

            'name' => $request->name,
            'content' => $request->content,
            'platform_id`,' => $request->platform_id,
            'image' => $request->image,
            'order' => $request->order,
            'status' => $request->status,
        ];
        $testimonial = Testimonial::find($id);


        $testimonial->update($data);

        return redirect()->route('testimonial.index')->with('success', 'testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        return redirect()->route('testimonial.index')->with('success', 'testimonial deleted successfully.');
    }
}
