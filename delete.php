<?php
// Check if the 'matric' parameter is set in the URL
if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "lab_5b";

    // Establish connection
    $conn = new mysqli($host, $user, $pass, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the DELETE SQL statement
    $stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to display.php after successful deletion
		echo "User with matric number $matric has been successfully deleted.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo "Matric number not specified.";
}

    header("Refresh:2; url=display.php");
?>
