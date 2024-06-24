<?php
   include 'API/header.php';
   include 'controller/quan-ly/C_phong.php';
   
  $res = array();
   if(isset($_POST['MKs'], $_POST['LoaiP'], $_POST['SoLuong'], $_POST['Dientich']))
   {
      if(isset($_POST['Gia'],$_POST['SoNguoi'],$_POST['View'],$_POST['TienIch']))
      {
         $MKs = intval($_POST['MKs']);
         $phong =new C_phong();

         // Chuyển Mảng Tiện Ích Thành chuổi cách nhau bởi dấu : để insert vào database
         $TienIch = implode(":",$_POST['TienIch']);
         $dataInsert = array(
                              'LoaiP' => $_POST['LoaiP'],              
                              'SoLuong' => intval($_POST['SoLuong']), 
                              'Dientich' => floatval($_POST['Dientich']),       
                              'Gia' => intval($_POST['Gia']),       
                              'SoNguoi' => intval($_POST['SoNguoi']),         
                              'View' => intval($_POST['View']), 
                              'TienIch' =>  $TienIch,                  
                              'MKs' => $MKs 
                           ); 

         $res = $phong->ThemPhong($MKs,$dataInsert);
      }
   }
   echo json_encode($res);

?>