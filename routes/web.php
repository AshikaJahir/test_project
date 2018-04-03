<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing;

Route::get('/', function (Request $request) {
    //$request->session()->put('user','A');
    // Session::put('user','Admin');
    //Session::flush();
    return view('welcome');
    
    /*if(isset($request))
    {
        $request->session()->flash('user','Hello Admin');
        return $request->session()->get('user');
    }
    else
    {
        return "session not set";
    }*/
    
    /*//using session facade directly
    
    Session::put('data',[1,2,3,4,5]);
    dd(Session::get('data')); //dump and die*/      
    
}); 
//})->middleware('first','second');//Assigning middleware 

//Below are directed to different views

Route::get('register', function () {
    return view('register_custom');
});

/*Route::get('update', function () {
    return view('update');
});*/ //will be inserted after the prefilling concept

Route::get('update', function (Request $request) {
    if ($request->session()->get('user')== 'Admin'){return view('update_view');}
    else{   return view('noaccess');}
});

Route::get('delete', function (Request $request) {
    if ($request->session()->get('user')== 'Admin'){return view('delete');}
    else{   return view('noaccess');}
});

Route::get('login', function(){
    return view('login');
});

Route::get('logout', function( Request $request){
    $request->session()->remove('user');
    return redirect('/');
});
//The user can view the details only after login in
Route::get('view', function (Request $request) {
    if (!$request->session()->has('user')){   return view('noaccess');}
    else{   return redirect('/access');}
});

//Middleware that access controller cn be mentioned in three ways
//1. using middelware as param
//2.uisng middleware()
//3.In contollers constructor function
//
//Middleware with parameters
/*Route::post('register',[
   'middleware' => 'Register:Editor,Anu',//Register is the name of the middleware as registered in kernel.php
   'uses' => 'register@register',
]);*/

 //Middleware for form validation
/*Route::post('register',[
   'middleware' => 'Register',//Register is the name of the middleware as registered in kernel.php
   'uses' => 'register@register',
]);*/
//Route::method_name('action_name_in _form','controller_name@function_name_inside_controller');

//Below are directed to moddlewares and controllers
Route::post('register','register@register')->name('register')->middleware('Register'); 
Route::post('delete','register@delete')->name('delete');
Route::get('access','register@view')->name('view');
Route::post('update','register@update')->name('update')->middleware('Register');

Route::post('login','LoginController@login')->name('login');



Route::any('noaccess', function(){
    return view('noaccess');
});

//For resource crud operation
//Route::resource('', 'CrudController');

//for session routing

Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');


Route::get('child', function () {
    return view('child');
});

Route::get('reg_welcome_copy/{pageName}', function ($pageName) {
    echo $pageName;
//return view('register');
});


