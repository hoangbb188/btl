<?php //print_r($data) ?>
<head>
    <style>.sidebar {width: 0px;}#main {margin-left: 0px;}.navbar-header{margin-left:15px !important;}</style>
    <script>$(".navbar-header").html('<a href="index.php" ><img src="assets/img/lthotel.png" alt=""></a>');</script>
</head>

<div class="admin-header">
        <div class="row">
            <div class="col-md-9 admin-header-left">
                <a href="index.php?controller=quan-ly/trang-chu">
                        <span class="glyphicon glyphicon-chevron-left"></span> Trang Chủ Quản Lý
                </a>
                <h2>Quản Lý Tài Khoản</h2>
            </div>  
        </div>
</div>

<div class="admin-content">
<div class="col-md-3" style="margin-top:30px">
<ul class="list-group">
    <a class="list-group-item" href="index.php?controller=quan-ly/thong-tin-tai-khoan">Thông Tin Tài Khoản</a>
    <a class="list-group-item active" href="index.php?controller=quan-ly/thong-tin-tai-khoan&act=edit">Sửa Thông Tin</a>
    <a class="list-group-item" href="index.php?controller=quan-ly/thong-tin-tai-khoan&act=change-password">Đổi Mật Khẩu</a>
</ul>
</div>
<div class="col-md-6 col-md-offset-1">
    <div class="box row" style="min-height:200px;">
        <div class="box-content" style="padding:50px 50px;">
                <h4>Thông tin tài khoản</h4>
                
                <div class="form-horizontal">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Họ và tên:</label>
                            <input type="text" id="ten" name="ten" class="form-control" value="<?=$data['TaiKhoan']['Ten']?>"/>
                        </div>
                    </div>
            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" id="email" name="email" class="form-control" value="<?=$_SESSION['quanly']['TaiKhoan'];?>" disabled=""/>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="text" id="sdt" name="sdt" class="form-control" value="<?=$data['TaiKhoan']['SDT'];?>"/>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input type="text" id="diachi" name="diachi" class="form-control" value="<?=$data['TaiKhoan']['DiaChi'];?>"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Thành phố:</label>
                            <select class="form-control" name="TP" id="TP">
                            <?php
                            foreach ($data['tinh'] as $key => $gt) {
                                $selected = '';
                                if($data['TaiKhoan']['TP']['matp'] == $gt['matp']) $selected = 'selected';
                            ?>
                            <option value="<?=$gt['matp']?>" <?=$selected;?>><?=$gt['name']?></option>
                            <?php
                            }
                            ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button id="capnhat" onclick="CapNhat();" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="thongbao"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
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
							location.href = 'index.php?controller=quan-ly/thong-tin-tai-khoan';
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

