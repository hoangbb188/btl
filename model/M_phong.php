<?php
include_once 'model/dbconnect.php';
include_once "model/M_khachsan.php";
class M_phong extends M_khachsan
{
	public function MinPrice($id) 
	{ //tìm phòng rẻ nhất trong khách sạn;
		$this->exec("SELECT gia FROM phong WHERE MKs = '$id' ORDER BY gia ASC LIMIT 1");
		return $this->getrow();
	}

	public function DanhSachPhong($MKs,$start=-1,$limit=-1)
	{
		$q="MKs='$MKs' AND Xoa ='0'";
		if($start > -1 && $limit > -1){
			$q .= " LIMIT ".(($start-1)*$limit).",".$limit;
		}
		$this->select("phong",$q);
		return $this->getAllrows();
	} 

	public function ThongTinPhong($MP,$All=false) // $ all = true là lấy cả phòng đã xóa, = false là chỉ lấy phòng chưa xóa
	{

		$q="SELECT p.MP, p.LoaiP, p.TienIch, p.Dientich, p.View, p.Avatar, p.SoLuong, p.SoNguoi, p.Gia, p.MKs, ks.email 
		FROM khachsan ks,phong p WHERE ks.MKs = p.MKs AND p.MP='$MP'";
		if($All==false) $q.=" AND p.Xoa = 0";
		$this->exec($q);
		//echo $q;
		return $this->getrow();	
	}

	public function SuaPhong($MP,$dataUpdate)
	{
	 	return $this->update("phong",$dataUpdate,"MP=$MP");
	}

	// xóa phòng theo mã phòng
	public function XoaPhong($MP)
 	{
	   return $this->update("phong",array('Xoa'=>1),"MP=$MP");
	}

	public function XoaPhongTheoKhachSan($MKs)
	{
		return $this->update("phong",array('Xoa'=>1),"MKs=$MKs");
	}

	// Thêm phòng
	public function ThemPhong($dataInsert)
	{
		$this->insert("phong",$dataInsert);
		return $this->insert_id;
	}

	// Tìm phòng theo tên
	public function TimTenPhong($MKs,$LoaiP)
	{
		$this->select("phong","LoaiP='$LoaiP' AND MKs=$MKs AND Xoa =0");
		return $this->getrow();
	}

	public function LayThuVienAnh($MKs,$MP = -1,$loai = -1)
	{
		$q = "SELECT UrlAnh as src FROM thuvienanh WHERE `MKs` = '$MKs'";
		if($MP != -1){
			$q .= " AND `MP` = '$MP'";
		}
		if($loai != -1){
			$q .= " AND `Loai` = '$loai'";
		}
		$q .= " ORDER BY `id` DESC";
		$this->exec($q);
		return $this->getAllrows();
	}
}

?>