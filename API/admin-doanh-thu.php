<?php
    //session_start();
   include 'API/header.php';
   include 'controller/quan-ly/C_khachsan.php';
   

   $TongDoanhThu =0;
   if(isset($_POST['NgayBatDau'],$_POST['NgayKetThuc']))
   {
    $NgayBatDau = date("Y-m-d", strtotime($_POST['NgayBatDau']));
    $NgayKetThuc = date("Y-m-d", strtotime($_POST['NgayKetThuc']));
       if(isset($_POST['MKs']))
       {
            $MKs = intval($_POST['MKs']);
            $ks = new M_khachsan();
            $data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);
                // Lấy thông tin ks và kiểm tra ks đó có phải của người quản lý k
            if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
            {
                $doanhthu = new M_user();
                $data = $doanhthu->TongDoanhThu($MKs,$NgayBatDau,$NgayKetThuc);
                $TongDoanhThu =$data['TongDanhThu'];
            } 
       }
       else if(isset($_POST['email']))
       {
            $email = $_POST['email'];
            if($email==$_SESSION['quanly']['TaiKhoan']&&$_SESSION['quanly']['loai']==2){
                $doanhthu = new M_user();
                $data = $doanhthu->TongDoanhThu(0,$NgayBatDau,$NgayKetThuc,$email);
                $TongDoanhThu =$data['TongDanhThu'];
            }
       }
   }
   echo number_format($TongDoanhThu)."<sup> vnđ</sup>";
   

?>