<?php
include_once 'model/dbconnect.php';
class M_DVHC extends database
{
	public function HienThiDanhSachTinh()
	{
		$this->select("tinhtp");	
		return $this->getAllrows();
	}

	public function HienThiDanhSachHuyen($matp)
	{
		$this->select("quanhuyen","matp=$matp");
		//	print_r($this->result);
		return $this->getAllrows();
	}

	public function ThongTin($id,$loai)
	{
		if($loai == 1){
			$this->exec("SELECT tt.matp as matp, tt.name as tentinh
				FROM tinhtp tt WHERE matp = $id");
		} else {
			$this->exec("SELECT qh.maqh as maqh, qh.name as tenqh, tt.matp as matp, tt.name as tentinh
				FROM quanhuyen qh INNER JOIN tinhtp tt ON qh.matp = tt.matp
				WHERE maqh = $id");
		}
		return $this->getrow();
	}

}
?>