<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
	<style type="text/css">
		tr{
			color: green;
			font-weight: bold;
		}
		.error{
			color: red;
		}
	</style>
</head>
<body style="background-color: cyan">

<?php
$firstErr = $lastErr = $userErr = $emailErr = $passErr = "";
//$firstname = $lastname = $username = $email = $password = "";

if(isset($_POST['submit'])){
	if(isset($_POST['firstname']) && !empty($_POST['firstname'])){
		$firstname = $_POST['firstname'];
	}
	else{
		$firstErr = 'first name required';
	}
	if(isset($_POST['lastname']) && !empty($_POST['lastname'])){
		$lastname = $_POST['lastname'];
	}
	else{
		$lastErr = 'last name required';
	}
	if(isset($_POST['username']) && !empty($_POST['username'])){
		$username = $_POST['username'];
	}
	else{
		$userErr = 'choose a user name';
	}
	if(isset($_POST['email']) && !empty($_POST['email'])){
		$email = $_POST['email'];
	}
	else{
		$emailErr = 'email required';
	}
	if(isset($_POST['password']) && !empty($_POST['password'])){
		$password = $_POST['password'];
	}
	else{
		$passErr = 'please provide password';
	}
}

?>

<form action="signup.php" method="post">
	<table style="padding-top: 15%; margin: auto;">
		<tr>
			<td> Firstname: </td>
			<td><input type="text" name="Firstname" value="<?php if (isset($firstname)) {echo $firstname;}?>">
			<span class="error">*<?php echo $firstErr?></span>
		  	<br>
			</td>
		</tr>
		<tr>
			<td> Lastname: </td>
			<td><input type="text" name="Lastname">
			<span class="error">*<?php echo $lastErr?></span>
		  	<br>
			</td>
		</tr>
		<tr>
			<td>Username: </td>
			<td><input type="text" name="Username">
			<span class="error">*<?php echo $userErr?></span>
		  	<br>
			</td>
		</tr>
		<tr>
			<td> Email: </td>
			<td><input type="text" name="Email">
			<span class="error">*<?php echo $emailErr?></span>
		  	<br>
			</td>
		</tr>
		<tr>
			<td> Password: </td>
			<td><input type="password" name="Password">
			<span class="error">*<?php echo $passErr?></span>
		  	<br>
			</td>
		</tr>
		<tr>
			<td></td>
			<td style="padding-left: 44%;"><input type="submit" name="submit" value="Sign Up" ></td>
		</tr>
	</table>
</form>
</body>
</html>