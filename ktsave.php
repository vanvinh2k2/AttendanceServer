<?php
	require "connect.php";
	$s_id = $_POST['s_id'];
	$date_time = $_POST['date_time'];
	$query = "SELECT * FROM statustable AS st WHERE st.s_id = $s_id AND st.date_time = '$date_time'";
	$data = mysqli_query($connect,$query);
	$kt = mysqli_num_rows($data);
	if($kt != 0){
		$arr = array(
			'success' => true, 
			'result' => $kt
		);
	}else{
		$arr = array(
			'success' => false, 
			'result' => $kt
		);
	}
	echo json_encode($arr);
?>