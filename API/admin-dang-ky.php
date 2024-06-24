<?php
include 'API/header.php';
include 'controller/quan-ly/C_user.php';

$act = isset($_POST['step']) && !empty($_POST['step']) ? intval($_POST['step']) : 1;
$res = array();
if($act == 1){
    if(empty($_POST['TaiKhoan']) || empty($_POST['MatKhau']) || empty($_POST['Ten']) || empty($_POST['DiaChi']) || empty($_POST['SDT'])){
        $res = array('trangthai'=>'loi',
				'thongbao'=>'Nhập thiếu thông tin');
    }else{
        if(filter_var($_POST['TaiKhoan'], FILTER_VALIDATE_EMAIL) === false){
            $res = array(  'trangthai' => 'loi',
                    'thongbao' => 'Email không hợp lệ');
        }else{
            $user = new C_user;
            $data = array( 'TaiKhoan' =>  $user->ChongHack($_POST['TaiKhoan']),
            'TaiKhoan' =>  $user->ChongHack($_POST['TaiKhoan']),
            'MatKhau' =>  md5(trim($_POST['MatKhau'])),
            'Ten' =>  $user->ChongHack($_POST['Ten']),
            'TP' =>  $user->ChongHack($_POST['TP']),
            'DiaChi' =>  $user->ChongHack($_POST['DiaChi']),
            'SDT' =>  $user->ChongHack($_POST['SDT'])
            );
            //print_r($data);
            $res = $user->DangKy($data);
        }
    }
}else if($act == 2){
    $khachsan = new C_Khachsan;
    if(!isset($_SESSION['quanly'])){
        $res = array(  'trangthai' => 'loi',
                    'thongbao' => 'Bạn chưa đăng nhập vào quản lý');
    }else if(empty($_POST['TenKs']) || empty($_POST['TP']) || empty($_POST['Huyen']) || empty($_POST['DiaChi']) || !isset($_POST['Loai']) || empty($_POST['PhongCach']) || empty($_POST['sao'])  || empty($_POST['Mota'])){
        $res = array('trangthai'=>'loi',
				'thongbao'=>'Nhập thiếu thông tin');
    }else{
        $data = array('TenKs'=> $khachsan->ChongHack($_POST['TenKs']),
        'TenKhongDau' => $khachsan->convert_vi_to_en($_POST['TenKs']),
        'TP' => intval($_POST['TP']),
        'DiaChi' => $khachsan->convert_vi_to_en($_POST['DiaChi']),
        'Huyen' => intval($_POST['Huyen']),
        'Loai' => intval($_POST['Loai']),
        'PhongCach' => intval($_POST['PhongCach']),
        'sao' => intval($_POST['sao']),
        'Mota' => addslashes($_POST['Mota']),
        'email'=> $_SESSION['quanly']['TaiKhoan']
        );
        //print_r($data);
        $res = $khachsan->ThemKhachSan($data);
    }
}

$res['thongbao'] = '<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span>
    </button>'.$res['thongbao'].'!</div>';
echo json_encode($res);
?>
