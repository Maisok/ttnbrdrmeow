<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function create(Request $request, Service $service)
    {
        $request->validate([
            'appointment_time' => 'required|date',
        ]);

        $appointment = Appointment::create([
            'service_id' => $service->id,
            'user_id' => Auth::id(),
            'appointment_time' => $request->appointment_time,
        ]);

        return redirect()->route('showservice', $service)->with('success', 'Запись успешно создана.');
    }

    public function show(Service $service)
    {
        $appointments = Appointment::where('service_id', $service->id)->get();
        return view('appointments.show', compact('service', 'appointments'));
    }
}