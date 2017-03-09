<?php
	ob_start();
	session_start();
	require_once 'dbconn.php';
	
 	if (isset($_SESSION['PID'])) {
		header("Location: home.php");
		exit;
	}
	$error = false;

	if( isset($_POST['Login']) ) { 
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs

		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
			echo $emailError;
		}

		if(empty($pass)){
			$error = true;
			echo "Please enter your password.";
		}

		// if there's no error, continue to login
		if (!$error) {
			$pass = md5($pass);
			
			$password = hash('sha256', $pass); // password hashing using SHA256
			
			$res=mysqli_query($con,"SELECT PID, nick, password FROM person WHERE email='$email'");
			$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
			$count = mysqli_num_rows($res); // if nick/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['password']==$pass ) {
				$_SESSION['PID'] = $row['PID'];
				$_SESSION['nick'] = $row['nick'];
				$_SESSION['IsOn'] = 1;
				header("Location: home.php");
			}
			else {
				echo "Incorrect password or nick, Try again...";
			}
		}
	}
?>