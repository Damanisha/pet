<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/foods/cityvet_logo01.jpg" rel="shortcut icon">
    <title>CSJDM Dog Pound Stray Animal IMS - Admin</title>

    <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Custom CSS for this page -->
    <style>
        .content-wrapper {
            padding-top: 10px; /* Adjust this value as necessary */
        }
    </style>
</head>
<body>

<?php include('includes/header_main.php') ?>

<div class="container content-wrapper">
    <form id="formFilter" name="formFilter" action="admin_reservefilter.php" method="POST" class="pull-left col-md-3 hidden-print">
        <div class="form-horizontal wow fadeInDown">
            <label for="filter" class="control-label"><i class="glyphicon glyphicon-filter"></i> Dog Information Results</label>
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
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody id="tablebody">
                <?php 
                include('includes/dbconn.php');
                $sql = "SELECT * FROM tblDogInfo WHERE 1 LIMIT 0,30";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { 
                        $modalId = 'viewModal' . $row['id'];
                        $updateModalId = 'updateModal' . $row['id'];
                        ?>
                        <tr class="success" style="cursor:pointer;">
                            <td style="text-align:center;"><?php echo $row['breed'];?></td>
                            <td style="text-align:center;"><?php echo $row['gender'];?></td>
                            <td style="text-align:center;"><?php echo $row['remarks_description'];?></td>
                            <td style="text-align:center;"><?php echo $row['date'];?></td>
                            <td style="text-align:center;">
                                <a href="#<?php echo $modalId; ?>" data-toggle="modal">
                                    <img src="<?php echo $row['dog_pictures']; ?>" class="img-thumbnail" alt="Dog Image" width="100px">
                                </a>
                            </td>
                            <td class="wow fadeInDown" style="text-align:center;">
                                <center>
                                    <button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#<?php echo $updateModalId; ?>">
                                        <i class="glyphicon glyphicon-edit"></i> Update
                                    </button>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#deleteModal">
                                        <i class="glyphicon glyphicon-trash"></i> Delete
                                    </button>
                                </center>
                            </td>
                        </tr>

                        <!-- View Modal -->
                        <div id="<?php echo $modalId; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h4 class="modal-title"><?php echo $row['name']; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="<?php echo $row['dog_pictures']; ?>" class="modal-img img-responsive img-rounded">
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                                                <p><strong>Breed:</strong> <?php echo $row['breed']; ?></p>
                                                <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
                                                <p><strong>Color/Marking:</strong> <?php echo $row['color_markings']; ?></p>
                                                <p><strong>Location of Capture:</strong> <?php echo $row['location_of_captivity']; ?></p>
                                                <p><strong>Date:</strong> <?php echo $row['date']; ?></p>
                                                <p><strong>Time:</strong> <?php echo $row['time']; ?></p>
                                                <p><strong>Remarks/Description:</strong> <?php echo $row['remarks_description']; ?></p>
                                                <p><strong>Last Vaccination Date:</strong> <?php echo $row['last_vaccination_date']; ?></p>
                                                <p><strong>Has Owner?:</strong> <?php echo $row['has_owner']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

<!-- Update Modal -->
<div id="<?php echo $updateModalId; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Update Dog Information</h4>
            </div>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo $row['dog_pictures']; ?>" class="modal-img img-responsive img-rounded">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Breed*</label>
                                <div>
                                    <label><input type="radio" name="breed" value="Mongrel/Aspin" <?php echo ($row['breed'] == 'Mongrel/Aspin') ? 'checked' : ''; ?> required> Mongrel/Aspin</label>
                                    <label><input type="radio" name="breed" value="Mixed" <?php echo ($row['breed'] == 'Mixed') ? 'checked' : ''; ?> required> Mixed</label>
                                    <label><input type="radio" name="breed" value="Pure" <?php echo ($row['breed'] == 'Pure') ? 'checked' : ''; ?> required> Pure</label>
                                    <input type="hidden" class="form-control" name="fdid" value="<?php echo $row['id']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender*</label>
                                <div>
                                    <label><input type="radio" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?> required> Male</label>
                                    <label><input type="radio" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?> required> Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Color/Markings*</label>
                                <div>
                                    <textarea name="color_markings" class="form-control" required><?php echo $row['color_markings']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Location of Capture*</label>
                                <div>
                                    <textarea name="location_of_captivity" class="form-control" required><?php echo $row['location_of_captivity']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date of Capture*</label>
                                <div>
                                    <input type="date" class="form-control" name="date" value="<?php echo $row['date']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Time of Capture*</label>
                                <div>
                                    <input type="time" class="form-control" name="time" value="<?php echo $row['time']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date of Last Vaccination</label>
                                <div>
                                    <input type="date" class="form-control" name="last_vaccination_date" value="<?php echo $row['last_vaccination_date']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Residence (Last 3 Months)*</label>
                                <div>
                                    <textarea name="residence_last_3_months" class="form-control" required><?php echo $row['residence_last_3_months']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Remarks/Description*</label>
                                <div>
                                    <textarea name="remarks_description" class="form-control" required><?php echo $row['remarks_description']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Has Owner?*</label>
                                <div>
                                    <label><input type="radio" name="has_owner" value="Yes" <?php echo ($row['has_owner'] == 'Yes') ? 'checked' : ''; ?> required> Yes</label>
                                    <label><input type="radio" name="has_owner" value="No" <?php echo ($row['has_owner'] == 'No') ? 'checked' : ''; ?> required> No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <div>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
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
</div>


                    <?php } 
                } ?>
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
            $new_file_name = "dog_img-$id." . $file_extension;
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
                    <li><a href="#loginModal" data-toggle="modal" data-target="#loginModal"><i class="fa fa-lock"></i> Admin</a></li>
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
</body>
</html>
