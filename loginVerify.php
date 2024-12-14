<?php


$matric = $_POST["matric"];
$password = $_POST["password"];	
	
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
	$queryCheck = "SELECT * FROM USERS WHERE matric = '".$matric."'";
	$resultCheck = $conn->query($queryCheck); 
	
	if ($resultCheck->num_rows == 0) 
	{ 
		echo "<p style='color:red;'>MATRICS ID does not exists</p>";
		echo "<br>Click <a href='login.php'> here </a> to LOGIN again.";
	}
	else
	{
		while($row = $resultCheck->fetch_assoc()) 
		{
			if( $row["password"] == $password ) 
			{
				header("Location:display.php");
			}
			else
			{
				echo "<p style='color:red;'>WRONG PASSWORD!!!</p>";
				echo "<br>Click <a href='login.php'> here </a> to LOGIN again.";
			}
		}
	}
}
$conn->close();

?>
