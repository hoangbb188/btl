<?php
include 'API/header.php';
include 'controller/quan-ly/C_khachsan.php';
$res = array('success'=> 0);
if(isset($_POST['ListIdImage']))
   {
        $ListIdImage = array();
        $ListIdImage = $_POST['ListIdImage'];
        //print_r($ListIdImage);
        foreach($ListIdImage as $idImage){
          $ks = new C_khachsan();   
          $thongbao = array();
          $thongbao= $ks->XoaAnh($idImage);
          if($thongbao['trangthai'] == 'thanhcong') $res['success']++;
        }
   }
    echo json_encode($res);

?>