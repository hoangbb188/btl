<?php
function huong_nhin($value=0){
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

function dinh_dang_thu($value = 0){
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

function sodem($gt1,$gt2){
	//echo $gt1.'-'.$gt2.'<brr>';
	return (strtotime($gt1) - strtotime($gt2))/(3600*24);
}


function XepLoaiDanhGia($diem){
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
?>