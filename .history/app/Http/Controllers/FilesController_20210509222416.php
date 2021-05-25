<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FilesController extends Controller
{
    public function store(Request $request)
    {
        

            $request->validate([
                'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
            ]);

        
         if ($files = $request->file('file')) {
             
            //store file into document folder
            $file = $request->file->store('public/documents');
 
            //store your file into database
            $document = new File();
            $document->name = $file;
            $document->bucket_id = $request->bucket_id;
            $document->save();
              
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
  
        }

    }
    public function destroy($id)
    {
        return File::destroy($id);
        return "Success";
    }
}
