<?php 
	include 'server.php';

	$msg = "";

	if (isset($_POST['save'])) {
		
		$staff_id = $_POST['staff_id'];
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$department = $_POST['dept'];
		$faculty = $_POST['faculty'];
		$qualification = $_POST['qualification'];
		$position = $_POST['position'];
		$bio = $_POST['bio'];

		$image = $_FILES['img'];
		$imageName = $_FILES['img']['name'];
		$imageType = $_FILES['img']['type'];
		$imageTmpName = $_FILES['img']['tmp_name'];
		$imageError = $_FILES['img']['error'];
		$imageSize = $_FILES['img']['size'];

		$imageExt = explode('.', $imageName);
		$fileActualExt = strtolower(end($imageExt));

		$allowed = array('jpg', 'jpeg', 'png');

		if (in_array($fileActualExt, $allowed)) {
			if ($imageError == 0) {
				if ($imageSize < 500000) {
					$imageNameNew = uniqid('', true).".".$fileActualExt;

					if ($department != "Select Department" || $department != " ------------------ ") {

						$sql = "INSERT INTO staff_profile (staff_id, email, firstname, lastname, department, faculty, qualification, position, bio, img) VALUES ('$staff_id', '$email', '$firstname', '$lastname', '$department', '$faculty', '$qualification', '$position', '$bio', '$imageNameNew')";
						$query = mysqli_query($conn, $sql);

						if ($query) {
							echo "Saved Successfully!";
							header("Location: addStaff.php?saveSuccess");
						}
						else{
							array_push($errors, "Failed to save info!");
						}
					}else{
						array_push($errors, "Invalid entry in -Department-");
					}

				}else{
					array_push($errors, "The file size is too big!");
				}
			}
			else{
				array_push($errors, "There was an error uploading file!");
			}
		}
		else{
			array_push($errors, "Unsupported file type!");
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script defer
	src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Add Staff :: FUL</title>
</head>
<body>


	<div class="Wrapper">
		<!-- Navigation -->
		<nav class="main-nav">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a style="background: #0e2f44; color: white;" href="#">Add Staff</a></li>
				<li><a href="dept.php">Department</a></li>
				<li><?php if (isset($_SESSION['username'])): ?>
			<a href="index.php?logout='1'" style="color:red ">Logout</a>
		<?php endif ?></li>
			</ul>
		</nav>
	

	<div class="box_header">
			<h3>ADD STAFF MEMBER</h3>
		</div>
		<section class="form_boxes">

			<form action="addStaff.php" method="POST" enctype="multipart/form-data">

				<?php include('errors.php');?>

				<div class="box">
					<input type="text" name="staff_id" placeholder="Staff ID" required="">
				</div>	

				<div class="box">
					<input type="email" name="email" placeholder="Email">
				</div required="">	

				<div class="box">
				<input type="text" name="firstname" placeholder="Firstname" required="">
				</div>

				<div class="box">
					<input type="text" name="lastname" placeholder="Lastname" required="">
				</div>		

				<div class="box">
					<select name="dept" style="color: gray;">
						<option>Select Department</option>
						<option> ------------------ </option>
						<option>ADMINISTRATIVE</option>
						<option> ------------------ </option>
						<option>BIOLOGICAL SCIENCES</option>
						<option>CHEMISTRY</option>
						<option>COMPUTER SCIENCE</option>
						<option>ECONOMICS</option>
						<option>ENGLISH AND LIT. STUDIES</option>
						<option>GEOGRAPHY</option>
						<option>GEOLOGY</option>
						<option>HISTORY AND INT'L STUDIES</option>
						<option>MATHEMATICAL SCIENCES</option>
						<option>PHYSICS</option>
						<option>POLITICAL SCIENCE</option>
					</select>
				</div>			

				<div class="box">
					<select name="faculty" style="color: gray;">
						<option>Select Faculty...</option>
						<option> ------------------ </option>
						<option>SCIENCES</option>
						<option>ARTS AND HUMANITIES</option>
						<option> ------------------ </option>
						<option>MEMBER OF SENATE</option>
						<option>BURSERY</option>
						<option>ACADEMIC AFFAIRS</option>
					</select>
				</div>

				<div class="box">
					<input type="text" name="qualification" placeholder="Qualification" required="">
				</div>

				<div class="box">
					<input type="text" name="position" placeholder="Position" required="">
				</div>

				<div class="box">
					<label>Brief Academic Bio</label><br>
					<textarea type="text" name="bio" ></textarea required="">
				</div>

				<div class="box">
					<label>Upload Image</label><br>
					<input type="file" name="img" required=""><br>
					<label style="color: red; font-size: 13px;"> * Note: Picture should be of dimensions 500x500 and must not exceed 200kb *</label>
				</div>

				<input style="float: right; margin-top: 12px; width: 120px; height: 40px; border-radius: 5px; background: #003366; color: white;" type="submit" name="save" value="Save">

			</form>
		</section><br>

		<section>
			<div class="box_header">
			<h3>STAFF RECORD</h3>
			</div>

			<div style="overflow-x:auto; border-width: 5px; border-collapse: collapse;">
				<table style="width: 100%">
					<tr>
						
						<th>Staff_id</th>
						<th>Email</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Department</th>
						<th>Faculty</th>
						<th>Qualification</th>
						<th>Position</th>
						<th>Bio</th>
						<th>Image</th>
						<th>Action</th>
						<th></th>
					</th>

					<?php

					$sql = "SELECT * FROM staff_profile order by 1 DESC LIMIT 0,5";

					// $sql = "SELECT * FROM test order by RAND() LIMIT 0,5"; TO ORDER RANDOMLY

					$query = mysqli_query($conn, $sql);

					$i = 0;
					while ($row = mysqli_fetch_array($query)) {
						
						$staff_id = $row['staff_id'];
						$email = $row['email'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$department = $row['department'];
						$faculty = $row['faculty'];
						$qualification = $row['qualification'];
						$position = $row['position'];
						$bio = $row['bio'];
						$img = $row['img'];

					$i++;
					?>

					<tr>
						
						<td><?php echo $staff_id;?></td>
						<td><?php echo $email;?></td>
						<td><?php echo $firstname;?></td>
						<td><?php echo $lastname;?></td>
						<td><?php echo $department;?></td>
						<td><?php echo $faculty;?></td>
						<td><?php echo $qualification;?></td>
						<td><?php echo $position;?></td>
						<td><?php echo $bio;?></td>
						<td><?php echo $img;?></td>
						<td><a style="text-decoration: none; background: blue; padding: 4px; color: white; border-radius: 5px;" href="#">Edit</a></td>
						<td><a style="text-decoration: none; background: red; padding: 4px; color: white; border-radius: 5px;" href="#">Delete</a></td>
						
					</tr>

					<?
					}
					?>
				</table>

		<style type="text/css">

			th, td {
    			padding: 4px;
    			background: white;
			}

			tr:hover {
				background-color: #f5f5f5;
			}

			tr:nth-child(even) {
				/*background-color: #f2f2f2;*/
			}

			th {
			    background-color: #fff;
			    color: #000;
			}

		</style>




			</div>
		</section><br><br>

		

			<section class="info">
			<img src="images/2.jpg" alt="">
			<div>
				<h2>bPrograma</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
				<a href="#" class="btn">Learn More</a>
			</div>
		</section>
</div>
<!-- Wrapper ends -->

		<!-- Footer -->
		<footer>
			<p>Staff Profile &copy; 2018</p>
		</footer>

	</div>
	<!-- Wrapper Ends -->


	<style type="text/css">
		
		input, select {
			width: 200px;
			height: 25px;
			box-shadow: var(--shadow);
			border-radius: 4px;
		}

		textarea {
			width: 300px;
			height: 50px;
			box-shadow: var(--shadow);
			border-radius: 4px;
		}

	</style>

</body>
</html>