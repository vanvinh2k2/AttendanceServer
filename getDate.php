<?php
	require "connect.php";
	$s_id = $_POST['s_id'];
	$query = "SELECT SUBSTR(date_time,1,7) AS date_time,s_id FROM statustable GROUP BY date_time HAVING s_id = '$s_id'";
	$data = mysqli_query($connect,$query);
	$array = array();
	class Date{
		public $date;
		public function __construct($date){
			$this->date = $date;
		}
	}
	while($row = mysqli_fetch_assoc($data)){
		array_push($array, new Date($row['date_time']));
	}
	if(!empty($array)){
		$arr = array(
			'success' => true,
			'result' => $array
		);
	}else{
		$arr = array(
			'success' => false,
			'result' => $array
		);
	}
	echo json_encode($arr);
?>