<?php
require_once 'controller/controller.php';
include_once 'controller/quan-ly/C_khachsan.php';
include_once 'controller/C_DVHC.php';
include_once "controller/C_phantrang.php";
include_once "controller/quan-ly/C_user.php";

class C_trangchu extends Controller
{
	public function HienThiTrangChu(){
		$ks = new C_khachsan;
		//$DVHC = new C_DVHC;
		$data = array();
		if(isset($_SESSION['quanly']))
		{
			$email = $_SESSION['quanly']['TaiKhoan'];
			if($_SESSION['quanly']['loai']==2){
				$user = new C_user();
				$data['admin'] = $user->ThongTinTaiKhoan();
				$data['gopY'] = $user->DanhSachGopY(); 
				$data['KhachSanDangHoatDong'] = $ks->DanhSachKhachSan(1,3,-1,-1,'',0,0,array(),2,1);
				$data['KhachSanChuaXacNhan'] = $ks->DanhSachKhachSan(1,3,-1,-1,'',0,0,array(),2,0);
			
				return $this->loadView('admin/home',$data);
			}
			
			$tongSoRecord = $ks->DanhSachKhachSan($email,2,-1,-1,'',0,0,array(),2,2);

			$phanTranng = new C_phanTrang($tongSoRecord, $this->soHangTrenPage,$this->soPageHienThi);
			$data['phantrang']=$phanTranng->HienThiPhanTrang();

			$vitri = $phanTranng->pageHienTai;
			$data['DanhSachKhachSan'] = $ks->DanhSachKhachSan($email,2,$vitri,$this->soHangTrenPage,'',0,0,array(),2,2);
			//print_r($data['phantrang']);	
			return $this->loadView('home',$data);
		}
		
	}
}
?>