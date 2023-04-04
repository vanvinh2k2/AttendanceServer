<?php
	require "connect.php";
	$s_id = $_POST['s_id'];
	$query = "SELECT studenttable.st_id,studenttable.student_name,studenttable.sdt FROM classtable,studenttable WHERE classtable.s_id = '$s_id' and studenttable.st_id = classtable.st_id";
	$data = mysqli_query($connect,$query);
	class Student {
		public $st_id;
		public $student_name;
		public $sdt;
		public function __construct($st_id,$student_name,$sdt){
			$this->st_id = $st_id;
			$this->student_name = $student_name;
			$this->sdt = $sdt;
		}
	}
	$arrayStudent = array();
	while($row = mysqli_fetch_assoc($data)){
		array_push($arrayStudent, new Student($row['st_id'],$row['student_name'],$row['sdt']));
	}
	if(!empty($arrayStudent)){
		$arr = array(
			'success' => true,
			'message' => "Đăng nhập thành công",
			'result' => $arrayStudent
		);
	}else{
		$arr = array(
			'success' => false,
			'message' => "Email hoặc password ko chính xác",
			'result' => $arrayStudent
		);
	}
	echo json_encode($arr);
?>