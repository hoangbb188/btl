<?php
include 'API/header.php';
include 'controller/trang-chu/C_user.php';
$res = array();
if(isset($_POST['email'],$_POST['password'])){
	$user = new C_user;
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	if(empty($email) || empty($password)){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Email hoặc Mật khẩu không được để trống');
	}elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Email không hợp lệ');
	}else
	$res = $user->DangNhap($email,md5($password));
}else{
	$res = array('trangthai'=>'loi',
				'thongbao'=>'Nhập thiếu thông tin');
}

$res['thongbao'] = '<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
    </button>'.$res['thongbao'].'!</div>';
echo json_encode($res);

	
?>