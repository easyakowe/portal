<?php
	

	// if (empty($_SESSION['username'])) {
	// 	header('location: index.php');
	// }
    $msgNo = 0;
    
	

?>

<body style="font-size: 14px;">

	<!-- <h2 style="color: green;">Welcome, <?php //if($_SESSION['staff_id']){ echo $_SESSION['staff_id'];} ?></h2> -->

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
</body>

        


    <link rel="stylesheet" href="bootstrap/bootstrap.css">
	<script src="bootstrap/bootstrap.js"></script>

</html>