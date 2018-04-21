<?php

namespace TestProject\Http\Controllers;

use Illuminate\Http\Request;
use TestProject\Http\Requests\CheckValidation;

class ValidatorController extends Controller
{
    public function validation(CheckValidation $request) {

        echo 'u r inside validator controller'.'<br>';
         //$validated = $request->validated();
         

    }
    
}
