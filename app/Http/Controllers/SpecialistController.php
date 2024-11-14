<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

use App\Models\Service;

class SpecialistController extends Controller
{
    public function index()
    {
        $services = Service::inRandomOrder()->take(8)->get();
        $specialists = Staff::inRandomOrder()->take(4)->get();
        return view('welcome', compact('services', 'specialists'));
    }

    public function all()
    {
        $specialists = Staff::all();
        return view('all-specialists', compact('specialists'));
    }
}
