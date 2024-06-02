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
    <title>Petshop Online Website</title>
    <!-- Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
</head>
<body>
    <br><br>
    <div class="container">
        <section id="contact-info">
            <center>
                <span style="font-size:35px; font-weight:bold; font-family:verdana; color:blue;">How to Reach Us?</span>
            </center>
            <div class="row">
                <div class="col-md-6 wow fadeInDown">
                    <img src="images/logo.jpg" class="img-responsive" alt="Logo" />
                </div>
                <div class="col-md-6 wow fadeInDown">
                    <p class="lead">
                        <span style="font-size:20px; font-weight:bold; font-family:verdana; color:red;">Lorem Ipsum Dolor</span>
                        <br><b>Address:</b> Productivity Center, Brgy. Sapang Palay Proper, City of San Jose del Monte, Bulacan, San Jose del Monte, Philippines
                        <br><b>Tel/Phone:</b> +639074985072 / 09655323255
                        <br><b>Email Address:</b> loremipsumdolor@gmail.com
                    </p>
                    <hr>
                    <span style="font-size:20px; font-weight:bold; font-family:verdana; color:black;">We are open</span>
                    <p><b>MONDAY TO FRIDAY -- 8:00AM - 5:00PM</b></p>
                    <hr>
                    <div class="social-icons">
                        <a href="http://www.facebook.com" data-toggle="tooltip" title="Facebook">
                            <img src="images/ico/Facebook.png" class="img-responsive" alt="Facebook" />
                        </a>
                        <a href="http://www.instagram.com" data-toggle="tooltip" title="Instagram">
                            <img src="images/ico/icons_Instagram.png" class="img-responsive" alt="Instagram" />
                        </a>
                        <a href="http://www.twitter.com" data-toggle="tooltip" title="Twitter">
                            <img src="images/ico/Twitter.png" class="img-responsive" alt="Twitter" />
                        </a>
                        <a href="http://www.youtube.com" data-toggle="tooltip" title="YouTube">
                            <img src="images/ico/YouTube.png" class="img-responsive" alt="YouTube" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <!--*************************************************** FOOTERS **********************************************-->
    <?php include('includes/footer.php'); ?>
    <?php include('loginModal.php'); ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>

<?php
} else {
    include('includes/admin.php');
}
?>
