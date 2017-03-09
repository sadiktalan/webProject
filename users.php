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
		<title>USERS</title>
	</head>
	
	<body>
		<table border="1" cellspacing="0" cellpadding="0" bgcolor="#000000" align="center">

		<tr>
			<td style="background-repeat:no-repeat; background-size: cover;background-position: top-left;background-size: 100% 100%;background-image:url(./images/PageDesignPictures/index.png)" colspan="3" height="152">
			</td>
		</tr>
		
		<tr bgcolor="#8884FF">
			<td bgcolor="#1FFF27" style="float:right">
				<a href = "logout.php">Sign Out</a>
			</td>
            <td bgcolor="#1FFF27" style="float:right">
				Welcome <?php echo $nick; ?>. Click Here to
			</td>
			<td bgcolor="#8884FF" style="float:left">
            <form action="userProfile" method="get" target="_blank">
            	<input type = "text" name="nick" placeholder="Search User with nick"></input>
                <input type="submit" value="Search">
			</form>
			</td>
			<td bgcolor="#8884FF" style="float:right">
            <form action="userProfile" method="get" target="_blank">
            	<input type = "text" name="PID" placeholder="Search Game with name"></input>
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
					
					$row2 = mysqli_query($con,"select count(PID) from person");
					$number = mysqli_fetch_row($row2);
					$photo = array();
					$nick = array();
					$PID = array();
					$numberOfRows = $number[0];  //TOTAL GAME NUMBER
					$numberOfPages = intval( ($numberOfRows -1)/6 ) + 1 ; //HOW MANY PAGES DO WE NEED
					
					$startPoint = $currentPage * 6;
					if( ($currentPage +1) *6 <  $numberOfRows )
						$need = 6 ;
					else
						$need =  $numberOfRows - ($currentPage * 6 );
						
						
					$row = mysqli_query($con,"select * from person LIMIT $startPoint,$need");

							
					while ($item == mysqli_fetch_array($row)){
						array_push($photo,$item['photo']);
						array_push($nick,$item['nick']);
						array_push($PID,$item['PID']);
					}
					
				?>
				
				<table width="400" border="0">
					<caption>
						USERS
					</caption><tr>
					<tbody>
						<tr height="280">
							<?php
								for($i=0;$i<2;$i++){
									if($i<$need){
												$temp = './images/userPictures/' .  $photo[$i];
												echo "<td style=\"display:inline;\"><a href='userProfile.php?PID=$PID[$i]' target=\"_blank\"><img src=\"$temp\"width=\"195\"height=\"270\"/></a>$nick[$i]</td>";
									}
								}
							?>
						</tr>
						<tr height="280">
							<?php
								for($i=2;$i<4;$i++){
									if($i<$need){
												$temp = './images/userPictures/' .  $photo[$i];
												echo "<td style=\"display:inline;\"><a href='userProfile.php?PID=$PID[$i]' target=\"_blank\"><img src=\"$temp\"width=\"195\"height=\"270\"/></a>$nick[$i]</td>";
									}
								}
							?>
						</tr>
						<tr height="280" >
							<?php
								for($i=4;$i<6;$i++){
									if($i<$need){
												$temp = './images/userPictures/' .  $photo[$i];															
												echo "<td style=\"display:inline;\"><a href='userProfile.php?PID=$PID[$i]' target=\"_blank\"><img src=\"$temp\"width=\"195\"height=\"270\"/></a>$nick[$i]</td>";
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
								echo "<li><a href='users.php?page=$i'>$i</a></li>"    
						?>
                        <li><a href='home.php'>GAMES</a></li>
                        <?php 
								if($_SESSION['IsOn']==1)
							       echo 	"<li><a href='MyProfile.php' target=\"_blank\">MyPROFILE</a></li>";
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