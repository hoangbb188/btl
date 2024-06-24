<?php
require_once 'controller/controller.php';
include_once "model/M_phong.php";
include_once "model/M_hoadon.php";
class C_phong extends Controller
{

    function DanhSachPhong($MKs,$start=-1,$limit=-1)
    {
       $phong = new M_phong();
       return $phong->DanhSachPhong($MKs,$start,$limit);
    }

    public function ThongTinPhong($MP)
    {
        $phong = new M_phong();
        return $phong->ThongTinPhong($MP);
    }
	// Sửa Phòng
	public function SuaPhong($MKs,$MP,$dataUpdate)
	{
		$phong = new M_phong();
		$data['phong'] = $phong->ThongTinPhong($MP);
		
		if($data['phong']['email']!= $_SESSION['quanly']['TaiKhoan'] || $data['phong']==0){
			$xuat = array('trangthai'=>'loi', 'thongbao'=>'Phòng không tồn tại!');
		}
		else{
			$phong = new M_phong;
			$data['phong'] = $phong->TimTenPhong($MKs,$dataUpdate['LoaiP']);

			// Nếu tồn tại phòng có tên loại này và phòng đó khác phòng đang sửa
			if($data['phong']&& $data['phong']['MP'] != $MP)  
			{
				$xuat = array('trangthai'=>'loi', 'thongbao'=>'Ây Daz. Tên Loại phòng đã có rồi anh hai à');
			}
			else
			{
				if($phong->SuaPhong($MP,$dataUpdate)){
					$xuat =	array('trangthai'=>'thanhcong', 'thongbao'=>'Cập nhật thành công!');
					$_SESSION['sua']=true;
				}
				else{  
					 $xuat = array('trangthai'=>'loi', 'thongbao'=>'Cập Nhật Lỗi');
				 }
			}	
		}
		return $xuat;
	}

	// Thêm Phòng
	public function ThemPhong($MKs, $dataInsert){

		$ks = new M_khachsan;		
		$data['thongtinkhachsan'] = $ks->ThongTinKhachSan($MKs);

		// kiểm tra xem khách sạn cần thêm phòng có thuộc quyền quản lý của tài khoản k
		if($data['thongtinkhachsan'] && $_SESSION['quanly']['TaiKhoan']==$data['thongtinkhachsan']['email'])
		{
			$phong = new M_phong;
			$data['phong'] = $phong->TimTenPhong($MKs,$dataInsert['LoaiP']);

			// Nếu tồn tại phòng có tên loại này
			if($data['phong'])
			{
				$xuat = array(	'trangthai' => 'loi',
									'thongbao' => 'Tên loại phòng này đã tồn tại!');	
			}
			else{
				$last_id = $phong->ThemPhong($dataInsert);
			
				if($last_id){
					$xuat = array(	'trangthai' => 'thanhcong',
									'thongbao' => 'Thêm thành công');
					$_SESSION['them'] = true;
				}else{
					$xuat = array(	'trangthai' => 'loi',
									'thongbao' => 'Thêm không thành công');
				}
			}
			
		}
		else
		{
			$xuat = array(	'trangthai' => 'loi',
							'thongbao' => 'Khách Sạn không thuộc quyền quản lý của đồng chí');
		}
		
		return $xuat;
	}

	// Xóa phòng
	public function XoaPhong($MP){
		$phong = new M_phong();
		$data['phong'] = $phong->ThongTinPhong($MP);
		
		if($data['phong']['email']!=$_SESSION['quanly']['TaiKhoan'] || $data['phong']==0)
		{
			$xuat = array('trangthai'=>'loi', 'thongbao'=>'Phòng không tồn tại!');
		}
		else{
			$hoaDon = new M_hoadon();
		
			if($hoaDon->SoHoaDonThuePhong($MP,0)>0){
				$xuat = array('trangthai'=>'loi', 'thongbao'=>'Không thể xóa phòng đang có người đặt!');
			}
			else if($hoaDon->SoHoaDonThuePhong($MP,1)>0){
				$xuat = array('trangthai'=>'loi', 'thongbao'=>'Không thể xóa phòng đang có người thuê/ chưa trả phòng!');
			}
			else{
				if($phong->XoaPhong($MP)){
					$xuat = array('trangthai'=>'thanhcong', 'thongbao'=>'Đã xóa thành công!');
					$_SESSION['xoa']=true;
				}
				else{
					$xuat = array('trangthai'=>'loi', 'thongbao'=>'Xóa thất bại!');
				}
			}
		}
		return $xuat;
	}
 
	// Xóa tất cả các phòng của ks
	public function XoaPhongTheoKhachSan($MKs)
	{
		$phong = new M_phong();
		return $phong->XoaPhongTheoKhachSan($MKs);
	}
}
?>