<?php
include 'connectDB.php';
session_start();


$update = false;

$msgNo = 0;



$username = "";
$email = "";
$errors = array();

$row_no_upd = "";
$staff_id_upd = "";
$firstname_upd = "";
$lastname_upd = "";
$email_upd = "";
$department_upd = "";
$faculty_upd = "";
$qualification_upd = "";
$position_upd = "";
$bio_upd = "";
$img_upd = "";

if (isset($_POST['register'])) {
	$staff_id = $_POST['staff_id'];
	$email = $_POST['email'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];

	if (empty($staff_id)) {
		array_push($errors, "StaffID is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password_1)) {
		array_push($errors, "Password is required");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "Passwords do not match");
	}

	// if there are no errors then save to database

	if (count($errors) == 0) {

		$password = md5($password_1);

		$sql = "INSERT INTO register(staff_id, email, pass) VALUES ('$staff_id', '$email', '$password')";

		mysqli_query($conn, $sql);

		// $_SESSION['staff_id'] = $staff_id;
		// $_SESSION['success'] = "You are now logged in";
		header('location: home.php');
	}
	else{
		echo "<script>alert('Failed to register user')</script>";
	}
}
	// login user
if (isset($_POST['login'])) {
	$staff_id = $_POST['staff_id'];
	$password = $_POST['password'];

	if (empty($staff_id)) {
		array_push($errors, "StaffID is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0 ) {
		$password = md5($password);
		$query = "SELECT * FROM register WHERE staff_id='$staff_id' AND pass='$password'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			# log in user
			$_SESSION['staff_id'] = $staff_id;
			$_SESSION['success'] = "You are now logged in";
			header('location: home.php');
		}else {
			array_push($errors, "wrong staffID/password combination");
		}

	}
}


	// logout
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['staff_id']);
	header('location: index.php');
}



// To register a staff
if (isset($_POST['addnew'])) {
		
	$staff_id = $_POST['staff_id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$department = $_POST['dept'];
	$faculty = $_POST['faculty'];
	$qualification = $_POST['qualification'];
	$position = $_POST['position'];
	$bio = $_POST['bio'];

	$imageName = $_FILES['img']['name'];
	$upload = "uploads/".$imageName;

	$sql = "INSERT INTO staff_profile (staff_id, email, firstname, lastname, department, faculty, qualification, position, 
	bio, img) VALUES (?,?,?,?,?,?,?,?,?,?)";

	move_uploaded_file($_FILES['img']['tmp_name'], $upload);
	// $query = mysqli_query($conn, $sql);
	$stmt1 = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt1, $sql)){
		echo "SQL error";
	}else{
		mysqli_stmt_bind_param($stmt1, "ssssssssss", $staff_id, $email, $firstname, $lastname, $department, $faculty,
		 $qualification, $position, $bio, $upload);
		mysqli_stmt_execute($stmt1);
		//  $result1 = mysqli_stmt_get_result($stmt1);
		
		header("Location: duplAdd.php");
		$_SESSION['response'] = "Data Inserted Successfully";
		$_SESSION['res_type'] = "success";
	}

}


// To delete a file
if(isset($_GET['delete'])){

	$id = $_GET['delete'];

	$sql2 = "SELECT img FROM staff_profile WHERE row_no=?";
	$stmt2 = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt2, $sql2);
	mysqli_stmt_bind_param($stmt2, "i", $id);
	mysqli_stmt_execute($stmt2);
	$result2 = mysqli_stmt_get_result($stmt2);
	$row2 = mysqli_fetch_assoc($result2);

	$imagePath = $row2['img'];
	unlink($imagePath);

	$sql1 = "DELETE FROM staff_profile WHERE row_no=?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql1)){
		echo "SQL error";
	}else{
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		header("Location: duplAdd.php");
		$_SESSION['response'] = "Record Deleted Successfully";
		$_SESSION['res_type'] = "danger";
	}
}



// For Edit
if(isset($_GET['edit'])){

	$edit_id = $_GET['edit'];
	$sql3 = "SELECT * FROM staff_profile WHERE row_no=?";
	$stmt3 = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt3, $sql3);
	mysqli_stmt_bind_param($stmt3, "i", $edit_id);
	mysqli_stmt_execute($stmt3);
	$result3 = mysqli_stmt_get_result($stmt3);
	$row3 = mysqli_fetch_assoc($result3);

	$row_no_upd = $row3['row_no'];
	$staff_id_upd = $row3['staff_id'];
	$firstname_upd = $row3['firstname'];
	$lastname_upd = $row3['lastname'];
	$email_upd = $row3['email'];
	$department_upd = $row3['department'];
	$faculty_upd = $row3['faculty'];
	$qualification_upd = $row3['qualification'];
	$position_upd = $row3['position'];
	$bio_upd = $row3['bio'];
	$img_upd = $row3['img'];

}

// To Update record
if(isset($_POST['update'])){

	$row_id_new = $_POST['id'];
	$staff_id_new = $_POST['staff_id'];
	$firstname_new = $_POST['firstname'];
	$lastname_new = $_POST['lastname'];
	$email_new = $_POST['email'];
	$department_new = $_POST['dept'];
	$faculty_new = $_POST['faculty'];
	$qualification_new = $_POST['qualification'];
	$position_new = $_POST['position'];
	$bio_new = $_POST['bio'];
	$oldimg = $_POST['oldimg'];

	if(isset($_FILES['img']['name']) && ($_FILES['img']['name']!="")){
		$newimg = $_FILES['img']['name'];
		unlink($oldimg);
		move_uploaded_file($_FILES['img']['tmp_name'], $newimg);
	}else{
		$newimg = $oldimg;
		
	}

	$sql4 = "UPDATE staff_profile SET staff_id=?, firstname=?, lastname=?, email=?, department=?, faculty=?, 
	qualification=?, position=?, bio=?, img=? WHERE row_no=?";
	$stmt4 = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt4, $sql4);
	mysqli_stmt_bind_param($stmt4, "ssssssssssi", $staff_id_new, $firstname_new, $lastname_new, $email_new, 
	$department_new, $faculty_new, $qualification_new, $position_new, $bio_new, $newimg, $row_id_new);
	mysqli_stmt_execute($stmt4);

	$_SESSION['response'] = "Record Updated Successfully!";
	$_SESSION['res_type'] = "primary";
	header("Location: duplAdd.php");

}

// For Details
if(isset($_GET['details'])){

	$detail_id = $_GET['details'];
	$sql5 = "SELECT * FROM staff_profile WHERE row_no=?";
	$stmt5 = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt5, $sql5);
	mysqli_stmt_bind_param($stmt5, "i", $detail_id);
	mysqli_stmt_execute($stmt5);
	$result5 = mysqli_stmt_get_result($stmt5);
	$row5 = mysqli_fetch_assoc($result5); 

	$row_no_det = $row5['row_no'];
	$staff_id_det = $row5['staff_id'];
	$firstname_det = $row5['firstname'];
	$lastname_det = $row5['lastname'];
	$email_det = $row5['email'];
	$department_det = $row5['department'];
	$faculty_det = $row5['faculty'];
	$qualification_det = $row5['qualification'];
	$position_det = $row5['position'];
	$bio_det = $row5['bio'];
	$img_det = $row5['img'];

}

?>