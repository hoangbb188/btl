<?php
//print_r($data);
 if(isset($_SESSION['sua'])&&$_SESSION['sua']==true) 
    {
        echo '<script>swal("Cập Nhật Thành Công", "<br>", "success");</script>';
        unset($_SESSION['sua']); 
    }
 ?>
<head>
    <style>
        th,td{padding:9px !important; text-align: center}
        th{width:40%;background-color: #f1f6fa;color: #8b99a7;}
        #tiennghi{min-width:270px;padding:10px;margin:20px 15px;}
    </style>
</head>
<div class="admin-header">
    <div class="row">
        <div class="col-md-9 admin-header-left">
            <div class="box-content-line" style="font-size:16px;">
                <a href="index.php?controller=quan-ly/phong&hotel=<?=$data['thongtinkhachsan']['id']?>">
                     <span class="glyphicon glyphicon-chevron-left"></span> Trở Lại
                </a>
            </div>
            <h3>Chi Tiết Phòng - Phòng <?=$data['phong']['LoaiP']?></h3>
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
        <div class="box-content" style="padding:25px;">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-center">Ảnh Đại Diện Phòng</h4>
                    <img id="avt" src="<?=$data['phong']['Avatar']!=""? $data['phong']['Avatar']:"assets/img/avt-default.webp" ?>" style="margin-left:15px;" class="img-thumbnail" alt="Avatar-ks">
                </div>
                <div class="col-md-8">
                    <h4 class="text-center">Thông Tin Phòng</h4>
                    <table class="table table-bordered  table-responsive">
                        <tr>
                            <th>Loại</th>
                            <td><?=$data['phong']['LoaiP']?></td>
                        </tr>
                        <tr>
                            <th>Số Lượng</th>
                            <td><?=$data['phong']['SoLuong']?></td>
                        </tr>
                        <tr>
                            <th>Diện Tích (m<sup>2</sup>)</th>
                            <td><?=$data['phong']['Dientich']?> m<sup>2</sup></td>
                        </tr>
                        <tr>
                            <th>Giá (vnđ)</th>
                            <td><?=number_format($data['phong']['Gia'])?> vnđ</td>
                        </tr>
                        <tr>
                            <th>Số Người Tối Đa</th>
                            <td><?=$data['phong']['SoNguoi']?></td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="col-md-12" style="margin:15px 0;">
                    <h4>Hướng Phòng</h4>
                    <p><span class='fas fa-check text-primary'></span> Hướng <?=huong_nhin($data['phong']['View']);?></p>
            </div>
            <div class="col-md-12" style="margin:15px 0;">
                    <h4>Tiện Nghi</h4>
                    <?php foreach($data['TongTienIch'] as $value):
                        if(in_array($value['id'],$data['phong']['TienIch'])) :?>
            <button id="tiennghi" class="btn btn-primary">
                <?php  echo "<span class='".$value['icon']."'></span> ".$value['tentn']; ?> 
            </button>
                    <?php endif; endforeach; ?>
            </div>
        </div>
    </div>
  

</div>
</body>