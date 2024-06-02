<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSJDM Dog Pound</title>
    <link rel="stylesheet" href="path_to_your_css_file.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php">
                    <h4 class="wow fadeInDown" style="margin-top:20px; color:#FFF;">
                        <i class="fa-solid fa-dog"></i> CSJDM Dog Pound
                    </h4>
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li id="reservation" class="wow fadeInDown">
                        <a href="view-dog.php"><span class="glyphicon glyphicon-calendar"></span> View Dogs </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle wow fadeInDown" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-th"></span> Animal Information <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="dog-reg.php"> Register Dog </a></li>
                            <li><a href="index.php"> View Records </a></li>
                        </ul>
                    </li>
                    <li id="admin" class="wow fadeInDown">
                        <a href="adminacc.php"><span class="glyphicon glyphicon-user"></span> Admin Account</a>
                    </li>
                    <li id="logout" class="wow fadeInDown">
                        <a id="logoutbtn" href='<?php echo "logout_process.php?logout=1"?>'>
                            <span class="glyphicon glyphicon-share"></span> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
