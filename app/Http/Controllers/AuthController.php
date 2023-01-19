<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    //

    public function signup() {
        return view('signup');
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        if($validator->fails()) {
            return redirect()->route('signup')->withErrors($validator);
        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('signin')->with('success', 'You can now sign in');

    }

    public function signin() {
        return view('signin');
    }

    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->route('signin')->withErrors($validator);
        }

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->route('todos.index')->with('success', 'You are now signed in');
        } else {
            return redirect()->route('signin')->withErrors('Invalid email and password');
        }
    }

    public function signout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('signin');
    }
}
