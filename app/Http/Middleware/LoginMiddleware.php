<?php

namespace TestProject\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    //middleware function handling with parameters
    /*public function handle($request, Closure $next,$role,$name)
    {
        echo $name;
        if($role == 'Editor')
        {
          echo "Role: ".$role;

        }
        else
        {
            echo 'No Access';
        }
        return $next($request);
    }*/
 
    //middleware function with form validation
    //1. Passing the request to controller and then running the middleware logic
    //2.Running the middlware logic and then pssing the request to controller
    public function handle($request, Closure $next)
   {
       $first_name = $request->first_name;
       
       $email_id = $request->email_id;
       
       if($first_name == null && $email_id == null)
       {
           return back()->withInput();
                     //  return redirect('login')->withInput();
       }
       
       
        //echo 'u r inside login middleware';
        
 
          
    return $next($request);
   }
   
   //terminable function in middleware that runs at the end of sending response to the browser';
   public function terminate($request, $response)
    {
        //echo 'From terminable function in middleware that runs at the end of sending response to the browser';
    }
}
