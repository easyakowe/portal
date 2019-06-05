<?php 
    include 'server.php';
    include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Intercon Hotel and Suites, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />

    <script defer
    src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/ico" href="images/fulogo.jpg"/>
    <title>Memos :: FUL Staff Portal</title>



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body style="font-size: 14px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <hr>
               <a class="badge badge-success p-3" style="color: white; border-radius: 12px;">Write Message</a> 
            <hr>
            </div>
        </div>
        <br><br>
        <div class="row">
            <!-- First column for the list of new messages -->
            <div class="col-md-3">
                <h6 class="text-center text-info">List of Messages</h6><hr>
                <div class="row">
                    <div class="col-md-2">
                    <img src="images/7.jpeg" class="rounded-circle">
                    </div>
                    <div class="col-md-10">
                    <h6><b>John Doe</b></h6>
                    <p>Lorem ipsum dolor sit amet, consectetur </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    <img src="images/7.jpeg" class="rounded-circle">
                    </div>
                    <div class="col-md-10">
                    <h6><b>John Doe</b></h6>
                    <p>Lorem ipsum dolor sit amet, consectetur </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    <img src="images/7.jpeg" class="rounded-circle">
                    </div>
                    <div class="col-md-10">
                    <h6><b>John Doe</b></h6>
                    <p>Lorem ipsum dolor sit amet, consectetur </p>
                    </div>
                </div>
            </div>

            
            <!-- Second column for the Message details -->
            
            <div class="col-md-5">
                <h6 class="text-center text-info">Message Body</h6><hr>
                <div style="background: #f7f7f7; margin-bottom: 8px;">
                    <textarea cols="86" rows="30" disabled=""></textarea>
                </div>             
            </div>

            <!-- Third column for the Sender's details -->
            <div class="col-md-4">
                <h6 class="text-center text-info">Sender</h6><hr>
                <div class="sender-info" style="background: #f7f7f7;">
                    <img src="images/7.jpeg" class="rounded-circle" alt="Jane Doe" width="250" height="240">
                    <hr>
                    <h6><b>Jane Doe</b></h6>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <hr>
                    <p><?php echo $row['bio']?></p>
                </div>             
            </div>
    </div>
</body>

<style type="text/css">
    .sender-info {
        text-align: center;

    }
    .sender-info img {
        align-content: center;
    }
</style>

</html>