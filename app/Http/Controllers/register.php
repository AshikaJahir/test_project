<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class register extends Controller
{
   //Declaring middleware to use 
    public function __construct()
    {
        $this->middleware('Register');
    }




    public function register(Request $request)
    {
        //Two methods in getting form data
        //1. using method(no param in function)
        /*$first_name =$_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email_id = $_POST['email_id'];*/
        
    //2.using request  (has request param in function)               
        
        
       $first_name = $request->first_name;
       $last_name = $request->last_name;
       $gender = $request->gender;
       $age = $request->age;
       $email_id = $request->email_id;
       
        //inserting a record 
        //DB::table('users')->insert(['first_name' => $first_name , 'last_name'=> $last_name,'gender' => $gender,'age'=>$age,'email_id' => $email_id,'unique_id'=>'Laravel']);
     
        $id = \DB::table('crud_table')->insertGetId(['first_name' => $first_name , 'last_name'=> $last_name,
            'gender' => $gender,'age'=>$age,'email_id' => $email_id,'unique_id'=>'Laravel']);
        echo "The student ". $first_name." has been inserted with the id ".$id;
        echo "<br><br><br>";
        
        echo "<a href='/laravel/test_project/public'>Home</a>";
        \Log::channel('single')->info('The user has registered the student with id' .$id); //For specified channel
        //return redirect()->action('register@view');
    }
    
    public function delete(Request $request)
    {
        //$id = $_POST['id'];
        $id = $request->id;
        
        //DB::table('crud_table')->delete(); //Deletes entire table

        \DB::table('crud_table')->where('id', '=', $id)->delete();
        
        echo "The student with id " .$id . " has been deleted successfully";
        
        echo "<br><br><br>";
        
        echo "<a href='/laravel/test_project/public'>Home</a>";
        
        \Log::channel('single')->info('The user has deleted the student with id' .$id); //For specified channel
    }
    
    public function view()
    {
       
        //using model
        
       /* $crud = \App\crud_table::all();
        print_r($crud);
        foreach ($crud as $detail)
        {
          // echo  $crud->first_name;
        }
        */
        
        
        $students = \DB::table('crud_table')->select('id','first_name','last_name','age','gender','email_id')->get();
        
       
        $students = json_encode($students);
        echo $students;        
        
        echo "<br><br><br>";
        echo "The student details are shown ";
        echo "<br><br><br>";
        
       //\Log::info('The user has viewed the student details');
       \Log::channel('single')->info('The user has viewed the student details'); //For specified channel
        echo "<a href='/laravel/test_project/public'>Home</a>";
        
    }
      public function update(Request $request)
    {
        //updating a record    
       /* $id = $_POST['id'];
        $first_name =$_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email_id = $_POST['email_id'];*/
        
        $id=$request->id;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $gender = $request->gender;
        $age = $request->age;
        $email_id = $request->email_id;
        
        //sample updatequery
       // DB::table('users')->where('id', 1)->update(['votes' => 1]);
        \DB::table('crud_table')->where('id',$id)->update(['first_name' => $first_name , 'last_name'=> $last_name,
            'gender' => $gender,'age'=>$age,'email_id' => $email_id,'unique_id'=>'Laravel']);
        
        echo "The student with id ". $id." has been updated successfully";
        echo "<br><br><br>";
        
        echo "<a href='/laravel/test_project/public'>Home</a>";
        
        \Log::channel('single')->info('The user has edited the student with id' .$id); //For specified channel
    }
    
    
}
