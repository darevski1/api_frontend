<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Register new user


    public function register(Request $request){

        //validation 
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
         ]);
         
         $user = User::create([
             'name' => $fields['name'],
             'email' => $fields['email'],
             'password' => bcrypt($fields['password'])
         ]);
 
         $token = $user->createToken('myapptoken')->plainTextToken;
 
         $response = [
             'name' => $user,
             'token' => $token
         ];
 
         return response ($response, 201);

    }
    public function login(Request $request){

        $fields = $request->validate([
           'email' => 'required|string',
           'password' => 'required|string'
        ]);
        
        // Check email 
        $user =  User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return \response([
                'message' => 'Bad Credentials'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'name' => $user,
            'token' => $token
        ];

        return response ($response, 201);
    }
    public function logout(){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Successfully, Log Out'
        ];
    }
}
