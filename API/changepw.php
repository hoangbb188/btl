<?php
include 'API/header.php';
include 'controller/trang-chu/C_user.php';
$res = array();
if(isset($_POST['old_password'],$_POST['new_password'],$_POST['email'])){
	$user = new C_user;
	$email = $user->ChongHack($_POST['email']);
	$old_password = md5($_POST['old_password']);
	$new_password = md5($_POST['new_password']);

	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Email không hợp lệ');
	}elseif((isset($_SESSION['trangchu'])&&$_SESSION['trangchu']['TaiKhoan']==$email) || (isset($_SESSION['quanly'])&&$_SESSION['quanly']['TaiKhoan']==$email))
		$res = $user->DoiMatKhau($old_password,$new_password,$email);
	else $res = array('trangthai'=>'loi',
						'thongbao'=>'Bạn không đăng nhập email này');

}else{
	$res = array('trangthai'=>'loi',
				'thongbao'=>'Thiếu thông tin');
}

$res['thongbao'] = '<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
    </button>'.$res['thongbao'].'!</div>';
echo json_encode($res);