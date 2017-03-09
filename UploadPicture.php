<?php
	include("./dbconn.php");
	session_start();
	$target_dir = "images\userPictures\\";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 2097152) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else{
		//if($_SESSION['bd']){
		$temp = $_FILES["fileToUpload"]["name"];
		
		$sq2 = "SELECT photo FROM person WHERE PID='".$_SESSION['PID']."'";
		$rr = mysqli_query($con, $sq2);
		$rr1 = mysqli_fetch_row($rr);
		
		$sq = "SELECT COUNT(PID) FROM person WHERE photo='$temp' and PID='".$_SESSION['PID']."'";
		$r = mysqli_query($con, $sq);
		$r1 = mysqli_fetch_row($r);
		
		if($r1[0] == 1){
			unlink($target_file);
		} else {
			if($rr1[0] !== 'default.jpg')
				unlink($target_dir . basename($rr1[0]));
			while(file_exists($target_file)){
				$t = strtok($temp, '.');
				$t2 = strtok('.');
				$t .= "1";
				$temp = $t.".".$t2;
				$target_file = $target_dir . basename($temp);
			}
		}
		$target_file = $target_dir . basename($temp);
		//}
		
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename($temp). " has been uploaded.";
			echo "<html><br><a href=\"MyProfile.php\">My Profile</a></html>";
			$temp2 = $_SESSION['PID'];
			$sql = "UPDATE person SET photo='$temp' WHERE PID='$temp2'";
			mysqli_query($con,$sql);
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
?>