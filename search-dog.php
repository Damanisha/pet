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
                              <li><a href="dog-reg.php"> Register Dog </a></li>
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
include('includes/dbconn.php');

$searchResults = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchText = $_POST['searchText'];

    // Prepare the SQL query to search multiple columns
    $stmt = $con->prepare("
        SELECT * FROM tbldoginfo 
        WHERE 
            breed LIKE CONCAT('%', ?, '%') OR
            gender LIKE CONCAT('%', ?, '%') OR
            color_markings LIKE CONCAT('%', ?, '%') OR
            location_of_captivity LIKE CONCAT('%', ?, '%') OR
            date LIKE CONCAT('%', ?, '%') OR
            time LIKE CONCAT('%', ?, '%') OR
            remarks_description LIKE CONCAT('%', ?, '%') OR
            name LIKE CONCAT('%', ?, '%') OR
            last_vaccination_date LIKE CONCAT('%', ?, '%') OR
            residence_last_3_months LIKE CONCAT('%', ?, '%') OR
            has_owner LIKE CONCAT('%', ?, '%')
    ");
    $stmt->bind_param("sssssssssss", $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Dog Info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form id="formFilter" name="formFilter" action="search-dog.php" method="POST" class="pull-left col-md-3 hidden-print">
            <div class="form-horizontal wow fadeInDown">            
                <label for="filter" class="control-label"> <i class="glyphicon glyphicon-filter"></i> Dog Information Results </label>
                <div class="col-md-2"></div>
            </div>
        </form>

        <a href="search-dog.php" class="btn btn-default pull-right hidden-print wow fadeInDown" style="margin-right:10px;">
            <img src="images/ico/search-icon-2048x2048-cmujl7en.png" style="max-width: 20px; max-height: 20px;"> Search
        </a>
        <div class="col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
            <p class="wow fadeInDown"><em>Animal Search</em></p>
            <form method="POST" action="search-dog.php">
                <div class="form-group">
                    <label for="searchText">Enter search terms:</label>
                    <input type="text" class="form-control" id="searchText" name="searchText" required>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <div class="mt-4">
                <table class="table table-hover table-condensed wow fadeInDown">
                    <thead style="background-color:#282828; color:#fff;">
                        <tr>
                            <th style="text-align:center;">ID</th>
                            <th style="text-align:center;">Name</th>
                            <th style="text-align:center;">Breed</th>
                            <th style="text-align:center;">Gender</th>
                            <th style="text-align:center;">Color Markings</th>
                            <th style="text-align:center;">Location of Captivity</th>
                            <th style="text-align:center;">Date</th>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Remarks/Description</th>
                            <th style="text-align:center;">Last Vaccination Date</th>
                            <th style="text-align:center;">Residence Last 3 Months</th>
                            <th style="text-align:center;">Has Owner</th>
                            <th style="text-align:center;">Images</th>
                        </tr>
                    </thead>
                    <tbody id="tablebody">
                        <?php if (count($searchResults) > 0): ?>
                            <?php foreach ($searchResults as $dog): ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['id']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['name']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['breed']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['gender']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['color_markings']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['location_of_captivity']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['date']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['time']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['remarks_description']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['last_vaccination_date']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['residence_last_3_months']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['has_owner']); ?></td>
                                    <td style="text-align:center;">
                                        <img src="<?php echo htmlspecialchars($dog['dog_pictures']); ?>" class="img-thumbnail" alt="Dog Image" width="100px">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="13" style="text-align:center;">No results found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<br><br><br><br><br><br>

<!--*************************************************** FOOTERS **********************************************-->
  
<footer id="footer" class="midnight-blue wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInDown">
                &copy; 2024 <a target="_blank" href="#" title="#">City Dog Pound Stray Animal IMS</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right wow fadeInDown">
                        <li class=""><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        
                        <li class=""><a href="contacts.php"><i class="fa fa-phone"></i> Contacts</a></li>
                        <li class=""><a href="#loginModal" data-toggle="modal" data-target="#loginModal"><i class="fa fa-lock"></i> Admin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
