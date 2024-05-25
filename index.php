<?php
    session_start();

    if (!isset($_SESSION['username'])){ 
?>
<?php include('includes/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link href="images/logo.jpg" rel="shortcut icon"> -->
    <title>Stray Animal IMS</title>
  
  <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

</head>    <style>
        .carousel-inner > .item > img {
            width: 75%;
            height: auto;
            max-height: 400px; /* Set a max height for the images */
        }
    </style><!--/head-->
        
<!--*********************************************START OF NAVIGATION BAR****************************************
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
                     <a href="index.php"><h4 class="wow fadeInDown" style="margin-top:20px; color:#FFF;"> 
                     <img src="images/cityvet_logo01.png"  width="15% "/> City Dog Pound Stray Animal IMS</h4></a>
                </div>
    
                <div class="collapse navbar-collapse navbar-right wow fadeInDown">
                    <ul class="nav navbar-nav">
                         <li class="active"><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="contacts.php">Contacts</a></li>
                        <li class="wow fadeInDown"><a href="#loginModal" data-toggle="modal" data-target="#loginModal"><i class="fa fa-lock"></i> Login</a></li>
                                                               
                    </ul>
                </div>
            </div>
        </nav>

*********************************************END OF NAVIGATION BAR****************************************--> 

<!--*********************************************START SLIDER************************************************-->

<div class="container-fluid">
    <br>
    <div class="col-md-9 wow fadeInDown">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="background-color:#000; padding:5px;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/cityvet/01.jpg" alt="Slide 1" class="img-fixed">
                </div>
                <div class="item">
                    <img src="images/cityvet/02.jpg" alt="Slide 2" class="img-fixed">
                </div>
                <div class="item">
                    <img src="images/cityvet/03.jpg" alt="Slide 3" class="img-fixed">
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
</div>

<!--*********************************************Food PACKAGES************************************************-->
          
            </div>

        <div class="col-md-3" >
            <div class="panel panel-default wow fadeInDown">
              <!-- Default panel contents -->
            
              <!--div class="panel-heading wow fadeInDown" style="font-weight:bold; font-size:16px; color:#36648B;"> Welcome To Lorem Ipsum Dolor        <i class="glyphicon glyphicon-calendar"></i> <?php echo date('M d, Y');?></div>
            
            </div>
         
            <div class="panel panel-default wow fadeInDown">
              
              <div class="panel-heading wow fadeInDown" style="font-weight:bold; font-size:16px; color:#36648B;">Announcements </div>
              <ul class="list-group"-->
               <!--
                <li class="list-group-item wow fadeInDown">Dog - <span style="color:#8B8B00; font-weight:bold;">Php 500 to 600 </span> <span style="color:#EE5C42;" class="glyphicon glyphicon-ok pull-right"></span></li>
                 <li class="list-group-item wow fadeInDown">Fish  - <span style="color:#8B8B00; font-weight:bold;">Php 150 to 300 </span> <span style="color:#EE5C42;" class="glyphicon glyphicon-ok pull-right"></span></li>
                  <li class="list-group-item wow fadeInDown">Bird  - <span style="color:#8B8B00; font-weight:bold;">Php 300 to 450 </span> <span style="color:#EE5C42;" class="glyphicon glyphicon-ok pull-right"></span></li>
                  
                   <li class="list-group-item wow fadeInDown">Cat- <span style="color:#8B8B00; font-weight:bold;">Php 200 to 350 </span> <span style="color:#EE5C42;" class="glyphicon glyphicon-ok pull-right"></span></li>
                

              </ul>
              <a href="available.php" class="btn btn-success btn-sm pull-right wow fadeInDown">View More</a>-->
            </div>
            <br>

                </div>  
        </div>

        
</div>
<!--/.container-->
<br><br>

<!--*************************************************** FOOTERS **********************************************
<footer id="footer" class="midnight-blue wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInDown">
               &copy; 2024 <a target="_blank" href="#" title="#">CSJDM City Veterinary Office - City Dog Pound</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right wow fadeInDown">
                        <li class="wow fadeInDown"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        
                        <li class="wow fadeInDown"><a href="contacts.php"><i class="fa fa-phone"></i> Contacts</a></li>
                        <li ><a href="about-us.php">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

*************************************************** FOOTERS **********************************************-->

<!--*************************************************** MODALS **********************************************-->
 <!----loginModal----->
<?php include('loginModal.php');?>      
                     
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>

<!----signupModal----->
<?php include('signupModal.php');?>      
                     
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>


<?php include('includes/footer.php'); ?>
<!--*************************************************** MODALS **********************************************-->

<?php 

} else if(isset($_SESSION['username'])) { 

    include('includes/admin.php');

} ?>