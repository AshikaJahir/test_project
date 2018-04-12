<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\CustomInbuiltReportException;


//Can handle exception in three ways
//1. Handle in catch block or 
//2. Throw again to catch in custom exception or 
//3.abort to error page


class ErrorHandlingController extends Controller
{
    //1. Handle in catch block
    public function check1()
    {
     
        try
            {
                \DB::table('crud')->where('email_id','$email_id')->first();//table name is wrong
            } 
        catch (\Exception $e) 
            {
                echo $e->getMessage();                
            }
           
    }
   //2. Throw again to catch in custom exception
    public function check2()
    {
     
        try
            {
                \DB::table('crud')->where('email_id','$email_id')->first();//table name is wrong
            }
        catch (\Exception $e)
            {
                throw new CustomInbuiltReportException;
               
            }
           
    }
    
   //3.abort to error page
    public function check3()
    {
     
        try
            {
                \DB::table('crud')->where('email_id','$email_id')->first();//table name is wrong
            } catch (\Exception $e) {
                abort(404,'unauthorized action'); //this shows the view blade 404 with message
            }
           
    }
    
    
}
