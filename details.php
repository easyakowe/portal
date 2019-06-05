<?php
    include 'server.php';
    if(isset($_POST['back'])){
        header("Location: duplAdd.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $firstname_det;?>'s Details :: FUL Staff Portal</title>
    <link rel="icon" type="image/ico" href="images/fulogo.jpg"/>
</head>
<body>
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

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center text-dark mt-2"><?= $firstname_det;?>'s Details</h3>
                <hr>
            </div>
        </div><br>

        <div class="row">
            <div class="col-md-6 bg-dark text-light">
                <img src="<?= $img_det?>" alt="staffname" width="650" class="rounded" style="margin-top:15px;">
                <p></p>
                <h4>Motivation</h4><hr>
                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem saepe minima veniam vel doloremque nostrum voluptate nemo doloribus atque commodi, expedita deserunt aut voluptas obcaecati totam aliquid blanditiis cum ducimus.</h5>
            </div>
            <div class="col-md-6">
                <div>
                    <h5 style="color:#008000">Staff Identity Number Staff_ID</h5>
                    <h4><?= $staff_id_det;?></h4>
                </div>
                <hr>
                <div>
                    <h5 style="color:#008000">FirstName</h5>
                    <h4><?= $firstname_det;?></h4>
                </div>
                <hr>
                <div>
                    <h5 style="color:#008000">LastName</h5>
                    <h4><?= $lastname_det;?></h4>
                </div>
                <hr>
                <div>
                    <h5 style="color:#008000">Official Email Address</h5>
                    <h4><?= $email_det;?></h4>
                </div>
                <hr>
                <div>
                    <h5 style="color:#008000">Department</h5>
                    <h4><?= $department_det;?></h4>
                </div>
                <hr>
                <div>
                    <h5 style="color:#008000">Faculty (For Academic Staff Only)</h5>
                    <h4><?= $faculty_det;?></h4>
                </div>
                <hr>
                <div>
                    <h5 style="color:#008000">Qualification(s)</h5>
                    <h4><?= $qualification_det;?></h4>
                </div>
                <hr>
                <div>
                    <h5 style="color:#008000">Position Held in FUL</h5>
                    <h4><?= $position_det;?></h4>
                </div>
                <hr>
                <div >
                    <h5 style="color:#008000">Introduction</h5>
                    <h4><?= $bio_det;?></h4>
                </div>
                <hr>   
                <form action="" method="POST">
                    <button class="btn btn-success btn-block" name="back">Return</button>
                </form>
                <br><br>
            </div>
        </div>
</body>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
    <script src="bootstrap/bootstrap.js"></script>

</html>