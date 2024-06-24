<?php
include 'API/header.php';
include 'controller/quan-ly/C_mgg.php';
include_once "model/M_khachsan.php";
$res = array();
$data = array();
if (isset($_POST['Ma'], $_POST['SL'], $_POST['Giam'], $_POST['NgayBatDau'], $_POST['NgayHetHan'], $_POST['IdMgg'], $_POST['MKs']))
{
    $IdMgg = intval($_POST['IdMgg']);
    $MKs = intval($_POST['MKs']);

    $ks = new M_khachsan();
    $data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);
    if(($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan'] == $data['thongtinkhachsan']['email']) || $_SESSION['quanly']['loai']==2) 
    {
        $dataCapNhat = array(
                              'Ma' => $_POST['Ma'],
                              'SL' => intval($_POST['SL']),
                              'Giam' => intval($_POST['Giam']),
                              'NgayBatDau' => date("Y-m-d", strtotime($_POST['NgayBatDau'])),
                              'NgayHetHan' => date("Y-m-d", strtotime($_POST['NgayHetHan'])),
                              'email' => $_SESSION['quanly']['TaiKhoan'],
                              'MKs' => $MKs,
                              'Loai' => $_SESSION['quanly']['loai']-1
                          );  

        if (isset($_POST['act'])) 
        {
            $mgg = new C_mgg();
            if ($_POST['act'] == 'them') {
                $res = $mgg->ThemMaGiamGia($dataCapNhat);
            } 
            else if ($_POST['act'] == 'sua') {
                $res = $mgg->SuaMaGiamGia($IdMgg, $dataCapNhat);
            }
        }
    }
    else
    {
      $res = array(	
            'trangthai' => 'loi',
            'thongbao' => 'Đừng Nghịch Mã Khách Sạn người khách bạn ơi :v'
      );
    }

}
echo json_encode($res);
