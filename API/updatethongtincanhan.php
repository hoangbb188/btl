<?php
include 'API/header.php';
include 'controller/trang-chu/C_user.php';
$res = array();
if(isset($_POST['ten'],$_POST['sdt'],$_POST['diachi'],$_POST['TP'], $_POST['email'])){
	$user = new C_user;

	$email = $user->ChongHack($_POST['email']);
	$ten = $user->ChongHack($_POST['ten']);
	$sdt = $user->ChongHack($_POST['sdt']);
	$diachi = $user->ChongHack($_POST['diachi']);
	$TP = $user->ChongHack($_POST['TP']);
	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Email không hợp lệ');
	}elseif((isset($_SESSION['trangchu'])&&$_SESSION['trangchu']['TaiKhoan']==$email) || (isset($_SESSION['quanly'])&&$_SESSION['quanly']['TaiKhoan']==$email))
		$res = $user->SuaThongTin($ten,$sdt,$diachi,$TP,$email);
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