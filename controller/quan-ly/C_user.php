<?php
require_once 'controller/controller.php';
include_once 'controller/quan-ly/C_Khachsan.php';
include_once 'controller/C_DVHC.php';
include_once "model/M_user.php";
include_once "controller/C_phantrang.php";
class C_user extends Controller
{
	public function HienThiThongTinTaiKhoan(){
		$this->KiemTraSS(1);
		$data['TaiKhoan'] = $this->ThongTinTaiKhoan();
		$TP = $data['TaiKhoan']['TP'];
		$DVHC = new C_DVHC();
		$data['TaiKhoan']['TP'] =  $DVHC->GetThongTin($TP,1);
		if(isset($_GET['act'])){
			if($_GET['act']=='edit'){
				$data['tinh'] = $DVHC->HienThiDanhSachTinh();
				return $this->loadView('tai-khoan/sua-thong-tin',$data);
			}
			else if($_GET['act']='change-password'){
				return $this->loadView('tai-khoan/doi-mat-khau',$data);
			}
		}
		return $this->loadView('tai-khoan/thong-tin',$data);
	}

	public function HienThiDangKy(){
		$DVHC = new C_DVHC;
		$data['tinh'] = $DVHC->HienThiDanhSachTinh();
		$this->loadView('tai-khoan/dang-ky',$data);
	}

	public function HienThiDangNhap(){
		if(isset($_SESSION['quanly']))
			header("Location:index.php?controller=quan-ly/trang-chu");
		$this->loadView('tai-khoan/dang-nhap');
	}


	public function DangKy($data){
		$user = new M_user;
		$post = $user->DangNhap($data['TaiKhoan']);
		$xuat = array();
		if($post){
			$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Tài khoản này đã được đăng ký');
		}else{
			$abc = $user->DangKy($data);
			if($abc>0){
				$user->setLoai($data['TaiKhoan']);
				$xuat = $this->DangNhap($data['TaiKhoan'],$data['MatKhau']);
			}else{
				$xuat = array(	'trangthai' => 'loi',
								'thongbao' => 'Đăng ký thất bại');
			}
		}
		return $xuat;
	}

	public function DangNhap($email,$password){
		$user = new M_user;
		$data = $user->DangNhap($email);
		$xuat = array();
		if(empty($data)){
			$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Không tồn tại tài khoản');
		}else{
			if($data['MatKhau'] == $password){
				if(!isset($_POST['accept_update']) && $data['Loai'] == 0){
					$xuat = array('trangthai' => 'loi',
								'thongbao' => 'Tài khoản chưa được nâng cấp, vui lòng chọn nâng cấp tài khoản');
				}elseif(isset($_POST['accept_update']) && $data['Loai'] == 0){
					$user->setLoai($email);
					$xuat = array(	'trangthai' => 'thanhcong',
								'thongbao' => 'Đăng nhập thành công');
					$arr_session = array('TaiKhoan' => $email,
										'ten'=>$data['Ten'],
										'loai'=>$data['Loai']
									);
					$this->setSession($arr_session);
					//header("Location:index.php?controller=quan-ly/trang-chu");
				}else{
					$xuat = array(	'trangthai' => 'thanhcong',
								'thongbao' => 'Đăng nhập thành công');
					$arr_session = array('TaiKhoan' => $email, 
										'Ten'=>$data['Ten'],
										'loai'=>$data['Loai']
									);
					$this->setSession($arr_session);
					 //header("Location:index.php?controller=quan-ly/trang-chu");
				}
			}else{
				$xuat = array('trangthai' => 'loi',
								'thongbao' => 'Sai mật khẩu');
			}
		}
		return $xuat;
	}

	public function NapTien($email_nt,$sotien)
	{
		$this->KiemTraSS(2);
		$xuat = array();
		if($_SESSION['quanly']['loai'] == 2){
			$user = new M_user;
			$data = $user->DangNhap($email_nt);
			$sotien = $sotien*1000;
			if($data){
				$user->ThanhToan($email_nt,$sotien,1);
				$this->ThemLichSuKhachHang($email_nt,$sotien);
				$xuat = array('trangthai'=>'thanhcong',
								'thongbao' => 'Nạp tiền cho tài khoản thành công');
			}else{
				$xuat = array('trangthai'=>'loi',
								'thongbao' => 'Không tồn tại tài khoản này');
			}
		}else{
			$xuat = array('trangthai'=>'loi',
			'thongbao' => 'Bạn không đủ quyền để thực hiện chức năng này');
		}
		return $xuat;
	}
	public function HienThiNapTien()
	{
		$this->KiemTraSS(2);
		$data = array();
		return $this->loadView('admin/nap-tien');
	}

