

@extends('layouts.subpage')<!-- Mentions which layout should be used-->

@section('title', 'Register Form')

@section('sidebar')
<p> This is the regisetr form</p>
@endsection

@section('content')
    <form action="register" method="POST">
            
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" </input>
            <div> Register Form </div>
            <br>
    		<div>
        		<label>First Name</label>
        		<input type="text" name="first_name" class="form-control"  placeholder=""  value="{{ old('first_name') }}" required="">
    		</div>
            <br>
                <div>
        		<label>Last Name</label>
        		<input type="text" name="last_name" class="form-control"  placeholder="" value="{{ old('last_name') }}" required="">
    		</div>
            <br> 
            
            <div>
    			<div><label>Gender</label></div>
                        <label class="radio-inline"> <input type="radio" name="gender" value="Male" <?php if(old('gender') ==='Male'){echo 'checked';} ?> required="">Male</label>
    			<label class="radio-inline"><input type="radio" name="gender" value="Female" <?php if(old('gender') ==='Female'){echo 'checked';} ?> required="">Female</label>
    		</div>
             <br>   
                <div>
        		<label>Age</label>
        		<input type="text"  name="age" class="form-control" value="{{ old('age') }}" placeholder="" required="">
   		</div>
             <br>
    		<div>
        		<label>Email</label>
        		<input type="email" name="email_id" class="form-control"  placeholder=""  value="{{ old('email_id') }}" required="">
    		</div>
             <br>

    		<button type="submit" class="btn btn-primary">Save</button>
		</form>
        
@endsection

<!-- html tags need not require because, they are already present in the parent classs-->