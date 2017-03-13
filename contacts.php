<!DOCTYPE html>
<html>
<head>
	<title>Akornor</title>
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
		</div>
		
		<?php
		// define variables and set to empty values
		$nameErr = $emailErr = /*$commErr =*/ "";
		$name = $email = $comments = "";

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
		  if (empty($_POST["comments"])) {
		    $comments = "";
		  } else {
		    $comments = test_input($_POST["comments"]);
		  }
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		
		// add database code here
		
		//make database connection 
		$dbcon = mysqli_connect('localhost','root','','lab');
		//check if connection is successful
		if(!$dbcon){
			echo 'Database connection failed';
			//exit();
		}
		else{
			echo 'connection succesful';
			//write query
			$sql = sprintf("INSERT INTO users(user_name, user_email, user_comment)
					VALUES('%s','%s','%s')", 			
					mysqli_real_escape_string($dbcon, $name),
					mysqli_real_escape_string($dbcon, $email),
					mysqli_real_escape_string($dbcon, $comments)
					);
			//execute query
			$exec = mysqli_query($dbcon,$sql);
			if(!$exec){
				echo mysql_error();
			}
			//else{
				//$dbcon.close();
			//}
		}
		
		
		?>

		<h2>Kindly fill the form below to leave your details</h2>
		<p><span class="error">* required field.</span></p>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		  Name: <input type="text" name="name">
		  <span class="error">* <?php echo $nameErr;?></span>
		  <br><br>
		  E-mail: <input type="text" name="email">
		  <span class="error">* <?php echo $emailErr;?></span>
		  <br><br>
		  Comment: <textarea name="comments" rows="5" cols="40"></textarea>
		  <!--span class="error">* <?php echo $commErr;?></span-->
		  <br><br>

		  <input type="submit" name="submit" value="Submit">  
		</form>

		<?php
		echo "<h2>Your Input:</h2>";
		echo $name;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $comments;
		echo "<br>";
		?>	
	</div>

	<div class="col-12" align="center">
		<img src="shoe.png">
	</div>
	
	<div id="footer" class="col-12" align="center">Worldwide Shipping now available</div>

</body>
</html>





