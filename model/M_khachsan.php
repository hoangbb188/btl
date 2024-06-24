<?php
include_once 'model/dbconnect.php';

class M_khachsan extends database
{
	public function TimKiem($tukhoa,$start=-1,$limit=-1,$loai=0,$sophong=0,$songuoi=0)
	{
		if($loai == 0) {
			$q = "SELECT ks.MKs AS id,ks.TenKs AS ten, ks.sao AS sao, CONCAT_WS(', ',ks.DiaChi,qh.name,tt.name) AS diachi,ks.TrangThai, Avatar
				FROM khachsan ks 
				INNER JOIN tinhtp tt ON tt.matp = ks.TP 
				INNER JOIN quanhuyen qh ON ks.Huyen = qh.maqh 
				WHERE ks.Xoa=0 AND (ks.TenKhongDau LIKE '%$tukhoa%' OR tt.TenKhongDau LIKE '%$tukhoa%' OR qh.TenKhongDau LIKE '%$tukhoa%') AND ks.TrangThai = 1 AND ks.MKs = ANY (SELECT p.MKs FROM phong p WHERE p.SoLuong >= $sophong AND p.Xoa=0 AND p.SoNguoi >= $songuoi AND p.MKs = ks.MKs GROUP BY p.MKs)
				";
		} elseif($loai == 1) {
			//$this->exec("SELECT * FROM tinhtp WHERE ");
			$q="SELECT tt.matp AS id,tt.name AS ten,CONCAT_WS(', ',tt.name, 'Việt Nam') AS diachi 
				FROM tinhtp tt
				WHERE (tt.TenKhongDau LIKE '%$tukhoa%')";
		} else {
			$q="SELECT qh.maqh AS id,qh.name AS ten,CONCAT_WS(', ',qh.name,tt.name) AS diachi
				FROM quanhuyen qh
				INNER JOIN tinhtp tt ON qh.matp = tt.matp
				WHERE (tt.TenKhongDau LIKE '%$tukhoa%' OR qh.TenKhongDau LIKE '%$tukhoa%')";
		}

		if($start > -1 && $limit > -1){
			$q .= " LIMIT ".(($start-1)*$limit).",".$limit;
			$this->exec($q);
			return $this->getAllrows();
		}
		
		$this->exec($q);
		return $this->num_rows;
	}

										
	public function ThongTinKhachSan($MKs,$trangthai=2,$All=false) //trạng thái khách sạn đã bật chưa:  
	{											// $ all = true là lấy cả ks đã xóa, = false là chỉ lấy ks chưa xóa
		$q = "SELECT ks.MKs AS id,ks.TenKs AS ten, ks.email,ks.TienIch AS TienIch , ks.Avatar , ks.PhongCach, ks.TrangThai , ks.GioiThieu, ks.Mota ,ks.Loai , ks.sao AS sao, ks.DiaChi as dc , qh.name AS quanhuyen,tt.name AS tinhtp, ks.Huyen AS maqh, ks.TP AS matp, CONCAT_WS(', ',ks.DiaChi,qh.name,tt.name) AS diachi
		FROM khachsan ks
		INNER JOIN tinhtp tt ON tt.matp = ks.TP
		INNER JOIN quanhuyen qh ON ks.Huyen = qh.maqh
		WHERE MKs = '$MKs'";
		if($All==false) $q.=" AND ks.Xoa = 0 ";
		if($trangthai != 2){ // 0 select bọn chưa duyệt, 1 là bọn duyệt, 2 là chơi hết
			$q .= "AND ks.TrangThai = $trangthai";
		}
		//echo $q;
		$this->exec($q);
		return $this->getrow();
	}

	
	public function ThemKhachSan($dataInsert){
		if($this->KiemTraTrungTen($dataInsert['TenKs'])) return 0;
			$this->insert("khachsan",$dataInsert);
		return $this->insert_id;
	}

	public function XoaKhachSan($MKs)
    {
	   return $this->update("khachsan",array('Xoa'=>1),"MKs=$MKs");
	}

	public function SuaKhachSan($MKs, $dataUpdate)
	{
	 	return $this->update("khachsan",$dataUpdate,"MKs=$MKs");
	}

	public function KiemTraTrungTen($ten){
		$this->select("khachsan","TenKs='$ten' AND Xoa=0");
		return ($this->num_rows>0) ? $this->num_rows :  0;
	}

	public function DuyetKhachSan($MKs,$data)
    {
       return $this->update("khachsan",$data, "MKs=$MKs");
	}

	

