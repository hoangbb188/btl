<?php
include_once 'model/M_mgg.php';
include_once 'controller/controller.php';
include_once 'controller/C_phanTrang.php';
class C_mgg extends Controller
{
	private $xuat = array();
	public function KiemTra($code,$MKs = 0)
	{
		$this->KiemTraSS();
		$data = $this->GetThongTin($code);
		if($data){
			if(strtotime($data['NgayHetHan'])<time()){
				$this->xuat = array(	'trangthai' => 'loi',
								'thongbao' => 'Mã này đã hết hạn sử dụng');
			} else if($data['SL'] < 1) {
				$this->xuat = array(	'trangthai' => 'loi',
								'thongbao' => 'Mã này đã hết lượt sử dụng');
			} elseif($data['Loai'] == 0 && $data['MKs'] != $MKs) { //Loại 0 cho khách sạn,1 là tất cả
				$this->xuat = array(	'trangthai' => 'loi',
								'thongbao' => 'Mã này không dùng cho khách sạn/ nhà nghỉ này');
			} else {
				$this->xuat = array(	'trangthai' => 'thanhcong',
								'discount' => $data['Giam'],
								'thongbao' => 'Mã này sử dụng được');
			}
		} else {
			$this->xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Không tồn tại mã này');
		}
		return $this->xuat;
	}

	public function GetThongTin($code)
	{
		$mgg = new M_mgg;
		$data = $mgg->Check($code);
		return $data;
	}

	public function CapNhatSoLuong($code){
		$mgg = new M_mgg;
		$data = $mgg->Sudung($code);
	}

	public function HienThiDanhSachMgg(){
		$data = array();
		$mgg = new M_mgg;
		$tongSoRecord = $mgg->AllMgg(0,2,-1,-1); // loại 0 cho hiển thị mgg của khách sạn, 1 hiển thị cho loại chung, 2 hiển thị tất cả
		$PhanTrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi);
		$data['PhanTrang'] = $PhanTrang->HienThiPhanTrang();
		$vitri = $PhanTrang->pageHienTai;//lấy vị trí hiện tại của trang
		$data['DanhSachMgg'] = $mgg->AllMgg(0,2,$vitri,$this->soHangTrenPage);
		return $this->loadView('danh-sach-mgg',$data);
	}
}
?>