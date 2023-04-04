<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "attendance";	
	$connect = mysqli_connect($host,$user,$pass,$database);
	mysqli_query($connect,"SET NAMES 'utf8'");
?>