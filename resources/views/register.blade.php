<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <!-- Form code starts here SAmple.html-->
        
        <form action="register" method="POST">
            
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" </input>
            <div> Register Form </div>
    		<div>
        		<label>First Name</label>
        		<input type="text" name="first_name" class="form-control"  placeholder=""  required="">
    		</div>
            
                <div>
        		<label>Last Name</label>
        		<input type="text" name="last_name" class="form-control"  placeholder=""  required="">
    		</div>
                
                <div>
    			<div><label>Gender</label></div>
    			<label class="radio-inline"> <input type="radio" name="gender" value="Male" required="">Male</label>
    			<label class="radio-inline"><input type="radio" name="gender" value="Female" required="">Female</label>
    		</div>
                
                <div>
        		<label>Age</label>
        		<input type="text"  name="age" class="form-control"  placeholder="" required="">
   		</div>

    		<div>
        		<label>Email</label>
        		<input type="email" name="email_id" class="form-control"  placeholder=""   required="">
    		</div>


    		<button type="submit" class="btn btn-primary">Save</button>
		</form>
        
        
        
        <!-- Form code ends here-->
    </body>
</html>
