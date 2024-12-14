<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
</head>

<body>
    <div>
        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "lab_5b";

        // Establish connection
        $conn = new mysqli($host, $user, $pass, $db);

        // Check connection
        if ($conn->connect_error) {
            die("CONNECTION FAILED: " . $conn->connect_error);
        }

        // Fetch data
        $sql = "SELECT * FROM users ORDER BY matric";
        $result = $conn->query($sql);

        if (!$result) {
            die("Error retrieving data: " . $conn->error);
        }
        ?>
        <br>

        <!-- Display the table -->
        <table border="2">
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Role</th>
                <th colspan="2">Action</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                // Fetch and display rows
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['matric']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['role']; ?></td>
						<td><a href="update_form.php?matric=<?php echo $row['matric']; ?>">Update</a></td>
						<td><a href="delete.php?matric=<?php echo $row['matric']; ?>">Delete</a></td>
					</tr>
                    <?php
                }
            } else {
                // Display message if no data is found
                echo "No Data Available</center></td></tr>";
            }
            ?>
        </table>
    </div>
	<br>
    <a href="login.php">Log out</a>
    <?php
    // Close the connection
    $conn->close();
    ?>
</body>

</html>
