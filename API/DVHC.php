<?php
include 'API/header.php';
include 'controller/C_DVHC.php';
$dvhc = new C_DVHC;
if(isset($_POST['t'])){
	$t = isset($_POST['t']) && !empty($_POST['t']) ? htmlspecialchars(($_POST['t'])) : '01';
	echo json_encode($dvhc->HienThiDanhSachHuyen($_POST['t']));
}else{
	$dvhc = new C_DVHC;
	echo json_encode($dvhc->HienThiDanhSachTinh());
}
?>