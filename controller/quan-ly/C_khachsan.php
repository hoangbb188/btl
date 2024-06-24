<?php
require_once 'controller/controller.php';
include_once "model/M_khachsan.php";
include_once 'controller/quan-ly/C_phong.php';
include_once 'controller/C_DVHC.php';
include_once 'controller/quan-ly/C_mgg.php';
include_once "model/M_user.php";
include_once "controller/quan-ly/C_Hoadon.php";
include_once "controller/C_danhgia.php";
include_once "controller/C_phantrang.php";

class C_khachsan extends Controller
{
	public function __construct()
	{ 
		if(!isset($_SESSION['quanly'])){
			header("Location:index.php?controller=quan-ly/dang-nhap");
		}
	}

	
	//=====================================Hiển Thị Khách Sạn ========================================
	public function DanhSachKhachSan($email,$loai=2,$start=-1,$limit=-1,$ten= '',$min_value=0,$max_value=0,$sao=array(),$loai_ks=2,$trangthai=1)
	{
		$ks = new M_khachsan;
		$data = $ks->DanhSachKhachSan($email,$loai,$start,$limit,$ten,$min_value,$max_value,$sao,$loai_ks,$trangthai);
		return $data;
	}

	// Hiện thị thông tin chi tiết 1 khách sạn
	public function HienThiThongTinKhachSan()
	{
		if(isset($_GET['hotel']) && !empty($_GET['hotel']))
		{
			$MKs = intval($_GET['hotel']);
			$data = array('thongtinkhachsan'=>'','danhsachtinh'=>'');

			$DVHC = new C_DVHC();
			$data['danhsachtinh']= $DVHC->HienThiDanhSachTinh();

			$ks = new M_khachsan();
			$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);

			 if($data['thongtinkhachsan']  && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
		     {
				 if(isset($_GET['act'])&&$_GET['act']=='edit')
				 	return $this->loadView('thong-tin/sua-thong-tin',$data);
				return $this->loadView('thong-tin/thong-tin',$data);
			 }	
		}
		return $this->loadView('404');
	}

