<?php
include 'controller/quan-ly/C_phong.php';
$MKs = !empty($_POST['MKs']) ? intval($_POST['MKs']) : 0;
$res = array('cc');
if($MKs){
    $phong = new C_phong;
    $res = $phong->DanhSachPhong($MKs,1,999,1);
}
echo json_encode($res);
?>