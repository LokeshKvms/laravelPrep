<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function create()
    {
        return view('auth.login');
    }

    public function store(){
        $cred = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(! Auth::attempt($cred)){
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
        request()->session()->regenerate();
        return redirect('/jobs');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
