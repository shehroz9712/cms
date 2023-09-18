<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialsRequest;
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
            $testimonials = Testimonial::with('platform')->get();
            return DataTables::of($testimonials)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('testimonials.show', ['testimonial' => $row->id]) . '" class=" text-primary"><i class="fa fa-eye"></i></a>';
                    $viewBtn = '<a href="' . route('testimonials.edit', ['testimonial' => $row->id]) . '" class=" text-primary mr-2"><i class="fa fa-pen"></i></a>';
                    $deleteBtn = '<form action="' . route('testimonials.destroy', ['testimonial' => $row->id]) . '" method="POST" class="d-inline">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="text-danger" style="border: none; background-color: transparent; cursor: pointer;"><i class="fa fa-trash-alt"></i></button>
                </form>';
                    return $viewBtn . $editBtn . $deleteBtn;
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
    public function store(TestimonialsRequest $request)
    {



        $data = [

            'name' => $request->name,
            'content' => $request->content,
            'platform_id' => $request->platform_id,
            'order' => $request->order,
            'status' => $request->status,
        ];
        $data['image']  = image_upload($request->file('image'), 'testimonials/');

        // Create a new testimonial image record
        Testimonial::create($data);

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
        $testimonial = Testimonial::with('platform')->find($id);

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
    public function update(TestimonialsRequest $request, $id)
    {



        $data = [

            'name' => $request->name,
            'content' => $request->content,
            'platform_id' => $request->platform_id,
            'order' => $request->order,
            'status' => $request->status,
        ];
        $data['image']  = image_upload($request->file('image'), 'testimonials/');

        $testimonial = Testimonial::find($id);


        $testimonial->update($data);

        return redirect()->route('testimonials.index')->with('success', 'testimonial updated successfully.');
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
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'testimonial deleted successfully.');
    }
}
