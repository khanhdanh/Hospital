<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.view', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'service_cost' => 'required|numeric',
            'status' => 'required|in:active,inactive',
        ]);

        if (request->hasFile('photo')) {
            $inputs['photo'] = request->file('photo')->store('images');
        }

        Service::create($inputs);
        session()->flash('service-create-message', 'Service Created Successfully');
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $services)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Service $services)
    {
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'service_cost' => 'required',
            'service_availability' => 'required',
        ]);

        $services->name = $inputs['name'];
        $services->description = $inputs['description'];
        $services->service_cost = $inputs['service_cost'];
        $services->service_availability = $inputs['service_availability'];

        $services->update();
        session()->flash('service-update-message', 'Service Updated Successfully');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $services)
    {
        $services->delete();
        session()->flash('service-delete-message', 'Record Deleted.......');
        return back();
    }

    public function book(Service $services)
    {
        return view('frontend.service.book', compact('services'));
    }
}
