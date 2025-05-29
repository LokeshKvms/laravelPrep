<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    //
    public function create()
    {
        return view('auth.register');
    }

    public function store(){
        $attrs = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $user = User::create($attrs);

        Auth::login($user);
        
        return redirect('/jobs');;
    }
}
