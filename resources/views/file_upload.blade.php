
@extends('layouts.app')

@section('content')
    <h1>File Upload</h1>
    <form action="fileupload" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" </input>        
    	

    		<div>
        		<label>Choose the file</label>
        		<input type="file" name="image" class="form-control"  placeholder=""   required="">
    		</div>

            <br>
    		<button type="submit" class="btn btn-primary">Upload</button>
		</form>
    
    
            
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" </input>  
            
    	{!! Html::link('download/SQL Injection_2018-04-20_18-05-26.txt', 'File Download in Link') !!}
    		
		

@endsection