<head>
    <style>.sidebar{width:0px;}#main{margin-left:0px;}.menu-top{display:none;}</style>
</head>
<!-- =============================  Đặt phòng và slide ảnh =============================  -->
    <div class="bg">
        <div class="container">
            <a href="index.php"><img src="assets/img/lthotel-lg.png" class="img-responsive" style="width:200px" alt=""></a>
        </div>   
    </div>


    <!-- ============================ Nội dung web ============================ -->
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                    <div class="user user-bg">
                        <h3>Đăng nhập tài khoản</h3>  
                        <div style="background:white;padding:20px 20px;">
                            <div class="form-group">
                                <label for="taikhoan">Email</label>
                                <input type="text" name="taikhoan" id="taikhoan" class="form-control" placeholder="Nhập địa chỉ email">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="matkhau">Mật Khẩu</label>
                                <input type="password" name="matkhau" id="matkhau" class="form-control" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="accept_update" class="control-label"  data-toggle="tooltip" title="" data-original-title="Bạn đã có tài khoản nhưng chưa nâng cấp ? Nâng cấp ngay!">
                                    <input type="checkbox" name="accept_update" id="accept_update">
                                    Nâng cấp tài khoản
                                </label> 
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" onclick="DangNhap();">Đăng nhập</button>
                            </div>
                            <!-- <a href="#" ><p class="text-center"> Bạn quên mật khẩu?</p></a> -->

                            <div class="form-group" id="loi"></div>
                        </div>
                    </div>         
            </div>
            <div class="col-md-5">
                <h4>Bạn chưa có tài khoản? Hãy <a href="index.php?controller=quan-ly/dang-ky">Đăng Ký</a> ngay</h4>
                <h3 class="text-primary">Vì sao nên làm đối tác với LT Hotel?</h3>
                <p><i class='fas fa-check text-primary'></i>&nbsp; Mạng lưới khách hàng lớn và rộng khắp cả nước, cung cấp lượng đặt phòng ổn định cho khách sạn</p>
                <p><i class='fas fa-check text-primary'></i>&nbsp; Thông tin của khách sạn được quảng cáo rộng rãi đến khách hàng qua các kênh truyền thông của LT Hotel</p>
                <p><i class='fas fa-check text-primary'></i>&nbsp; Hệ thống quản lý phòng và giá trực tuyến cho khách sạn thuận tiện và dễ dàng sử dụng. Khách sạn luôn có thể điều chỉnh để bán với mức giá cạnh tranh</p>
                <p><i class='fas fa-check text-primary'></i>&nbsp; Hệ thống thống kê thông tin hữu ích theo từng giai đoạn giúp khách sạn đánh giá và lên kế hoạch kinh doanh</p>
                <p><i class='fas fa-check text-primary'></i>&nbsp; Bộ phận chăm sóc khách hàng chuyên nghiệp luôn hỗ trợ tối đa cho khách sạn và khách hàng lưu trú lại khách sạn</p>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    <script type="text/javascript">
        function DangNhap(){
            var u = $("#taikhoan").val();
            var p = $("#matkhau").val();
            var tb = '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>';
            if(u == ''){
                $("#loi").html(tb + 'Chưa nhập tài khoản kìa dân chơi</div>');
                return false;
            }else if(p == ''){
                $("#loi").html(tb + 'Chưa nhập mật khẩu kìa dân chơi</div>');
                return false;
            }else{
                $.ajax({
                    url:"API-admin-dang-nhap",
                    type:"POST",
                    data:{
                        taikhoan:u,
                        matkhau:p
                    },
                    dataType:"json",
                    success: function(t){
                        if(t.trangthai == 'loi'){
                            $("#loi").html(t.thongbao);
                        }else{
                            window.location.href = 'index.php?controller=quan-ly/trang-chu';
                        }
                        
                    },
                    error: function(){
                        console.log();
                    }
                })
            }
        }
    </script>