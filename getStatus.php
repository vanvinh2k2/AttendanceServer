<?php
	require "connect.php";
	$s_id = $_POST['s_id'];
	$st_id = $_POST['st_id'];
	$date_time = $_POST['date_time'];
	$query = "SELECT status FROM statustable WHERE st_id = $st_id and date_time = '$date_time' and s_id = $s_id";
	$data = mysqli_query($connect,$query);
	while($row = mysqli_fetch_assoc($data)){
		$status = $row['status'];
	}
	if(!empty($status)){
		$arr = array(
			'success' => true,
			'status' => $status
		);
	}else{
		$arr = array(
			'success' => false,
			'status' => ""
		);
	}
	
	echo json_encode($arr);
?>