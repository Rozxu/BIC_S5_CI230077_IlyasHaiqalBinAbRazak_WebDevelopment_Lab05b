<!DOCTYPE html>

<html>
<head>
	<title> Log In </title>
</head>

<body>

<form name="LoginForm" action="loginVerify.php" method="POST">

	Matric :
	<input type="text" name="matric" maxlength="20" size="20" required>
	<br>
	Password :
	<input type="password" name="password" required><br>
	
	<input type="submit" value="Login">
	<br><br>
	<p><a href ="register.php">Register</a> here if you have not.</p>
	
</form>

</body>
</html>