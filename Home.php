<?php 
include("./dbconn.php");
session_start();

if($_SESSION['IsOn'] == 0){
	header("location: index.php");
}
$nick=$_SESSION['nick'];
?>

<html>
	<head>
		<title>Games</title>
	</head>
	
	<body>
		<table border="0" cellspacing="0" cellpadding="0" bgcolor="#000000" align="center">

		<tr>
			<td style="background-repeat:no-repeat; background-size: cover;background-position: top-left;background-size: 100% 100%;background-image:url(./images/PageDesignPictures/index.png)" colspan="3" height="152">
			</td>
		</tr>
		
		<tr bgcolor="#8884FF">
			<td bgcolor="#8884FF" style="float:right">
				<a href = "logout.php">Sign Out</a>
			</td>
            <td bgcolor="#8884FF" style="float:right">
				Welcome <?php echo $nick; ?>. Click Here to 
			</td>
			<td bgcolor="#8884FF" style="float:left">
            <form action="userProfile.php" method="get" target="_blank">
            	<input type = "search" name="nick" placeholder="Search User with nick"></input>
                <input type="submit" value="Search">
			</form>
			</td>
			<td bgcolor="#8884FF" style="float:right">
            <form action="GameProfile.php" method="get" target="_blank">
            	<input type = "search" name="name" placeholder="Search Game with name"></input>
                <input type="submit" value="Search">
			</form>
			</td>
		</tr>

		<tr align="center">
			<td width="850" bgcolor="#8884FF" style="border-left-width:0;">
			
				<?php			
					$currentPage = htmlspecialchars($_GET['page']);
					if(!$currentPage)
						$currentPage = 0;
					
					$row2 = mysqli_query($con,"select count(GID) from game");
					$number = mysqli_fetch_row($row2);
					$photo = array();
					$GID = array();
					$numberOfRows = $number[0];  //TOTAL GAME NUMBER
					$numberOfPages = intval( ($numberOfRows -1)/18 ) + 1 ; //HOW MANY PAGES DO WE NEED
					
					$startPoint = $currentPage * 18;
					if( ($currentPage +1) *18 <  $numberOfRows )
						$need = 18 ;
					else
						$need =  $numberOfRows - ($currentPage * 18 );
						
					$row = mysqli_query($con,"select photo from game ORDER BY(GID) LIMIT $startPoint,$need");
					$row3 = mysqli_query($con,"select GID from game ORDER BY(GID) LIMIT $startPoint,$need");

							
					while ($item=mysqli_fetch_row($row)){
						$item2=mysqli_fetch_row($row3);
						array_push($photo,$item[0]);
						array_push($GID,$item2[0]);
					}
					
				?>	
				
				<table width="400" border="0">
					<caption>
						GAMES
					</caption>
					<tbody>
						<tr height="200">
							<?php
								for($i=0;$i<6;$i++){
									if($i<$need){
												$temp = './images/GamePictures/' .  $photo[$i];
												echo "<td style=\"display:inline;\"><a href='gameProfile.php?GID=$GID[$i]' target=\"_blank\"><img src=\"$temp\"width=\"130\"height=\"180\"/></a></td>";
									}
								}
							?>
						</tr>
						<tr height="200">
							<?php
								for($i=6;$i<12;$i++){
									if($i<$need){
												$temp = './images/GamePictures/' .  $photo[$i];
												echo "<td style=\"display:inline;\"><a href='gameProfile.php?GID=$GID[$i]' target=\"_blank\"><img src=\"$temp\"width=\"130\"height=\"180\"/></a></td>";
									}
								}
							?>
						</tr>
						<tr height="200">
							<?php
								for($i=12;$i<18;$i++){
									if($i<$need){
												$temp = './images/GamePictures/' .  $photo[$i];
												echo "<td style=\"display:inline;\"><a href='gameProfile.php?GID=$GID[$i]' target=\"_blank\"><img src=\"$temp\"width=\"130\"height=\"180\"/></a></td>";
									}
								}
							?>
						</tr>
                        <tr><style type="text/css"> #Gri-Sayfa-Num ul li a 
						{ 	text-decoration: none; 	color: #000; font-family: Tahoma; font-size: 17px;display: block; padding-right:8px; 	                             padding-left: 8px; padding-top: 5px; padding-bottom: 5px; 	
						     margin-right: 5px; 	margin-left: 5px; 	background-color: #E6E6E6; 	border: thin solid #999; 	border-radius:                              8px;	-moz-border-radius: 8px; -webkit-border-radius: 8px; } #Gri-Sayfa-Num ul li a:hover 
						{ 	background-color: #CCC; 	text-decoration: underline; } #Gri-Sayfa-Num ul 
						{ 	list-style-type: none; 	margin: 0px; 	padding: 0px; 	float: none; } #Gri-Sayfa-Num ul li 
						{ 	float: left; } </style> 
                        
                        <div id="Gri-Sayfa-Num"> <ul>
                        <?php 
							for($i=0; $i < $numberOfPages ; $i++)  
								echo "<li><a href='home.php?page=$i'>$i</a></li>";
						?>
                        <?php 
								if($_SESSION['IsOn']==1)
							       echo 	"<li><a href='MyProfile.php' target=\"_blank\">My Profile</a></li>";
						?>

                         </ul> </div>
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