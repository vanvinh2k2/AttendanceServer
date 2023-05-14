<?php
	require "connect.php";
	$list_status = $_POST['listStatus'];
	$detail = json_decode($list_status, true);
	foreach ($detail as $key => $value) {
		$st_id = $value["st_id"];
		$s_id = $value["s_id"];
		$date_time = $value["date_time"];
		$status = $value["status"];
		$query= "INSERT INTO statustable VALUES('$st_id', '$s_id', '$date_time', '$status')";
		$data = mysqli_query($connect, $query);
	}
	if($data){
		$arr = array(
			'success' => true,
			'result' => "Save is successful"
		);
	}else{
		$arr = array(
			'success' => false,
			'result' => "Save is unsuccessful"
		);
	}
	echo json_encode($arr);
?>