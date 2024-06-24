<?php
include 'API/header.php';
include 'controller/trang-chu/C_user.php';
$res = array();
if(isset($_SESSION['trangchu'])){
	if(isset($_POST['ten'],$_POST['sdt'],$_POST['TP'],$_POST['code'],$_POST['hotel'],$_POST['room'],$_POST['soluong'])){
		$user = new C_user;
		$data = array('ten' => '','sdt' => '','TP' => '','code' => '','hotel' => '','room' => '','soluong' => 1);
		foreach ($data as $key => $value) {
			$data[$key] = isset($_POST[$key]) ? $user->ChongHack($_POST[$key]) : '';
		}
		
		if(empty($data['ten']) || empty($data['sdt']) || empty($data['TP']) || empty($data['hotel'])|| empty($data['room']) || empty($data['soluong'])){
			$res = array(	'trangthai' => 'loi',
							'thongbao' => 'Nhập thiếu thông tin');
		}else{
			//echo $data['soluong'];
			$res = $user->ThanhToan($data);
		}
	}
}else{
	$res = array('trangthai' => 'loi',
	'thongbao' => 'Vui lòng dăng nhập lại');
}
$res['thongbao'] = '<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
    </button>'.$res['thongbao'].'!</div>';
echo json_encode($res);