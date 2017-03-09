<?php 
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	
	define('dbhost','localhost');
	define('dbuser','root');
	define('dbpassword','');
	define('database','project');
		
	$con = mysqli_connect(dbhost,dbuser,dbpassword,database)or die(mysqli_connect_error());
?>
