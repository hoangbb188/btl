<?php

class Controller{
	protected $soHangTrenPage = 5; //số record hiển thị trên một trang

	protected $soPageHienThi = 5; //số trang hiển thị trong một group trang

	public function __construct()
	{

		if(isset($_GET['check-in'],$_GET['check-out'])){
			if((strtotime($_GET['check-out'])-strtotime($_GET['check-in']))/3600*24>=1){
				$_SESSION['time']['check-in'] = date("m/d/Y", strtotime($_GET['check-in']));
				$_SESSION['time']['check-out'] = date("m/d/Y", strtotime($_GET['check-out']));
			}
		}

		if(!isset($_SESSION['time']['check-in'],$_SESSION['time']['check-out'])){
			$_SESSION['time']['check-in'] = date("m/d/Y", time() + 3600 * 24);
			$_SESSION['time']['check-out'] = date("m/d/Y", time() + 3600 * 24 * 2);
		}
	}

	public function DinhDangNgay($date,$loai=0)
	{
		if($loai == 0) return date("Y-m-d",strtotime($date));
		else return date("d-m-Y",strtotime($date));
	}


	public function sodem($gt1,$gt2)
	{
		//echo $gt1.'-'.$gt2.'<brr>';
		return (strtotime($gt1) - strtotime($gt2))/(3600*24);
	}


	public function loadView($view, $data=array())
	{
		$controller = isset($_GET['controller']) && !empty($_GET['controller']) ? $_GET['controller'] : 'trang-chu/trang-chu';
		$arr_controller = array('trang-chu','quan-ly','mgg');
		$arr_con = explode("/", $controller);
		//if(in_array($arr_con[0], $arr_controller))
		include("view/".$arr_con[0]."/layout.php");
	}


	public function KiemTraSS($loai = 0)
	{
		if($loai == 2){
			if(!isset($_SESSION['quanly']) || $_SESSION['quanly']['loai'] != 2) return $this->loadView('404');
		}elseif($loai == 1) {
			if(!isset($_SESSION['quanly'])) return $this->loadView('404');
		} else {
			if(!isset($_SESSION['trangchu'])) return $this->loadView('404');
		}
	}

	public function ChongHack($value){
		return htmlspecialchars(strip_tags(trim($value)));
	}

	public function convert_vi_to_en($str) {
      $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
      $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
      $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
      $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
      $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
      $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
      $str = preg_replace("/(đ)/", "d", $str);
      $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
      $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
      $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
      $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
      $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
      $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
      $str = preg_replace("/(Đ)/", "D", $str);
      //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
      return $str;
  	}

	public function huong_nhin($value=0){
		switch ($value) {
			case '1':
				return 'Biển';
				break;
			case '2':
				return 'Phố';
				break;
			case '3':
				return 'Bể Bơi';
				break;
			default:
				return 'Không';
				break;
		}
	}

	public function dinh_dang_thu($value = 0){
		switch ($value) {
			case 1:
				$kq = 'Thứ Hai';
				break;
			case 2:
				$kq = 'Thứ Ba';
				break;
			case 3:
				$kq = 'Thứ Tư';
				break;
			case 4:
				$kq = 'Thứ Năm';
				break;
			case 5:
				$kq = 'Thứ Sáu';
				break;
			case 6:
				$kq = 'Thứ Bảy';
				break;		
			default:
				$kq = 'Chủ nhật';
				break;
		}
		return $kq;
	}



	public function XepLoaiDanhGia($diem){
		$hihi = '';
		if($diem>=8){
			$hihi = 'Xuất Sắc';
		}else if($diem>=6.5 && $diem<=7.9){
			$hihi = 'Tốt';
		}else if($diem>=5.0 && $diem<=6.4){
			$hihi = 'Tốt vừa vừa';
		}else{
			$hihi = 'Hơi tốt';
		}
		return $hihi;
	}

}

?>