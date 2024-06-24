<?php
//print_r($data);
?>
<div class="col-md-12">
	<h2>Quản lý tài khoản</h2>
	<hr>
</div>
<div class="col-md-12">
	<h4>Thông tin tài khoản</h4>
	
	<div class="form-horizontal">
		
		<?php
		$type = isset($_GET['type']) ? $_GET['type'] : 0;
		$file_2 = "view/trang-chu/accounts/$type.php";
		if(file_exists($file_2)) include $file_2;
		else{
			?>

		<div class="col-md-8">
			<div class="form-group">
				<label>Họ và tên:</label>
				<input type="text" name="name" class="form-control" value="<?=$_SESSION['trangchu']['Ten'];?>" disabled=""/>
			</div>
		</div>
		
		<div class="col-md-8">
			<div class="form-group">
				<label>Email:</label>
				<input type="text" name="name" class="form-control" value="<?=$_SESSION['trangchu']['TaiKhoan'];?>" disabled=""/>
			</div>
		</div>
		
		<div class="col-md-8">
			<div class="form-group">
				<label>Số điện thoại:</label>
				<input type="text" name="name" class="form-control" value="<?=$_SESSION['trangchu']['SDT'];?>" disabled=""/>
			</div>
		</div>
		
		<div class="col-md-8">
			<div class="form-group">
				<label>Địa chỉ:</label>
				<input type="text" name="name" class="form-control" value="<?=$_SESSION['trangchu']['DiaChi'];?>" disabled=""/>
			</div>
		</div>

		<div class="col-md-8">
			<div class="form-group">
				<label>Thành phố:</label>
				<?php
				foreach ($data['tinh'] as $key => $gt) {
					if($gt['matp'] == $_SESSION['trangchu']['TP']){
						?>
						<input type="text" name="name" class="form-control" value="<?=$gt['name'];?>"  disabled=""/>
						<?php
					}
				}
				?>
				
			</div>
		</div>
		
			<div class="col-md-12">
				<div class="form-group">
				<label>Số dư:</label>
				<strong><span class="text-warning"><?=number_format($data['sodu']);?></span> </strong><sup>đ</sup>
				</div>
			</div>
		
		<div class="col-md-8">
			<div class="form-group">
				<a href="index.php?controller=trang-chu/thong-tin-tai-khoan&act=info&type=edit" class="btn btn-default">Sửa thông tin</a>
				<a href="index.php?controller=trang-chu/thong-tin-tai-khoan&act=change-password" class="btn btn-default">Đổi mật khẩu</a>
			</div>
		</div>		
			<?php
		}
		?>
	</div>
</div>