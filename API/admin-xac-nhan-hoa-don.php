<?php
   include 'API/header.php';
   include 'controller/quan-ly/C_Hoadon.php';
   
   $res = array();
   if(isset($_POST['MKs'],$_POST['MHd']))
   {
     $MKs = intval($_POST['MKs']);
     $MHd = intval($_POST['MHd']);
     $ks = new C_Hoadon();   

     if(isset($_POST['MaBaoMat']))  // Nếu có mã bảo mật thì gọi hàm xác nhận mã
     {
        $MaBaoMat = $_POST['MaBaoMat'];
        $res = $ks->XacNhanMa($MKs,$MHd,$MaBaoMat);
     }
     else   // Nếu không có mã bảo mật thì trả phòng
     {
       $res = $ks->TraPhong($MKs,$MHd);
     }
   }
    echo json_encode($res);

?>