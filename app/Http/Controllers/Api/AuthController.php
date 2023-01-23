<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Missing credentials',
                'errors' => $validator->errors(),
            ], 400);
        }

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $user = User::where('email', $request->get('email'))->first();

            return response()->json([
                'message' => 'Signed in successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid email and password',
            ], 401);
        }
    }
}