	// Hiển Thị 1 Khách Sạn
	public function HienThiKhachSan()
	{
		if(isset($_GET['hotel']) && !empty($_GET['hotel'])){
			$MKs = intval($_GET['hotel']);
			$data = array('thongtinkhachsan'=>'', 'tongquan'=>'');
			
			$ks = new M_khachsan;
			$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);

			if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
			{
				$danhgia = new C_danhgia;
				$data['tongquan'] = $danhgia->TongQuanDanhGiaKhachSan($MKs);
				$data['danhgia'] = $danhgia->DanhSachDanhGiaKhachSan($MKs,1,5);

				$hoadon = new M_hoadon();
				$data['hoadonchuaxacnhan'] = $hoadon->DanhSachHoaDon($MKs);  // Lấy các hóa đơn chưa xác nhận
				$data['hoadonthanhcong'] = $hoadon->DanhSachHoaDon($MKs,1); // lấy các hóa đơn đã xác nhận thành công

				$doanhThu = new M_user;
				$data['tongdoanhthu'] = $doanhThu->TongDoanhThu($MKs);

				return $this->loadView('khach-san',$data);
			}
		}
		return $this->loadView('404');
	}

	public function HienThiKhachSanAdmin()
	{
		$this->KiemTraSS(2);
		$data = array();
		$email = $_SESSION['quanly']['TaiKhoan'];

		if(isset($_GET['hotel']) && !empty($_GET['hotel'])){
			$MKs = intval($_GET['hotel']);
			$ks = new M_khachsan();
			$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);
			return $this->loadView('admin/thong-tin-khach-san',$data);
		}

		$TrangThai =1;
		if(isset($_GET['type'])&&$_GET['type']=='xacnhan')
			$TrangThai=0;
		$tongSoRecord = $this->DanhSachKhachSan(1,3,-1,-1,'',0,0,array(),2,$TrangThai);
		
		$phanTranng = new C_phanTrang($tongSoRecord, $this->soHangTrenPage,$this->soPageHienThi);
		$data['phantrang']=$phanTranng->HienThiPhanTrang();

		$vitri = $phanTranng->pageHienTai;
		$data['DanhSachKhachSan'] = $this->DanhSachKhachSan(1,3,$vitri,$this->soHangTrenPage,'',0,0,array(),2,$TrangThai);
		//print_r($data);
		return $this->loadView('admin/danh-sach-khach-san',$data);
	}
	// ========================================= Xử Lý Khách Sạn  =========================================
	
	// Thêm Khách sạn
	public function ThemKhachSan($dataInsert)
	{
		$ks = new M_khachsan;
		$last_id = $ks->ThemKhachSan($dataInsert);

		if($last_id){
			$xuat = array(	'trangthai' => 'thanhcong',
							'thongbao' => 'Thêm thành công');
			$_SESSION['them'] = true;
			//header("Location:index.php?controller=quan-ly/trang-chu");
		}else
		{
			$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Trùng tên khách sạn, vui lòng liên hệ bộ phần xử lý để giải quyết');
		}
		return $xuat;
	}
 
	// Xóa khách sạn
	public function XoaKhachSan($MKs)
	{
		$ks = new M_khachsan;
		$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);

		if($data['thongtinkhachsan']  && ($_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'] || $_SESSION['quanly']['loai']== 2 ))
		{
			$hoaDon = new M_hoadon();
		
			if($hoaDon->SoHoaDonThueKhachSan($MKs,0)>0){
				$xuat = array('trangthai'=>'loi', 'thongbao'=>'Không thể xóa khách sạn đang có người đặt!');
			}
			else if($hoaDon->SoHoaDonThueKhachSan($MKs,1)>0){
				$xuat = array('trangthai'=>'loi', 'thongbao'=>'Không thể xóa khách sạn đang có người thuê/ chưa trả phòng!');
			}
			else{
				$phong = new C_phong();
				$phong->XoaPhongTheoKhachSan($MKs);

				$mgg= new C_mgg();
				$mgg->XoaMaGiamGiaTheoKhachSan($MKs);

				$ks->XoaKhachSan($MKs);

				$xuat = array('trangthai'=>'thanhcong', 'thongbao'=>'Đã xóa thành công!');
				$_SESSION['xoa'] = true;
			}
		}
		else{
			$xuat = array('trangthai'=>'loi', 'thongbao'=>'Khách sạn không tồn tại!');
		}
		return $xuat;
	}

	// Sửa khách sạn
	public function SuaKhachSan($MKs,$dataUpdate)
	{
		$ks = new M_khachsan;
		$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);

		if($data['thongtinkhachsan']  && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
		{
			if($ks->SuaKhachSan($MKs,$dataUpdate))
			{
				$xuat =	array('trangthai'=>'thanhcong', 'thongbao'=>'Cập nhật thành công!');
				$_SESSION['sua']=true;
			}
			else
				$xuat = array('trangthai'=>'loi', 'thongbao'=>'Cập Nhật không thành công');
		}
		else
		{
			$xuat = array('trangthai'=>'loi', 'thongbao'=>'Khách sạn không tồn tại!');
		}
		return $xuat;
	}

	// ============================= Hiển Thị Tiện Nghi ========================================
	public function HienThiTienNghi()
	{
		if(isset($_GET['hotel']) && !empty($_GET['hotel'])){
			$MKs = intval($_GET['hotel']);

			$ks = new M_khachsan;
			$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);

			 if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
			 {
				 $data['thongtinkhachsan']['TienIch'] = explode(":", $data['thongtinkhachsan']['TienIch']);
				 $data['TienIch'] = $ks->GetTienIchLoai();
				 return $this->loadView('tien-nghi',$data);
			 }
		}
		return $this->loadView('404');
	}
	

	// ================================ Hiển Thị Phòng ================================

	// Hiển Thị Phòng
	public function HienThiPhong(){
		if(isset($_GET['hotel']) && !empty($_GET['hotel'])){
			$MKs =  intval($_GET['hotel']);
			$data = array('thongtinkhachsan'=>'','phong'=>'');

			$ks = new M_khachsan;		$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs); // lấy thông tin của khách sạn
				
			// nếu có GET hotel và cái hotel đó là của tài khoản đang đăng nhập
			if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
			{

				$phong = new C_phong;	
				$data ['phong'] = $phong->DanhSachPhong($MKs);	// Lấy tất cả các phòng của ks đó
				$tongSoRecord =  $data['phong'] ? count($data['phong']) : 0; // Nếu có phòng thì trả về tổng số record là số phòng, 
																		//còn không thì trả về 0
				$phanTrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi);
				$data['phantrang'] = $phanTrang->HienThiPhanTrang();	
				
				$vitri = $phanTrang->pageHienTai;
				$data['phong'] = $phong->DanhSachPhong($MKs,$vitri,$this->soHangTrenPage);	// gán mảng phòng bằng danh sách phòng start, limit

				// nếu có GET phòng và cái phòng đó thuộc khách sạn do tài khoản đang đăng nhập quản lý thì load view chi tiết phòng đó
				if(isset($_GET['phong']) && !empty($_GET['phong']))
				{	   
					$MP=$_GET['phong'];
					$data['phong'] = $phong->ThongTinPhong($MP);
					
					if($data['phong'] && $data['phong']['MKs']==$MKs)
					{
						$data['phong']['TienIch'] = explode(":", $data['phong']['TienIch']);
						$data['TongTienIch'] = $ks->GetTienIchLoai(1);

						//kiểm tra nếu có GET act và act là edit thì load đến trang sửa, ngược lại load trang thông tin phòng
						if(isset($_GET['act']) && $_GET['act']=='edit')
							return $this->loadView('phong/sua-phong',$data);
						return $this->loadView('phong/thong-tin',$data);
					}
					else{
						$data['phong'] = $phong->DanhSachPhong($MKs,$vitri,$this->soHangTrenPage);	
					}
				}
				else if(isset($_GET['act']) && $_GET['act']=='them')
				{
					$data['TongTienIch'] = $ks->GetTienIchLoai(1);
					return $this->loadView('phong/them-phong',$data);
				}
				// nếu chỉ có GET hotel (và các GET khác nếu không hợp lệ) thì load danh sách phòng của ks đó
				return $this->loadView('phong/danh-sach',$data);
			}
		}
		return $this->loadView('404');
	}

	// ================================ Hiển Thị Mã Giảm Giá ================================
	public function HienThiMaGiamGia()
	{
		if(isset($_GET['hotel']) && !empty($_GET['hotel'])){
			$MKs =  intval($_GET['hotel']);
			$data = array('thongtinkhachsan'=>'','mgg'=>'');

			$ks = new M_khachsan();
			$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);

			if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email']){
				$mgg = new C_mgg();
				
				$tongSoRecord = $mgg->DanhSachMaGiamGia($MKs);

				$phanTranng = new C_phanTrang($tongSoRecord, $this->soHangTrenPage,$this->soPageHienThi);
				$data['phantrang']=$phanTranng->HienThiPhanTrang();

				$vitri = $phanTranng->pageHienTai;
				$Loai =0;	// mã gg loại 0 - mả giảm giá của chủ khách sạn
				$data['mgg'] = $mgg->DanhSachMaGiamGia($MKs,$Loai,$vitri,$this->soHangTrenPage); 
				//print_r($data);
				return $this->loadView('ma-giam-gia',$data);
			}
		}
		return $this->loadView('404');
	}

	// ================================ Hiển Thị Lịch Sử ================================
	public function HienThiLichSu()
	{
		if($_SESSION['quanly']['loai']==2){
			
		}
		if(isset($_GET['hotel']) && !empty($_GET['hotel'])){
			$MKs =  intval($_GET['hotel']);
			$ks = new M_khachsan();
			$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);

			if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email']){
				$user = new M_user();
				$tongSoRecord = $user->LichSuGD($_SESSION['quanly']['TaiKhoan'],$MKs);

				$phantrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi);
				$data['phantrang'] = $phantrang->HienThiPhanTrang();

				$vitri = $phantrang->pageHienTai;
				$data['LichSuGD'] = $user->LichSuGD($_SESSION['quanly']['TaiKhoan'],$MKs,$vitri, $this->soHangTrenPage);
				
				return $this->loadView('lich-su',$data);
			}
		}
		return $this->loadView('404');
	}
	
	//==================== Duyệt khách sạn====================
	public function DuyetKhachSan($MKs)
	{
		$ks = new M_khachsan;
		$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);
		if($_SESSION['quanly']['loai']== 2 && $data['thongtinkhachsan'])
		{
			$data = array('TrangThai'=> 1);
			$ks->DuyetKhachSan($MKs,$data);
			$xuat = array('trangthai'=>'thanhcong', 'thongbao'=>'Đã duyệt thành công!');
			$_SESSION['duyet'] = true;
		}
		else{
			$xuat = array('trangthai'=>'loi', 'thongbao'=>'Lỗi xảy ra chơi!');
		}
		return $xuat;
	}

	public function HienThiThuVienAnh($loai=2,$start=-1,$limit=-1){
		if(isset($_GET['hotel']) && !empty($_GET['hotel'])){
			$MKs = intval($_GET['hotel']);
			$data = array('thongtinkhachsan' => array(), 'PhanTrang'=> array(), 'thuvienanh'=> array());
			$ks = new M_khachsan;
			$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);
			 if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan'] == $data['thongtinkhachsan']['email'])
			 {
				$tongSoRecord = $ks->XuatAnh($MKs,-1,-1,-1);
				$phanTranng = new C_phanTrang($tongSoRecord, $this->soHangTrenPage,$this->soPageHienThi);
				$data['PhanTrang']= $phanTranng->HienThiPhanTrang();
				$vitri = $phanTranng->pageHienTai;
				$data['thuvienanh'] = $ks->XuatAnh($MKs,-1,$vitri,$this->soHangTrenPage);
			//	print_r($data);
				return $this->loadView('thu-vien-anh',$data);
			 }
		}
		return $this->loadView('404');
	}
	public function KiemTraAnh($url)
	{
		$ks = new M_khachsan;
		return $ks->KiemTraAnh($url);
	}

	public function ThemAnh($MKs,$mp,$ten,$url,$loai)
	{
		$ks = new M_khachsan;
		$data = array('TenAnh' => $ten,
			'UrlAnh' => $url,
			'MKs' => $MKs,
			'MP' => $mp,
			'Loai' => $loai,
			'email' => $_SESSION['quanly']['TaiKhoan']
		);

		return $ks->ThemAnh($data);
	}

	public function XoaAnh($idImage){
		$ks = new M_khachsan;
		$email = $_SESSION['quanly']['TaiKhoan'];
		$xuat =	array('trangthai'=>'', 'thongbao'=>'');
		$info = $ks->GetInfoImage($idImage);
		$trangthai = $ks->XoaAnh($email,$idImage);
		if($trangthai){
			$UrlAnh = $info['UrlAnh'];
			if(is_file($UrlAnh)){
				unlink($UrlAnh);
			}
			$xuat =	array('trangthai'=>'thanhcong', 'thongbao'=>'Xóa thành công');
		}else{
			$xuat =	array('trangthai'=>'loi', 'thongbao'=>'Xóa thất bại');
		}
		return $xuat;
	}
}
?>