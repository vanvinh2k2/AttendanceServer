<?php
	require "connect.php";
	$s_id = $_POST['s_id'];
	$date_time = $_POST['date_time'];
        $date = $date_time."%";
	$query = "SELECT status,st_id,SUBSTR(date_time,9,10) AS date FROM statustable WHERE date_time LIKE '$date' and s_id = $s_id";
	$data = mysqli_query($connect,$query);
        class Status{
                public $status;
                public $st_id;
                public $date_tim;
                function __construct($status, $st_id, $date_tim){
                        $this->status = $status;
                        $this->st_id = $st_id;
                        $this->date_tim = $date_tim;
                }
        }
        $array = array();
	while($row = mysqli_fetch_assoc($data)){
		//$status = $row['status'];
                array_push($array,new Status($row['status'], $row['st_id'], $row['date']));
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