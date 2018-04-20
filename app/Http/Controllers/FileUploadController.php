<?php

namespace TestProject\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileUploadController extends Controller
{
    public function uploadFile(Request $request) {
       //TO STORE WITH RANDOM NAME 
        //$path = $request->file('file_name_in Form')->store('folder name to b stored in');
        //$path = $request->file('image')->store('public/uploaded_files');
        //Storage::put('public/uploaded_files', $request->file('image'));
        
        //TO STORE WITH FILENAME ALONG WITH TIME FOR BEING UNIQUE
            //Geting the file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();            
            //Getting just the filename
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);            
            //Getting just the extension
            $extension = $request->file('image')->getClientOriginalExtension();            
            //Filename to store
            $fileNameToStore = $fileName.'_'.date("Y-m-d_H-i-s").'.'.$extension;            
            //Upload the image
            $path = $request->file('image')->storeAs('public/uploaded_files',$fileNameToStore);
        
            echo 'File uploaded successfully';
    }
}
