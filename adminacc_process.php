<?php
session_start();
include('includes/dbconn.php');

if (isset($_POST['update'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $id = $_SESSION['proprietor_id'];

    $name = $_POST['proprietor_name'];
    $phone = $_POST['phone'];
    $mail = $_POST['email'];
    $nusername = $_POST['nuname'];
    $npassword = $_POST['npword'];

    if (empty($nusername) || empty($npassword)) {
        echo "<script>alert('Please fill all fields'); window.location.href='adminacc.php';</script>";
        exit;
    }

    $sql = "SELECT * FROM admininfo WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('Invalid username and password'); window.location.href='adminacc.php';</script>";
        exit;
    }

    // Check if a photo was uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        // Handle image upload
        $image_name = addslashes($_FILES['photo']['name']);
        $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpeg', 'jpg', 'png'];
        $upload_directory = "images/admin/uploads/";
        
        // Generate the custom ID
        $date_of_reg = date('Ymd'); // Current date in YYYYMMDD format
        $custom_id = "admin-$id-$date_of_reg"; // Create the custom ID

        // New file name with custom ID
        $new_file_name = $custom_id . '_img' . '.' . $file_extension;
        $target_file = $upload_directory . $new_file_name;

        if (!in_array($file_extension, $allowed_extensions)) {
            echo "<script>alert('Only .jpeg, .jpg, and .png files are allowed.'); window.location.href='adminacc.php';</script>";
            exit;
        }

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            // Store the relative path in the database
            $relative_path = $upload_directory . $new_file_name;

            // Update the admininfo table with the new data including the picture
            $sql = "UPDATE admininfo SET name='$name', 
                    contact='$phone', 
                    email='$mail',
                    username='$nusername',
                    password='" . md5($npassword) . "',
                    picture='$relative_path' WHERE id='$id'";
        } else {
            echo "<script>alert('Failed to upload image.'); window.location.href='adminacc.php';</script>";
            exit;
        }
    } else {
        // Update the admininfo table without changing the picture
        $sql = "UPDATE admininfo SET name='$name', 
                contact='$phone', 
                email='$mail',
                username='$nusername',
                password='" . md5($npassword) . "' WHERE id='$id'";
    }

    $result = mysqli_query($con, $sql);
    if ($result) {
        $_SESSION['username'] = $nusername;
        $_SESSION['password'] = md5($npassword);

        echo "<script>alert('Save Successfully!'); window.location.href='adminacc.php';</script>";
    } else {
        echo "<script>alert('Failed to update data.'); window.location.href='adminacc.php';</script>";
    }
} else if (isset($_POST['save'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $id = $_SESSION['proprietor_id'];

    $name = $_POST['proprietor_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $nusername = $_POST['nusername'];
    $npassword = $_POST['npassword'];
    $dob = $_POST['date'];
    $type = $_POST['type'];

    $sql = "SELECT * FROM userinfo WHERE username='$username' and password='$password' and id='$id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('Invalid username and password'); window.location.href='adminacc.php';</script>";
        exit;
    } else {
        $sql = "INSERT INTO userinfo (name, address, contact, dob, username, password, type) VALUES ('$name', '$address', '$phone', '$dob', '$nusername', '" . md5($npassword) . "', '$type')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>alert('Save Successfully!'); window.location.href='adminacc.php';</script>";
        } else {
            echo "<script>alert('Failed to save data.'); window.location.href='adminacc.php';</script>";
        }
    }
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<?php include('includes/header_main.php')?>

<style>
    .wow {
        visibility: visible;
        animation-name: fadeInDown;
        animation-duration: 1s;
        animation-fill-mode: both;
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translate3d(0, -100%, 0);
        }
        to {
            opacity: 1;
            transform: none;
        }
    }
    .container-fluid {
        margin-top: 20px;
        max-width: 1200px; /* Control the max width of the container */
        padding: 0 20px;
    }
    .admin-info {
        border: solid #CFCFCF 2px;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
    }
    .admin-info h3 {
        text-align: center;
        font-weight: bold;
        width: 100%;
    }
    .admin-info hr {
        margin: 20px 0;
        width: 100%;
    }
    .admin-info dl {
        text-align: left;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        text-align: right;
    }
    .form-group .form-control {
        margin-left: 10px;
    }
    .form-group .btn {
        margin-top: 20px;
    }
    .profile-section {
        flex: 1;
        padding: 20px;
        text-align: center;
    }
    .profile-section img {
        max-width: 200px;
        height: auto;
        margin: 0 auto;
    }
    .info-section, .form-section {
        flex: 2;
        padding: 20px;
    }
    footer {
        background-color: #2C3E50; /* Dark background color */
        color: white; /* White text color */
        padding: 20px 0;
    }
    footer a {
        color: white;
    }
    footer a:hover {
        color: #18BC9C; /* Hover color */
    }
</style>

<div class="container-fluid wow fadeInDown">
    <div class="row justify-content-center">
        <div class="col-12 admin-info">
            <div class="profile-section">
                <div class="alert alert-success" id="infomsg" style="text-align: center"></div>
                <img src="<?php echo $profile_pic ? $profile_pic : 'images/default-avatar.png'; ?>" class="img-responsive wow fadeInDown" />
            </div>
            <div class="info-section">
                <h3 class="wow fadeInDown">Admin Account Information</h3>
                <hr>
                <dl class="dl-horizontal wow fadeInDown">
                    <dt>Admin Name</dt><dd><?php echo @$name ?></dd>
                    <dt>Phone#</dt><dd><?php echo @$phone ?></dd>
                    <dt>Email</dt><dd><?php echo @$email ?></dd>
                    <dt>Username</dt><dd><?php echo @$username ?></dd>
                    <dt>Password</dt><dd><?php echo '********'; ?></dd>
                </dl>
                <hr>
            </div>
            <div class="form-section">
                <form class="form-group" name="adminacc" id="adminacc" method="POST" action="adminacc.php" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="image" class="col-sm-4 control-label">Profile Avatar</label>
                        <div class="col-sm-8">
                            <input type="file" name="photo" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 control-label">Admin Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="proprietor_name" placeholder="<?php echo $name ?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 control-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo $phone ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" name="nuname" placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npassword" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="npassword" name="npword" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-offset-4 col-sm-8">
                            <em style="color:red;" class="wow fadeInDown">Note: Fill up the fields before hitting save changes button</em>
                            <center><input type="submit" class="btn btn-success wow fadeInDown" name="update" value="Save Changes"></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $("#page").removeClass();
    $("#messages").removeClass();
    $("#admin").addClass("active");
    
    $("#infomsg").hide();
    
    $('#adminacc').submit(function(event) {
        event.preventDefault();
        $.post($("#adminacc").attr("action"),
            $("#adminacc :input").serializeArray(),
            function(info) { 
                $("#infomsg").show();
                $("#infomsg").empty();
                $("#infomsg").html(info);
            });    
        return false;    
    });
</script>

<br><br><br>
<?php
session_start();
include('includes/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $id = $_SESSION['proprietor_id'];

    if (isset($_POST['update'])) {
        // Update admin information
        $name = $_POST['proprietor_name'];
        $phone = $_POST['phone'];
        $mail = $_POST['email'];
        $nusername = $_POST['nuname'];
        $npassword = $_POST['npword'];

        if (empty($nusername) || empty($npassword)) {
            echo "<script>alert('Please fill all fields.'); window.location.href='adminacc.php';</script>";
            exit;
        }

        $sql = "SELECT * FROM admininfo WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo "<script>alert('Invalid username and password.'); window.location.href='adminacc.php';</script>";
            exit;
        }

        // Handle image upload
        $image_path = '';
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $image_name = addslashes($_FILES['photo']['name']);
            $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            $allowed_extensions = ['jpeg', 'jpg', 'png'];
            $upload_directory = "images/admin/uploads/";
            
            // Generate the custom ID
            $date_of_reg = date('Ymd'); // Current date in YYYYMMDD format
            $custom_id = "admin-$id-$date_of_reg"; // Create the custom ID

            // New file name with custom ID
            $new_file_name = $custom_id . '_img' . '.' . $file_extension;
            $target_file = $upload_directory . $new_file_name;

            if (!in_array($file_extension, $allowed_extensions)) {
                echo "<script>alert('Only .jpeg, .jpg, and .png files are allowed.'); window.location.href='adminacc.php';</script>";
                exit;
            }

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                $image_path = $upload_directory . $new_file_name;
            } else {
                echo "<script>alert('Failed to upload image.'); window.location.href='adminacc.php';</script>";
                exit;
            }
        }

        // Update the admininfo table with the new data including the picture if uploaded
        $password_hash = md5($npassword);
        $sql = "UPDATE admininfo SET name='$name', contact='$phone', email='$mail', username='$nusername', password='$password_hash'";
        if ($image_path) {
            $sql .= ", picture='$image_path'";
        }
        $sql .= " WHERE id='$id'";

        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['username'] = $nusername;
            $_SESSION['password'] = $password_hash;
            echo "<script>alert('Profile updated successfully!'); window.location.href='adminacc.php';</script>";
        } else {
            echo "<script>alert('Failed to update data.'); window.location.href='adminacc.php';</script>";
        }
    } else if (isset($_POST['save'])) {
        // Save new user information
        $name = $_POST['proprietor_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $nusername = $_POST['nusername'];
        $npassword = $_POST['npassword'];
        $dob = $_POST['date'];
        $type = $_POST['type'];

        $sql = "SELECT * FROM userinfo WHERE username='$username' AND password='$password' AND id='$id'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo "<script>alert('Invalid username and password.'); window.location.href='adminacc.php';</script>";
            exit;
        } else {
            $password_hash = md5($npassword);
            $sql = "INSERT INTO userinfo (name, address, contact, dob, username, password, type) VALUES ('$name', '$address', '$phone', '$dob', '$nusername', '$password_hash', '$type')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "<script>alert('User saved successfully!'); window.location.href='adminacc.php';</script>";
            } else {
                echo "<script>alert('Failed to save user data.'); window.location.href='adminacc.php';</script>";
            }
        }
    }
}
mysqli_close($con);
?>

