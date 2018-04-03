

@extends('layouts.subpage')<!-- Mentions which layout should be used-->

@section('title', 'Login Form')

@section('sidebar')
<p> This is the login form</p>
@endsection

@section('content')
    <form action="login" method="POST">
            
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" </input>
            <div> Login Form </div>
            
            
            <br>
                
    		<div>
        		<label>Email</label>
        		<input type="email" name="email_id" class="form-control"  placeholder=""  value="{{ old('email_id') }}" required="">
    		</div>
             <br>
             <br>
    		<div>
        		<label>First Name</label> will be taken as pwd
        		<input type="text" name="first_name" class="form-control"  placeholder=""  value="{{ old('first_name') }}" required="">
    		</div>
             <br>

    		<button type="submit" class="btn btn-primary">Login</button>
		</form>
        
@endsection

<!-- html tags need not require because, they are already present in the parent classs-->