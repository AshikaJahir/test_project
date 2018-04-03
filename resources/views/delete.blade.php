

@extends('layouts.subpage')<!-- Mentions which layout should be used-->

@section('title', 'Delete Form')

@section('sidebar')
<p> This is the delete form</p>
@endsection

@section('content')
    <form action="delete" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" </input>
    		<div>
        		<label>Id</label>
        		<input type="text" name="id" class="form-control"  placeholder="Id to be deleted"  required="">
    		</div>

                <br>    	
            
    		<button type="submit" class="btn btn-primary">Delete</button>
    </form>
        
@endsection

<!-- html tags need not require because, they are already present in the parent classs-->