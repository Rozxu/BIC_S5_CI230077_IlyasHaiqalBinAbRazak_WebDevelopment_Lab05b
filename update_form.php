<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "lab_5b";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("CONNECTION FAILED: " . $conn->connect_error);
}

// Get the matric parameter from the URL
$matric = $_GET['matric'] ?? '';
if (empty($matric)) {
    die("Matric number is required.");
}

// Use a prepared statement to fetch user details
$stmt = $conn->prepare("SELECT * FROM users WHERE matric = ?");
$stmt->bind_param("s", $matric);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("No user found with the provided matric number.");
}

$user = $result->fetch_assoc();
?>

<form action="update.php" method="post">
    <label for="name">Matric:</label>
    <input name="matric" value="<?php echo $user['matric']; ?>"> <br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required><br>
    <label for="role">Role:</label>
    <select name="role" id="role" required>
        <option value="">Please select</option>
        <option value="lecturer" <?php echo ($user['role'] === 'lecturer') ? "selected" : ""; ?>>Lecturer</option>
        <option value="student" <?php echo ($user['role'] === 'student') ? "selected" : ""; ?>>Student</option>
    </select><br>
    <input type="submit" value="Update">
	<a href="display.php">Cancel</a>
</form>

<?php
$stmt->close();
$conn->close();
?>

</body>

</html>
