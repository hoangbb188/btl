<?php
include_once 'model/dbconnect.php';

class M_hoadon extends database
{
	public function ThemHoaDon($data)
	{
		//print_r($data);
		$this->insert("hoadon",$data);
		return $this->insert_id;
	}

	public function KiemTraMaBaoMat($code_security)
	{
		$this->select("hoadon","`MaBaoMat` = '$code_security'");
		return $this->getrow();
	}

	public function ChiTietHoaDon($email,$mhd, $MKs=0)
	{
		if($MKs){
			$this->select("hoadon","`MKs` = $MKs AND `MHd` = '$mhd'");
		}
		else
			$this->select("hoadon","`email` = '$email' AND `MHd` = '$mhd'");
		return $this->getrow();
	}

	public function DanhSachHoaDon($MKs,$TrangThai=0,$start=-1,$limit=-1) // bằng 0 là chưa nhận phòng, 1 là đã nhận phòng , 2 là đã trả phòng
	{
		$q = "SELECT hd.*, p.LoaiP FROM hoadon hd INNER JOIN phong p ON p.MP = hd.MP WHERE hd.MKs = $MKs AND hd.TrangThai=$TrangThai ORDER BY NgayDat DESC";
		
		if($start > -1 && $limit > -1){
			$q .= " LIMIT ".(($start-1)*$limit).",".$limit;	
			$this->exec($q);
			return $this->getAllrows();
		}
		$this->exec($q);
		return $this->num_rows;
		
	}

	public function SoHoaDonThuePhong($MP,$TrangThai) // Đếmo số hóa đơn đang thuê phòng hoặc chưa xác nhận phòng
	{
		$q = "SELECT * FROM hoadon hd INNER JOIN phong p ON p.MP = hd.MP WHERE hd.MP = $MP AND hd.TrangThai=$TrangThai  AND p.Xoa =0";
		if($TrangThai==0){ // đơn chưa xác nhận
			$q.=" AND hd.NgayTra >= CURDATE()";
		}
		$this->exec($q);
		return $this->num_rows;
	}
	
	public function SoHoaDonThueKhachSan($MKs,$TrangThai) // Đếm số hóa đơn đang thuê phòng của khách sạn hoặc chưa xác nhận phòng của khách sạn
	{
		$q = "SELECT * FROM hoadon hd INNER JOIN phong p ON p.MP = hd.MP WHERE hd.MKs = $MKs AND hd.TrangThai=$TrangThai  AND p.Xoa =0";
		if($TrangThai==0){ // đơn chưa xác nhận
			$q.=" AND hd.NgayTra >= CURDATE()";
		}
		$this->exec($q);
		return $this->num_rows;
	}
														//Trạng thái 0 là chưa nhập mã
	public function CapNhatTrangThai($MHd,$TrangThai=1)  // Trạng thái bằng 1 là đã nhập mã xác nhận
	{													//Trạng thái bằng 2 là đã trả phòng
		return $this->update("hoadon",array('TrangThai'=>$TrangThai),"MHd=$MHd");
	}

	public function KiemTraDatKhachSan($email,$MKs)
	{
		$this->select("hoadon","`email`= '$email' AND `MKs` = $MKs AND `TrangThai` = 1");
		return $this->num_rows;
	}
	
}
?>