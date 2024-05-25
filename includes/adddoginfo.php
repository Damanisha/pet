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
                                <td style="text-align:right; font-weight:bold;">Breed* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <textarea class="form-control" name="breed" required></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Gender* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <select name="gender" class="form-control" required>
                                    <option>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Physical Characteristics* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <textarea class="form-control" name="physical_characteristics" required></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Medical Records* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <textarea class="form-control" name="medical_records" required></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Location of Capture* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <textarea class="form-control" name="location_of_captivity" required></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Date* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <input type="date" class="form-control" name="date" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Time* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <input type="time" class="form-control" name="time" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Remarks/Description* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <textarea class="form-control" name="remarks_description" required></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight:bold;">Dog Pictures* : &emsp;</td>
                                <td style="text-align:center;">&emsp; <input type="file" name="dog_pictures" required></td>
                            </tr>
                            <tr style="margin-top:20px;">
                                <td style="text-align:right;font-weight:bold;" colspan="2"><br /><p></p>
                                    <button class="btn btn-default" type="clear">Clear</button>
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
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $physical_characteristics = $_POST['physical_characteristics'];
    $medical_records = $_POST['medical_records'];
    $location_of_captivity = $_POST['location_of_captivity'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $remarks_description = $_POST['remarks_description'];
    
    // Handle image upload
    $dog_pictures = addslashes(file_get_contents($_FILES['dog_pictures']['tmp_name']));
    $image_name = addslashes($_FILES['dog_pictures']['name']);
    $image_size = getimagesize($_FILES['dog_pictures']['tmp_name']);
    $upload_directory = "../images/upload/";
    $location = $upload_directory . $image_name;

    if (empty($breed) || empty($gender) || empty($physical_characteristics) || empty($medical_records) || empty($location_of_captivity) || empty($date) || empty($time) || empty($remarks_description)) {
        echo '<script>alert("Fields must not be empty.");
                      window.location.href="adddoginfo.php";
              </script>';
    } else {
        $sql = "INSERT INTO tblDogInfo (breed, gender, physical_characteristics, medical_records, location_of_captivity, date, time, remarks_description, dog_pictures) VALUES ('$breed', '$gender', '$physical_characteristics', '$medical_records', '$location_of_captivity', '$date', '$time', '$remarks_description', '$location')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo '<script>alert("Save Successfully!");
                      window.location.href="addcnp.php";</script>';
        } else {
            echo '<script>alert("Sorry, unable to process your request!");
                      window.location.href="addcnp.php";</script>';
        }
    }
}
?>