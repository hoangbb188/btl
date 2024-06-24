<?php
include 'API/header.php';
include 'controller/quan-ly/C_user.php';
$res = array();
if(isset($_POST['email'], $_POST['tien']))
{
	$email_nt = addslashes($_POST['email']);
	$tien = intval($_POST['tien']);
	if(filter_var($email_nt, FILTER_VALIDATE_EMAIL) === false){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Email không hợp lệ');
	}else if(empty($email_nt) || empty($tien)){
		$res = array('trangthai'=>'loi',
		'thongbao'=>'Nhập thiếu thông tin');
	}else{
		$user = new C_user;
		$res = $user->NapTien($email_nt,$tien);
	}
	
} else {
	$res = array('trangthai'=>'loi',
	'thongbao'=>'Nhập thiếu thông tin');
}
$res['thongbao'] = '<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
    </button>'.$res['thongbao'].'!</div>';
echo json_encode($res);

?>