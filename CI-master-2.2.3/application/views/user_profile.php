<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Profile</title>
	<meta charset="utf-8">
	<style type="text/css">
	body {
    	background: url("/assets/pix/pink.png");
    }
	</style>

</head>
<body>
	<h2>Welcome <?= $user_session['first_name']; ?>!</h2>

	<h3>User Information: </h3>
	<p>First Name: <?= $user_session['first_name'] ?></p>
	<p>Last Name: <?= $user_session['last_name'] ?></p>
	<p>Username: <?= $user_session['username'] ?></p>
	<p>Email Address: <?= $user_session['email'] ?></p>

	<h2>Your Vents: </h2>
</body>

</html>