	public function ThemLichSu($email,$noidung,$thaydoi,$loai)
	{
		$user = new M_user;
		$data = array('email' => $email,
					'ThoiGian' => date("Y-m-d H:i:s"), //lấy create time
					'Noidung' => $noidung,
					'thaydoi' => $thaydoi,
					'Loai' => $loai	);
		$user->ThemLichSu($data);
	}


	public function ThemLichSuKhachHang($email,$sotien){
		$user = new M_user;
		$noidung = array();
		$noidung[0] = 'Nạp tiền vào tài khoản';
		$noidung[1] = 'Nạp tiền vào tài khoản '.$email;
		$email_ql = $_SESSION['quanly']['TaiKhoan'];
		$thay_doi = $sotien;
		$this->ThemLichSu($email,$noidung[0],$thay_doi,0);
		$this->ThemLichSu($email_ql,$noidung[1],$thay_doi,4);
	}




	public function HienThiXetDuyet(){
		$this->KiemTraSS(2);
		$ks = new C_khachsan;
		$DVHC = new C_DVHC;
		$data = array();
		if(isset($_SESSION['quanly']) && $_SESSION['quanly']['loai'] == 2){
			//$email = $_SESSION['quanly']['TaiKhoan'];
			$tongSoRecord = $ks->HienThiDanhSach(1,4,-1,-1,'',0,0,array(),2,0);
			$phanTrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi);
			$data['phantrang'] = $phanTrang->HienThiPhanTrang();
			$vitri = $phanTrang->pageHienTai;
			$data['DanhSachKhachSan'] = $ks->HienThiDanhSach(1,4,$vitri,$this->soHangTrenPage,'',0,0,array(),2,0);
			return $this->loadView('xet-duyet',$data);
		}
	}

	public function ThongTinTaiKhoan()
	{
		$user = new M_user;
		$data = array();
		$email = $_SESSION['quanly']['TaiKhoan'];
		$data['TaiKhoan'] = $user->DangNhap($email);
		return $data['TaiKhoan'];
	}

	public function DanhSachGopY()
	{
		$user = new M_user;
		$data = array();
		$data = $user->AllGopY();
		return $data;
	}
	public function HienThiLichSuAdmin()
	{
		$this->KiemTraSS(2);
		$data = array();
		$user = new M_user();
		$tongSoRecord = $user->LichSuGD($_SESSION['quanly']['TaiKhoan'],0,-1,-1,true);

		$phantrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi);
		$data['phantrang'] = $phantrang->HienThiPhanTrang();

		$vitri = $phantrang->pageHienTai;
		$data['LichSuGD'] = $user->LichSuGD($_SESSION['quanly']['TaiKhoan'],0,$vitri, $this->soHangTrenPage,true);
		return $this->loadView('admin/lich-su',$data);
	}
	
	public function HienThiMaGiamGiaAdmin(Type $var = null)
	{
		$this->KiemTraSS(2);
		$mgg = new C_mgg();
				
		$tongSoRecord = $mgg->DanhSachMaGiamGia(0,1);

		$phanTranng = new C_phanTrang($tongSoRecord, $this->soHangTrenPage,$this->soPageHienThi);
		$data['phantrang']=$phanTranng->HienThiPhanTrang();

		$vitri = $phanTranng->pageHienTai;
		$Loai =1;	// mã gg loại 1 - Mả Giảm Giá Của Admin
		$data['mgg'] = $mgg->DanhSachMaGiamGia(0,$Loai,$vitri,$this->soHangTrenPage); 
		// /print_r($data);
		return $this->loadView('ma-giam-gia',$data);
	}
	
	public function setSession($data = array()){
		foreach ($data as $key => $value) {
			$_SESSION['quanly'][$key] = $value;
		}
	}
	public function logout(){
		unset($_SESSION['quanly']);
		header("Location:index.php?controller=quan-ly/dang-nhap");
	}
}