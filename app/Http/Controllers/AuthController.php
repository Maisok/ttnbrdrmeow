<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'max:255',
                'unique:users',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^8 \d{3} \d{3} \d{2} \d{2}$/', $value)) {
                        $fail('Номер телефона должен быть в формате 8 888 888 88 88');
                    }
                },
            ],
            'password' => 'required|string|min:8',
            'g-recaptcha-response' => 'required',
        ]);

        // Проверка reCAPTCHA
        $client = new Client([
            'verify' => false, // Disable SSL verification
        ]);
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => '6LfupH4qAAAAANWkAkkjKKI_sPZG0xa7VXhjFtwo',
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ],
        ]);

        $body = json_decode((string) $response->getBody());

        if (!$body->success) {
            return redirect()->back()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed.']);
        }


        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.auth');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^8 \d{3} \d{3} \d{2} \d{2}$/', $value)) {
                        $fail('Номер телефона должен быть в формате 8 888 888 88 88');
                    }
                },
            ],
            'password' => 'required|string',
        ]);

        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}