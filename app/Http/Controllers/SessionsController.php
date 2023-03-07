<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes =request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(! auth()->attempt($attributes)) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Your provided credentials did not match.']);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back');
    }


    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success','Goodbye!');
    }
}
