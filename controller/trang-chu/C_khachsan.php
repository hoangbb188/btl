<?php
include_once 'controller/controller.php';
require_once 'controller/C_phanTrang.php';
include_once 'controller/C_DVHC.php';
include_once "controller/C_danhgia.php";
include_once "model/M_khachsan.php";
include_once "model/M_phong.php";
class C_khachsan extends Controller
{
	public function HienThiTimKiem()
	{
		$keyword = isset($_GET['keyword']) ? $this->convert_vi_to_en(addslashes($_GET['keyword']))  : '';
		$songuoi = isset($_GET['check-person']) ? intval($_GET['check-person']) : 0; //lấy số người
		$sophong = isset($_GET['check-room']) ? intval($_GET['check-room']) : 0; //lấy số phòng
		$ks = new M_khachsan;
		$type = isset($_GET['type']) ? $_GET['type'] : 'hotel';
		$data = array('kq'=>'');
		if(!empty($keyword)){
			switch ($type) {
				case 'city':
					$type = 1;
					break;
				case 'district':
					$type = 2;
					break;
				default:
					$type = 0;
					break;
			}
		}

		if($type == 0){
			$tongSoRecord = $ks->TimKiem($keyword,-1,-1,$type,$sophong,$sophong);
		}else{
			$tongSoRecord = $ks->TimKiem($keyword,-1,-1,$type);
		}
		//echo 'hihi'.$tongSoRecord;
		$PhanTrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi); //tổng số record aka dòng trong data sau truy vấn,số record hiển thị mỗi trang, số trang hiển thị theo nhóm trang.
		$data['PhanTrang'] = $PhanTrang->HienThiPhanTrang();
		$vitri = $PhanTrang->pageHienTai;//lấy vị trí hiện tại của trang

		if($type == 0){
			$data['kq'] = $ks->TimKiem($keyword,$vitri,$this->soHangTrenPage,$type,$sophong,$sophong);
		}else{
			$data['kq'] = $ks->TimKiem($keyword,$vitri,$this->soHangTrenPage,$type);
		}

