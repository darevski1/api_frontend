<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function store(Request $request)
    {
        

        $request->validate([
            'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
        ]);

        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
 

    }
}
