<?php
include_once 'controller/controller.php';
include_once 'controller/C_DVHC.php';
include_once "controller/C_danhgia.php";
include_once 'controller/C_phanTrang.php';
include_once "controller/trang-chu/C_mgg.php";
include_once "controller/trang-chu/C_Hoadon.php";
include_once "model/M_user.php";
include_once "model/M_phong.php";

class C_user extends Controller
{

	//public $concavang = 10;

	public function HienThiDangNhap(){
		return $this->loadView('dang-nhap');
	}



	public function DangNhap($email,$password)
	{
		$user = new M_user;
		$data = $user->DangNhap($email);
		$xuat = array();
		if(empty($data)){
			$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Không tồn tại tài khoản');
		}else{
			if($data['MatKhau'] == $password){
				$xuat = array(	'trangthai' => 'thanhcong',
								'thongbao' => 'Đăng nhập thành công');
				$arr_session = array(	'TaiKhoan' => $email,
										'Ten' => $data['Ten'],
										'DiaChi' => $data['DiaChi'],
										'TP' => $data['TP'],
										'SDT' => $data['SDT']
										//,'dangnhap' =>true
									);
				//if(!isset($_SESSION['loi'])) unset($_SESSION['loi']); //hủy session lỗi bên đăng nhập ( bật khi chưa đăng nhập mà đòi thanh toán)
				$this->setSession($arr_session);
			}else{
				$xuat = array(	'trangthai' => 'loi',
								'thongbao' => 'Sai mật khẩu');
			}
		}
		return $xuat;
	}

	public function HienThiDangKy()
	{
		return $this->loadView('dang-ky');
	}


