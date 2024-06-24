<?php
    //print_r($data);
    if(isset($_SESSION['sua'])&&$_SESSION['sua']==true) 
    {
        echo '<script>swal("Cập Nhật Thành Công", "<br>", "success");</script>';
        unset($_SESSION['sua']); 
    }
?>
<div class="admin-header">
    <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Thông tin khách sạn</h3>
        </div>
        <div class="col-md-3">
            <a href='<?php echo $_SERVER['REQUEST_URI']."&act=edit"?>' class="btn btn-primary">Chỉnh sửa</a>
        </div>
    </div> 
  
</div>
<div class="admin-content">
    <div class="box">
        <div class="box-header">
            Thông tin cơ bản
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-md-7">
                    <div class="col-md-12">
                        <div class="box-content-line">
                            <p>Tên khách sạn: </p>
                            <p class="help-block"><?=$data['thongtinkhachsan']['ten']?> </p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="box-content-line">
                            <p>Địa chỉ: </p>
                            <p class="help-block"><?=$data['thongtinkhachsan']['dc']?></p>
                        </div>
                        <div class="box-content-line">
                            <p>Loại Hình: </p>
                            <p class="help-block">
                                <?php 
                                    if($data['thongtinkhachsan']['Loai']==0)
                                        echo "Nhà Nghỉ";
                                    else {
                                        echo "Khách Sạn";
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-content-line">
                            <p>Tỉnh/TP: </p>
                            <p class="help-block"><?=$data['thongtinkhachsan']['tinhtp']?></p>
                        </div>
                        <div class="box-content-line">
                            <p>Quận/Huyện: </p>
                            <p class="help-block"><?=$data['thongtinkhachsan']['quanhuyen']?></p>
                        </div>
                    </div>

                </div>
                <div class="col-md-5" style="padding-left:0px;">
                    <!-- <div class="col-md-1"></div> -->
                    <div class="col-md-5" style="padding-left:0px;">
                        <div class="box-content-line">
                            <p>Hạng Sao: </p>
                            <p class="help-block"><span class="fas star-<?=$data['thongtinkhachsan']['sao']?>"></span></p>
                        </div>
                        <div class="box-content-line">
                            <p>Phong cách: </p>
                            <p class="help-block">
                                <?php
                                   if($data['thongtinkhachsan']['PhongCach']==1){
                                       echo "Sang Trọng";
                                   }
                                   else
                                       echo "Cổ Điển";
                                ?>
                            </p>
                        </div>
                        <div class="box-content-line">
                            <p>Trạng Thái: </p>
                            <p class="help-block">
                            <?php 
                                    if($data['thongtinkhachsan']['TrangThai']==0)
                                        echo "Chưa xác nhận";
                                    else {
                                        echo "Đang hoạt động";
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-7" style="padding:0">
                        <div class="box-content-line">
                            <p class="text-center">Ảnh đại diện cho khách sạn: </p>
                            <img id="avt" src="<?=$data['thongtinkhachsan']['Avatar']!=""? $data['thongtinkhachsan']['Avatar']:"assets/img/avt-default.webp" ?>" class="img-thumbnail" alt="Avatar-ks">
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
    <!-- <div class="box row">
        <div class="box-header">
            Mô Tả Khách Sạn
        </div>
        <div class="box-content" style="min-height:200px">
          <?=$data['thongtinkhachsan']['Mota']?>
        </div>
    </div> -->
    <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">Mô Tả Khách Sạn</div>
                        <div class="box-content" style="height:250px; ">
                        <?=$data['thongtinkhachsan']['Mota']?>
                        </div>
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="box">
                       <div class="box-header">Giới Thiệu</div>
                       <div class="box-content" style="height:250px; ">
                       <?=$data['thongtinkhachsan']['GioiThieu']?>
                        </div>
                    </div>
                </div>
            </div>
</div>
</body>