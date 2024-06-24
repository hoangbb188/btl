<?php
require_once 'controller/controller.php';
include_once "model/M_mgg.php";
class C_mgg extends Controller
{
	public function DanhSachMaGiamGia($MKs, $Loai=0 ,$start=-1,$limit=-1){
        $mgg = new M_mgg();
        return $mgg->AllMgg($MKs,$Loai,$start,$limit);
    }

    public function XoaMaGiamGia($Ma)
	{
		$mgg = new M_mgg;
		$data['mgg'] = $mgg->Check($Ma);
		if($data['mgg'] && $data['mgg']['email'] == $_SESSION['quanly']['TaiKhoan']){
			if($mgg->XoaMgg($Ma)){
				$xuat = array('trangthai'=>'thanhcong', 'thongbao'=>'Đã xóa thành công!');
				$_SESSION['xoa']=true;
			}
			else{
				$xuat = array('trangthai'=>'loi', 'thongbao'=>'Xóa Thất Bại!');
			}
		}
		else{
			$xuat = array('trangthai'=>'loi', 'thongbao'=>'Mã Giảm Giá Không Tồn Tại');
		}
		return $xuat;
	}
	
	public function XoaMaGiamGiaTheoKhachSan($MKs)
	{
		$mgg = new M_mgg;
		$mgg->XoaMaGiamGiaTheoKhachSan($MKs);
	}

	public function ThemMaGiamGia($dataInsert)
	{
		$mgg = new M_mgg();
		$data['mgg'] = $mgg->Check($dataInsert['Ma']);
		if($data['mgg'])
		{
			$xuat = array(	
				'trangthai' => 'loi',
				'thongbao' => 'Mã Giảm Giá Đã Tồn Tại'
			);
		}
		else{
			$last_id = $mgg->ThemMgg($dataInsert);
			if($last_id){
				$xuat = array(	'trangthai' => 'thanhcong',
								'thongbao' => 'Thêm thành công');
				$_SESSION['them'] = true;
			}
			else{
				$xuat = array(	'trangthai' => 'loi',
								'thongbao' => 'Thêm không thành công');
			}
		}
		
		return $xuat;
	}

	public function SuaMaGiamGia($IdMgg,$dataUpdate)
	{
		$mgg = new M_mgg();
		$data['mgg'] = $mgg->Check($dataUpdate['Ma']);

		if($data['mgg']&&$data['mgg']['IdMgg']!=$IdMgg){
			$xuat = array(	
							'trangthai' => 'loi',
							'thongbao' => 'Mã Giảm Giá Đã Tồn Tại'
						);
		}
		else
		{
			if($mgg->SuaMgg($IdMgg,$dataUpdate)){
				$xuat = array(	'trangthai' => 'thanhcong',
								'thongbao' => 'Sửa Thành Công');
				$_SESSION['sua'] = true;
			}else{
				$xuat = array(	'trangthai' => 'loi',
								'thongbao' => 'Sửa Không Thành Công');
			}
		}	
		return $xuat;
	}

	
}
?>