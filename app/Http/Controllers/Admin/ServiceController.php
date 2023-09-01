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
                    $btn = '<a href="' . route('services.show', ['service' => $row->id]) . '" class="edit btn btn-primary btn-sm mr-3">View</a>';
                    $btn2 = '<a href="' . route('services.edit', ['service' => $row->id]) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    return $btn . $btn2;
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
            // 'home_para' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'bg_image' => 'nullable|string|max:255',
            // 'we_offer' => 'nullable|string',
            'we_offer_heading' => 'nullable|string|max:255',
            // 'step_heading_1' => 'nullable|string|max:255',
            // 'step_1' => 'nullable|string',
            // 'step_heading_2' => 'nullable|string|max:255',
            // 'step_2' => 'nullable|string',
            // 'step_heading_3' => 'nullable|string|max:255',
            // 'step_3' => 'nullable|string',
            // 'step_heading_4' => 'nullable|string|max:255',
            // 'step_4' => 'nullable|string',
            // 'step_heading_5' => 'nullable|string|max:255',
            // 'step_5' => 'nullable|string',
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
            // 'step_heading_1' => $request->input('step_heading_1'),
            // 'step_1' => $request->input('step_1'),
            // 'step_heading_2' => $request->input('step_heading_2'),
            // 'step_2' => $request->input('step_2'),
            // 'step_heading_3' => $request->input('step_heading_3'),
            // 'step_3' => $request->input('step_3'),
            // 'step_heading_4' => $request->input('step_heading_4'),
            // 'step_4' => $request->input('step_4'),
            // 'step_heading_5' => $request->input('step_heading_5'),
            // 'step_5' => $request->input('step_5'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_desc' => $request->input('meta_desc'),
            'meta_title' => $request->input('meta_title'),
            'order' => $request->input('order'),
            'status' => $request->input('status', 1), // Default to 1 if status is not provided
        ];

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
            // 'home_para' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'bg_image' => 'nullable|string|max:255',
            // 'we_offer' => 'nullable|string',
            'we_offer_heading' => 'nullable|string|max:255',
            // 'step_heading_1' => 'nullable|string|max:255',
            // 'step_1' => 'nullable|string',
            // 'step_heading_2' => 'nullable|string|max:255',
            // 'step_2' => 'nullable|string',
            // 'step_heading_3' => 'nullable|string|max:255',
            // 'step_3' => 'nullable|string',
            // 'step_heading_4' => 'nullable|string|max:255',
            // 'step_4' => 'nullable|string',
            // 'step_heading_5' => 'nullable|string|max:255',
            // 'step_5' => 'nullable|string',
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
            // 'step_heading_1' => $request->input('step_heading_1'),
            // 'step_1' => $request->input('step_1'),
            // 'step_heading_2' => $request->input('step_heading_2'),
            // 'step_2' => $request->input('step_2'),
            // 'step_heading_3' => $request->input('step_heading_3'),
            // 'step_3' => $request->input('step_3'),
            // 'step_heading_4' => $request->input('step_heading_4'),
            // 'step_4' => $request->input('step_4'),
            // 'step_heading_5' => $request->input('step_heading_5'),
            // 'step_5' => $request->input('step_5'),
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
