<?php

namespace TestProject\Http\Middleware;

use Closure;

class RegisterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
   {
       $first_name = $request->first_name;
       $last_name = $request->last_name;
       $gender = $request->gender;
       $age = $request->age;
       $email_id = $request->email_id;
       
        
        //If age is greater than 30 it is redirected to homepage
        if($age>=30)
        {
            //echo 'No Acess';
           return back()->withInput();//returns back to the register page along with the request with previously returned input
          //  return redirect('register')->withInput();
            
        }       
        //2.Running the middlware logic and then passing the request to controller
        return $next($request);
        
    //1. Passing the request to controller and then running the middleware logic    
      /*$response = $next($request);       
      return $response;
      echo 'After controller';       */
          
    
   }
   
   //terminable function in middleware that runs at the end of sending response to the browser';
   public function terminate($request, $response)
    {
        //echo 'From terminable function in middleware that runs at the end of sending response to the browser';
    }
}
