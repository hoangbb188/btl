<?php
include 'API/header.php';
include 'controller/trang-chu/C_user.php';
$res = array();
if(isset($_POST['MKs'],$_POST['rate_vitri'],$_POST['rate_phucvu'],$_POST['rate_tiennghi'],$_POST['rate_giaca'],$_POST['rate_vesinh'],$_POST['nhanxet'],$_SESSION['trangchu'])){
	$user = new C_user;
	$rate_vitri = intval($_POST['rate_vitri']);
	$rate_phucvu = intval($_POST['rate_phucvu']);
	$rate_tiennghi = intval($_POST['rate_tiennghi']);
	$rate_giaca = intval($_POST['rate_giaca']);
	$rate_vesinh = intval($_POST['rate_vesinh']);
	$MKs = intval($_POST['MKs']);
	$nhanxet = addslashes($_POST['nhanxet']);
	if(!isset($_SESSION['trangchu'])){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Đăng nhập mới đánh giá được dân chơi ạ');
	}else if($rate_vitri <= 0 || $rate_phucvu <= 0 || $rate_tiennghi <= 0 || $rate_giaca <= 0 || $rate_vesinh <= 0 || $MKs <= 0 ||  $nhanxet == '' ){
		$res = array(	'trangthai' => 'loi',
						'thongbao' => 'Thông tin không được để trống');
	}else{
		$res = $user->DanhGia($MKs,$rate_vitri,$rate_phucvu,$rate_tiennghi,$rate_giaca,$rate_vesinh,$nhanxet);
	}
}else{
	$res = array('trangthai'=>'loi',
				'thongbao'=>'Thiếu thông tin');
}

$res['thongbao'] = '<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
    </button>'.$res['thongbao'].'!</div>';
echo json_encode($res);
?>