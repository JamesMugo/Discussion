<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>


	<div class="col-12" >

		<img src="logo.png" class="col-1">

		<div id="menu" class="col-11" >
			<div class="col-7">&nbsp</div>
			<div class="col-1"><a href="#">Home</a></div>
			<div class="col-1"><a href="#">Mens</a></div>
			<div class="col-1"><a href="#">Womens</a></div>
			<div class="col-1"><a href="#">Company</a></div>
			<div class="col-1"><a href="contacts.php">Contact</a></div>
			<div class="col-1"><a href="login.php">Login</a></div>
			
		</div>
		<?php
		$nameErr = $emailErr = "";
		$username = $email = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["name"])) {
		    $nameErr = "Name is required";
		  } else {
		    $name = test_input($_POST["name"]);
		  }
		  if (empty($_POST["email"])) {
		    $emailErr = "E-mail is required";
		  } else {
		    $email = test_input($_POST["email"]);
		  }
		}
		
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
			//constant
			define('SERVER','localhost');
			define('USERNAME','root');
			define('PASSWORD','');
			define('DB','lab');
			
			//connect to the database
			$dbconnect = mysqli_connect(SERVER,USERNAME,PASSWORD,DB);
			
			//TEST connection
			if(!$dbconnect){
				echo 'not connected';
			}else{
				//echo 'connection established';
				//write query
				$sqlstatement = "SELECT * FROM users";
				
				//execute query
				$sqlresult = mysqli_query($dbconnect, $sqlstatement);
				
				//loop through
				foreach($sqlresult as $myresult){
					echo $myresult['user_name'].'<br>';
				}
			}
		
		
		?>
			<h1>Login here</h1>
			<form action="/action_page.php">
			  Username:<br>
			  <input type="text" name="username">
			  <span class="error">* <?php echo $nameErr;?></span>
			  <br>
			  Email:<br>
			  <input type="text" name="email">
			  <span class="error">* <?php echo $emailErr;?></span>
			  <br><br>
			  <input type="submit" value="Submit">
			</form> 
	</div>

	<div class="col-12" align="center">
		<img src="shoe.png">
	</div>
	
	<div id="footer" class="col-12" align="center">Worldwide Shipping now available</div>

</body>
</html>