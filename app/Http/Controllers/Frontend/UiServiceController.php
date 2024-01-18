<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class UiServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('frontend.service.view', compact('services'));
    }
}
