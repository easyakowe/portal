<?php
    include 'server.php';

    if (empty($_SESSION['staff_id'])) {
        header('location: index.php');
    }else{
        $staff_id = $_SESSION['staff_id'];
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="images/fulogo.jpg"/>
    <title>Add Staff :: FUL Staff Portal</title>

        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <script type="text/javascript" src="bootstrap.js"></script>

</head>
<body style="font-size: 14px;">
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

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center text-dark mt-2">Staff Registration and Maintenance Dashboard</h3>
                <hr>
            </div>
        </div><br>
        
        <?php if(isset($_SESSION['response'])) {?>
        <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <!-- <strong>Welcome Admin!</strong>  -->
        <b><?= $_SESSION['response']?></b>
        </div>
        <?php } unset($_SESSION['response'])?>   

        <div class="row">
            <div class="col-md-4">
                <h4 class="text-center text-info">Add Staff</h4>
                <form action="server.php" method="POST" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <input type="text" class="form-control" name="staff_id" placeholder="StaffID" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="firstname" placeholder="Firstname" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lastname" placeholder="Lastname" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                    <select name="dept" class="form-control">
                
						<option value="Department" disabled>Select Department</option>
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
                        <option> ------------------ </option>
                        <option>ADMINISTRATIVE</option>
						
					</select>
                    </div>
                    <div class="form-group">
                    <select name="faculty" class="form-control" >
        
						<option value="Faculty" disabled>Select Faculty...</option>
						<option>SCIENCES</option>
						<option>ARTS AND HUMANITIES</option>
						<option> ------------------ </option>
						<option>MEMBER OF SENATE</option>
						<option>BURSERY</option>
						<option>ACADEMIC AFFAIRS</option>
					</select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="qualification" placeholder="Qualification" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="position" placeholder="Position" required="">
                    </div>
                    <div class="form-group">
                        <textarea name="bio" id="bio" cols="30" rows="10" class="form-control" placeholder="Brief Bio" required=""></textarea>
                    </div>
                    <div class="form-group">
                        
                        <input type="file" class="custom-file" name="img">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="addnew" value="Add New Staff">
                    </div>
                </form>
            </div>
            
            
            <!-- Second column for the database details -->
            
            <div class="col-md-8">
            <h4 class="text-center text-info">Staff Info from Database</h4>
            <div class="table-responsive" style="border: 1px solid #f2f2f2;">
            <table class="table table-bordered table-hover" width=900>
                <thead>
                <tr>
                    
                    <th>#</th>
                    <th>Action</th>
                    <th>Image</th>
                    <th>Staff_id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Qualification</th>
                    <th>Position</th>
                    <th>Bio</th>
                    
                </tr>
                </thead>
                <tbody>

                 <?php 
                $sql = "SELECT * FROM staff_profile";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                    $i = 0;
				    while ($row = mysqli_fetch_array($result)) {
                        $i++;
                        $modal = "modal".$i;
                        ?>

                        <tr>
                            <td><?php echo $row['row_no'];?></td>
                            <td style="width:400px">
                                <a href="duplAdd.php?edit=<?php echo $row['row_no'];?>" class="badge badge-success p-1" data-target="#<?php print $modal; ?>" data-toggle="modal">Edit</a> 
                                <a href="server.php?delete=<?php echo $row['row_no'];?>" class="badge badge-danger p-1" onclick="return confirm('Do you want to delete this record?');">Delete</a> 
                                <a href="details.php?details=<?php echo $row['row_no'];?>" class="badge badge-primary p-1">Details</a>
                                <!-- The testing of the modal for edit -->

                                <div class="modal" id="<?php print $modal; ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="text-center">Update Staff Record</h4>
                                                <button class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="server.php" method="POST" enctype="multipart/form-data">
                                            <input name="id" type="hidden" value="<?php print $row['row_no']; ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="staff_id" value="<?php print $row['staff_id']; ?>" placeholder="StaffID" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="firstname" value="<?php print $row['firstname']; ?>" placeholder="Firstname" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="lastname" value="<?php print $row['lastname']; ?>" placeholder="Lastname" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email" value="<?php print $row['email']; ?>" placeholder="Email" required="">
                                                </div>
                                                <div class="form-group">
                                                <select name="dept" class="form-control" required="">
                                                    <option disabled selected value=""><?php print $row['department']; ?></option>
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
                                                <div class="form-group">
                                                <select name="faculty" class="form-control" required="">
                                                    <option disabled selected value=""><?php print $row['faculty']; ?></option>
                                                    <option>SCIENCES</option>
                                                    <option>ARTS AND HUMANITIES</option>
                                                    <option> ------------------ </option>
                                                    <option>MEMBER OF SENATE</option>
                                                    <option>BURSERY</option>
                                                    <option>ACADEMIC AFFAIRS</option>
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="qualification" value="<?php print $row['qualification']; ?>" placeholder="Qualification" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="position" value="<?php print $row['position']; ?>" placeholder="Position" required="">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="bio" id="bio" cols="30" rows="10" value="" class="form-control" placeholder="Brief Bio" required=""><?php print $row['bio']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="oldimg" value="<?php print $row['img']; ?>">
                                                    <input type="file" class="custom-file" name="img">
                                                    <img src="<?php print $row['img']; ?>" alt="" width="120" class="img-thumbnail">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success btn-block" name="update" value="Update Record">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

<!-- The testing of the modal for edit-->
                            </td>
                            <td><img src="<?php echo $row['img'];?>" width="50"></td>
                            <td><?php echo $row['staff_id'];?></td>
                            <td><?php echo $row['firstname'];?></td>
                            <td><?php echo $row['lastname'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['department'];?></td>
                            <td><?php echo $row['faculty'];?></td>
                            <td><?php echo $row['qualification'];?></td>
                            <td><?php echo $row['position'];?></td>
                            <td><?php echo $row['bio'];?></td>
                            
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>

<!-- The testing of the modal for edit -->

	<!-- <div class="modal" id="loginModal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                    <h4 class="text-center">Update Staff Record</h4>
					<button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
                <form action="server.php" method="POST" enctype="multipart/form-data">
                <input name="id" type="hidden" value="<?= $row_no_upd; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="staff_id" value="<?= $staff_id_upd; ?>" placeholder="StaffID" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="firstname" value="<?= $firstname_upd; ?>" placeholder="Firstname" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lastname" value="<?= $lastname_upd; ?>" placeholder="Lastname" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" value="<?= $email_upd; ?>" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                    <select name="dept" class="form-control">
                        <option value=""><?= $department_upd; ?></option>
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
                    <div class="form-group">
                    <select name="faculty" class="form-control" >
                        <option value=""><?= $faculty_upd; ?></option>
						<option>SCIENCES</option>
						<option>ARTS AND HUMANITIES</option>
						<option> ------------------ </option>
						<option>MEMBER OF SENATE</option>
						<option>BURSERY</option>
						<option>ACADEMIC AFFAIRS</option>
					</select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="qualification" value="<?= $qualification_upd; ?>" placeholder="Qualification" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="position" value="<?= $position_upd; ?>" placeholder="Position" required="">
                    </div>
                    <div class="form-group">
                        <textarea name="bio" id="bio" cols="30" rows="10" value="" class="form-control" placeholder="Brief Bio" required=""><?= $bio_upd; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="oldimg" value="<?= $img_upd; ?>">
                        <input type="file" class="custom-file" name="img">
                        <img src="<?= $img_upd; ?>" alt="" width="120" class="img-thumbnail">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="update" value="Update Record">
                    </div>
                </form>
			</div>
		</div>
	</div> -->

<!-- The testing of the modal for edit-->

            </div>
        </div>
    </div>

    <footer>		
     <div style="background: #000; text-align: center; color: #fff; height: 50px;">
        <p>Staff Profile &copy; 2019</p>
     </div>
	</footer>
</body>

</html>