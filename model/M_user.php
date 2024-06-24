<?php
include_once 'model/dbconnect.php';
class M_user extends database
{

	public function DangNhap($taikhoan)
	{
		//echo $taikhoan;
		$this->select("taikhoan","TaiKhoan = '$taikhoan'");
		return $this->getrow();
	}

	public function DangKy($data)
	{
		$this->insert("taikhoan",$data);
		return $this->insert_id;
	}

	public function DoiMatKhau($taikhoan,$data)
	{
		$this->update("taikhoan",$data,"`TaiKhoan` = '$taikhoan'");
	}

	public function SuaThongTin($taikhoan,$data)
	{
		$this->update("taikhoan",$data,"`TaiKhoan` = '$taikhoan'");
	}
	public function setLoai($taikhoan,$type=1)
	{
		$data = array('Loai'=>1);
		$this->update("taikhoan",$data,"`TaiKhoan` = '$taikhoan'");
	}

	public function ThanhToan($taikhoan,$tienthanhtoan,$loai = 0)
	{
		if($loai == 0){
			$this->exec("UPDATE taikhoan set `SoDu` = `SoDu` - $tienthanhtoan WHERE TaiKhoan = '$taikhoan'");
		}else{
			$this->exec("UPDATE taikhoan set `SoDu` = `SoDu` + $tienthanhtoan WHERE TaiKhoan = '$taikhoan'");
		}
	}

	public function LichSuGD($taikhoan,$MKs=0,$start=-1,$limit=-1,$admin=false)
	{
		if($admin==false)  // NẾu k phải lịch sử GD của admin
		{
			if($MKs){
				$q = "SELECT ls.*, hd.MKs, hd.TrangThai, hd.NgayTra FROM lichsugd ls INNER JOIN hoadon hd ON hd.MHd = ls.MHd 
				WHERE hd.MKs = $MKs AND Loai = 2 ORDER BY `MGd` DESC";
			}
			else{
				$q = "SELECT * FROM lichsugd WHERE `email` = '$taikhoan' AND (Loai = 0 OR Loai = 1) ORDER BY `MGd` DESC";
			}
		}
		else
		{
			$q = "SELECT * FROM lichsugd WHERE `email` = '$taikhoan' AND (Loai = 3 OR Loai = 4) ORDER BY `MGd` DESC";
		}			
		if($start > -1 && $limit > -1){
			$q .= " LIMIT ".(($start-1)*$limit).",".$limit;
			$this->exec($q);
			return $this->getAllrows();
		}
		$this->exec($q);
		return $this->num_rows;
	}

	public function TongDoanhThu($MKs,$NgayBatDau=0,$NgayKetThuc=0,$email='')
	{
		if($MKs==0&&$email!=''){
			$this->exec("SELECT SUM(ThayDoi) AS TongDanhThu FROM lichsugd ls
			WHERE Loai=3 AND ls.email = '$email' AND ls.ThoiGian BETWEEN '$NgayBatDau' AND '$NgayKetThuc'");
		}
		else{
			if(!$NgayBatDau||!$NgayKetThuc){
				$this->exec("SELECT SUM(ThayDoi) AS TongDanhThu FROM lichsugd ls INNER JOIN hoadon hd ON ls.MHd = hd.MHd WHERE Loai=2 AND hd.MKs = $MKs");
			}
			else{
				$this->exec("SELECT SUM(ThayDoi) AS TongDanhThu FROM lichsugd ls INNER JOIN hoadon hd ON ls.MHd = hd.MHd 
				WHERE Loai=2 AND hd.MKs = $MKs AND ls.ThoiGian BETWEEN '$NgayBatDau' AND '$NgayKetThuc'");
			}
		}
	
		return $this->getrow();
	}

	
	public function ThemLichSu($data)
	{
		$this->insert("lichsugd",$data);
		return $this->insert_id;
	}

	public function GuiGopY($data)
	{
		$this->insert("gopy",$data);
		return $this->insert_id;
	}

	public function AllGopY()
	{
		$this->exec("SELECT * FROM `gopy` ORDER BY ThoiGian DESC");
		return $this->getAllrows();
	}



};
?>