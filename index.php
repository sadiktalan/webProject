<?php 
include("./dbconn.php");
session_start();
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
					<h1>PLEASE LOGIN OR REGISTER TO LEARN MORE ...</h1>
				</div>
			</td>
		</tr>

		<tr>
			<td height="600" border="0" bgcolor="#FFFFFF" valign="top">
				<table width="450">
					<!--PHP LOGIN REGISTER GELECEK. -->
					<fieldset style="width:30%">
						<legend>LOGIN</legend>
							<tr> 
								<form method="POST" action="login.php">  
							</tr>
							<tr> 
								<td>Email </td>
								<td><input type="email" name="email" ></td> 
							</tr> 
							<tr> 
								<td>Password </td>
								<td><input type="password" name="pass"></td> 
							</tr> 
							<tr> 
								<td><input id="button" type="submit" name="Login" value="Log-in"></td> 
							</tr> 
							<tr> 
								<td><a href="register.php">Sign Up</a></td> 
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