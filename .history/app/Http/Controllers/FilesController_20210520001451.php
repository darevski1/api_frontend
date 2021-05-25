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
        
        if($request->hasFile('file')){
            $image = $request->file('file');
            $image->getClientOriginalName();
            // Get file extsnion
            $filename_ext = $image->getClientOriginalExtension();

            $newfilename =  $image . "." . $fie

            //store file into document folder
            $file = $request->file->store('/public/documents');
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

  if($request->hasFile('file')){
            $images = $request->file('file');

            foreach($images as $image){
                    // Get file original name
                    $image->getClientOriginalName();
                    // Get file extsnion
                    $filename_ext = $image->getClientOriginalExtension();
                 
                    // set new file name + 
                    $image_name = md5($image) .  "." . $filename_ext;
                    $destinationPath = public_path('/public/documents');


                    $document = new File();
                    $document->name = $image_name;
                    $document->bucket_id = $request->bucket_id;
                    
                    $document->save();
                      
                    return response()->json([
                        "success" => true,
                        "message" => "File successfully uploaded",
                        "file" => $file
                    ]);
          

                }
            
            
            }

 
        

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
