<?php
include 'API/header.php';
include 'controller/trang-chu/C_khachsan.php';

$res = array('imagesRoom' => array(), 'convenience' => array());
if(!empty($_POST['id_room']) && !empty($_POST['id_hotel'])){
    $id_room = intval($_POST['id_room']);
    $id_hotel = intval($_POST['id_hotel']);
    $ks = new C_khachsan;
    $res['convenience'] = $ks->GetTienIchPhong($id_room);
    $res['imagesRoom'] = $ks->LayThuVienAnh($id_hotel,$id_room);
}
echo json_encode($res);
?>