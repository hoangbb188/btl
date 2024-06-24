<?php
   include 'API/header.php';
   include 'controller/quan-ly/C_khachsan.php';
   $res = array();
   if(isset($_POST['hotel']))
   {
       $MKs = intval($_POST['hotel']);
         $ks = new C_khachsan();   
        $res= $ks->XoaKhachSan($MKs);
   }
    echo json_encode($res);
?>