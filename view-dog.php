<?php
session_start();
include('includes/dbconn.php');

// Check if the session variable is set
if (!isset($_SESSION['proprietor_id'])) {
    // Handle the case where the session variable is not set
    echo "Session not started. Please log in.";
    exit;
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/foods/cityvet_logo01.jpg" rel="shortcut icon">
    <title>Dog Gallery - Stray Animal IMS</title>
  
    <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Custom CSS for the gallery -->
    <style>
        .gallery img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin: 5px;
            cursor: pointer;
        }
        .modal-img {
            width: 100%;
        }
        .content-wrapper {
            padding-top: 10x; /* Adjust this value as necessary */
        }
    </style>
</head>
<body>

<?php include('includes/header_main.php')?>

<div class="container content-wrapper">
    <?php include('includes/view-dogs-display.php'); ?>
</div>

<!-- Footer -->
<footer id="footer" class="midnight-blue wow fadeInDown">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 wow fadeInDown">
                &copy; 2024 <a target="_blank" href="#" title="#">City Dog Pound Stray Animal IMS</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right wow fadeInDown">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="contacts.php"><i class="fa fa-phone"></i> Contacts</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>

<script type="text/javascript">
    $('#filter').change(function() {
        $.post($("#formFilter").attr("action"), $("#formFilter :input").serializeArray(), function(filter) {
            $("#tablebody").empty();
            $("#tablebody").html(filter);
        });
        $("#formFilter").change(function() {
            return false;
        });
    });
</script>

</body>
</html>
