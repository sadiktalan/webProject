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
		$gender=$row3['gender'];
		$email=$row3['email'];
		$photo=$row3['photo'];
		$Text=$row3['Pmessage'];
		$SiteAdmin=$row3['IsAdmin'];
		$RegisterDate=$row3['RegisterDate'];
	}

	$temp = './images/UserPictures/' .  $photo;
?>
<p align="center">
	<a href="home.php">HOME</a>
</p>
<p align="center">
	<a href="EditProfile.php">EDIT PROFILE</a>
</p>
<table width="450" border="2" bgcolor="#A9E2F3" align="center" cellpadding="2">
  <tr>
    <td height="26" colspan="2">Profile Information </td>
	<td><div align="center"><a href="logout.php">Logout</a></div></td>
  </tr>
  <tr>
    <td rowspan="6" align="center"><img src="<?php echo $temp ?>" width="150" height="150" alt="no image found"/></td>
    <td valign="top"><div align="left">Nick:</div></td>
    <td valign="top"><?php echo $nick ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Firstame:</div></td>
    <td valign="top"><?php echo $name ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Surname:</div></td>
    <td valign="top"><?php echo $surname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Age:</div></td>
    <td valign="top"><?php echo $age ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Gender:</div></td>
    <td valign="top"><?php if($gender==1) echo "Male"; else if($gender==0) echo "Female"; else echo "Other"; ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Mail Address: </div></td>
    <td valign="top"><?php echo $email ?></td>
  </tr>
  <tr>
    <td valign="top" colspan="1"><div align="left">Biography:</div></td>
    <td valign="top" colspan="2"><?php echo $Text ?></td>
  </tr>
</table>