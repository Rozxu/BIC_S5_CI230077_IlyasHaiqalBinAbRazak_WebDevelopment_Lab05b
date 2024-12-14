<?php

	$matric = $_POST["matric"];
	$name = $_POST["name"];
	$role = $_POST["role"];

	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "lab_5b";
	
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error)
	{
	die("CONNECTION FAILED: ". $conn->connect_error);
	}
	
else
{
	$queryUpdate = "UPDATE USERS SET matric = '".$matric."' ,name = '".$name."' , role = '".$role."'";
	
	if ($conn->query($queryUpdate) === TRUE)
	{
		echo "<p style='color:#83e285;'> UPDATE SUCCESS </p>";
	

	}
	else
	{
		echo "<p style='color:red'> UPDATE UNSUCCESSFUL! <p>";
	}
		
}
$conn->close();

?>

<?php 
header("Refresh:2; url=display.php");
?>