<!-- Modal -->
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


<!----script----->


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
            $custom_id = "dog_img-$dog_number-$date_of_reg";
            $new_file_name = $custom_id . '.' . $file_extension;
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



