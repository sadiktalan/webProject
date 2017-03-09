<?php
	include("./dbconn.php");
	session_start();
	
	if($_SESSION['IsOn'] == 0){
		header("location: index.php");
	}
	$b = 0;
	$nick=$_SESSION['nick'];
	$PID=$_SESSION['PID'];
	
	if($GID = ($_GET['GID'])){
		$result3 = mysqli_query($con,"SELECT * FROM game where GID='$GID'");
	}
	else if($name2 = ($_GET['name'])){
		$result3 = mysqli_query($con,"SELECT * FROM game where name='$name2'");
		$b =1;
	}
	else
		die("THERE IS NO SUCH GAME!");
	
	$row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
	if($b==1)
		$GID = $row3['GID'];
	
	if($_POST['comment2']){
		if($newmess = $_POST['comment99']){
			$newmess2 = $newmess;
			$newmess = trim($newmess);
			$newmess = strip_tags($newmess);
			$newmess = htmlspecialchars($newmess);
			if($newmess2 == $newmess){
				$result99 = mysqli_query($con,"INSERT INTO comments(PID,GID,message) VALUES('$PID','$GID','$newmess')");
				
			}
			else{
				die("PLEASE BE CAREFULL ABOUT CHARACTER YOU USE");
			}

			
		//	header("GameProfile.php");
		}
	}

	$name=$row3['name'];

	if(!$name)
		die("THERE IS NO SUCH GAME!");

	$cname=$row3['CompanyName'];
	$age=$row3['agelimit'];
	$email=$row3['email'];
	$photo=$row3['Photo'];
	$Text="";
	$genre=$row3['Genre'];

	$temp = './images/gamePictures/' .  $photo;
	
?>
<p align="center"><a href="home.php">HOME</a></p>
<table width="398" border="0" align="center" cellpadding="0">
  <tr>
    <td height="26" colspan="2">Game Informations </td>
  </tr>
  <tr>
    <td width="129" rowspan="5"><img src="<?php echo $temp ?>" width="129" height="129" alt="no image found"/></td>
    <td width="82" valign="top"><div align="left">GameName:  </div></td>
    <td width="165" valign="top"><?php echo $name ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">CompanyName: </div></td>
    <td valign="top"><?php echo $cname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">AgeLimit: </div></td>
    <td valign="top"><?php echo $age ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Biography: </div></td>
    <td valign="top"><?php echo $Text ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Genre: </div></td>
    <td valign="top"><?php echo $genre ?></td>
  </tr>
</table>

<table width="600" border="2px" bgcolor="#A9E2F3" align="center" cellpadding="0">
  <tr>
  <td align="center" style="color : blue">Comments</td>  </tr>
</table>
<table width="600" border="2px" bgcolor="#A9E2F3" align="center" cellpadding="0">
<?php 

	$nick=$_SESSION['nick'];
	$PID=$_SESSION['PID'];
	$comment =mysqli_query($con,"SELECT CID,message FROM comments,game where game.GID='$GID'  ORDER BY(Date)");
	$com = mysqli_query($con,"SELECT count(CID) FROM comments where comments.GID='$GID' ");
	$tot = mysqli_fetch_row($com);
	$total = $tot[0];
	$que =mysqli_query($con,"SELECT person.name,person.surname,person.PID,comments.message 
		FROM person,comments 
		where person.PID=comments.PID 
		and comments.GID='$GID' ");

for($z=0;$z <= $total ; $z++){
		

	
	
		$res = mysqli_fetch_array($comment,MYSQLI_ASSOC);
		$CID = $res['CID'];
	
		$dates = $res['date'];
		
		$res2 = mysqli_fetch_array($que,MYSQLI_ASSOC);
		$CONAME =$res2['name'] ;
		$COSURNAME =$res2['surname'] ;
		$PPID= $res2['PID'];
		$mes = $res2['message'];

echo
"<tr>
    <td align=\"center\" style=\"color : red; word-wrap: break-word; max-width: 50px;\"><b>" . $CONAME . $COSURNAME . "</b></td>
    <td style =\"word-wrap: break-word; max-width: 150px;\">" . $mes . "</td>
</tr>";
}
?>

</table>
	
<table width="600" border="2px" bgcolor="#A9E2F3" align="center" border="0" cellpadding="0">
<tr>
		<form action ="" method="POST" id="com">
		<td>
			  New Comment: <textarea form="com" name="comment99" style="resize:none" rows="5" cols="50"></textarea><br>
		</td>
		<td>
			<input id="button" type="submit" name="comment2" value="Send Comment">
		</td> 
	</tr>  	
</table>