<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="../images/cityvet_logo01.png" rel="shortcut icon">
    <title>ADMIN | CSDJM DOG POUND</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>

    <style>
        .img-thumbnail {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 0 auto;
        }
    </style>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
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
                        <i class="fa fa-coffee"></i> CSJDM Dog Pound
                    </h4>
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li id="reservation" class="wow fadeInDown">
                        <a href="index.php"><span class="glyphicon glyphicon-calendar"></span> View Records </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle wow fadeInDown" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-th"></span> Animal Information <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="dog-reg.php"> Register Dog </a></li>
                            <li><a href="view-dog.php"> View Dog </a></li>
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
<!--------------------------------------------------------------------------------------------------------------------------------->
    <br>

    <div class="container">
        <form id="formFilter" name="formFilter" action="admin_reservefilter.php" method="POST" class="pull-left col-md-3 hidden-print">
            <div class="form-horizontal wow fadeInDown">            
                <label for="filter" class="control-label"> <i class="glyphicon glyphicon-filter"></i> Search Results </label>
                <div class="col-md-2"></div>
            </div>
        </form>

        <a href="search-dog.php" class="btn btn-default pull-right hidden-print wow fadeInDown" style="margin-right:10px;">
            <img src="images/ico/search-icon-2048x2048-cmujl7en.png" style="max-width: 20px; max-height: 20px;"> Search
        </a>
        <div class="col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
            <p class="wow fadeInDown"><em>Animal Record List</em></p>
            <table class="table table-hover table-condensed wow fadeInDown">
                <thead style="background-color:#282828; color:#fff;">
                    <tr>
                        <th class="hidden-print" style="text-align:center;">Breed</th>
                        <th width="120px" style="text-align:center;">Gender</th>
                        <th style="text-align:center;">Description</th>
                        <th style="text-align:center;">Date of Captivity</th>
                        <th style="text-align:center;">Images</th>
                    </tr>
                </thead>
                <tbody id="tablebody">
                    <?php include('includes/dbconn.php');
                        $sql = "SELECT * FROM tblDogInfo WHERE 1 LIMIT 0,30";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr class="success" style="cursor:pointer;">
                                    <td style="text-align:center;"><?php echo $row['breed'];?></td>
                                    <td style="text-align:center;"><?php echo $row['gender'];?></td>
                                    <td style="text-align:center;"><?php echo $row['remarks_description'];?></td>
                                    <td style="text-align:center;"><?php echo $row['date'];?></td>
                                    <td style="text-align:center;">
                                        <img src="<?php echo $row['dog_pictures']; ?>" class="img-thumbnail" alt="Dog Image" width="100px">
                                    </td>
                                </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>