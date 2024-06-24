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
    <a class="list-group-item active" href="index.php?controller=quan-ly/thong-tin-tai-khoan">Thông Tin Tài Khoản</a>
    <a class="list-group-item" href="index.php?controller=quan-ly/thong-tin-tai-khoan&act=edit">Sửa Thông Tin</a>
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
                            <input type="text" name="name" class="form-control" value="<?=$data['TaiKhoan']['Ten']?>" disabled=""/>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="name" class="form-control" value="<?=$_SESSION['quanly']['TaiKhoan'];?>" disabled=""/>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="text" name="name" class="form-control" value="<?=$data['TaiKhoan']['SDT'];?>" disabled=""/>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input type="text" name="name" class="form-control" value="<?=$data['TaiKhoan']['DiaChi'];?>" disabled=""/>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Thành phố:</label>
                            <input type="text" name="name" class="form-control" value="<?=$data['TaiKhoan']['TP']['tentinh'];?>"  disabled=""/>             
                        </div>
                    </div>
                    
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Số dư:</label>
                            <strong><span class="text-warning"><?=number_format($data['TaiKhoan']['SoDu']);?></span> </strong><sup>đ</sup>
                            </div>
                        </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="index.php?controller=quan-ly/thong-tin-tai-khoan&act=edit" class="btn btn-default">Sửa thông tin</a>
                            <a href="index.php?controller=quan-ly/thong-tin-tai-khoan&act=change-password" class="btn btn-default">Đổi mật khẩu</a>
                        </div>
                    </div>		
                </div>
            </div>
        </div>
    </div>
</div>
</body>


