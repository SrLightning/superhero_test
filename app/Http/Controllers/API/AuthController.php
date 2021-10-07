<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerUser(Request $request) {

        $validator = Validator::make($request->all(), User::$rules);

        if ($validator->fails())
            return response([
                'error' => true, 
                'message' => $validator->errors(),], 
                400); 
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']), ]);

        $access_token = $user->createToken('authToken')->accessToken;

        return response([
            'user' => $user,
            'access_token' => $access_token
        ], 200);
    }

    public function logInUser(Request $request) {
        $validator = $request->validate([
            'email' =>'email|required', 
            'password' =>'required', ]);
        
        if (!auth()->attempt($validator)) {
            return response([ 
                'error' => true, 
                'message' => 'Invalid credentials'], 
                400); 
        }
        
        $access_token = auth()->user()->createToken('authToken')->accessToken;

        return response([
            'user' => auth()->user(),
            'access_token' => $access_token
        ], 200);
    }
}
