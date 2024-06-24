<?php
   include 'API/header.php';
   include 'controller/quan-ly/C_mgg.php';
   $res = array();
   if(isset($_POST['Ma']))
   {
         $mgg = new C_mgg();   
         $res= $mgg->XoaMaGiamGia(addslashes($mgg->ChongHack($_POST['Ma'])));
   }
    echo json_encode($res);
?>