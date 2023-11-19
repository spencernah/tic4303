<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$country = $_POST['country'];
		$gender = $_POST['gender'];
		$qualification = $_POST['qualifcation'];

		if(empty($user_name))
		{
			echo "Please enter a User Name!";
			//save to database
		}
		elseif(empty($password))
		{
			echo "Please enter a Password!";
		}
		elseif(empty($name))
		{
			echo "Please enter a Name!";
		}
		elseif(empty($email))
		{
			echo "Please enter an Email!";
		}
		elseif(!(is_numeric($phone_number)) || empty($phone_number))
		{
			echo "Please enter a valid Phone Number!";
		}
		else
		{
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,name,email,phone_number,country,gender,qualification) values ('$user_id','$user_name','$password','$name','$email','$phone_number','$country','$gender','$qualification')";
	
			mysqli_query($con, $query);
			header("Location: login.php");
			die;
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registeration</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;color: white;">Signup</div>
			<br><br>

			<div class="form-group">
				<div style="color: white;">
					<label for="user_name">User Name*</label>
				</div>
				<input id="text" type="text" name="user_name"><br>
			</div>

			<div class="form-group">
				<div style="color: white;">
					<label for="password">Password*</label>
				</div>
				<input id="text" type="password" name="password"><br>
			</div>

			<div class="form-group">
				<div style="color: white;">
					<label for="name">Name*</label>
				</div>
				<input id="text" type="text" name="name"><br>
			</div>

			<div class="form-group">
				<div style="color: white;">
					<label for="email">Email*</label>
				</div>
				<input id="text" type="text" name="email"><br>
			</div>

			<div class="form-group">
				<div style="color: white;">
					<label for="phone_number">Phone Number*</label>
				</div>
				<input id="text" type="text" name="phone_number"><br>
			</div>

			<div class="form-group">
				<div style="color: white;">
					<label for="country">Country</label>
				</div>
				<select name="country" id="country">
					<option value="singapore">Singapore</option>
					<option value="malaysia">Malaysia</option>
				</select>
			</div>

			<div class="form-group">
				<div style="color: white;">
					<label for="gender">Gender</label>
				</div>
				<select name="gender" id="gender">
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</div>

			<div class="form-group">
				<div style="color: white;">
					<label for="qualification">Qualification</label>
				</div>
				<input id="text" type="text" name="qualifcation"><br>
			</div>

			<br><br>

			<input id="button" type="submit" value="Signup"><br>

			<a href="login.php">Have an account? Login instead</a><br>
		</form>
	</div>
</body>
</html>