<?php
@date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
ob_start();
define('LTW', true);
//print_r($_SESSION);
$arr_user = array('dang-ky' , 'dang-nhap', 'thanh-toan',
					'thong-tin-tai-khoan', 'xet-duyet',
					'nap-tien','lich-su-admin','ma-giam-gia-admin'
				 );
				 
$arr_ks = array(
				'tim-kiem', 'thong-tin-khach-san',
				'danh-sach-khach-san' ,'khach-san',
				'tien-nghi', 'khach-san-admin',	
				'phong','ma-giam-gia','lich-su', 'thu-vien-anh'
				);

$arr_mgg = array('danh-sach-mgg');
$arr_controller = array('trang-chu','quan-ly');
$arr_hoadon = array('don-dat-phong');
$controller = isset($_GET['controller']) && !empty($_GET['controller']) ? $_GET['controller'] : 'trang-chu/trang-chu';
if(strpos($controller, "/") == false) die(); 
$arr_con = explode("/", $controller);	
//print_r($arr_con);
if(in_array($arr_con[0], $arr_controller)){
	if(in_array($arr_con[1], array_merge($arr_user,$arr_ks,$arr_controller,$arr_hoadon,$arr_mgg)) == false) die();
	if(in_array($arr_con[1], $arr_user)){
		$modul =  "C_user";
	}
	else if(in_array($arr_con[1], $arr_ks)){
		$modul =  "C_khachsan";
	}
	else if(in_array($arr_con[1], $arr_hoadon)){
		$modul = "C_Hoadon";
	}
	else if(in_array($arr_con[1], $arr_mgg)){
		$modul = "C_mgg";
	}
	else{
		$modul = "C_Trangchu";
	}
	
	$file = "controller/".$arr_con[0]."/$modul.php";
	//echo $file;
	if(file_exists($file)){
		include $file;
		$ht = new $modul();
		$index = "HienThi".InHoa($arr_con[1]);

		if(!method_exists($ht,$index))
		{
			include "view/$arr_con[0]/404.php"; die();
		}
			
		echo $ht->$index();
	}
}
else 
	include "view/trang-chu/404.php"; die();
function InHoa($string){
	trim($string,"-");
	if($string == "") return;
	//cach 1
	/*
	for($i = 0;$i<strlen($string);$i++){
		if($i == 0) $string[$i] = strtoupper($string[$i]);
		else if($string[$i] == '-'){
			$string[$i+1] = strtoupper($string[$i+1]);
			$i++;
		}
	}
	$string = str_replace("-", "", $string);
	*/
	//cach 2
	$arr_str = explode("-", $string);
	foreach ($arr_str as $key => $value) {
		ucwords($value);
	}
	$string = implode("", $arr_str);
	return $string;
}