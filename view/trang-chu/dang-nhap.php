<?php
if(!defined('LTW')) die();
?>
  <div class="container" style="margin-top: 20px;">

        <div class="user user-center">
            <h2 class="page-header text-center">Đăng Nhập</h2>
            <div class="form-group">


                    <label for="taikhoan">Email</label>
                    <input type="text" id="taikhoan" class="form-control" placeholder="Nhập địa chỉ email">

            </div>
            <div class="form-group">
                <label class="control-label" for="matkhau">Mật Khẩu</label>
                <input type="password" id="matkhau" class="form-control" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-group">
                <label for="nhomk" class="control-label">
                   <input type="checkbox" name="nhomk" id="nhomk">
                   Nhớ mật khẩu
                </label>
                <!-- <a href="#" class="pull-right">Quên mật Khẩu</a> -->
            </div>
            <div class="form-group">
                <button  class="btn btn-primary btn-block" onclick="Login();">Đăng Nhập</button>
            </div>
            <div class="form-group" id="error-login"></div>
            <br>
            <hr>
            <p class="help-block">Chưa có tài khoản?
               <a href="index.php?controller=trang-chu/dang-ky" class="pull-right btn btn-success" href="">Đăng Ký</a>
            </p>

        </div>
    </div>

<script type="text/javascript">
    function Login() {
        var email = $("#taikhoan").val();
        var pass = $("#matkhau").val();
        var url_back = '<?php if(isset($_SESSION['url_back'])) echo $_SESSION['url_back'];?>';
        $.ajax({
            url: "API-dang-nhap",
            type: "POST",
            dataType: "json",
            data: {
                email: email,
                password: pass
            },
            success: function(t) {
                if (t.trangthai == 'loi') {
                    $("#error-login").html(t.thongbao);
                } else {
                    if(url_back != '') window.location.href = url_back;
                    else window.location.href = 'index.php';
                }
                console.log(t);
            },
            error: function(t) {
                console.log(t);
            }

        })
    }

    $(document).ready(function(){
        var t = JSON.parse('<?php if(isset($_SESSION['loi'])) echo $_SESSION['loi']; else echo 0; ?>');
        if(t.trangthai == 'loi'){
            $("#error-login").html('<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+ t.thongbao +'!</div>');
        }
    })
</script>