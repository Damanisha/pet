<BEFORE ADDING OWNER MODAL>


<!----- FOR DOG REGISTRATION FUNCTION ----->

<div class="container wow fadeInDown" style="height:500px;">
    <div class="col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
        <div class="panel panel-success">
            <div class="panel-heading panel-title">
                <span style="font-weight:bold; font-family:verdana;"><i class="glyphicon glyphicon-cog"></i> Dog Information</span>
            </div>
            <div class="panel-body" style="background-color:#fff;">
                <div class="col-lg-3">
                    <em style="color:red;">Note: Fields with (*) are required</em>
                </div>
                <div class="col-lg-6">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Name : &emsp;</td>
                                <td style="text-align:center;">&emsp; <textarea class="form-control" name="name"></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Breed* : &emsp;</td>
                                <td style="text-align:center;">&emsp;
                                    <label><input type="radio" name="breed" value="Mongrel/Aspin" required> Mongrel/Aspin</label>
                                    <label><input type="radio" name="breed" value="Mixed" required> Mixed</label>
                                    <label><input type="radio" name="breed" value="Pure" required> Pure</label>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Gender* : &emsp;</td>
                                <td style="text-align:center;">&emsp;
                                    <label><input type="radio" name="gender" value="Male" required> Male</label>
                                    <label><input type="radio" name="gender" value="Female" required> Female</label>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Color/Markings* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <textarea class="form-control" name="color_markings" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Location of Capture* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <textarea class="form-control" name="location_of_captivity" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Date* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <input type="date" class="form-control" name="date" ></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Time* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <input type="time" class="form-control" name="time" ></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Date of Last Vaccination : &emsp;</td>
                                <td style="text-align:center;">&emsp; <input type="date" class="form-control" name="last_vaccination_date"></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Residence (last 3 months) : &emsp;</td>
                                <td style="text-align:center;">&emsp; <input type="text" class="form-control" name="residence_last_3_months"></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Remarks/Description* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <textarea class="form-control" name="remarks_description" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Dog Pictures* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <input type="file" name="dog_pictures" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Has Owner* : &emsp;</td>
                                <td style="text-align:center;">&emsp;
                                    <label><input type="radio" name="has_owner" value="Yes" required> Yes</label>
                                    <label><input type="radio" name="has_owner" value="No" required> No</label>
                                </td>
                            </tr>
                            <tr style="margin-top:20px;">
                                <td style="text-align:right;font-weight:bold;" colspan="2"><br /><p></p>
                                    <button class="btn btn-default" type="reset">Clear</button>
                                    <button class="btn btn-success" type="submit" name="save">Save</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/dbconn.php');

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $color_markings = $_POST['color_markings'];
    $location_of_captivity = $_POST['location_of_captivity'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $last_vaccination_date = $_POST['last_vaccination_date'];
    $residence_last_3_months = $_POST['residence_last_3_months'];
    $remarks_description = $_POST['remarks_description'];
    $has_owner = $_POST['has_owner'];

    // Handle single image upload
    $image_name = addslashes($_FILES['dog_pictures']['name']);
    $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $allowed_extensions = ['jpeg', 'jpg', 'png'];
    $upload_directory = "images/upload/";
    
    // Generate the custom ID
    $date_of_reg = date('Ymd'); // Current date in YYYYMMDD format
    $result = mysqli_query($con, "SELECT COUNT(*) AS count FROM tblDogInfo");
    $row = mysqli_fetch_assoc($result);
    
    if (isset($row['Auto_increment'])) {
        $next_auto_increment = $row['Auto_increment']; // Get the next AUTO_INCREMENT value
    } else {
        // Fallback if Auto_increment is not found
        $result = mysqli_query($con, "SELECT MAX(id) AS max_id FROM tbldoginfo");
        $row = mysqli_fetch_assoc($result);
        $next_auto_increment = (int)$row['max_id'] + 1;
    }

    $custom_id = "dog-$next_auto_increment"; // Create the custom ID

    // New file name with custom ID
    $new_file_name = $custom_id . '_img' . '.' . $file_extension;
    $target_file = $upload_directory . $new_file_name;

    if (!in_array($file_extension, $allowed_extensions)) {
        echo '<script>alert("Only .jpeg, .jpg, and .png files are allowed.");
                      window.location.href="dog-reg.php";
              </script>';
        exit; // Stop execution if invalid extension
    }

    if (empty($breed) || empty($gender) || empty($color_markings) || empty($location_of_captivity) || empty($date) || empty($time) || empty($remarks_description) || empty($has_owner)) {
        echo '<script>alert("Fields marked with * are required.");
                      window.location.href="dog-reg.php";
              </script>';
    } else {
        if (move_uploaded_file($_FILES['dog_pictures']['tmp_name'], $target_file)) {
            // Store the relative path in the database
            $relative_path = $upload_directory . $new_file_name;
            $sql = "INSERT INTO tblDogInfo (id, name, breed, gender, color_markings, location_of_captivity, date, time, last_vaccination_date, residence_last_3_months, remarks_description, dog_pictures, has_owner) VALUES ('$custom_id', '$name', '$breed', '$gender', '$color_markings', '$location_of_captivity', '$date', '$time', '$last_vaccination_date', '$residence_last_3_months', '$remarks_description', '$relative_path', '$has_owner')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo '<script>alert("Save Successfully!");
                          window.location.href="dog-reg.php";</script>';
            } else {
                echo '<script>alert("Sorry, unable to process your request!");
                          window.location.href="dog-reg.php";</script>';
            }
        } else {
            echo '<script>alert("Failed to upload image.");
                      window.location.href="dog-reg.php";
                  </script>';
        }
    }
}
?>