		return $this->loadView('quick-search',$data);
	}

	public function HienThiThongTinKhachSan()
	{
		if(isset($_GET['hotel']) && !empty($_GET['hotel'])){
			$id_hotel = intval($_GET['hotel']);
			$data = array('tongquan'=>array(), 'thongtinkhachsan'=> array(),'danhsachphong'=>array(), 'danhsachdanhgia' => array());
			$ks = new M_khachsan;
			$phong = new M_phong;
			$danhgia = new C_danhgia;
			$data['tongquan'] = $danhgia->TongQuanDanhGiaKhachSan($id_hotel);
			$tongSoRecord = $danhgia->DanhSachDanhGiaKhachSan($id_hotel);
			$PhanTrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi); //tổng số record aka dòng trong data sau truy vấn,số record hiển thị mỗi trang, số trang hiển thị theo nhóm trang.
			$data['PhanTrang'] = $PhanTrang->HienThiPhanTrang();
			$vitri = $PhanTrang->pageHienTai;//lấy vị trí hiện tại của trang
			$data['danhsachdanhgia'] = $danhgia->DanhSachDanhGiaKhachSan($id_hotel,$vitri,$this->soHangTrenPage);
			$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($id_hotel,1);
			$data['danhsachphong'] = $phong->DanhSachPhong($id_hotel);
			$data['thuvienanh'] = $this->LayThuVienAnh($id_hotel,-1,1); //id phòng, id khách sạn, loại 1 chung 2 khách sạn
			if($data['thongtinkhachsan'])
				return $this->loadView('thong-tin-khach-san',$data);
		}
		return $this->loadView('404');
		
	}

	public function HienThiDanhSachKhachSan()
	{
		$id = array();
		$id['city'] = isset($_GET['city']) ? addslashes($_GET['city']) : 0;
		$id['district'] = isset($_GET['district']) ? $this->convert_vi_to_en(addslashes($_GET['district'])) : 0;
		$tenks = isset($_GET['name']) ? addslashes($_GET['name']) : '';
		$min_value = isset($_GET['min_value']) && $_GET['min_value']>0 ? intval($_GET['min_value']) : 0;
		$max_value = isset($_GET['max_value']) && $_GET['max_value']>0 ? intval($_GET['max_value']) : 0;
		$min_value = ($min_value>$max_value) ? 0 : $min_value;
		$sao = isset($_GET['sao']) && is_array($_GET['sao']) ? $_GET['sao'] : array();
		$hotel_type = isset($_GET['hotel_type']) ? intval($_GET['hotel_type']) : 2;
		if($id['city'] || $id['district']){
			$data = array('danhsachkhachsan' => array(),
			'thongtinvitri' => array(),
			'min_price' => array(),
			'tongquan' => array(),
			'tienich' => array(),
			'PhanTrang' => '');
			$loai = 0;
			$id_location = $id['district'];
			if($id['city']){ $loai = 1; $id_location = $id['city'];}
			$dvhc = new C_DVHC;
			$data['thongtinvitri'] = $dvhc->GetThongTin($id_location,$loai);
			//print_r($data);
			if($data['thongtinvitri']){

				$ks = new M_khachsan;
				$phong = new M_phong;
				$danhgia = new C_danhgia;
				$tongSoRecord = $ks->DanhSachKhachSan($id_location,$loai,-1,-1,$tenks,$min_value,$max_value,$sao,$hotel_type,1); //1 là trạng thái đã duyệt
				$PhanTrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi); //tổng số record aka dòng trong data sau truy vấn,số record hiển thị mỗi trang, số trang hiển thị theo nhóm trang.
				$data['PhanTrang'] = $PhanTrang->HienThiPhanTrang();
				$vitri = $PhanTrang->pageHienTai;//lấy vị trí hiện tại của trang
				$data['danhsachkhachsan'] = $ks->DanhSachKhachSan($id_location,$loai,$vitri,$this->soHangTrenPage,$tenks,$min_value,$max_value,$sao,$hotel_type,1); //1 là trạng thái đã duyệt
				if(is_array($data['danhsachkhachsan'])):
					foreach ($data['danhsachkhachsan'] as $key => $gt) {
						//$data['tongquan'][$gt['id']] = $user->TongQuanDanhGiaKhachSan($gt['id']);
						$data['tongquan'][$gt['id']] = $danhgia->TongQuanDanhGiaKhachSan($gt['id']);
						/** Tìm Phòng giá nhấp nhất **/
						$arr_min_price = $phong->MinPrice($gt['id']); //tìm phòng giá thấp nhất
						$data['min_price'][$gt['id']] = $arr_min_price['gia'];
						/** Lấy tiện nghi chung khách sạn **/
						$data['tienich'][$gt['id']] = $this->GetTienIch($gt['TienIch']); //thêm tiện ích vào mỗi khách sạn
					}
				endif;
				return $this->loadView('danh-sach-khach-san',$data);
			}
			
		}
		return $this->loadView('404');
	}

	public function LayThuVienAnh($id_hotel,$id_room = -1,$loai = -1){
		$phong = new M_phong;
		$data = array();
		$data = $phong->LayThuVienAnh($id_hotel,$id_room,$loai);
		if(is_array($data)) return $data;
		return 0;
	}

	public function GetTienIchPhong($id){
		$phong = new M_phong;
		$data = array();
		$data = $phong->ThongTinPhong($id);
		if(is_array($data)){
			return $this->GetTienIch($data['TienIch']);
		}
		//return 0;
	}
	public function GetTienIch($data){
		$data = trim($data,":");
		if(empty($data)) return 0;
		$ks = new M_khachsan;
		$arr_tienich = explode(":", $data);
		$arr_xuat_tienich = array();
		foreach ($arr_tienich as $value) {
			$arr_xuat_tienich[] = $ks->GetThongTinTienIch($value);
		}
		return $arr_xuat_tienich;
	}

}
?>