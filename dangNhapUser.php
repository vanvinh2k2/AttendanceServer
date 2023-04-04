<?php
	require "connect.php";
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "SELECT * FROM teachertable WHERE email = '$email' AND password = '$password'";
	$data = mysqli_query($connect,$query);
	class User{
		public $t_id;
		public $teacher_name;
		public $email;
		public $password;
		public function __construct($t_id,$teacher_name,$email,$password){
			$this->t_id = $t_id;
			$this->teacher_name = $teacher_name;
			$this->email = $email;
			$this->password = $password;
		}
	}
	$arrayUser = array();
	while($row = mysqli_fetch_assoc($data)){
		array_push($arrayUser, new User($row['t_id'],$row['teacher_name'],$row['email'],$row['password']));
	}
	if(!empty($arrayUser)){
		$arr = array(
			'success' => true,
			'message' => "Đăng nhập thành công",
			'result' => $arrayUser
		);
	}else{
		$arr = array(
			'success' => false,
			'message' => "Email hoặc password ko chính xác",
			'result' => $arrayUser
		);
	}
	echo json_encode($arr);
?>