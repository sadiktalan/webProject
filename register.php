<?php 
include("./dbconn.php");
?>

<html>
	<head>
		<title>ANA SAYFA</title>
	</head>
	
	<body>
		<table border="1" cellspacing="0" cellpadding="0" bgcolor="#000000" align="center">

		<tr>
			<td style="background-repeat:no-repeat; background-size: cover;background-position: top-left;background-size: 100% 100%;background-image:	    	url(./images/PageDesignPictures/index.png)" colspan="2" height="152">
			</td>
		</tr>

		<tr height="100">
			<td colspan="2">
				<div style="color:#FFF;font:bold 14px tahoma;text-align:center">
					<h1>PLEASE LOGIN OR REGISTER TO LEARN MORE ABOUT GAMES</h1>
				</div>
			</td>
		</tr>

		<tr>
			<td height="600" border="0" bgcolor="#FFFFFF" valign="top">
				<table width="450" >
					<!--PHP LOGIN REGISTER GELECEK. -->
					<fieldset style="width:30%">
						<legend>SIGN UP</legend>
								<tr> 
									<form method="POST" action="registeration.php"> 
									<td>Name*</td>
									<td> <input type="text" name="name" required></td> 
								</tr> 
								<tr> 
									<td>Surname*</td>
									<td><input type="text" name="surname" required></td> 
								</tr>
								<tr> 
									<td>Age</td>
									<td> <input type="number" name="age"></td> 
								</tr>
								<tr> 
									<td>Nick*</td>
									<td> <input type="text" name="nick" required></td> 
								</tr> 
								<tr> 
									<td>Email* </td>
									<td><input type="email" name="email" required></td> 
								</tr> 
								<tr> 
									<td>Password* </td>
									<td><input type="password" name="pass" maxlength="16" required></td> 
								</tr> 
								<tr> 
									<td>Confirm Password* </td>
									<td><input type="password" name="cpass" maxlength="16" required></td> 
								</tr> 
								<tr> 
									<td><input id="button" type="submit" name="submit" value="Sign-Up"></td> 
								</tr>
								<tr>
									<td><a href="index.php">Log In</a></td>
								</tr>
									</form> 
					</fieldset> 
				</table>
			</td>

			<td width="400" bgcolor="#FFFFFF" style="float:left">
			
				<?php			
					$row = mysqli_query($con,"select photo from game ORDER BY RAND() LIMIT 9");
					$array = array();
					
					while ($item=mysqli_fetch_row($row))
						array_push($array,$item[0]);
				?>	
				
				<table width="400" border="0">
					<caption>
						GAMES
					</caption>
					<tbody>
						<tr height="200">
							<?php
								for($i=0;$i<3;$i++){
									$temp = './images/GamePictures/' . $array[$i];
									echo "<td style=\"display:inline;\"><img src=\"$temp\"width=\"130\"height=\"180\"/></td>";
								}
							?>
						</tr>
						<tr height="200">
							<?php
								for($i=3;$i<6;$i++){
									$temp = './images/GamePictures/' .  $array[$i];
									echo "<td style=\"display:inline;\"><img src=\"$temp\"width=\"130\"height=\"180\"/></td>";
								}
							?>
						</tr>
						<tr height="200">
							<?php
								for($i=6;$i<9;$i++){
									$temp = './images/GamePictures/' . $array[$i];
									echo "<td style=\"display:inline;\"><img src=\"$temp\"width=\"130\"height=\"180\"/></td>";
								}
							?>
						</tr>
				  </tbody>
				</table>
		   </td> 
		</tr>

		<tr>
			<td style="background-repeat:no-repeat; background-size: cover;background-position: top-left;background-size:100% 100%;
				background-image:url(./images/PageDesignPictures/index.png)" colspan="2" height="152">
			</td>
		</tr>

		</table>
	</body>
</html>