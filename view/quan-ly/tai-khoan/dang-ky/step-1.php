<?php 	if(isset($_SESSION['quanly']))
			header("Location:index.php?controller=quan-ly/dang-ky&step=2"); ?>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-md-offset-1">Email đăng nhập</label>
                                <div class="col-md-5">
                                    <input type="text" id="TaiKhoan" name="TaiKhoan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-md-offset-1">Mật khẩu</label>
                                <div class="col-md-5">
                                    <input type="password" id="MatKhau" name="MatKhau" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-md-offset-1">Nhập lại mật khẩu</label>
                                <div class="col-md-5">
                                    <input type="password" id="NhapLaiMatKhau" name="NhapLaiMatKhau" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-md-offset-1">Họ tên</label>
                                <div class="col-md-5">
                                    <input type="text" id="Ten" name="Ten" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-md-offset-1">Tỉnh/TP</label>
                                <div class="col-md-5">
                                    <select class="form-control" id="TP" name="TP">
                                        <?php
                                            foreach ($data['tinh'] as $gt) {
                                                echo '<option value="'.$gt['matp'].'">'.$gt['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-md-offset-1">Địa chỉ</label>
                                <div class="col-md-5">
                                    <input type="text" id="DiaChi" name="DiaChi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-md-offset-1">Điện thoại</label>
                                <div class="col-md-5">
                                    <input type="text" id="SDT" name="SDT" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-4">
                                    <button class="btn btn-primary btn-block" name="submit" type="submit" onclick="DangKy();">Đăng Ký</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-4">
                                    <div id="loi"></div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function DangKy(){
                                var email = $("#TaiKhoan").val();
                                var password = $("#MatKhau").val();
                                var repassword = $("#NhapLaiMatKhau").val();
                                var hoten = $("#Ten").val();
                                var diachi = $("#DiaChi").val();
                                var TP = $("#TP").val();
                                var sdt = $("#SDT").val();   
                                var tb = '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'; 
                                if(email == ''){
                                    $("#loi").html(tb + 'Nhập Email đi dân chơi</div>');
                                    //alert("cc");
                                    return false;
                                }else if(password == ''){
                                    $("#loi").html(tb + 'Nhập Mật khẩu đi dân chơi</div>');
                                    return false;
                                }else if(repassword == ''){
                                    $("#loi").html(tb + 'Nhập Mật khẩu lần 2 đi dân chơi</div>');
                                    return false;
                                }else if(password != repassword){
                                    $("#loi").html(tb + 'Nhập lại mật khẩu không khớp</div>');
                                    return false;
                                }else if(hoten == ''){
                                    $("#loi").html(tb + 'Nhập Tên đi dân chơi</div>');
                                    return false;
                                }else if(diachi == ''){
                                    $("#loi").html(tb + 'Nhập Địa chỉ đi dân chơi</div>');
                                    return false;
                                }else if(sdt == ''){
                                    $("#loi").html(tb + 'Nhập Số điện thoại đi dân chơi</div>');
                                    return false;
                                }
                                $.ajax({
                                    url:"API-admin-dang-ky",
                                    type:"POST",
                                    dataType:"json",
                                    data:{
                                        step:1,
                                        TaiKhoan:email,
                                        MatKhau:repassword,
                                        Ten:hoten,
                                        TP:TP,
                                        DiaChi:diachi,
                                        SDT:sdt
                                    },
                                    success: function(t){
                                        if(t.trangthai == 'loi'){
                                            $("#loi").html(t.thongbao);
                                        }else{
                                            window.location.href = 'index.php?controller=quan-ly/dang-ky&step=2';
                                        }
                                    },
                                    error: function(){
                                        console.log();
                                    }
                                })
                            }
                        </script>