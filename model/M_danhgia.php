<?php
include_once 'model/dbconnect.php';
class M_danhgia extends database
{
	
	public function CapNhatReView($taikhoan,$MKs,$data)
	{
		$this->update("danhgia",$data,"`email`='$taikhoan' AND `MKs` = '$MKs'");
	}

	public function ThemReView($data){
		//print_r($data);
		return $this->insert("danhgia",$data);
		//return $this->insert_id;
	}

	public function KiemTraReView($taikhoan,$MKs) //xem tài khoản đã đánh giá KS đó chưa
	{
		$this->select("danhgia","`email`='$taikhoan' AND `MKs` = '$MKs'");
		return $this->getrow();
	}


	public function DanhSachDanhGiaKhachSan($MKs,$start,$limit) //top 5 đánh giá mới nhất của KH về KS
	{
		$q = "SELECT dg.*, tk.Ten
			FROM danhgia dg
			INNER JOIN taikhoan tk ON tk.TaiKhoan = dg.email
			WHERE dg.MKs = '$MKs' ORDER BY `id` DESC
			";
		$this->exec($q);

		if($start> -1 && $limit > -1){
			$q .= " LIMIT ".($start-1)*$limit.",$limit";
			$this->exec($q);
			return $this->getAllrows();
		}
		$this->exec($q);
		return $this->num_rows;
	}

	public function TongQuanDanhGiaKhachSan($MKs) //tổng quan rate dịch vụ tính theo trung bình 
	{
		$this->exec("SELECT (AVG(ViTri) + AVG(PhucVu) +AVG(TienNghi) +AVG(Gia) +AVG(VeSinh))/5 AS danhgiatb, COUNT(*) AS SL, AVG(ViTri) AS ViTritb, AVG(PhucVu) AS PhucVutb, AVG(TienNghi) AS TienNghitb, AVG(Gia) AS Giatb, AVG(VeSinh) AS VeSinhtb FROM `danhgia` WHERE `MKs` = '$MKs'");
		return $this->getrow();
	}
	public function DanhSachKhachSanChuaDanhGia($taikhoan,$start=-1,$limit=-1)
	{
		$q = "SELECT ks.TenKs,ks.MKs
			FROM hoadon hd
			INNER JOIN khachsan ks ON hd.MKs = ks.MKs
			WHERE hd.email = '$taikhoan' AND hd.TrangThai = '1'";
		
		if($start > -1 && $limit > -1){
			$q .= " LIMIT ".(($start-1)*$limit).",".$limit;
			$this->exec($q);
			return $this->getAllrows();
		}
		$this->exec($q);
		return $this->num_rows;
	}
}
?>