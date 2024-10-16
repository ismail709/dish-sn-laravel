<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // check if the data is valid
        // check if the user exists
        $credentials = $request->validate([
            "email" => "required|max:255|email",
            "password" => "required|min:8|max:255"
        ]);
        // login the user
        if (Auth::attempt($credentials)) {
            // regenerate session
            $request->session()->regenerate();
            // send the user back
            return redirect()->intended('feed');
        } else {
            return back()->withErrors([
                "email" => "Email or password you provided is incorrect!"
            ])->onlyInput("email");
        }

    }

    public function register(Request $request)
    {
        // validate the data
        $validated = $request->validate([
            'name' => "required|max:255|min:3|string",
            'email' => "required|max:255|email|unique:users",
            'password' => "required|max:255|min:8|confirmed",
        ]);

        try {
            // create new user account
            $user = User::create($validated);
            // login the user
            Auth::login($user);

            $request->session()->regenerate();

            // redirect the user
            return redirect("feed")->with("user", $user);
        } catch (\Exception $e) {
            report($e);

            dd("oops");
        }
    }
}
