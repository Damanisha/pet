<?php
session_start();
include('includes/dbconn.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];

$sql = "SELECT picture FROM admininfo WHERE username='$username' AND password='$password'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $picture = $row['picture'];
    echo json_encode(['picture' => $picture]);
} else {
    echo json_encode(['picture' => 'images/default.jpg']); // default image if no picture is found
}

mysqli_close($con);
?>
