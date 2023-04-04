<?php
	require "connect.php";
	$t_id = $_POST['t_id'];
	$query = "SELECT * FROM subjecttable WHERE t_id = '$t_id'";
	$data = mysqli_query($connect,$query);
	class ClassRoom {
		public $s_id;
		public $t_id;
		public $subject_code;
		public $subject_name;
		public function __construct($s_id,$t_id,$subject_code,$subject_name){
			$this->s_id = $s_id;
			$this->t_id = $t_id;
			$this->subject_code = $subject_code;
			$this->subject_name = $subject_name;
		}
	}
	$arrayClass = array();
	while($row = mysqli_fetch_assoc($data)){
		array_push($arrayClass, new ClassRoom($row['s_id'],$row['t_id'],$row['subject_code'],$row['subject_name']));
	}
	if(!empty($arrayClass)){
		$arr = array(
			'success' => true,
			'message' => "Đăng nhập thành công",
			'result' => $arrayClass
		);
	}else{
		$arr = array(
			'success' => false,
			'message' => "Bạn hiện tại chưa có danh sách lớp",
			'result' => $arrayClass
		);
	}
	echo json_encode($arr);
?>