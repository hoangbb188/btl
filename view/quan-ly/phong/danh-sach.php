<?php
    //print_r($data);
 if(isset($_SESSION['xoa']) && $_SESSION['xoa']==true) 
    {
        echo '<script>swal("Xóa Thành Công", "<br>");</script>';
        unset($_SESSION['xoa']); 
    }
    if(isset($_SESSION['them']) && $_SESSION['them']==true) 
    {
        echo '<script>swal("Thêm Phòng Thành Công", "<br>","success");</script>';
        unset($_SESSION['them']); 
    }
 ?>

<div class="admin-header">
    <div class="row">
    <div class="col-md-9 admin-header-left">
        <h3>Danh Sách Phòng</h3>
        <p class="help-block">Tổng cộng:  <?=$data['phantrang']['tongSoHang']?>  phòng</p>
    </div>
    <div class="col-md-3">
        <a href="<?=$_SERVER['REQUEST_URI'].'&act=them';?>" type="button" class="btn btn-primary">Thêm Phòng</a>
    </div>
</div>

</div>
<div class="admin-content">
    <div class="box" style="min-height:200px;">
        <div class="box-content">
        <?php if($data['phong']):?>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th class="col-md-1">STT</th>
                        <th class="col-md-3">Loại Phòng</th>
                        <th class="col-md-2">Số Lượng</th>
                        <th class="col-md-2">Giá</th>
                        <th class="col-md-2">Hướng Phòng</th>
                        <th class="col-md-2">Tùy Chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = ($data['phantrang']['pageHienTai'] -1 )*$this->soHangTrenPage +1; 
                    foreach ($data['phong'] as $key => $value):  
                    ?>
                    <tr>
                        <td id="MP" style="display:none"><?=$value['MP'];?></td>
                        <td class="col-md-1"><?=$i++?></td>
                        <td id="LoaiP" class="col-md-3">
                            <?="<a href='index.php?controller=quan-ly/phong&hotel=".$data['thongtinkhachsan']['id']."&phong=".$value['MP']."'>".$value['LoaiP']."</a>";?>
                        </td>
                        <td class="col-md-2"><?=$value['SoLuong'];?></td>
                        <td class="col-md-2"><?=number_format($value['Gia'])?> vnđ</td>
                        <td class="col-md-2"><?=huong_nhin($value['View']);?></td>
                        <td class="col-sm-2">
                            <a href="index.php?controller=quan-ly/phong&hotel=<?=$data['thongtinkhachsan']['id'];?>&phong=<?=$value['MP'];?>&act=edit" class="btn btn-success col-md-5 col-xs-12 col-sm-8">Sửa</a>
                            <button class="btn btn-danger xoa col-md-offset-2 col-md-5 col-sm-8 col-xs-12"  data-toggle="modal" data-target="#myModal">xóa</a>
                        </td>
                    </tr>   
                    <?php endforeach; ?>
                    <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title text-center"></h4>
                                    </div>
                                    <div class="modal-body" style="padding: 25px 30%;">
                                        <button type="button" style="margin-right:30%;" class="btn btn-default btn-lg" data-dismiss="modal">Hủy</button>
                                        <a type="button" class="btn btn-danger btn-lg pull-right">Xóa</a>  
                                    </div>
                                </div>
                            </div>
                        </div>
                </tbody>
            </table>
            <div class="col-md-12 text-center"><?=$data['phantrang']['html'] ?></div>
                    <?php else: echo "<h4>Khách sạn chưa có phòng nào, vui lòng ấn thêm phòng để quản lý</h4> <br>"; endif;?>
        </div>
    </div>
</div>
</body>

<script>
   $(document).ready(function(){
        $(".xoa").click(function(){
           var LoaiP = $(this).parent().siblings("#LoaiP").find("a").html();
           $(".modal-title").html("Bạn muốn xóa phòng "+ LoaiP);
           var MP =  $(this).parent().siblings("#MP").html();
           $(".modal-body a").click(function(){
               XoaPhong(MP);
           })
        })

        function XoaPhong(MP){
            $.ajax({
                url:"API-admin-xoa-phong",
                type:"POST",
                dataType:"json",
                data:{
                    MP: MP,
                },
                success: function(t){
                    if(t.trangthai == 'loi'){
                        swal(t.thongbao, "<br>", "error");
                        setTimeout(function(){ location.reload();}, 2000);
                    }
                    else
                    {
                        window.location.reload();
                    }
                },
                error: function(t){
                    console.log(t); 
                }

            })
        }
   });
</script>