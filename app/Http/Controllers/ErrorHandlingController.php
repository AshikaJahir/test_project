<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\QueryException;




class ErrorHandlingController extends Controller
{
    public function check()
    {
     
        try
            {
                \DB::table('crud')->where('email_id','$email_id')->first();//table name is wrong
            } catch (\Exception $e) {
                throw new QueryException($e->getMessage());
            }
           
             
      
    }
    
    
}
