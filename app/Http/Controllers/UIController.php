<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Service;

class UIController extends Controller
{
    public function index() {
        $services = Service::all();
        $departments = Department::whereBetween('id', [1, 3])
                                  ->where('status', 1)->get();
        $doctors = Doctor::where('status', 1)->get();
        return view('frontend.index', compact('departments', 'doctors', 'services'));
    }
}
