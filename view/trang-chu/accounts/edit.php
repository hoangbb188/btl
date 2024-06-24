
		
		<div class="col-md-8">
			<div class="form-group">
				<label>Họ và tên:</label>
				<input type="text" id="ten" name="ten" class="form-control" value="<?=$_SESSION['trangchu']['Ten'];?>"/>
			</div>
		</div>
		
		<div class="col-md-8">
			<div class="form-group">
				<label>Email:</label>
				<input type="text" id="email" name="email" class="form-control" value="<?=$_SESSION['trangchu']['TaiKhoan'];?>" disabled=""/>
			</div>
		</div>
		
		<div class="col-md-8">
			<div class="form-group">
				<label>Số điện thoại:</label>
				<input type="text" id="sdt" name="sdt" class="form-control" value="<?=$_SESSION['trangchu']['SDT'];?>"/>
			</div>
		</div>
		
		<div class="col-md-8">
			<div class="form-group">
				<label>Địa chỉ:</label>
				<input type="text" id="diachi" name="diachi" class="form-control" value="<?=$_SESSION['trangchu']['DiaChi'];?>"/>
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<label>Thành phố:</label>
				<select class="form-control" name="TP" id="TP">
				<?php
				foreach ($data['tinh'] as $key => $gt) {
					$selected = '';
					if($_SESSION['trangchu']['TP'] == $gt['matp']) $selected = 'selected';
				?>
				<option value="<?=$gt['matp']?>" <?=$selected;?>><?=$gt['name']?></option>
				<?php
				}
				?>

				</select>
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<button id="capnhat" onclick="CapNhat();" class="btn btn-primary">Cập nhật</button>
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group" id="thongbao"></div>
		</div>
<script type="text/javascript">
	function CapNhat(){
		var email = $("#email").val();
		var ten = $("#ten").val();
		var sdt = $("#sdt").val();
		var diachi = $("#diachi").val();
		var TP = $("#TP").val();
		var thongbao = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>';
		if(ten == ''){
			$("#thongbao").html(thongbao + 'Thiếu tên kìa người anh em </div>');
		}else if(sdt == ''){
			$("#thongbao").html(thongbao + 'Thiếu số điện thoại kìa người anh em </div>');
		}else if(diachi == ''){
			$("#thongbao").html(thongbao + 'Thiếu địa chỉ kìa người anh em </div>');
		}else{
			$.ajax({
				url:"API-updatethongtincanhan",
				type:"POST",
				dataType:"json",
				data:{
					ten:ten,
					sdt:sdt,
					diachi:diachi,
					TP:TP,
					email:email,

				},
				success: function(t){
					if(t.trangthai=='loi'){
						$("#thongbao").html(t.thongbao);
					}else{
						$("#thongbao").html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>Cập nhật thành công</div>');
						$("#capnhat").attr("disabled",true);
						setTimeout(function(){
							location.href = 'index.php?controller=trang-chu/thong-tin-tai-khoan&act=info';
						},1000);
						
					}
				},
				error: function(t){
					console.log(t);
				}
			})
		}
	}
</script>