<?php
session_start();
include('includes/dbconn.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the ID is set in the POST data
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Prepare the SQL statement to delete the record
        $stmt = $con->prepare("DELETE FROM tbldoginfo WHERE id = ?");
        $stmt->bind_param("s", $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Record deleted successfully
            echo json_encode(["status" => "success", "message" => "Record deleted successfully."]);
        } else {
            // Error deleting record
            echo json_encode(["status" => "error", "message" => "Failed to delete record."]);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "ID not provided."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

// Close the database connection
mysqli_close($con);
?>
