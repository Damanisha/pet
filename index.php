<?php
session_start();

if (!isset($_SESSION['username'])) { 
    include('includes/header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/foods/cityvet_logo01.jpg" rel="shortcut icon">
    <title>Stray Animal IMS</title>
  
    <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <style>
        .carousel-inner > .item > img {
            display: block;
            margin: 0 auto;
            width: 100%;
            height: auto;
        }
        .header {
            padding: 10px 0; /* Reduced padding */
            background-color: #000; /* Ensure background color covers entire header */
            color: #fff; /* Text color */
        }
        .header img {
            height: 50px; /* Adjust the height of the logo */
        }
        .navbar {
            margin-bottom: 0;
        }
        .navbar-nav > li > a {
            padding-top: 15px;
            padding-bottom: 15px;
        }
    </style>
    
</head>
<body>

<!-- Start Slider -->
<div class="container-fluid">
    <br>
    <div id="carousel-example-generic" class="carousel slide col-md-9 col-md-offset-1 wow fadeInDown" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        
   <!-- Wrapper for slides -->
   <div class="carousel-inner">
            <div class="item active">
                <img src="images/cityvet/01.jpg" alt="Slide 1">
            </div>
            <div class="item">
                <img src="images/cityvet/02.jpg" alt="Slide 2">
            </div>
            <div class="item">
                <img src="images/cityvet/03.jpg" alt="Slide 3">
            </div>
        </div>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
<!-- End Slider -->


<!-- Modals -->
<?php include('loginModal.php'); ?>      
<?php include('signupModal.php'); ?>

<!-- Scripts -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>
</body>
</html>

<?php 
    include('includes/footer1.php'); 
} else if (isset($_SESSION['username'])) { 
    include('includes/admin.php');
} 
?>
