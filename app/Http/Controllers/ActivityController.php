<?php

namespace TestProject\Http\Controllers;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Http\Request;


class ActivityController extends Controller
{
    public function redirect() {    
        
        //BOTH METHOD WORKS
        //return Redirect::action('ActivityController2@display');//Include header file r use \Redirect
        return redirect()->action('ActivityController2@display');
    }
    
}
