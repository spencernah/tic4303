<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
</head>
<body>
 	<h1>Thank you for signing up and logging in!</h1>
	 Hello, <?php echo $user_data['name']; ?> <br><br>
	 
	<a href="logout.php">Logout</a>

	<br>

</body>
</html>