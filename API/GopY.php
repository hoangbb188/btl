<?php
include 'API/header.php';
include 'controller/trang-chu/C_user.php';
$res = array();
if(isset($_POST['rate'],$_POST['binhluan'],$_POST['contact'])){
	$user = new C_user;
	$rate = intval($_POST['rate']);
	$binhluan = addslashes($_POST['binhluan']);
	$email_lh = addslashes($_POST['contact']);
	if($binhluan == '' || $email_lh == ''){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Thông tin không được để trống');
	}elseif(filter_var($email_lh, FILTER_VALIDATE_EMAIL) === false){ 
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Email không hợp lệ');
	}else{
		$res = $user->GuiGopY($rate,$binhluan,$email_lh);
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