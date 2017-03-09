<?php 
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	include("./dbconn.php");
	
	if(isset($_POST['submit'])) { 
		$name = $_POST['name']; 
		$surname = $_POST['surname'];
		$age = $_POST['age'];
		$nick = $_POST['nick']; ;
		$email = $_POST['email']; 
		$password = $_POST['pass'];
		$cpass = $_POST['cpass'];
		
		$name = mysqli_real_escape_string($con, $name);
		$surname = mysqli_real_escape_string($con, $surname);
		$age = mysqli_real_escape_string($con, $age);
		$nick = mysqli_real_escape_string($con, $nick);
		$email = mysqli_real_escape_string($con, $email);
		$password = mysqli_real_escape_string($con, $password);
		$password = md5($password);
		$cpass = md5($cpass);
		
		if($cpass != $password){
			die("Passwords are not matched");
		}
		$sql = "SELECT email, nick FROM person WHERE email='$email' OR nick='$nick'";
		$res = mysqli_query($con,$sql) or die(mysqli_error($con));
		$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
		
		if(mysqli_num_rows($res) == 0) {
			$query2 = "INSERT INTO person(name,surname,age,email,password,nick) VALUES ('$name','$surname','$age','$email','$password','$nick')"; 
			$data = mysqli_query ($con,$query2) or die(mysqli_error($con));
			if($data) { echo "Thank you! You are now registered.";
				echo "</br> <a href=\"index.php\">LOGIN PAGE</a>";
			} 
			else { die("Opps! We have a problem here.."); } 
		}
		else { 
			if($row[nick]==$nick){ echo "Sorry.. Nick is already exist!"; }
			else { echo "Sorry.. E-mail is already exist!"; }
		}
	}
?>
