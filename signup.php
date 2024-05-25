<?php
include('includes/dbconn.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Perform password matching
    if ($password !== $confirm_password) {
        echo '<script>alert("Passwords do not match!"); window.location.href="signup.php";</script>';
        exit(); // Stop further execution
    }

    // Other validation and processing code here...

    // Example query
    $sql = "INSERT INTO admininfo (name, contact, email, username, password) VALUES ('$name', '$contact', '$email', '$username', '$password')";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Sign up successful!"); window.location.href="loginModal.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
