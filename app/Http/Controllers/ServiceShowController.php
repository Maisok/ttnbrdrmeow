<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
class ServiceShowController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    public function show(Service $service)
    {
        return view('cart', compact('service'));
    }
}
