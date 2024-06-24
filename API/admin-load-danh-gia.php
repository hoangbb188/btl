<?php
include 'API/header.php';
include 'controller/quan-ly/C_user.php';
//include 'controller/C_phanTrang.php';
if(isset($_POST['MKs'])){
    $MKs = intval($_POST['MKs']);
    $thongTinKs = new M_khachsan();

    $data['thongtinkhachsan'] = $thongTinKs->ThongTinKhachSan($MKs);
    if($data['thongtinkhachsan']  && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
    {
        $page = isset($_POST['page'])? intval($_POST['page']):1;

        
        $danhgia = new C_danhgia;
        $tongSoRecord = $danhgia->DanhSachDanhGiaKhachSan($MKs,-1,-1);
        $tongSoPage = ceil($tongSoRecord/5);
        if($page > $tongSoPage || $page < 1) $page = 1;
        $data['danhgia'] = $danhgia->DanhSachDanhGiaKhachSan($MKs,$page,5);
        //print_r($data['danhgia']);
        if($data['danhgia']){
            sleep(1);
         
            foreach($data['danhgia'] as $value){
                echo "
                <div class='gopy-line'>
                <span class='label label-primary'>Vị Trí: ".$value['ViTri']."</span>
                <span class='label label-primary'>Phục Vụ: ".$value['PhucVu']."</span>
                <span class='label label-primary'>Tiện Nghi: ".$value['TienNghi']."</span>
                <span class='label label-primary'>Giá Cả: ".$value['Gia']."</span>
                <span class='label label-primary'>Vệ Sinh: ".$value['VeSinh']."</span>
                <span class='pull-right' data-toggle='tooltip' title='".$value['email']."'>".$value['Ten']."</span>
    
                <div style='margin-top:10px'>".$value['NhanXet']."</div>
                <span class='help-block' style='font-size:12px'> ".date("d-m-Y", strtotime($value['Ngay']))."</span>   
             </div>
             <br>
                ";
            }
        }
       if($page == $tongSoPage){
           echo "<script>stopLoad = true;</script>";
       }
    }
}
?>