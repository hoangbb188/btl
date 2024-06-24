<?php
   include 'API/header.php';
   include 'controller/quan-ly/C_phong.php';  

  $res = array(
            'capnhat'=>array('trangthai'=>'','thongbao' =>''),
            'upfile'=>array('trangthai'=>'','thongbao' =>'')
           );

   if(isset($_POST['MKs'],$_POST['MP'],$_POST['LoaiP'],$_POST['SoLuong']))
   {
      $MP = intval($_POST['MP']);
      $MKs = intval($_POST['MKs']);

      $thongTinPhong = new M_phong();
      $data['phong'] = $thongTinPhong->ThongTinPhong($MP);
      
      if($data['phong']['email']!= $_SESSION['quanly']['TaiKhoan'] || $data['phong']==0){
			$res['capnhat'] = array('trangthai'=>'loi', 'thongbao'=>'Phòng không tồn tại!');
		}
      else
      {
         if(isset($_POST['Dientich'],$_POST['Gia'],$_POST['SoNguoi'],$_POST['View']))
         {
            $phong =new C_phong();
            
            $TienIch = isset($_POST['TienIch']) ? implode(":",$_POST['TienIch']) : "";

            $dataUpload = array(
                                 'LoaiP' => $_POST['LoaiP'],              
                                 'SoLuong' => intval($_POST['SoLuong']), 
                                 'Dientich' => floatval($_POST['Dientich']),       
                                 'Gia' => intval($_POST['Gia']),       
                                 'SoNguoi' => intval($_POST['SoNguoi']),         
                                 'View' => intval($_POST['View']), 
                                 'TienIch' =>  $TienIch 
                              );  

            if (isset($_FILES['file']) && $_FILES['file']['name']!="") {
               if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
                     $type = array("image/jpeg","image/png","image/jpg","image/webp");
                     if(in_array($_FILES['file']['type'],$type)){
                        if ($_FILES['file']['size'] <= 5242880) {   
                           $x = $_FILES['file']['name'];
                           $type = explode(".", $x);
                           $x = "avt-p-$MP." . $type[count($type) - 1];
                           $namefd = "assets/uploads/ks-$MKs";
                           if (!is_dir($namefd)) {
                                 //Tạo thư mục
                                 mkdir($namefd);
                           }
                           if (move_uploaded_file($_FILES['file']['tmp_name'], "$namefd/$x")) {
                                 $res['upfile'] = array("trangthai" => "thanhcong", "thongbao" => "Đã upload file thành công");
                                 $dataUpload['Avatar'] = "$namefd/$x";
                           } else {
                                 $res['upfile'] = array("trangthai" => "loi", "thongbao" => "UpFile Lỗi");
                           }
                        } else {
                           $res['upfile'] = array("trangthai" => "loi", "thongbao" => "File ảnh tối đa 5MB");
                        }
                     }
                     else{
                        $res['upfile'] = array("trangthai" => "loi", "thongbao" => "Định dạng file không hỗ trợ");
                     }
               } else {
                     $res['upfile'] = array("trangthai" => "loi", "thongbao" =>'File bị lỗi');
               }
            }              
                              
            $res['capnhat'] = $phong->SuaPhong($MKs,$MP,$dataUpload);
         }
      }
   }

   echo json_encode($res);

?>