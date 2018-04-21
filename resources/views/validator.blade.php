

@extends('layouts.subpage')<!-- Mentions which layout should be used-->

@section('title', 'Validator Form')

<!--To display Error -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <strong>Warning</strong>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- End of error display code-->

@section('sidebar')
<p> This is to check Validator Class of Laravel </p>
@endsection

@section('content')

    <form action="validator" method="POST">
            
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" </input>
            <div> Register Form </div>
            <br>
    		<div>
        		<label>First Name</label>
        		<input type="text" name="first_name" class="form-control"  placeholder=""  >
    		</div>
            <br>
                <div>
        		<label>Last Name</label>
        		<input type="text" name="last_name" class="form-control"  placeholder="" >
    		</div>
            <br> 
            
            <div>
    			<div><label>Gender</label></div>
                        <label class="radio-inline"> <input type="radio" name="gender" value="Male" >Male</label>
    			<label class="radio-inline"><input type="radio" name="gender" value="Female" > Female</label>
    		</div>
             <br>   
                <div>
        		<label>Age</label>
        		<input type="text"  name="age" class="form-control" >
   		</div>
             <br>
    		<div>
        		<label>Email</label>
        		<input type="email" name="email_id" class="form-control"  >
    		</div>
             <br>

    		<button type="submit" class="btn btn-primary">Save</button>
		</form>
        
@endsection

<!-- html tags need not require because, they are already present in the parent classs-->