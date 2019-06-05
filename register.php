<?php 
	include 'server.php';
 ?>

<!DOCTYPE html>
<html>
<head>


	<title>Register :: FUL Staff Portal</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/ico" href="images/fulogo.jpg"/>
</head>
<body>
	<div class="header" style="background:#f2f2f2;">
		<h2 class="text-center text-dark mt-2">Registration</h2>
	</div>

	<form class="form_1" method="post" action="register.php">
		
		<!-- display validation errors here -->
		<?php include('errors.php');?>

		<div class="form-group">
			<label>StaffID</label>
			<input type="text" name="staff_id" class="form-control" value="" required="">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" value="" required="">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password_1" required="">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="password_2" required="">
		</div>
		<div class="form-group">
			<button type="submit" name="register" class="btn btn-success btn-block">Register</button>
		</div>
		<p>
			Already an admin? <a href="index.php">Sign in</a>
		</p>
	</form>
</body>

<link rel="stylesheet" href="bootstrap/bootstrap.css">
<script src="bootstrap/bootstrap.js"></script>

</html>