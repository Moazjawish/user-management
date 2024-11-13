<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $validated_inputs = [
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
        ];
        if(!Auth::attempt($validated_inputs))
        {
            throw  ValidationException::withMessages(['email' => 'The credinatlas does not match'
        ]);
        }
        $request->session()->regenerate();
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
