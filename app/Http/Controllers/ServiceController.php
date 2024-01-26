<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.view', compact('services'));
    }

    public function create()
    {
        return view('admin.service.update');
    }

    public function store(Request $request)
    {
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'service_cost' => 'required',
            'status' => 'required',
        ]);

        Service::create($inputs);
        session()->flash('service-create-message', 'Service Created Successfully');
        return redirect()->route('service.index');
    }

    public function update(Service $service)
    {
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'service_cost' => 'required',
            'status' => 'required'
        ]);

        $service->name = $inputs['name'];
        $service->description = $inputs['description'];
        $service->service_cost = $inputs['service_cost'];
        $service->status = $inputs['status'];

        $service->update();
        session()->flash('service-update-message', 'Service Updated Successfully');
        return redirect()->route('service.index');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        session()->flash('service-delete-message', 'Record Deleted.......');
        return back();
    }

}
