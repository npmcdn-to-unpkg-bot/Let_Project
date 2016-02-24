<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<title>Dashboard</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
	integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
	integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
	</script>

	<link rel="stylesheet" type="text/css" href="/assets/css/styles.css">


</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
	    	<li><a href="#"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
	    </ul>
	  </div>
	</nav>

	<div class='container'>

		<div id="main" class="col-md-7">
			<h1>Main complain page</h1>
			 <form action="#" method="POST" role="form" class="col-md-6">
				<div class="form-group">
					<label for="sel1">What do you need to vent about?</label>
					<select class="form-control" id="sel1">
						<option>Work</option>
						<option>School</option>
						<option>Relationships</option>
						<option>Family</option>
						<option>Money</option>
						<option>Miscellaneous</option>
					</select>
				</div>
				<div class="form-group">
			  		<textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
				</div>
			    <button type="submit" class="btn btn-danger">Vent</button>
			</form>
			
			<div id="vents">
				<h1>VENTS ARE GONNA GO HERE</h1>
			</div>

		</div>

		<div id="right" class="col-md-4">
			<h1>Categories</h1>
			<div id="categories">
				 <div class="list-group">
				  <a href="#" class="list-group-item">Work</a>
				  <a href="#" class="list-group-item">School</a>
				  <a href="#" class="list-group-item">Relationships</a>
				  <a href="#" class="list-group-item">Family</a>
				  <a href="#" class="list-group-item">Money</a>
				  <a href="#" class="list-group-item">Miscellaneous</a>
				</div>
			</div>

			<div id="twitter">
				<h1>Twitter Feed</h1>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
				<p>TWEET HERE</p>
			</div>

		</div>

	</div>
</body>
</html>