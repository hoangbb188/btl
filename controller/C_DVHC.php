<?php
include "model/M_DVHC.php";
class C_DVHC
{
	function HienThiDanhSachTinh()
	{
		$DVHC = new M_DVHC;
		return $DVHC->HienThiDanhSachTinh();
	}


	function HienThiDanhSachHuyen($matp)
	{
		$DVHC = new M_DVHC;
		return $DVHC->HienThiDanhSachHuyen($matp);
	}


	function GetThongTin($id,$loai) //loai 1 là tỉnh TP, 0 là quận huyện
	{
		$DVHC = new M_DVHC;
		return $DVHC->ThongTin($id,$loai);
	}
}
?>