<?php
	include 'server.php';
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
  <link rel="icon" type="image/ico" href="images/fulogo.jpg"/>
	<title>Departments :: FUL Staff Portal</title>

</head>
<body>

	<!-- <h2 style="color: green;">Welcome, <?php // echo $_SESSION['username']?></h2>
	<div class="wrapper"> -->
		<!-- Navigation -->


		<!-- <nav class="main-nav">
			<ul>
				<li><a style="background: #0e2f44; color: white;" href="#">Home</a></li>
				<li><a href="addStaff.php">Add Staff</a></li>
				<li><a href="dept.php">Department</a></li>
				<li><?php // if (isset($_SESSION['username'])): ?>
			<a href="index.php?logout='1'" style="color:red ">Logout</a>
		<?php //endif ?></li>
			</ul>
		</nav> -->

	<nav class="navbar navbar-expand-sm navbar-dark justify-content-center" style="background: #31698a;">
        <a class="navbar-brand" href="#">
            <img src="images/fulogo.jpg" alt="Logo" style="width:40px;">
            <b><a class="navbar-brand" href="home.php">FuLokoja</a></b>
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="dept.php">Departments</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="faculty.php">Faculties</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="duplAdd.php">Add Staff</a>
            </li>
            <?php if($msgNo > 0){?>
            <li class="nav-item active">
            <a class="nav-link" href="memo.php">Message</a>
            </li>
            <span style="background: red; color: white; width: 30px; height: 16px; font-size: 11px; padding-left: 2px; padding-right: 2px; padding-top: 1px; border-radius: 5px; ">NEW</span>
            <?php } else {?>
            <li class="nav-item active">
            <a class="nav-link" href="memo.php">Message</a>
            </li>
            <?php }?>
            <li class="nav-item">
            <a class="nav-link" href="#"></a>
            </li>

            <?php

                $sql = "SELECT * FROM staff_profile WHERE staff_id='$staff_id'";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {
                    
            ?>
            <?php if(isset($_SESSION['staff_id'])){?>
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="<?php echo $row['img'];?>" class="rounded-circle" width="40" height="40">
            <span class="caret"></span></a>
            <ul class="dropdown-menu" width="20">
              <li style="margin-left: 10px;"><a href="#">Profile</a></li>
              <li style="margin-left: 10px;"><a href="#">Settings</a></li>
              <li class="nav-item" style="margin-top:8px; margin-left:7px;"><?php if (isset($_SESSION['staff_id'])): ?>
                    <a class="badge badge-danger p-1" href="index.php?logout='1'">Logout</a>
                <?php endif ?>
            </li>
            </ul>
            </li>
            <?php }?>

            <?php }?>

        </ul>
        
    </nav>
