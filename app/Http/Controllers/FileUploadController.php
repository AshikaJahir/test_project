<?php

namespace TestProject\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileUploadController extends Controller
{
    public function uploadFile(Request $request) {
        //$path = $request->file('file_name_in Form')->store('folder name to b stored in');
        $path = $request->file('image')->store('public/uploaded_files');
        //Storage::put('public/uploaded_files', $request->file('image'));
        echo 'File uploaded successfully';
        
        
        
    }
}
