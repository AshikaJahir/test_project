<?php

namespace TestProject\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File; //For file facade


class FileUploadController extends Controller
{
    public function uploadFile(Request $request) {
       //TO STORE WITH RANDOM NAME 
        //$path = $request->file('file_name_in Form')->store('folder name to b stored in');
        //$path = $request->file('image')->store('public/uploaded_files');
        //Storage::put('public/uploaded_files', $request->file('image'));
        
        //TO STORE WITH FILENAME ALONG WITH TIME FOR BEING UNIQUE
        \date_default_timezone_set('Asia/Kolkata');
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
    
    public function operations(Request $request) {
       
        //To make a directoty
       // Storage::makeDirectory('public/uploaded_files');
        
        //To delete a directory
        //Storage::deleteDirectory('public/uploaded_files');
        
        //To get the list of directories
        echo 'All directories';echo '<br>';
        $directories = Storage::directories('public');
        foreach($directories as $directory){
            echo $directory;echo '<br>';
        }
        echo '<br>';echo '<br>';
        
        $directories_list = Storage::allDirectories('public');
        foreach($directories_list as $directory){
            echo $directory;echo '<br>';
        }
        
        //To get the list of files
        echo 'All Files';echo '<br>';
        $files = Storage::files('public');
        foreach($files as $file){
            echo $file;echo '<br>';
        }
        echo '<br>';echo '<br>';

        $files = Storage::allFiles('public');
        foreach($files as $file){
            echo $file;echo '<br>';
        }
        echo '<br>';echo '<br>';
        
        //To delete a file
        $check = Storage::delete('public/cover_images/Arshad_2018-04-20_11-25-19.jpeg');
        echo $check;//returns 1 on successfull deletion else nothing on false
        
        //To check visibility of file
        echo '<br>'.'Visibility';
        $visibility = Storage::getVisibility('public/cover_images/noimage.jpg');
        echo $visibility;
        
        //To copy a file
       // Storage::copy('public/cover_images/noimage.jpg', 'public/cover_images1/noimage.jpg');
        
        //To move a file
        //Storage::move('public/cover_images/noimage.jpg', 'public/cover_images1/noimage.jpg');
        
        //Prepend Text
        Storage::prepend('public/uploaded_files/SQL Injection_2018-04-20_18-05-26.txt', 'Prepended Text');
        
        //Append Text
        Storage::append('public/uploaded_files/SQL Injection_2018-04-20_18-05-26.txt', 'Appended Text');
        
        //Last Modified
        $time = Storage::lastModified('public/uploaded_files/SQL Injection_2018-04-20_18-05-26.txt');
        echo '<br>'.'Last Modified on   '.$time;
        
        //Size in bytes
        $size = Storage::size('public/uploaded_files/SQL Injection_2018-04-20_18-05-26.txt');
        echo '<br>'.'Size of file is   '.$size .' bytes';
        
    }
    public function downloadFile($fileInDir) {
       
       $filepath= public_path('storage/uploaded_files/'.$fileInDir);

        $headers = array(
              'Content-Type: application/pdf',
            );

        return \Response::download($filepath, $fileInDir, $headers);
    }
}
