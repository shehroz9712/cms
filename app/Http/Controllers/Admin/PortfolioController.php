<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use DataTables;
use Image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $portfolios = Portfolio::with('service')->get();


        print_r($portfolios);
die;
        if ($request->ajax()) {
            $portfolios = Portfolio::with('service')->get();
            return DataTables::of($portfolios)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('portfolios.show', ['portfolio' => $row->id]) . '" class="edit btn btn-primary btn-sm mr-3">View</a>';
                    $btn2 = '<a href="' . route('portfolios.edit', ['portfolio' => $row->id]) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    // Delete button with a form for sending DELETE request
                    $deleteBtn = '<form action="' . route('portfolios.destroy', ['portfolio' => $row->id]) . '" method="POST" class="d-inline">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="edit btn btn-danger btn-sm">Delete</button>
                    </form>';
                    return $btn . $btn2 . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.portfolio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();


        return view('admin.portfolio.store', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {


        // Create a new service image record



        $data = [

            'service_id' => $request->service_id,
            'status' => $request->status,
            'is_on_home' => $request->is_on_home,
            'platform_id`,' => $request->platform_id,
            'order' => $request->order,
        ];
        $data['image']  = image_upload($request->file('image'), 'portfolio/');
        Portfolio::create($data);

        return redirect()->route('portfolios.index')
            ->with('success', 'Portfolio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::find($id);

        return view('portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::find($id);

        return view('portfolio.edit', compact('portfolio'));
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

        $portfolio = Portfolio::find($id);


        $portfolio->update($request->all());

        return redirect()->route('portfolios.index')->with('success', 'portfolio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();

        return redirect()->route('portfolios.index')->with('success', 'portfolio deleted successfully.');
    }
}
