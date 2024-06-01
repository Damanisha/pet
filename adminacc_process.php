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
        echo "Please fill all fields";
        exit;
    }

    $sql = "SELECT * FROM admininfo WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "Invalid username and password";
        header("location: adminacc.php");
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
            echo '<script>alert("Only .jpeg, .jpg, and .png files are allowed.");
                          window.location.href="adminacc.php";
                  </script>';
            exit; // Stop execution if invalid extension
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
            echo '<script>alert("Failed to upload image.");
                          window.location.href="adminacc.php";
                  </script>';
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

        echo "<script>alert('Save Successfully!');
        window.location.href='adminacc.php';</script>";
    } else {
        echo "<script>alert('Failed to update data.');
        window.location.href='adminacc.php';</script>";
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
        echo "Invalid username and password";
        header("location:adminacc.php");
        exit;
    } else {
        $sql = "INSERT INTO userinfo (name, address, contact, dob, username, password, type) VALUES ('$name', '$address', '$phone', '$dob', '$nusername', '" . md5($npassword) . "', '$type')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>alert('Save Successfully!');
            window.location.href='adminacc.php';</script>";
        } else {
            echo "<script>alert('Failed to save data.');
            window.location.href='adminacc.php';</script>";
        }
    }
}
mysqli_close($con);
?>
