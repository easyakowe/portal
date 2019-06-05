<?php
include 'server.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login :: FUL Staff Portal</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="icon" type="image/ico" href="images/fulogo.jpg"/>
	

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</head>
<body>
	<div class="header" style="background:#f2f2f2;">
		<h2 class="text-center text-dark mt-2">Verification</h2>
	</div>

	<form class="form_1" method="post" action="index.php">
		
		<!-- display validation errors here -->
		<?php include('errors.php');?>

		<div class="form-group">
			<label>StaffID</label>
			<input type="text" name="staff_id" class="form-control" value="" required="">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" required="">
		</div>
		<div class="form-group">
			<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
		</div>
		<p>
			Not yet an admin? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>

<link rel="stylesheet" href="bootstrap/bootstrap.css">
<script src="bootstrap/bootstrap.js"></script>

</html>