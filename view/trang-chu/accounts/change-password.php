<?php
//print_r($data);
?>
<div class="col-md-12">
    <h2>Quản lý tài khoản</h2>
    <hr>
</div>
<div class="col-md-12">
    <h4>Thay đổi mật khẩu</h4>
    <div class="form-horizontal">
        <div class="col-md-8">
        <input type="hidden" id="email" name="email" class="form-control" value="<?=$_SESSION['trangchu']['TaiKhoan'];?>" disabled=""/>
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
        <div class="col-md-8">
            <div class="form-group">
                <button id="capnhat" onclick="DoiMatKhau();" class="btn btn-warning" style="outline:none; border:none;">Cập nhật</button>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group" id="thongbao"></div>
        </div>
    </div>
</div>
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