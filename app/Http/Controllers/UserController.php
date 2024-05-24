<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show Register/Create form
    public function create()
    {
        return view('user.register');
    }

    //store new user
    public function store(Request $request)
    {

//        dd($request->all());
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', Rule::unique('users', 'email')],
            'password' => ['required','confirmed', 'min:6']
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message', 'user created and logged in successfully');
    }

    //login view
    public function login()
    {
        return view('user.login');
    }

    //login submit
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields))
        {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'you are logged in successfully');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    //logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'user logged out successfully');
    }
}