	public function LichSuGD($start=-1,$limit=-1)
	{
		$this->KiemTraSS();
		$user = new M_user;
		$email = $_SESSION['trangchu']['TaiKhoan'];
		return $user->LichSuGD($email,0,$start,$limit);
	}

 
	public function HienThiThongTinTaiKhoan()
	{
		$this->KiemTraSS();
		$user = new M_user;
		$data = array();
		$email = $_SESSION['trangchu']['TaiKhoan'];
		$TTTaiKhoan = $user->DangNhap($email);
		$data['sodu'] = $TTTaiKhoan['SoDu'];
		$act = isset($_GET['act']) && !empty($_GET['act'])? $_GET['act'] : 'quan-ly';
		if($act == 'info'){
			$DVHC = new C_DVHC;
			$data['tinh'] = $DVHC->HienThiDanhSachTinh();
		}elseif ($act == 'danh-gia') {
			$danhgia = new C_danhgia;
			$tongSoRecord = $danhgia->DanhSachKhachSanChuaDanhGia($email);
			//echo $tongSoRecord;
			$phanTrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi); //tổng số record aka dòng trong data sau truy vấn,số record hiển thị mỗi trang, số trang hiển thị theo nhóm trang.
			$data['PhanTrang'] = $phanTrang->HienThiPhanTrang();
			$vitri = $phanTrang->pageHienTai;//lấy vị trí hiện tại của trang
			$data['danh-gia'] =  $danhgia->DanhSachKhachSanChuaDanhGia($email,$vitri,$this->soHangTrenPage);
			if($data['danh-gia']):
				foreach ($data['danh-gia'] as $key => $gt) {
					if($danhgia->KiemTraReView($email,$gt['MKs'])){
						$data['danh-gia'][$key]['trangthai'] = 1;
					}else{
						$data['danh-gia'][$key]['trangthai'] = 0;
					}
				}
			endif;
		} else {
			$tongSoRecord = $this->LichSuGD();
			$phanTrang = new C_phanTrang($tongSoRecord,$this->soHangTrenPage,$this->soPageHienThi); //tổng số record aka dòng trong data sau truy vấn,số record hiển thị mỗi trang, số trang hiển thị theo nhóm trang.
			$data['PhanTrang'] = $phanTrang->HienThiPhanTrang();
			$vitri = $phanTrang->pageHienTai;//lấy vị trí hiện tại của trang
			$data['LichSuGD'] =  $this->LichSuGD($vitri,$this->soHangTrenPage);
			if($data['LichSuGD']):
				foreach ($data['LichSuGD'] as $key => $gt) {
					if($gt['Loai'] == 1){
						$log = array();
						$hoadon = new C_hoadon;
						$log = $hoadon->ChiTietHoaDon($gt['email'],$gt['MHd']);
						$data['LichSuGD'][$key]['NgayTra'] = $log['NgayTra'];
						$data['LichSuGD'][$key]['TrangThai'] = $log['TrangThai'];
					}
				}
			endif;
			
		}
		return $this->loadView('thong-tin-tai-khoan',$data);
	}


	public function DangKy($data)
	{
		$user = new M_user;
		$post = $user->DangNhap($data['TaiKhoan']);
		$xuat = array();
		if($post){
			$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Tài khoản này đã được đăng ký');
		} else {
			$abc = $user->DangKy($data);
			if($abc>0){
				$xuat = array(	'trangthai' => 'thanhcong',
								'thongbao' => 'Đăng ký thành công');
				$this->DangNhap($data['TaiKhoan'],$data['MatKhau']);
			} else {
				$xuat = array(	'trangthai' => 'loi',
								'thongbao' => 'Đăng ký thất bại');
			}
		}
		return $xuat;
	}

	public function DoiMatKhau($old_pw,$new_pw,$email)
	{
		$user = new M_user;
		$post = $user->DangNhap($email);
		$xuat = array();
		
		if($post['MatKhau'] == $old_pw){
			$data = array('MatKhau'=> $new_pw);
			$post = $user->SuaThongTin($email,$data);
			$xuat = array('trangthai' => 'thanhcong',
					'thongbao' => 'Đổi mật khẩu thành công');
		} else {
			$xuat = array('trangthai' => 'loi',
					'thongbao' => 'Mật khẩu cũ không hợp lệ');
		}
		return $xuat;
	}

	public function SuaThongTin($ten,$sdt,$diachi,$TP,$email)
	{
		$user = new M_user;
		$xuat = array();
		
		$data = array(
					'Ten'=>$ten,
					'DiaChi'=>$diachi,
					'TP'=>$TP,
					'SDT'=>$sdt
						);
		$user->SuaThongTin($email,$data);
		
		if(isset($_SESSION['trangchu'])&&$_SESSION['trangchu']['TaiKhoan']==$email)
			$this->setSession($data);
		if(isset($_SESSION['quanly'])&&$_SESSION['quanly']['TaiKhoan']==$email)
		{
			foreach ($data as $key => $value) {
				$_SESSION['quanly'][$key] = $value;
			}
		}
			
		$xuat = array('trangthai' => 'thanhcong',
					'thongbao' => 'Cập nhật thông tin tài khoản thành công');
		return $xuat;
	}

	public function HienThiThanhToan()
	{
		
		if(isset($_GET['hotel'],$_GET['room'])){
			if(!isset($_SESSION['trangchu'])){
				$_SESSION['url_back'] = $_SERVER['REQUEST_URI'];
				$res = array(	'trangthai' => 'loi',
									'thongbao' => 'Vui lòng đăng nhập để tiếp tục');
				$_SESSION['loi'] = json_encode($res);
				return $this->loadView('dang-nhap');
			} else {
				$data = array(	'time' => array(),'thongtinphong' => array(),'tinh'=>array());
				$id_hotel = isset($_GET['hotel']) ? intval($_GET['hotel']) : 0;
				$id_room = isset($_GET['room']) ? intval($_GET['room']) : 0;
				$soluong = isset($_GET['sophong']) && intval($_GET['sophong']) > 0  ? intval($_GET['sophong']) : 1;
				$phong = new M_phong;
				$ks = new M_khachsan;
				$data['soluong'] = $soluong;
				$data['thongtinphong'] = $phong->ThongTinPhong($id_room);
				if($data['thongtinphong'] && $data['thongtinphong']['MKs'] == $id_hotel){ //tồn tại phòng rồi mới cho xem
					if(isset($_SESSION['url_back'])) $this->destroySession(array('loi','url_back')); //hủy session lỗi bên đăng nhập ( bật khi chưa đăng nhập mà đòi thanh toán)

					/** Chơi lấy trường hết bên khách sạn luôn**/
					$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($id_hotel);
					$data['time'] = $_SESSION['time'];
					foreach ($data['time'] as $key => $value) {
						//echo $value.'<br>';
						$_getdate = getdate(strtotime($value)); //lấy tổng quan thông tin ngày date
						//print_r($_getdate);
						$data['time']['thu-'.$key] = $_getdate['wday']; //ném nó vào trong mảng rồi đổ ra
					}
					$DVHC = new C_DVHC;
					$data['tinh'] = $DVHC->HienThiDanhSachTinh();
					return $this->loadView('checkouts',$data);
				}
				
			}
			
		}
		return $this->loadView('404');
	}

	public function ThanhToan($arr)
	{
		$this->KiemTraSS();
		$user = new M_user;
		$phong = new M_phong;
		$ks = new M_khachsan;
		$mgg = new C_mgg;
		$email = $_SESSION['trangchu']['TaiKhoan'];

		$data = array('thongtinphong'=> array(), 
			'mgg' => array(), 
			'user' => array(), 
			'thongtinkhachsan'=>array()
		);

		$data['user'] = $user->DangNhap($email); //lấy thông tin tài khoản(số dư email tên ...)
		$id_hotel = isset($arr['hotel']) ? $arr['hotel'] : 0;
		$id_room = isset($arr['room']) ? $arr['room'] : 0;
		$so_luong = isset($arr['soluong']) ? intval($arr['soluong']) : 1;
		$ten = isset($arr['ten']) ? $arr['ten'] : '';
		$sdt = isset($arr['sdt']) ? $arr['sdt'] : '';
		$TP = isset($arr['TP']) ? $arr['TP'] : '';
		$data['thongtinphong'] = $phong->ThongTinPhong($id_room); //lấy thông tin phòng
		//echo $so_luong.'<hr>';
		if($data['thongtinphong'] && $data['thongtinphong']['MKs'] == $id_hotel){ //tồn tại thì làm tiếp
			$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($id_hotel);
			$email_doitac = $data['thongtinkhachsan']['email'];
			$checkin = $this->DinhDangNgay($_SESSION['time']['check-in']); //chuyển đổi m-d-Y thành Y-m-d
			$checkout = $this->DinhDangNgay($_SESSION['time']['check-out']);
			$so_dem = $this->sodem($checkout,$checkin);
			$gia_goc = $data['thongtinphong']['Gia']*$so_luong*$so_dem; //lấy giá
			//print_r($data['thongtinphong']);
			$tien_giam = 0; //set tiền giảm giá
			if(!empty($arr['code'])){ //kiểm tra xem tồn tại mã giảm giá trong mảng không
				$data['mgg'] = $mgg->KiemTra($arr['code'],$id_hotel); //kiểm tra mgg
				if($data['mgg']['trangthai'] == 'thanhcong'){ //thành công thì trừ tiền
					$tien_giam = $gia_goc/100*$data['mgg']['discount'];
				}else{
					return $data['mgg']; //xuất lỗi nếu xảy ra đối với mã gg
				}
			}
			//echo ($gia_goc - $tien_giam).'<hr>';
			/** Kiểm tra số dư và thanh toán **/
			if($data['user']['SoDu']<($gia_goc - $tien_giam)){
				$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Số dư không đủ để thanh toán');
			}else{
				//$sodu = $data['user']['SoDu'];
				$hoadon = new C_Hoadon;
				$mhd = $hoadon->ThemHoaDon($email,$ten,$sdt,$TP,$id_hotel,$id_room,$so_luong,$checkin,$checkout,$gia_goc,$tien_giam);
				//print_r($mhd);
				if($mhd){ //tồn tại mã hóa đơn mới thêm vào
					$this->ThemLichSuDoiTac($gia_goc,$tien_giam,$email_doitac,$mhd);
					$this->ThemLichSuKhachHang($gia_goc,$tien_giam,$email,$mhd);
					$this->ThemLichSuQuanLy($gia_goc,$tien_giam,'admin@LTW.com',$mhd);
					if(!empty($arr['code'])) $mgg->CapNhatSoLuong($arr['code']); //có sử dụng code giảm giá thì trừ số lượng đi 1
					$xuat = array(	'trangthai' => 'thanhcong',
							'thongbao' => 'Đặt phòng thành công');
				}else{
					$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Thử Lại sau');
				}
				
			}

		}else{
			$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Thông tin không hợp lệ');
		}

		return $xuat;
	}


	public function ThemLichSu($email,$mhd,$noidung,$thaydoi,$loai)
	{
		$user = new M_user;
		$data = array('email' => $email,
					'Mhd' => $mhd,
					'ThoiGian' => date("Y-m-d H:i:s"), //lấy create time
					'Noidung' => $noidung,
					'thaydoi' => $thaydoi,
					'Loai' => $loai	);
		$user->ThemLichSu($data);
	}


	public function ThemLichSuKhachHang($gia_goc,$tien_giam,$email,$mhd){
		$user = new M_user;
		$noi_dung = 'Thanh toán tiền phòng';
		$thay_doi = -($gia_goc - $tien_giam);
		$this->ThemLichSu($email,$mhd,$noi_dung,$thay_doi,1);
		$user->ThanhToan($email,($gia_goc - $tien_giam)); //mặc định trừ tiền
	}	

	public function ThemLichSuDoiTac($gia_goc,$tien_giam,$email,$mhd){
		$user = new M_user;
		$noi_dung = 'Được thanh toán tiền phòng';
		$thay_doi = + ($gia_goc - $tien_giam)*0.95;
		$this->ThemLichSu($email,$mhd,$noi_dung,$thay_doi,2);
		$user->ThanhToan($email,($gia_goc - $tien_giam)*0.95,1);
	}

	public function ThemLichSuQuanLy($gia_goc,$tien_giam,$email,$mhd){
		$user = new M_user;
		$noi_dung = 'Được nhận hoa hồng 5%';
		$thay_doi = ($gia_goc - $tien_giam)*0.05;
		$this->ThemLichSu($email,$mhd,$noi_dung,$thay_doi,3);
		$user->ThanhToan($email,($gia_goc - $tien_giam)*0.05,1); //loại 1 cộng tiền
	}

	public function GuiGopY($rate,$comment,$email)
	{
		$user = new M_user;
		$data = array('rate'=> $rate,
		'binhluan'=> $comment,
		'contact'=> $email,
		'ThoiGian'=> date("Y/m/d H:i:s")
		);
		$post = $user->GuiGopY($data);
		if($post){
			$xuat = array(	'trangthai' => 'thanhcong',
							'thongbao' => 'Gửi thành công');
		} else {
			$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Gửi thất bại');
		}
		return $xuat;
	}


	public function DanhGia($MKs,$Vitri,$PhucVu,$Tiennghi,$Giaca,$Vesinh,$nhanxet)
	{
		$this->KiemTraSS();
		$email = $_SESSION['trangchu']['TaiKhoan'];
		$hoadon = new C_Hoadon;
		$danhgia = new C_danhgia;
		$data = array(
			'ViTri' => $Vitri,
			'PhucVu' => $PhucVu,
			'TienNghi' => $Tiennghi,
			'Gia' => $Giaca,
			'VeSinh'=> $Vesinh,
			'NhanXet' => $nhanxet,
			'Ngay' => date("Y/m/d H:i:s")
		);
		//print_r($hoadon->KiemTraDatKhachSan($email,$MKs));
		if($hoadon->KiemTraDatKhachSan($email,$MKs)){ //kiểm tra xem đã từng đặt phòng chưa
			if($danhgia->KiemTraReView($email,$MKs)){ //kiểm tra tồn tại đánh giá người dùng khách sạn này hay chưa
				$danhgia->CapNhatReView($email,$MKs,$data); //nếu tồn tại thì cập nhật lại
				$xuat = array(	'trangthai' => 'thanhcong',
								'thongbao' => 'Cập nhật đánh giá thành công');
			}else{ //chưa thì thêm mới
				$data['email'] = $email;
				$data['Mks'] = $MKs;
				$post = $danhgia->ThemReView($data);
				$xuat = array(	'trangthai' => 'thanhcong',
								'thongbao' => 'Đánh giá thành công');
	 		}
 		}else{
 			$xuat = array(	'trangthai' => 'loi',
						'thongbao' => 'Bạn chưa được xác nhận đặt phòng ở đây');
 		}
		return $xuat;
	}

	public function logout()
	{
		unset($_SESSION['trangchu']);
		header("Location:index.html");
	}

	public function setSession($data = array())
	{
		foreach ($data as $key => $value) {
			$_SESSION['trangchu'][$key] = $value;
		}
	}

	public function destroySession($data = array())
	{
		foreach ($_SESSION as $key => $value) {
			if(in_array($key, $data)) unset($_SESSION[$key]);
		}
	}
}
?>