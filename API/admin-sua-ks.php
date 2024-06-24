<?php

include 'API/header.php';
include 'controller/quan-ly/C_khachsan.php';

$res = array(
            'capnhat'=>array('trangthai'=>'','thongbao' =>''),
            'upfile'=>array('trangthai'=>'','thongbao' =>'')
           );

if (isset($_POST['MKs'])) {

    $MKs = intval($_POST['MKs']);
    $ks = new C_khachsan(); 

    $thongTinKs = new M_khachsan();
    $data['thongtinkhachsan'] = $thongTinKs->ThongTinKhachSan($MKs);

    if($data['thongtinkhachsan']  && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
    {
        if (isset($_POST['TenKs'], $_POST['DiaChi'], $_POST['Loai'], $_POST['TP'], $_POST['Huyen'], $_POST['sao'], $_POST['PhongCach'], $_POST['Mota'], $_POST['GioiThieu'])) {
            //$ks->prevent_xss();
            $dataUpload = array(
                                'TenKs' => $_POST['TenKs'], 
                                'DiaChi' => $_POST['DiaChi'], 
                                'Loai' => intval($_POST['Loai']),
                                'TP' => intval($_POST['TP']), 
                                'Huyen' => intval($_POST['Huyen']), 
                                'sao' => intval($_POST['sao']),
                                'PhongCach' => $_POST['PhongCach'], 
                                'Mota' => $_POST['Mota'], 
                                'GioiThieu' => $_POST['GioiThieu']
                            );
    
            if (isset($_FILES['file']) && $_FILES['file']['name']!="") {
                if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
                    $type = array("image/jpeg","image/png","image/jpg","image/webp");
                    if(in_array($_FILES['file']['type'],$type)){
                        if ($_FILES['file']['size'] <= 5242880) {   
                            $x = $_FILES['file']['name'];
                            $type = explode(".", $x);
                            $x = "avt-ks-$MKs." . $type[count($type) - 1];
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
           
    
        } 
        else if (isset($_POST['TienIch'])) {
            $TienIch = implode(":", $_POST['TienIch']);
            $dataUpload = array('TienIch' => $TienIch);
        }

        $res['capnhat'] = $ks->SuaKhachSan($MKs, $dataUpload);
    }
    else
        $res['capnhat'] = array('trangthai'=>'loi', 'thongbao'=>'Khách sạn không tồn tại!');
}
//echo json_encode($res);
echo json_encode($res);
