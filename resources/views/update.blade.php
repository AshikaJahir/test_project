

@extends('layouts.subpage')<!-- Mentions which layout should be used-->

@section('title', 'Update Form')

@section('sidebar')
<p> This is the update form</p>
@endsection

@section('content')
    <form action="update" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" </input>
    		<div>
        		<label>Id</label>
        		<input type="text" name="id" class="form-control"  placeholder="Id to be updated"  required="">
    		</div>

                <br>    	
            
    		<button type="submit" class="btn btn-primary">Update</button>
    </form>
        
@endsection

<!-- html tags need not require because, they are already present in the parent classs-->