<br>

		<br>
		<div class="btn btn-default btn-block" style="background:#f2f2f2;">
			<h3>Department of Computer Science</h3>
		</div>
		<!-- <section class="boxes">


			<div class="box" style="background:#fff;">
				<img src="images/9.jpeg" class="rounded-circle" alt="Angela Freeman Miri" width="250" height="240">
				<hr>
				<h4>Jane Doe</h4>
				<h5>Head of Department</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>

			<div class="box" style="background:#fff;">
				<img src="images/8.jpeg" alt="" class="rounded-circle" width="250" height="240">
				<hr>
				<h4>John Doe</h4>
				<h5>Level Coordinator (100-400L)</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>

			<div class="box" style="background:#fff;">
				<img src="images/6.jpeg" alt="" class="rounded-circle" width="250" height="240">
				<hr>
				<h4>John Doe</h4>
				<h5>Senior Lecturer</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</section> -->
		<section class="boxes">

		<?php

				$sql = "SELECT * FROM staff_profile";
				$query = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_array($query)) {
					
				?>

			<div class="box" style="background:#fff;">
				<img src="<?php echo $row['img']?>" class="rounded-circle" alt="Jane Doe" width="250" height="240">
				<hr>
				<h4><?php echo $row['firstname']. " ".$row['lastname'];?></h4>
				<h5><?php echo $row['position']?></h5>
				<hr>
				<p><?php echo $row['bio']?></p>
			</div>

			<?
				 }
				?>
		</section>



		<div class="btn btn-default btn-block" style="background:#f2f2f2;">
			<h3>Department of Mathematical Sciences</h3>
		</div>
		<!-- <section class="boxes">
		
			<div class="box" style="background:#fff;">
				<img src="images/9.jpeg" class="rounded-circle" alt="Angela Freeman Miri" width="250" height="240">
				<hr>
				<h4>Jane Doe</h4>
				<h5>Head of Department</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>

			<div class="box" style="background:#fff;">
				<img src="images/11.jpeg" alt="" class="rounded-circle" width="250" height="240">
				<hr>
				<h4>John Doe</h4>
				<h5>Level Coordinator (100-400L)</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
      
			<div class="box" style="background:#fff;">
				<img src="images/8.jpeg" alt="" class="rounded-circle" width="250" height="240">
				<hr>
				<h4>John Doe</h4>
				<h5>Senior Lecturer</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</section> -->

		<section class="boxes">

		<?php

				$sql = "SELECT * FROM staff_profile";
				$query = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_array($query)) {
					
				?>

			<div class="box" style="background:#fff;">
				<img src="<?php echo $row['img']?>" class="rounded-circle" alt="Jane Doe" width="250" height="240">
				<hr>
				<h4><?php echo $row['firstname']. " ".$row['lastname'];?></h4>
				<h5><?php echo $row['position']?></h5>
				<hr>
				<p><?php echo $row['bio']?></p>
			</div>

			<?
				 }
				?>
		</section>


		<div class="btn btn-default btn-block" style="background:#f2f2f2;">
			<h3>Department of Economics</h3>
		</div>
		
		
		<!-- <section class="boxes">
		
			<div class="box" style="background:#fff;">
				<img src="images/5.jpeg" alt="" class="rounded-circle" width="250" height="240">
				<hr>
				<h4>Jane Doe</h4>
				<h5>Level Coordinator (100-400L)</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="box" style="background:#fff;">
				<img src="images/7.jpeg" alt="" class="rounded-circle" width="250" height="240">
				<hr>
				<h4>Jane Doe</h4>
				<h5>Senior Lecturer</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="box" style="background:#fff;">
				<img src="images/3.jpeg" alt="" class="rounded-circle" width="250" height="240">
				<hr>
				<h4>Jane Doe</h4>
				<h5>Senior Lecturer</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</section> -->

		<section class="boxes">

		<?php

				$sql = "SELECT * FROM staff_profile";
				$query = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_array($query)) {
					
				?>

			<div class="box" style="background:#fff;">
				<img src="<?php echo $row['img']?>" class="rounded-circle" alt="Jane Doe" width="250" height="240">
				<hr>
				<h4><?php echo $row['firstname']. " ".$row['lastname'];?></h4>
				<h5><?php echo $row['position']?></h5>
				<hr>
				<p><?php echo $row['bio']?></p>
			</div>

			<?
				 }
				?>
		</section>


    <div class="btn btn-default btn-block" style="background:#f2f2f2;">
			<h3>Department of History and Int'l Relations</h3>
		</div>
    <!-- <section class="boxes">
		
			<div class="box" style="background:#fff;">
				<img src="images/9.jpeg" class="rounded-circle" alt="Angela Freeman Miri" width="250" height="240">
				<hr>
				<h4>Jane Doe</h4>
				<h5>Head of Department</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>

			<div class="box" style="background:#fff;">
				<img src="images/11.jpeg" alt="" class="rounded-circle" width="250" height="240">
				<hr>
				<h4>John Doe</h4>
				<h5>Level Coordinator (100-400L)</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
      
			<div class="box" style="background:#fff;">
				<img src="images/8.jpeg" alt="" class="rounded-circle" width="250" height="240">
				<hr>
				<h4>John Doe</h4>
				<h5>Senior Lecturer</h5>
				<hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</section> -->

		<section class="boxes">

		<?php

				$sql = "SELECT * FROM staff_profile";
				$query = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_array($query)) {
					
				?>

			<div class="box" style="background:#fff;">
				<img src="<?php echo $row['img']?>" class="rounded-circle" alt="Jane Doe" width="250" height="240">
				<hr>
				<h4><?php echo $row['firstname']. " ".$row['lastname'];?></h4>
				<h5><?php echo $row['position']?></h5>
				<hr>
				<p><?php echo $row['bio']?></p>
			</div>

			<?
				 }
				?>
		</section>
  
		<!-- Footer -->
		<footer>
			<p>Staff Profile &copy; 2019</p>
		</footer>

	</div>
	<!-- Wrapper Ends -->

</body>

	<link rel="stylesheet" href="bootstrap/bootstrap.css">
	<script src="bootstrap/bootstrap.js"></script>

</html>