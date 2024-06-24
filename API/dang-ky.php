<?php
include 'API/header.php';
include 'controller/trang-chu/C_user.php';
$res = array();
if(isset($_POST['email'],$_POST['password'],$_POST['re_password'])){
	$user = new C_user;
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$re_password = trim($_POST['re_password']);
	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Email không hợp lệ');
	}elseif(empty($email) || empty($password)){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Tài khoản hoặc mật khẩu không được để trống');
	}elseif($password != $re_password){
		$res = array(	'trangthai'=>'loi',
						'thongbao'=>'Mật khẩu nhập lại không khớp');
	}else{
		$data = array('TaiKhoan' =>"$email", 
					'MatKhau'=> md5($password)
					);
		$res = $user->DangKy($data);
	}
}else{
	$res = array('trangthai'=>'loi',
				'thongbao'=>'Nhập thiếu thông tin');
}

$res['thongbao'] = '<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
    </button>'.$res['thongbao'].'!</div>';
echo json_encode($res);

	
?>