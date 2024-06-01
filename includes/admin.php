<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Animal Record List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
</head>

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

    <br>

<div class="container">
    <form id="formFilter" name="formFilter" action="admin_reservefilter.php" method="POST" class="pull-left col-md-3 hidden-print">
        <div class="form-horizontal wow fadeInDown">            
            <label for="filter" class="control-label"> <i class="glyphicon glyphicon-filter"></i> Dog Information Results </label>
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
                    <th style="text-align:center;">Images <a href="#<?php echo $modalId; ?>" data-toggle="modal"></th>
                    <th style="text-align:center;">Actions</th> <!-- New Actions column -->
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
                       
                                <td class="wow fadeInDown" style="text-align:center;"> <!-- New Actions column data -->
                                <center>
                                    <br>
                                    <button class="btn btn-primary edit-btn" data-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#updateModal<?php echo $row['id']; ?>">
                                        <i class="glyphicon glyphicon-edit"></i> Update
                                    </button>
                                    <br>
                                  
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#deleteModal">
                                        <i class="glyphicon glyphicon-trash"></i> Delete
                                    </button>
                                </center>


                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="updateModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Update Dog Information</h4>
                                            <div>
                                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Breed*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <label><input type="radio" name="breed" value="Mongrel/Aspin" required <?php echo ($row['breed'] == 'Mongrel/Aspin') ? 'checked' : ''; ?>> Mongrel/Aspin</label>
                                                    <label><input type="radio" name="breed" value="Mixed" required <?php echo ($row['breed'] == 'Mixed') ? 'checked' : ''; ?>> Mixed</label>
                                                    <label><input type="radio" name="breed" value="Pure" required <?php echo ($row['breed'] == 'Pure') ? 'checked' : ''; ?>> Pure</label>
                                                    <input type="hidden" class="form-control" id="fdid" name="fdid" value="<?php echo $row['id']; ?>" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Gender*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <label><input type="radio" name="gender" value="Male" required <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>> Male</label>
                                                    <label><input type="radio" name="gender" value="Female" required <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>> Female</label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Color/Markings*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <textarea name="color_markings" class="form-control" required><?php echo $row['color_markings']; ?></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Location of Capture*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <textarea name="location_of_captivity" class="form-control" required><?php echo $row['location_of_captivity']; ?></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Date of Capture*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <input type="date" class="form-control" name="date" value="<?php echo $row['date']; ?>" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Time of Capture*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <input type="time" class="form-control" name="time" value="<?php echo $row['time']; ?>" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Date of Last Vaccination*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <input type="date" class="form-control" name="last_vaccination_date" value="<?php echo $row['last_vaccination_date']; ?>" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Residence (Last 3 Months)*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <textarea name="residence_last_3_months" class="form-control" required><?php echo $row['residence_last_3_months']; ?></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Remarks/Description*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <textarea name="remarks_description" class="form-control" required><?php echo $row['remarks_description']; ?></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Has Owner?*</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <label><input type="radio" name="has_owner" value="Yes" required <?php echo ($row['has_owner'] == 'Yes') ? 'checked' : ''; ?>> Yes</label>
                                                    <label><input type="radio" name="has_owner" value="No" required <?php echo ($row['has_owner'] == 'No') ? 'checked' : ''; ?>> No</label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="pull-right">Image</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <img src="<?php echo $row['dog_pictures']; ?>" width="120px;" class="img-responsive img-rounded" style="margin-bottom:5px;">
                                                    <input type="file" class="form-control" id="image" name="image" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info" name="savechanges">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Record</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this record?</p>
                <button id="confirm-delete" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Handle delete button click
        $('.delete-btn').on('click', function() {
            var id = $(this).data('id');
            $('#confirm-delete').data('id', id);
            $('#deleteModal').modal('show');
        });

        // Handle delete confirmation
        $('#confirm-delete').on('click', function() {
            var id = $(this).data('id');
            // Delete record using AJAX
            $.ajax({
                url: 'delete_record.php', // Replace with actual data source
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    location.reload();
                }
            });
        });
    });
</script>

<?php
include('includes/dbconn.php');

if (isset($_POST['savechanges'])) {
    $id = $_POST['fdid'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $color_markings = $_POST['color_markings'];
    $location_of_captivity = $_POST['location_of_captivity'];
    $date_of_capture = $_POST['date'];
    $time_of_capture = $_POST['time'];
    $last_vaccination_date = $_POST['last_vaccination_date'];
    $residence_last_3_months = $_POST['residence_last_3_months'];
    $remarks_description = $_POST['remarks_description'];
    $has_owner = $_POST['has_owner'];
    
    $upload_directory = "images/upload/";
    $relative_path = "";

    // Check if a file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image_name = addslashes($_FILES['image']['name']);
        $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpeg', 'jpg', 'png'];

        if (in_array($file_extension, $allowed_extensions)) {
            $date_of_reg = date('Ymd');
            $result = mysqli_query($con, "SELECT COUNT(*) AS count FROM tblDogInfo");
            $row = mysqli_fetch_assoc($result);
            $dog_number = $row['count'] + 1;

            $custom_id = $id;
            $new_file_name = "dog_img-$custom_id." . $file_extension;

            $target_file = $upload_directory . $new_file_name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $relative_path = $upload_directory . $new_file_name;
            } else {
                echo '<script>alert("Failed to upload image.");
                          window.location.href="admin.php";
                          </script>';
                exit;
            }
        } else {
            echo '<script>alert("Only .jpeg, .jpg, and .png files are allowed.");
                          window.location.href="admin.php";
                          </script>';
            exit;
        }
    }

    $sql = "UPDATE tblDogInfo SET 
                breed = '$breed',
                gender = '$gender',
                color_markings = '$color_markings',
                location_of_captivity = '$location_of_captivity',
                date = '$date_of_capture',
                time = '$time_of_capture',
                last_vaccination_date = '$last_vaccination_date',
                residence_last_3_months = '$residence_last_3_months',
                remarks_description = '$remarks_description',
                has_owner = '$has_owner'";

    if ($relative_path != "") {
        $sql .= ", dog_pictures = '$relative_path'";
    }

    $sql .= " WHERE id = '$id'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo '<script>alert("Update successfully!");
                      window.location.href="index.php"</script>';
    } else {
        echo '<script>alert("Sorry, unable to process your request.");
                      window.location.href="index.php"</script>';
    }
}

mysqli_close($con);
?>


</body>
</html>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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

    