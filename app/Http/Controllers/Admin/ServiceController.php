<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use DataTables;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $services = Service::all();
            return DataTables::of($services)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $viewBtn = '<a href="' . route('services.show', ['service' => $row->id]) . '" class="mr-3 text-primary"><i class="fa fa-eye"></i></a>';
                    $editBtn = '<a href="' . route('services.edit', ['service' => $row->id]) . '" class=" text-primary mr-2"><i class="fa fa-pen"></i></a>';
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

        return view('admin.services.index');
    }

    public function create()
    {
        return view('admin.services.store');
    }

    public function store(Request $request)
    {

        // Validate the input
        $request->validate([
            'title' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'we_offer_heading' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'home_para' => $request->input('home_para'),
            'icon' => $request->input('icon'),
            'bg_image' => $request->input('bg_image'),
            'we_offer' => $request->input('we_offer'),
            'we_offer_heading' => $request->input('we_offer_heading'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_desc' => $request->input('meta_desc'),
            'meta_title' => $request->input('meta_title'),
            'order' => $request->input('order'),
            'status' => $request->input('status', 1), // Default to 1 if status is not provided
        ];
        $data['bg_image']  = image_upload($request->file('bg_image'), 'services/');
        $data['icon']  = image_upload($request->file('icon'), 'services/');


        // Create a new shipment record
        Service::create($data);

        // Optionally, you can return a response or redirect
        return redirect()->route('services.index')
            ->with('success', 'Shipment created successfully.');
    }
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.view', compact('service'));
    }
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'title' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'bg_image' => 'nullable|string|max:255',
            'we_offer_heading' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'home_para' => $request->input('home_para'),
            'icon' => $request->input('icon'),
            'bg_image' => $request->input('bg_image'),
            'we_offer' => $request->input('we_offer'),
            'we_offer_heading' => $request->input('we_offer_heading'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_desc' => $request->input('meta_desc'),
            'meta_title' => $request->input('meta_title'),
            'order' => $request->input('order'),
            'status' => $request->input('status', 1), // Default to 1 if status is not provided
        ];
        // Update the service
        $service = Service::findOrFail($id);
        $service->Update($data);

        return redirect()->route('services.index');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services.index');
    }
}
