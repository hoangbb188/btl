<?php
if(!defined('LTW')) die();
?>
   <!-- ============================ Đăng ký ============================ -->
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-7">
                <div class="user user-center">
                    <h2 class="page-header text-center">Đăng Ký</h2>
                    <div class="form-group">


                        <label for="taikhoan">Email</label>
                        <input type="text" id="taikhoan" class="form-control" placeholder="Nhập địa chỉ email">

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="matkhau">Mật Khẩu</label>
                        <input type="password" id="matkhau" class="form-control" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="matkhau2">Xác nhận mật khẩ mật Khẩu</label>
                        <input type="password" id="matkhau2" class="form-control" placeholder="Nhập mật lại khẩu">
                    </div>
                    <p class="help-block" style="font-size:12px;">Chọn đăng ký là bạn đã đồng ý với các <a>Điều khoản
                            dịch vụ của chúng tôi</a>

                    </p>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" onclick="DangKy();">Đăng Ký</button>
                    </div>
                    <div class="form-group" id="error-login"></div>
                    <br>
                    <hr>
                    <p class="help-block">Đã có tài khoản LT Hotel?
                        <a href="index.php?controller=trang-chu/dang-nhap" class="pull-right btn btn-success" href="">Đăng Nhập</a>
                    </p>

                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Lợi ích khi tạo tài khoản</h4>
                    </div>
                    <div class="panel-body">
                        <p><span class="glyphicon glyphicon-check text-success"></span>&nbsp; Đặt phòng với giá giảm đến 40%.</p>
                        <p><span class="glyphicon glyphicon-check text-success"></span>&nbsp; Nhận ưu đãi đặc biệt chỉ dành cho thành viên.    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

                <script type="text/javascript">
                        function DangKy(){
                            var email = $("#taikhoan").val();
                            var pass = $("#matkhau").val();
                            var repass = $("#matkhau2").val();
                            $.ajax({
                                url:"API-dang-ky",
                                type:"POST",
                                dataType:"json",
                                data:{
                                email:email,
                                password:pass,
                                re_password:repass
                                },
                                success: function(t){
                                    if(t.trangthai=="loi"){
                                        $("#error-login").html(t.thongbao);
                                    }else{
                                        window.location.href="index.html";
                                    }
                                },
                                error: function(t){
                                    console.log(t);
                                }
                            })
                        }
                        </script>