<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Register new user


    public function register(Request $request){

        //validation 
        $fields = $request->validate([
            'name' => 'required|string',
        ]);

        $user = User::c


    }
}
