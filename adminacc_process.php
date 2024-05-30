<?php
session_start();

include('includes/dbconn.php');

if(isset($_POST['update'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $id = $_SESSION['proprietor_id'];

    $name = $_POST['proprietor_name'];
    $phone = $_POST['phone'];
    $mail = $_POST['email'];
    $nusername = $_POST['nuname'];
    $npassword = $_POST['npword'];
    $picture = $_FILES['photo']['tmp_name']; // Get the temporary location of the uploaded file

    if (empty($nusername) || empty($npassword)) {
        echo "Please fill all fields";
    } else {
        $sql = "SELECT * FROM admininfo WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) == 0) {
            echo "Invalid username and password";
            header("location: adminacc.php");
        } else {
            // Check if a photo was uploaded
            if (!empty($picture)) {
                // Read the contents of the uploaded file
                $picture_data = file_get_contents($picture);
                
                // Escape special characters in the file data
                $escaped_picture_data = mysqli_real_escape_string($con, $picture_data);

                // Update the admininfo table with the new data including the picture
                $sql = "UPDATE admininfo SET name='$name', 
                        contact='$phone', 
                        email='$mail',
                        username='$nusername',
                        password='".md5($npassword)."',
                        picture='$escaped_picture_data' WHERE id='$id'";
            } else {
                // Update the admininfo table without changing the picture
                $sql = "UPDATE admininfo SET name='$name', 
                        contact='$phone', 
                        email='$mail',
                        username='$nusername',
                        password='".md5($npassword)."' WHERE id='$id'";
            }

            $result = mysqli_query($con, $sql);
            $_SESSION['username'] = $nusername ;
            $_SESSION['password'] = md5($npassword);

            echo "<script>alert('Save Successfully!');
            window.location.href='adminacc.php';</script>";
        }
		}}
		else if (isset($_POST['save'])) {
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
		
		if (empty($nusername) || empty($npassword))
				echo "Please fill all fields";
		else { 
		
			$sql = "SELECT * FROM userinfo WHERE username='$username' and password='$password' and id = '$id'" ;
			
			$result = mysqli_query($sql);
			
			if(mysqli_num_rows($result)==0){
				echo "Invalid username and password";
				header("location:adminacc.php");}
			else
			{
			$sql=("INSERT INTO userinfo VALUES(NULL,'$name','$address','$phone','$dob','$nusername','$npassword','$type')") or die(mysqli_error());
			$result=mysqli_query($con, $sql);

			echo "<script>alert('Save Successfully!');</script>";
			header("location:adminacc.php");
			}
		}
			
			}
		mysqli_close($con);
?>