<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/foods/cityvet_logo01.png" rel="shortcut icon">
    <title>ADMIN | CSJDM DOG POUND</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    </head><!--/head-->
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
                     <a href="view-dog.php"><h4 class="wow fadeInDown" style="margin-top:20px; color:#FFF;"><i class="fa fa-coffee"></i> CSJDM Dog Pound</h4></a>
                </div>
    
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                    <li id="reservation" class=" wow fadeInDown"><a href="view-dog.php"><span class="glyphicon glyphicon-calendar"></span> View Dogs </a></li>

                        <li class="dropdown"><a class="dropdown-toggle wow fadeInDown" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-th"></span> Animal Information <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="addcnp.php"> Register Dog </a></li>
                              <li><a href="index.php"> View Records </a></li>
                            </ul>
                        </li>
                        <li id="admin" class="wow fadeInDown"><a href="adminacc.php"><span class="glyphicon glyphicon-user"></span> Admin Account</a></li>
                        <li id="logout" class="wow fadeInDown"><a id="logoutbtn" href='<?php echo "logout_process.php?logout=1"?>'><span class="glyphicon glyphicon-share"></span> Logout</a></li>                  
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
<br>

<?php 
    include('includes/adddoginfo.php');
  
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!--*************************************************** FOOTERS **********************************************-->

<?php include('includes/footer.php');?>
  


</script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>