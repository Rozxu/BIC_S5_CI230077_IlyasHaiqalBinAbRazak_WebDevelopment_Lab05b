<?php

	$matric = $_POST["matric"];
	$name = $_POST["name"];
	$password = $_POST["password"];	
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
	$queryInsert = "insert into USERS (matric, name, password, role) 
	values
	('".$matric."','".$name."','".$password."','".$role."')";
	
	if ($conn->query($queryInsert) === TRUE)
	{
		echo "<p style='color:#83e285;'> REGISTER USER SUCCESS </p>";
	

	}
	else
	{
		echo "<p style='color:yellow'> THE DATA THAT YOU ENTERED ALREADY EXIST! <p>";
	}
		
}
$conn->close();

?>

<?php 
header("Refresh:2; url=login.php");
?>
