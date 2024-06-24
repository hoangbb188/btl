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
    <a class="list-group-item" href="index.php?controller=quan-ly/thong-tin-tai-khoan&act=edit">Sửa Thông Tin</a>
    <a class="list-group-item active" href="index.php?controller=quan-ly/thong-tin-tai-khoan&act=change-password">Đổi Mật Khẩu</a>
</ul>
</div>
<div class="col-md-6 col-md-offset-1">
    <div class="box row" style="min-height:200px;">
        <div class="box-content" style="padding:50px 50px;">

            <h4>Thay đổi mật khẩu</h4>
            <div class="form-horizontal">
                <div class="col-md-12">
                <input type="hidden" id="email" name="email" class="form-control" value="<?=$_SESSION['quanly']['TaiKhoan'];?>" disabled=""/>
                    <div class="form-group">
                        <label>Mật khẩu cũ:</label>
                        <input type="password" id="old_password" name="old_password" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới:</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu mới:</label>
                        <input type="password" id="re_new_password" name="re_new_password" class="form-control" value=""/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button id="capnhat" onclick="DoiMatKhau();" class="btn btn-warning" style="outline:none; border:none;">Cập nhật</button>
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
    function DoiMatKhau(){
        var email = $("#email").val();
        var old_password = $("#old_password").val().trim();
        var new_password = $("#new_password").val().trim();
        var re_new_password = $("#re_new_password").val().trim();
        var thongbao = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>';
        if(old_password == ''){
            $("#thongbao").html(thongbao + 'Chưa nhập mật khẩu cũ kìa người anh em </div>');
        }else if(new_password == ''){
            $("#thongbao").html(thongbao + 'Chưa nhập mật khẩu mới kìa người anh em </div>');
        }else if(new_password != re_new_password){
            $("#thongbao").html(thongbao + 'Mật khẩu nhập lại chưa khớp kìa người anh em </div>');
        }else{
            $.ajax({
                url:"API-changepw",
                type:"POST",
                dataType:"json",
                data:{
                    old_password:old_password,
                    new_password:new_password,
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