<!DOCTYPE html>
<html lang="en">
<head>
<title>Login/reg</title>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  	<style type="text/css">
  		
  		body {
    	background: url("/assets/pix/purple_abstract.png");
    	background-repeat: no-repeat;
    	background-width: 1038px;
    	background-size: cover;
    	background-position: center;
}

  		#form{
  			display: inline-block;
  			vertical-align: top;
  			padding-left: 100px;
  			color: white;
  			width: 500px;
  		}

  		.button{
  			color: black;
  		}
  		h1{
  			width: 450px;
  			padding-top: 35px;
  			
  		}
  	</style>
</head>
<body>
<div id="container">
	<div id="form">
	<h1>Login</h1>
	<?php
		if($this->session->flashdata("login_errors"))
		{
			echo $this->session->flashdata("login_errors");
		}
	?>	
		
		<form id="login" action="/lets/process_login" method="post">
			<label for="username">Username: </label>
			<input type="text" name="username"><br>
			<label for="password">Password: </label>
			<input type="password" name="password"><br>
			<input class=button type="submit" value="Login">
		</form>
		<p>  </p>
		</div>
	<div id="form">
	<h1>Register</h1>
	<?php
		if($this->session->flashdata("registration_errors"))
		{
			echo $this->session->flashdata("registration_errors");
		}
	?>	
		<form id="register" action="/lets/process_registration" method="post">
			<label for="first_name">First Name: </label>
			<input type="text" name="first_name"><br>
			<label for="last_name">Last Name: </label>
			<input type="text" name="last_name"><br>
			<label for="username">Username: </label>
			<input type="text" name="username"><br>
			<label for="email">Email: </label>
			<input type="text" name="email"><br>
			<label for="password">Password: </label>
			<input type="password" name="password"><br>
			<label for="confirm_password">Confirm Password: </label>
			<input type="password" name="confirm_password"><br>
			<input class="button" type="submit" value="Register">
		</form>
		</div>
</div>

</body>
</html>