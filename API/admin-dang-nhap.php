<?php
include 'API/header.php';
include 'controller/quan-ly/C_user.php';
$res = array();
if(empty($_POST['taikhoan']) || empty($_POST['matkhau'])){
    $res = array('trangthai'=>'loi',
				'thongbao'=>'Nhập thiếu thông tin');
}else{
    $user = new C_user;
    $email = trim($_POST['taikhoan']);
    $password = trim($_POST['matkhau']);
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){ 
        $res = array(  'trangthai' => 'loi',
                    'thongbao' => 'Email không hợp lệ');
    }else{
        $res = $user->DangNhap($email,md5($password));
    }
    
}

$res['thongbao'] = '<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
    </button>'.$res['thongbao'].'!</div>';
echo json_encode($res);