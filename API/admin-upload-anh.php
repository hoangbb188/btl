<?php
include 'API/header.php';
include 'controller/quan-ly/C_khachsan.php';
$res = array('trangthai'=>'','thongbao' =>'','url' => array(), 'success' => array());
$success = 0;
$num_files = 0;
//$res['file'] = $_FILES;
//print_r($_FILES);
if(isset($_POST['MKs'])) {
    $MKs = intval($_POST['MKs']);
    $MP = !empty($_POST['MP']) ? intval($_POST['MP']) : 0;
    $loai = intval($_POST['Loai']);
    $ks = new C_khachsan();
    if (isset($_FILES['file'])) {
        foreach($_FILES['file']['name'] as $key => $value){
            $num_files++;
            if ($_FILES['file']['error'][$key] == UPLOAD_ERR_OK) {
                $type = array("image/jpeg","image/png","image/jpg","image/webp");
                if(in_array($_FILES['file']['type'][$key],$type)){
                    if ($_FILES['file']['size'][$key] <= 5242880) {   
                        $x = $_FILES['file']['name'][$key];
                        $type = explode(".", $x);
                        //$x = "avt-ks-$MKs." . $type[count($type) - 1];
                        $namefd = "assets/uploads/ks-$MKs";
                        if (!is_dir($namefd)) { 
                            mkdir($namefd);
                        }
                       // print_r($x);
                        $url = $ks->ChongHack("$namefd/$x");
                        if($ks->KiemTraAnh($url) == 0){
                            if (move_uploaded_file($_FILES['file']['tmp_name'][$key], $url)) {
                                $res['url'][] = $url;
                                $success++;
                                $ks->ThemAnh($MKs,$MP,$x,$url,$loai);
                                $res = array("trangthai" => "thanhcong", "thongbao" => "Đã upload file thành công");
                                $dataUpload['Avatar'] = "$namefd/$x";
                            } else {
                                $res = array("trangthai" => "loi", "thongbao" => "UpFile Lỗi");
                            }
                        }else{
                            $res = array("trangthai" => "loi", "thongbao" => "File đã tồn tại trên database");
                        }
                    } else {
                        $res = array("trangthai" => "loi", "thongbao" => "File ảnh tối đa 5MB");
                    }
                }
                else{
                    $res = array("trangthai" => "loi", "thongbao" => "Định dạng file không hỗ trợ");
                }
            } else {
                $res = array("trangthai" => "loi", "thongbao" =>'File bị lỗi');
            }
        }
    }
    $res = array("trangthai" => "thanhcong", "thongbao" =>"Upload thành công $success/$num_files Files!");
    //$res['post'] = $_POST;
    //$res['file'] = $_FILES;
    
}

$res['success'] = $success;
echo json_encode($res);