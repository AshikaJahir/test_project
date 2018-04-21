<?php

namespace TestProject\Http\Middleware;

use Closure;

class ValidatorMiddleware
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
        echo 'u r inside validator middleware'.'<br>';
        
        $validatedData = $request->validate([
       // 'first_name' => 'bail|required|max:1',
        ]);
        
        //Bail stops the validation process when the first validation process.
        
       // echo $validatedData;
        
        return $next($request);
    }
}
