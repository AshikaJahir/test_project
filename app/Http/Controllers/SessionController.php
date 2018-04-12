<?php

namespace TestProject\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function accessSessionData(Request $request)
    {
      if($request->session()->has('user'))
         echo $request->session()->get('user');
      else
         echo 'No data in the session';
    }
   public function storeSessionData(Request $request)
   {
      $request->session()->put('user','Admin');
      //echo "Data has been added to session";
   }
   public function deleteSessionData(Request $request)
   {
      $request->session()->forget('user');
      echo "Data has been removed from session.";
   }
}