	/** Hiển thị danh sách theo city và district **/
	public function DanhSachKhachSan($id,$loai=0,$start=-1,$limit=-1,$ten= '',$min_value=0,$max_value=0,$sao=array(),$loai_ks=2,$trangthai=2)
	{
		if ($loai == 0) { // tìm theo huyện
            $cot = "ks.Huyen";
        } else if ($loai == 1) { // tìm theo thành phố
            $cot = "ks.TP";
        } else if ($loai == 2) {
            $cot = "ks.email"; //tìm theo email người quản lý;
        } else {  // tìm tất cả
        	$cot = 1;
        }

        $q = "SELECT ks.MKs AS id, ks.TrangThai ,ks.TenKs AS ten, ks.sao AS sao, CONCAT_WS(', ',ks.DiaChi,qh.name,tt.name) AS diachi, ks.TienIch AS TienIch, ks.Loai AS Loai, Avatar
		FROM khachsan ks
		INNER JOIN tinhtp tt ON tt.matp = ks.TP
		INNER JOIN quanhuyen qh ON ks.Huyen = qh.maqh
		WHERE ks.Xoa=0 AND $cot = '$id'";

		if(!empty($ten)){
			$q .= " AND ks.TenKhongDau LIKE '%$ten%'";
		}

		if($min_value && $max_value){
			$q .= " AND EXISTS(SELECT Gia FROM phong p WHERE Gia BETWEEN $min_value AND $max_value AND p.MKs = ks.MKs)";
		}


		if(!empty($sao)){
			$q.= " AND (";
			//$text = '';
			foreach ($sao as $key => $value) {
				$sao[$key] = 'ks.sao = '.$value;
			}
			$q .= implode(" OR ", $sao).")";
		}

		if($loai_ks != 2){
			$q .= " AND ks.Loai = $loai_ks";
		}

		if($trangthai != 2){
			$q.= " AND ks.TrangThai = $trangthai";
		}

		if($start > -1 && $limit > -1){
			$q .= " LIMIT ".(($start-1)*$limit).",".$limit;
			$this->exec($q);
			return $this->getAllrows();
		}
		
		$this->exec($q);
		return $this->num_rows;
    }
	/** Hiển thị danh sách theo city và district **/

	public function GetThongTinTienIch($id)
	{
		$this->select("tiennghi","id='$id'","tentn,icon");
		return $this->getrow();
	}

	// Lấy Tiện Ích Theo Loại. 0 là cho khách sạn, 1 là cho phòng
	public function GetTienIchLoai($loai=0)
	{
		$this->select("tiennghi","loai='$loai'","id,tentn,icon");
		return $this->getAllrows();
	}

	public function KiemTraAnh($url){
		$this->select("thuvienanh","`UrlAnh` = '$url'");
		return $this->num_rows;
	}
	
	public function ThemAnh($arr){
		$this->insert("thuvienanh",$arr);
		return $this->insert_id;
	}

	public function XuatAnh($MKs,$loai=-1,$start=-1,$limit=-1){ // loại -1 là tất cả, 1 là ảnh chung của khách sạn, 2 là ảnh của phòng
		$q = "SELECT id,TenAnh,UrlAnh,Loai, tva.MP, p.LoaiP FROM thuvienanh tva, phong p WHERE tva.MKs = $MKs AND p.MP = tva.MP
		UNION 
		SELECT id,TenAnh,UrlAnh,Loai, MP, 'NULL' FROM thuvienanh tva WHERE tva.MKs = $MKs AND tva.MP=0
		";
		if($loai != -1){
			$q = "SELECT id,TenAnh,UrlAnh,Loai, tva.MP FROM thuvienanh tva WHERE tva.MKs = $MKs AND tva.Loai = '$loai'";
		}

		$q .= " ORDER BY `id` DESC";
		
;		if($start > -1 && $limit > -1){
			$q .= " LIMIT ".(($start-1)*$limit).",".$limit;
			$this->exec($q);
			//echo $q;
			return $this->getAllrows();
		}
		
		$this->exec($q);
		return $this->num_rows;
	}

	public function XoaAnh($email,$idImage)
    {
       return $this->delete("thuvienanh", "`email` = '$email' AND `id` = '$idImage'");
	}

	public function GetInfoImage($idImage){
		$this->select("thuvienanh","`id` = '$idImage'","UrlAnh");
		return $this->getrow();
	}
}
?>