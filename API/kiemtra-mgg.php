<?php
include 'API/header.php';
include 'controller/trang-chu/C_mgg.php';

$res = array();
$id = array();
if(isset($_POST['mgg'],$_POST['hotel'])){
	$mgg = addslashes($_POST['mgg']);
	$id['hotel'] = intval($_POST['hotel']);
	$_mgg = new C_mgg;
	$res = $_mgg->KiemTra($mgg,$id['hotel']);
}else{
	$res = array('trangthai'=>'loi',
				'thongbao'=>'Nhập thiếu thông tin');
}

$res['thongbao'] = '<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
    </button>'.$res['thongbao'].'!</div>';
echo json_encode($res);
?>