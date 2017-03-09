<?php
	include("./dbconn.php");
	session_start();

	if($_SESSION['IsOn'] == 0){
		header("location: index.php");
	}

	$id=$_SESSION['PID']; 

	$currentSession = mysqli_query($con,"select count(PID) from person WHERE pid='$id'");
	$number = mysqli_num_rows($currentSession);
	if($number != 1){
		die("That user Id couldn't be found");	
	}

	$result3 = mysqli_query($con,"SELECT * FROM person where pid='$id'");

	while($row3 = mysqli_fetch_array($result3))
	{ 
		$name=$row3['name'];
		$nick=$row3['nick'];
		$surname=$row3['surname'];
		$age=$row3['age'];
		$email=$row3['email'];
		$photo=$row3['photo'];
		$Text=$row3['Pmessage'];
		$SiteAdmin=$row3['IsAdmin'];
		$RegisterDate=$row3['RegisterDate'];
	}

	$temp = './images/UserPictures/' .  $photo;
	
	if($_POST['submit']){
		if($name = $_POST['name']){
			$query = "UPDATE person SET name='$name' WHERE PID='".$id."'";
			mysqli_query($con,$query) or die(mysqli_error($con));
		}
		if($surname = $_POST['surname']){
			$query = "UPDATE person SET surname='$surname' WHERE PID='".$id."'";
			mysqli_query($con,$query) or die(mysqli_error($con));
		}
		if($age = $_POST['age']){
			$query = "UPDATE person SET age='$age' WHERE PID='".$id."'";
			mysqli_query($con,$query) or die(mysqli_error($con));
		}
		if($gender = $_POST['gender']){
			if($gender=="male")
				$gender=1;
			else if($gender=="female")
				$gender=0;
			else
				$gender=2;
			
			$query = "UPDATE person SET gender='$gender' WHERE PID='".$id."'";
			mysqli_query($con,$query) or die(mysqli_error($con));
		}
		if($bio = $_POST['bio']){
			$query = "UPDATE person SET Pmessage='$bio' WHERE PID='".$id."'";
			mysqli_query($con,$query) or die(mysqli_error($con));
		}
		header("location: MyProfile.php");
	}
	else if($_POST['cancel']){
		header("location: MyProfile.php");
	}
	
?>

<table width="450" border="2px" bgcolor="#A9E2F3" align="center" cellpadding="2">
  <tr>
    <td colspan="2">Your Profile Information </td>
	<td><div align="right"><a href="logout.php">Logout</a></div></td>
  </tr>
  <tr>
    <td rowspan="6"><img src="<?php echo $temp ?>" width="150" height="150" alt="no image found"/></td>
	
		<form action="" method="POST" id="edt">
		
    <td valign="top"><div align="left">Firstame:</div></td>
    <td valign="top"><input type="text" name="name" placeholder="name"></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Surname:</div></td>
    <td valign="top"><input type="text" name="surname" placeholder="surname"></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Age:</div></td>
    <td valign="top"><input type="number" name="age" placeholder="age"></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Gender:</div></td>
    <td valign="top">
		<select name="gender">
			<option value="male" selected>Male</option>
			<option value="female">Female</option>
			<option value="other">Other</option>
		</select>
	</td>
  </tr>
  <tr>
		<td valign="top"><div align="left">Biography:</div></td>
		<td valign="top">
			<textarea form="edt" name="bio" placeholder="Write something about you..." rows="3" cols="40"></textarea>
		</td>
	</tr>
	<tr>
		<td valign="top"></td>
		<td valign="top" border="0" align="center">
			<input type="submit" value="Apply" name="submit">
			<input type="submit" value="Cancel" name="cancel">
		</td>
	</tr>
		</form>
	<tr>
		<td valign="top" colspan="5"><div align="center">
			<form action="UploadPicture.php" method="post" enctype="multipart/form-data" align="center">
				Change Profile Picture: 
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload Image" name="submit"></div>
			</form>
		</td>
	</tr>
</table>