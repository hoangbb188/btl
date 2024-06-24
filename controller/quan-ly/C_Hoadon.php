<?php
include_once 'controller/controller.php';
include_once 'controller/C_DVHC.php';
include_once "model/M_phong.php";
include_once 'model/M_hoadon.php';
include_once "controller/C_phanTrang.php";
class C_Hoadon extends Controller
{
    // ================================ Hiển Thị Đơn Đặt Phòng ================================
    public function HienThiDonDatPhong()
    {
        if(isset($_GET['hotel']) && !empty($_GET['hotel'])){
            $MKs =  intval($_GET['hotel']);

            $ks = new M_khachsan();
            $data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);

            if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email']){
                $hoadon = new M_hoadon();
                $loaiHoaDon = 0;  // loại 0 là chưa xác nhận, loại 1 là đang thuê, 2 là đã hoàn thành
               
                if(isset($_GET['hoadon']))
                {
                    $MHd = intval($_GET['hoadon']);

                    $hoadon = new M_hoadon();
                    $data['chitiethoadon'] = $hoadon->ChiTietHoaDon($_SESSION['quanly']['TaiKhoan'],$MHd,$MKs);
                    if($data['chitiethoadon']){
                        $TP = $data['chitiethoadon']['TP'];
                        $DVHC = new C_DVHC();
                     
                        $data['chitiethoadon']['TP'] =  $DVHC->GetThongTin($TP,1);
                        
                        $MP =  $data['chitiethoadon']['MP'];
                      
                        $phong = new M_phong();
                        $data['phong'] = $phong->ThongTinPhong($MP,true);
                        //C_Hoadon.phpprint_r($data['phong']);
                        return $this->loadView('hoa-don/chi-tiet-hoa-don',$data);
                    }

                    return $this->loadView('404');
                }
                else if(isset($_GET['type']))
                {
                    if($_GET['type']== 'xuly')
                         $loaiHoaDon = 1;
                    else if($_GET['type']== 'thanhcong')
                         $loaiHoaDon = 2;
                }

                $tongSoRecord = $hoadon->DanhSachHoaDon($MKs,$loaiHoaDon);

                $phanTrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi);
                $data['phantrang'] = $phanTrang->HienThiPhanTrang();

                $vitri = $phanTrang->pageHienTai;
                $data['hoadon'] = $hoadon->DanhSachHoaDon($MKs,$loaiHoaDon,$vitri,$this->soHangTrenPage);

                return $this->loadView('hoa-don/don-dat-phong',$data);
            }
        }
        return $this->loadView('404');
    }
    
    public function XacNhanMa($MKs,$MHd,$MaBaoMat)
    {
        $ks = new M_khachsan();
        $data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);
        // nếu tồn tại khách sạn
        if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
        {
            $hoadon = new M_hoadon();
            $data['chitiethoadon'] = $hoadon->ChiTietHoaDon($_SESSION['quanly']['TaiKhoan'],$MHd,$MKs);
            // nếu tồn tại hóa đơn
            if($data['chitiethoadon']){
                if($data['chitiethoadon']['MaBaoMat']==$MaBaoMat){
                    if($hoadon->CapNhatTrangThai($MHd)){
                        $xuat = array(	'trangthai' => 'thanhcong',
                                    'thongbao' => 'Đã Xác Nhận Thành Công');
                        $_SESSION['xacnhan']=true;
                    }
                    else{
                        $xuat = array(	'trangthai' => 'loi',
                                    'thongbao' => 'Oh No, Lỗi Rồi ~~ Bạn Vui Lòng Xác Nhận Lại Sau');
                    }
                }
                else{
                    $xuat = array(	'trangthai' => 'loi',
                                    'thongbao' => 'Mã Xác Nhận Không Đúng');
                }
            }
            else  // Nếu k tồn tại hóa đơn
            {
                $xuat = array(	'trangthai' => 'loi',
                                'thongbao' => 'Có Vẻ Mã Hóa Đơn Đã Bị Nhầm Ahihi Đồ Ngốc');
            }
        }
        else{		//nếu k tồn tại khách sạn
            $xuat = array(	'trangthai' => 'loi',
                            'thongbao' => 'Đừng Nghịch Khách Sạn Người Khác Bạn Ơi :v');
        }
        return $xuat;
    }

    public function TraPhong($MKs,$MHd)
    {
        $ks = new M_khachsan();
        $data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);
        // nếu tồn tại khách sạn
        if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
        {
            $hoadon = new M_hoadon();
            $data['chitiethoadon'] = $hoadon->ChiTietHoaDon($_SESSION['quanly']['TaiKhoan'],$MHd,$MKs);
            // nếu tồn tại hóa đơn
            if($data['chitiethoadon']){
                if(strtotime($data['chitiethoadon']['NgayTra']) <= time()){
                    if($hoadon->CapNhatTrangThai($MHd,2)){
                        $xuat = array(	'trangthai' => 'thanhcong',
                                    'thongbao' => 'Đã Trả Phòng Thành Công');
                        $_SESSION['traphong']=true;
                    }
                    else{
                        $xuat = array(	'trangthai' => 'loi',
                                    'thongbao' => 'Oh No, Lỗi Rồi ~~ Bạn Vui Lòng Trả Phòng Lại Sau');
                    }
                }
                else{
                    $xuat = array(	'trangthai' => 'loi',
                                    'thongbao' => 'Xin Lỗi, Chưa Đến Ngày Trả, Bạn Không Thể Trả Phòng');
                }
            }
            else  // Nếu k tồn tại hóa đơn
            {
                $xuat = array(	'trangthai' => 'loi',
                                'thongbao' => 'Có Vẻ Mã Hóa Đơn Đã Bị Nhầm Ahihi Đồ Ngốc');
            }
        }
        else{		//nếu k tồn tại khách sạn
            $xuat = array(	'trangthai' => 'loi',
                            'thongbao' => 'Đừng Nghịch Khách Sạn Người Khác Bạn Ơi :v');
        }
        return $xuat;
    }
}

?>