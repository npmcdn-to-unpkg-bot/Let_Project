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
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
	<script src="js/jquery.responsiveiframe.js"></script>
	<script src="js/ios-orientationchange-fix.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".dropdown-toggle").dropdown();
		});

	</script>
	<link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
</head>
<header>
	<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
					<div class="navbar-header"><a class="navbar-brand" href="#"> <img src="http://i18.photobucket.com/albums/b134/gold15/Screen%20Shot%202016-02-22%20at%209.40.09%20PM.png" style="width:72px;height:36px;" alt="logo"></a>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
							</button>
					</div>
					<div class="collapse navbar-collapse navbar-menubuilder">
							<ul class="nav navbar-nav navbar-left">
								<li><a href="/lets/dashboard">Home</a>
								</li>
								<li><a href="/lets/view_profile">Profile</a>

								<li> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Relationships</a></li>
										<li><a href="#">Family</a></li>
										<li><a href="#">Work</a></li>
										<li><a href="#">School</a></li>
										<li><a href="#">Money</a></li>
										<li><a href="#">Miscellaneous</a></li>
									</ul></li>
							</ul>
			<ul class="nav navbar-nav navbar-right">
									</li>
									<li><a href="/lets/view_profile">Hello, <?= $this->session->userdata('username') ?></a>
									</li>
									<li><a href="/lets/logout">Sign Out</a>
									</li>
							</ul>
					</div>
			</div>
	</div>
</header>
<body>

	<div class='container'>

		<div id="main" class="col-md-6">
			<h1>Main complain page</h1>
			 <form action="/lets/add" method="POST" role="form" class="col-md-6">
					<div class="form-group">
							<?php
								if($this->session->flashdata("registration_errors"))
								{
									echo $this->session->flashdata("registration_errors");
								}
							?>	
						<label for="sel1">What do you like to vent about?</label>

						<select name= "category">
							<option>Relationships</option>
							<option>Family</option>
							<option>Work</option>
							<option>School</option>
							<option>Money</option>
							<option>Miscellaneous</option>
						</select>
					</div>
					<div class="form-group">
				  		<textarea class="form-control" name="vent" rows="5"></textarea>
					</div>
				    <button type="submit" class="btn btn-danger">Vent</button>
			</form>

			<div id="vents">
				 <?php foreach ($all_vents as $vent) { ?>
					 <h4><?= $vent['username'] ?></h4>
					 <h5><?= $vent['content'] ?></h5>
					 <p>Category: <?= $vent['category'] ?></p>
					 <p>Created at: <?= $vent['created_at'] ?></p>

				 <?php } ?>
			</div>

		</div>

		<div id="twitter">
			<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/hashtag/worksucks" data-widget-id="702244715836493824">#worksucks Tweets</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>

	</div>
</body>
</html>
