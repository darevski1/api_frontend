<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Validator;
class FilesController extends Controller
{
    public function index()
    {
        return File::all();
    }
    public function store(Request $request)
    {
        

    //     $validator = Validator::make($request->all(), 
    //     [ 
    //     'bucket_id' => 'required',
    //     'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
    //    ]);   

        // if ($validator->fails()) {          
        //     return response()->json(['error'=>$validator->errors()], 401);                        
        // }  
        
        //  if ($files = $request->file('file')->getClientOriginalName()) {
        //     //store file into document folder
        //     $file = $request->file->store('/public/documents');
        //     //store your file into database
        //     $document = new File();
        //     $document->name = $file;
        //     $document->bucket_id = $request->bucket_id;
            
        //     $document->save();
              
        //     return response()->json([
        //         "success" => true,
        //         "message" => "File successfully uploaded",
        //         "file" => $file
        //     ]);
  
        // }
        

        $name = $request->file('file')->getClientOriginalName();
 
        $path = $request->file('file')->store('public/documents');
 
 
        $save = new File;
 
        $save->name = $name;
        $save->name = $name;
        $save->path = $path;
 
        return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel 8');
 

    }
    public function destroy($id)
    {
    
        return File::destroy($id);
        return "Success";

    }
    public function show($id)
    {
        return File::find($id);
    }

    public function bucket_id($id) {
 
        return File::query()
        ->where('bucket_id', '=', $id) 
        ->get();

        // return Album::where('artist', '=', 'Something Corporate')
        // ->get();
    }
}