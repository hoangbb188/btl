<?php
include_once 'model/M_danhgia.php';
include_once 'controller/controller.php';

class C_danhgia extends Controller
{

	public function CapNhatReView($taikhoan,$MKs,$data){
		$this->KiemTraSS();
		$danhgia = new M_danhgia;
		$danhgia->CapNhatReView($taikhoan,$MKs,$data);
	}

	public function ThemReView($data){
		$this->KiemTraSS();
		$danhgia = new M_danhgia;
		return $danhgia->ThemReView($data);
	}
	
	public function DanhSachDanhGiaKhachSan($MKs,$vitri=-1,$limit=-1)
	{ //xuất ra danh sách người dùng đánh giá khách sạn
		//$this->KiemTraSS();
		$danhgia = new M_danhgia;
		return $danhgia->DanhSachDanhGiaKhachSan($MKs,$vitri,$limit);
	}

	public function DanhSachKhachSanChuaDanhGia($email,$start=-1,$limit=-1)
	{ //danh sách khách sạn user thuê nhưng chưa đánh giá
		$this->KiemTraSS();
		$danhgia = new M_danhgia;
		return $danhgia->DanhSachKhachSanChuaDanhGia($email,$start,$limit);
	}

	public function TongQuanDanhGiaKhachSan($MKs)
	{ //xuất ra trung bình rate dịch vụ 
		//$this->KiemTraSS(); 
		$danhgia = new M_danhgia;
		return $danhgia->TongQuanDanhGiaKhachSan($MKs);	
	}

	public function KiemTraReView($taikhoan,$MKs)
	{ //kiểm tra xem tài khoản đã đánh giá khách sạn này chưa
		$danhgia = new M_danhgia;
		return $danhgia->KiemTraReView($taikhoan,$MKs);
	}


}
?>