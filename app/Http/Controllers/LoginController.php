<?php

namespace TestProject\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('Login');
    }
    
    public function login( Request $request) 
    {
        $first_name = $request->first_name;
       
        $email_id = $request->email_id;
        
        $user = \DB::table('crud_table')->where('email_id',$email_id)->first();
        
        if(isset($user))
        {
            
            if($user->first_name == $first_name)
           {
                
                $request->session()->put('user',$first_name);
                return redirect('/');
           }
           else
           {
               echo 'Password is incorrect';
           }
        }
        else
        {
            echo 'No access';
        }
        
        //echo 'You are inside Controller';
    }
}
