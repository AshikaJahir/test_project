<?php

namespace TestProject\Http\Controllers;

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
        //\DB::table('crud_table')->insert(['first_name' => $first_name , 'last_name'=> $last_name,'gender' => $gender,'age'=>$age,'email_id' => $email_id,'unique_id'=>'Laravel']);
     
        $id = \DB::table('crud_table')->insertGetId(['first_name' => $first_name , 'last_name'=> $last_name,
            'gender' => $gender,'age'=>$age,'email_id' => $email_id,'unique_id'=>'Laravel']);
        
        $pid = \DB::table('relation_table')->insertGetId(['username' => null, 'crudid'=> $id]);
        
        echo "The student ". $first_name." has been inserted with the id ".$id;
        echo '<br>'."In relation_table id ".$pid. " has been inserted with other fields set to null" ;
         echo "<br><br><br>";
         
        //To update in relation table
        //\DB::table('relation_table')->where('crudid', $id)->update(['username' => 'Crud Parent']);
       
        
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
    
    //u have tried many experimental queries in this view function and commented them 
    public function view()
    {
       
        //start of project's view code  

        //using model
        
       /* $crud = \TestProject\crud_table::all();
        print_r($crud);
        foreach ($crud as $detail)
        {
          // echo  $crud->first_name;
        }
        */
        
        
        $students = \DB::table('crud_table')->select('id','first_name','last_name','age','gender','email_id')->get();
        
        //return view('studentView', ['students' => $students]);
        //
        //To display the columns seperately
        /*foreach($students as $student)
            {
                echo '<br>'. $student->id.'<br'.$student->first_name . '<br>' .$student->last_name . '<br>' .$student->age . '<br>' . $student->gender . '<br>' .$student->email_id;
                echo '<br>';
            }*/
        
        //$students = json_encode($students);
        echo $students;        
        
        echo "<br><br><br>";
        echo "The student details are shown ";
        echo "<br><br><br>";
        
       //\Log::info('The user has viewed the student details');
       \Log::channel('single')->info('The user has viewed the student details'); //For specified channel
        echo "<a href='/laravel/test_project/public'>Home</a>";
        
        echo '<br>';
        //end of project's view code
        
        
        /*//To view both tables(using join)
        $users = \DB::table('crud_table')
            ->join('relation_table', 'crud_table.id', '=', 'relation_table.crudid')
            ->get();
        echo $users;
        foreach ($users as $user) {
                echo '<br>'.$user->id;
            }*/
        
     
        
        /*//Checking multiple select queries
        //1.Retrieving a single row
        $user = \DB::table('crud_table')->where('first_name', 'Anu')->first();
        echo $user->first_name. '<br>' . $user->last_name; echo '<br>';
        
        //2.Retrieving a single column of the row        
        $email = \DB::table('crud_table')->where('first_name', 'Anu')->value('email_id');
        echo $email;echo '<br>';
        
        //3.Retrieving a column from the table
        $id_list = \DB::table('crud_table')->pluck('id');

            foreach ($id_list as $id) {
                echo $id . '<br>';
            }
            
         //4.For chunking
         \DB::table('crud_table')->orderBy('first_name')->chunk(5, function ($student_list) {
            foreach ($student_list as $student) {
                echo $student->id;
            }
            });
            
           //5.Using Aggregate function
            $student_count = \DB::table('crud_table')->count();
            echo '<br>'.$student_count.'<br>';

            $last_id = \DB::table('crud_table')->max('id');
            echo $last_id.'<br>';
            
            //6.Combining clauses
            $ge_count = \DB::table('crud_table')
                ->where('first_name', 'ge')
                ->count('id');
            echo $ge_count.'<br>';
            
            //7.Checking the existence of the record returns 1 on true null on false
            $record_exist = \DB::table('crud_table')->where('first_name', 'Anu')->exists();
            echo $record_exist.'<br>';
            $record_doesnot_exist = \DB::table('crud_table')->where('first_name', 'Anucudv')->doesntExist();
            echo $record_doesnot_exist.'<br>';
            
            //8.Selecting specified columns
            $student_list = \DB::table('crud_table')->select('first_name', 'email_id as user_email')->get();
            foreach ($student_list as $student) {
                echo $student->user_email;
            }
            
            //9.Getting Distinct values based on entire row
            $student_list = \DB::table('crud_table')->distinct()->get();
            echo $student_list;
            
            //10.Getting distinct values based on single column
            $student_list = \DB::table('crud_table')->select('first_name')->distinct()->get();
            echo $student_list;
            
            //11.Using where clause for two or more conditions
            $student = \DB::table('crud_table')->where([
                            ['first_name', '=', 'anu'],
                            ['last_name', '=', 'menon'],
                        ])->get();
                foreach ($student as $student) {
                   echo $student->id.'<br>'; 
                }
            //12.Using where clause for or condition
            $students = \DB::table('crud_table')
                    ->where('id', '>', 60)
                    ->orWhere('first_name', 'ge')
                    ->get();
            echo $students;
            
            //13.Retrieving where using between
            $students = \DB::table('crud_table')
                    ->whereBetween('id', [60, 65])->get();
            echo '<br><br>'.$students;
            
            //14.Retrieving where using notbetween
            $students = \DB::table('crud_table')
                    ->whereNotBetween('id', [60, 65])->get();
            echo '<br><br>'.$students;
            
            //15. retrieving where in
            $students = \DB::table('crud_table')
                    ->whereIn('id', [70, 60])
                    ->get();
            echo '<br><br>'.$students;
            
            //16. retrieving where in
            $students = \DB::table('crud_table')
                    ->whereNotIn('id', [70, 60])
                    ->get();
            echo '<br><br>'.$students;*/
            
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
