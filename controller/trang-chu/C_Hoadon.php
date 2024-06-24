<?php
include_once 'controller/controller.php';
include_once 'controller/C_DVHC.php';
include_once "model/M_phong.php";
include_once 'model/M_hoadon.php';
class C_Hoadon extends Controller
{
	public function HienThiDonDatPhong()
	{
		$this->KiemTraSS();
		if(isset($_GET['mhd'])){
			$mhd = intval($_GET['mhd']);
			$hoadon = new M_hoadon;
			$DVHC = new C_DVHC;
			$data = array();
			$email = $_SESSION['trangchu']['TaiKhoan'];
			$data = array('chitiethoadon'=>array(),'thongtinphong'=>array(),'thongtinkhachsan'=>array());
			$data['chitiethoadon'] = $this->ChiTietHoaDon($email,$mhd);
			if($data['chitiethoadon']){
				$phong = new M_phong;
				$ks = new M_khachsan;
				$id_room = $data['chitiethoadon']['MP'];
				$id_hotel = $data['chitiethoadon']['MKs'];
				$data['thongtinphong'] = $phong->ThongTinPhong($id_room);
				$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($id_hotel);
				$data['tinh'] = $DVHC->GetThongTin($data['chitiethoadon']['TP'],1);
				return $this->loadView('chi-tiet-hoa-don',$data);
			}
			
		}
		return $this->loadView('404');
	}

	public function ChiTietHoaDon($email,$mhd){
		$hoadon = new M_hoadon;
		return $hoadon->ChiTietHoaDon($email,$mhd);
	}

	public function ThemHoaDon($email,$ten,$sdt,$TP,$mks,$mp,$sl,$ngaydat,$ngaytra,$tien,$giamgia){
		$this->KiemTraSS();
		$hoadon = new M_hoadon; 
		do{
			$mabimat = $this->NgauNhienMa();
		}while ($hoadon->KiemTraMaBaoMat($mabimat));
		$data = array('email' => $email,
				'Ten' => $ten,
				'TP' => $TP,
				'SDT' => $sdt,
				'Mks' => $mks,
				'MP' => $mp,
				'SL' => $sl,
				'NgayDat' => $ngaydat,
				'NgayTra' => $ngaytra,
				'TGDat' => date('Y/m/d H:i:s'),
				'Tien' => $tien,
				'GiamGia' => $giamgia,
				'MaBaoMat'=> $mabimat
				);
		return $hoadon->ThemHoaDon($data);
	}


	public function KiemTraDatKhachSan($email,$MKs){
		$this->KiemTraSS();
		$hoadon = new M_hoadon; 
		return $hoadon->KiemTraDatKhachSan($email,$MKs);
	}

	public function NgauNhienMa(){
		$str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = '';
		$i = 1;
		while ($i <= 10) {
			$code .= $str[rand(0,(strlen($str)-1))];
			$i++;
		}
		return $code;
	}
}

?>