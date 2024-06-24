<?php
include_once 'model/dbconnect.php';
/**
 * 
 */
class M_mgg extends database
{
	public function Check($code){
		$this->select("mgg","Ma='$code'");
		return $this->getrow();
	}

	public function AllMgg($MKs,$Loai=0,$start=-1,$limit=-1){	
		if($Loai == 0)
			$q ="SELECT * FROM mgg WHERE MKs='$MKs'";
		else if($Loai ==1)
			$q ="SELECT * FROM mgg WHERE Loai='$Loai'";
		else if($Loai ==2)
			$q = "SELECT m.*, ks.TenKs, ks.MKs FROM mgg m LEFT JOIN khachsan ks ON m.MKs = ks.MKs where (ks.Xoa IS NULL OR ks.Xoa = '0') AND (ks.TrangThai IS NULL OR ks.TrangThai = '1')";
			$q .=" ORDER BY `IdMgg` DESC";
		if($start > -1 && $limit > -1){
			$q .= " LIMIT ".(($start-1)*$limit).",".$limit;
			$this->exec($q);
			return $this->getAllrows();
		}
		$this->exec($q);
		return $this->num_rows;
	}

	public function Sudung($code){
		$this->exec("UPDATE mgg set `SL` = `SL` - 1 wheRE Ma = '$code'");
	}

	public function ThemMgg($dataInsert)
	{
		$this->insert("mgg",$dataInsert);
		return $this->insert_id;
	}

	public function SuaMgg($IdMgg,$dataUpdate)
	{
		return $this->update("mgg",$dataUpdate,"IdMgg='$IdMgg'");
	}



	public function XoaMgg($Ma)
	{
		return $this->delete("mgg", "Ma='$Ma'");
	}

	public function XoaMaGiamGiaTheoKhachSan($MKs){
		return $this->delete("mgg", "MKs=$MKs");
	}

}
?>