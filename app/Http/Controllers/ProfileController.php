<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Appointment;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $now = now();

        // Извлекаем актуальные записи (статус active)
        $upcomingAppointments = Appointment::where('user_id', $user->id)
            ->where('status', 'active')
            ->orderBy('appointment_time')
            ->get();

        // Извлекаем прошедшие записи (статус completed)
        $pastAppointments = Appointment::where('user_id', $user->id)
            ->where('status', 'completed')
            ->orderBy('appointment_time', 'desc')
            ->get();

        return view('profile', compact('user', 'upcomingAppointments', 'pastAppointments'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'phone')->ignore($user->id),
                'regex:/^8 \d{3} \d{3} \d{2} \d{2}$/'
            ],
            'password' => 'nullable|string|min:8',
        ]);

        // Обновляем имя, только если оно передано в запросе
        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        // Обновляем телефон, только если он передан в запросе
        if ($request->filled('phone')) {
            $user->phone = $request->phone;
        }

        // Обновляем пароль, только если он передан в запросе
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Профиль успешно обновлен.');
    }
}