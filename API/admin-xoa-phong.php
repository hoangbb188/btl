<?php
   include 'API/header.php';
   include 'controller/quan-ly/C_phong.php';
   $res = array();
   if(isset($_POST['MP']))
   {
         $phong = new C_phong();   
         $res= $phong->XoaPhong(intval($_POST['MP']));
   }
    echo json_encode($res);
?>