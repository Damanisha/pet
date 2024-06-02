<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/foods/cityvet_logo01.jpg" rel="shortcut icon">
    <title>Dog Registration Form</title>
  
    <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
</head>
<body>
<div class="container wow fadeInDown" style="height: 500px;">
    <div class="col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
        <div class="panel panel-success">
            <div class="panel-heading panel-title">
                <span style="font-weight: bold; font-family: verdana;"><i class="glyphicon glyphicon-cog"></i> Dog Information</span>
            </div>
            <div class="panel-body" style="background-color: #fff;">
                <em class="text-danger col-lg-12">Note: Fields with (*) are required</em>
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="name">Name:</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="name" id="name"><?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="breed">Breed*:</label>
                        <div class="col-lg-9">
                            <label class="radio-inline"><input type="radio" name="breed" value="Mongrel/Aspin" <?php echo (isset($_POST['breed']) && $_POST['breed'] == 'Mongrel/Aspin') ? 'checked' : ''; ?> required> Mongrel/Aspin</label>
                            <label class="radio-inline"><input type="radio" name="breed" value="Mixed" <?php echo (isset($_POST['breed']) && $_POST['breed'] == 'Mixed') ? 'checked' : ''; ?> required> Mixed</label>
                            <label class="radio-inline"><input type="radio" name="breed" value="Pure" <?php echo (isset($_POST['breed']) && $_POST['breed'] == 'Pure') ? 'checked' : ''; ?> required> Pure</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="gender">Gender*:</label>
                        <div class="col-lg-9">
                            <label class="radio-inline"><input type="radio" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'checked' : ''; ?> required> Male</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'checked' : ''; ?> required> Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="color_markings">Color/Markings*:</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="color_markings" id="color_markings"><?php echo isset($_POST['color_markings']) ? htmlspecialchars($_POST['color_markings']) : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="location_of_captivity">Location of Capture*:</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="location_of_captivity" id="location_of_captivity"><?php echo isset($_POST['location_of_captivity']) ? htmlspecialchars($_POST['location_of_captivity']) : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="date">Date of Capture*:</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="date" id="date" value="<?php echo isset($_POST['date']) ? htmlspecialchars($_POST['date']) : ''; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="time">Time of Capture*:</label>
                        <div class="col-lg-9">
                            <input type="time" class="form-control" name="time" id="time" value="<?php echo isset($_POST['time']) ? htmlspecialchars($_POST['time']) : ''; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="last_vaccination_date">Date of Last Vaccination:</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="last_vaccination_date" id="last_vaccination_date" value="<?php echo isset($_POST['last_vaccination_date']) ? htmlspecialchars($_POST['last_vaccination_date']) : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="residence_last_3_months">Residence (last 3 months):</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="residence_last_3_months" id="residence_last_3_months" value="<?php echo isset($_POST['residence_last_3_months']) ? htmlspecialchars($_POST['residence_last_3_months']) : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="remarks_description">Remarks/Description*:</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="remarks_description" id="remarks_description"><?php echo isset($_POST['remarks_description']) ? htmlspecialchars($_POST['remarks_description']) : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="dog_pictures">Dog Pictures*:</label>
                        <div class="col-lg-9">
                            <input type="file" class="form-control" name="dog_pictures" id="dog_pictures" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="has_owner">Has Owner*:</label>
                        <div class="col-lg-9">
                            <label class="radio-inline"><input type="radio" name="has_owner" value="Yes" <?php echo (isset($_POST['has_owner']) && $_POST['has_owner'] == 'Yes') ? 'checked' : ''; ?> required> Yes</label>
                            <label class="radio-inline"><input type="radio" name="has_owner" value="No" <?php echo (isset($_POST['has_owner']) && $_POST['has_owner'] == 'No') ? 'checked' : ''; ?> required> No</label>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-default" type="reset">Clear</button>
                        <button class="btn btn-success" type="submit" name="save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/dbconn.php');

if (isset($_POST['save'])) {
    $name = htmlspecialchars($_POST['name']);
    $breed = htmlspecialchars($_POST['breed']);
    $gender = htmlspecialchars($_POST['gender']);
    $color_markings = htmlspecialchars($_POST['color_markings']);
    $location_of_captivity = htmlspecialchars($_POST['location_of_captivity']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $last_vaccination_date = htmlspecialchars($_POST['last_vaccination_date']);
    $residence_last_3_months = htmlspecialchars($_POST['residence_last_3_months']);
    $remarks_description = htmlspecialchars($_POST['remarks_description']);
    $has_owner = htmlspecialchars($_POST['has_owner']);

    // Handle single image upload
    $image_name = addslashes($_FILES['dog_pictures']['name']);
    $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $allowed_extensions = ['jpeg', 'jpg', 'png'];
    $upload_directory = "images/upload/";

    // Check if required fields are empty
    if (empty($breed) || empty($gender) || empty($color_markings) || empty($location_of_captivity) || empty($date) || empty($time) || empty($remarks_description) || empty($has_owner)) {
        echo '<script>alert("Fields marked with * are required.");</script>';
    } else {
        // Generate the custom ID
        $date_of_captv = date('mdY'); // Current date in mmddyy format
        $result = mysqli_query($con, "SHOW TABLE STATUS LIKE 'tblDogInfo'");
        $row = mysqli_fetch_assoc($result);

        if (isset($row['Auto_increment'])) {
            $next_auto_increment = $row['Auto_increment']; // Get the next AUTO_INCREMENT value
        } else {
            // Fallback if Auto_increment is not found
            $result = mysqli_query($con, "SELECT MAX(id) AS max_id FROM tblDogInfo");
            $row = mysqli_fetch_assoc($result);
            $next_auto_increment = (int)$row['max_id'] + 1;
        }

        $custom_id = "D-$next_auto_increment-$date"; // Create the custom ID

        // New file name with custom ID
        $new_file_name = $custom_id . 'IMG' . '.' . $file_extension;
        $target_file = $upload_directory . $new_file_name;

        if (!in_array($file_extension, $allowed_extensions)) {
            echo '<script>alert("Only .jpeg, .jpg, and .png files are allowed.");</script>';
            exit; // Stop execution if invalid extension
        }

        if (move_uploaded_file($_FILES['dog_pictures']['tmp_name'], $target_file)) {
            // Store the relative path in the database
            $relative_path = $upload_directory . $new_file_name;
            $sql = "INSERT INTO tblDogInfo (id, name, breed, gender, color_markings, location_of_captivity, date, time, last_vaccination_date, residence_last_3_months, remarks_description, dog_pictures, has_owner) VALUES ('$custom_id', '$name', '$breed', '$gender', '$color_markings', '$location_of_captivity', '$date', '$time', '$last_vaccination_date', '$residence_last_3_months', '$remarks_description', '$relative_path', '$has_owner')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo '<script>alert("Save Successfully!"); window.location.href="dog-reg.php";</script>';
            } else {
                echo '<script>alert("Sorry, unable to process your request!");</script>';
            }
        } else {
            echo '<script>alert("Failed to upload image.");</script>';
        }
    }
}
?>

<!-- Scripts -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>
</body>
</html>

