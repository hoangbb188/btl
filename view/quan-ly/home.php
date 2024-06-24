<head>
    <style>.sidebar {width: 0px;}#main {margin-left: 0px;}.navbar-header{margin-left:15px !important;}</style>
    <script>$(".navbar-header").html('<a href="index.php" ><img src="assets/img/lthotel.png" alt=""></a>');</script>
</head>

<?php
//print_r($data);
//print_r($_SESSION);
    if(isset($_SESSION['xoa']) && $_SESSION['xoa']==true) 
    {
        echo '<script>swal("Xóa Thành Công", "<br>");</script>';
        unset($_SESSION['xoa']); 
    }
    if(isset($_SESSION['them']) && $_SESSION['them']==true) 
    {
        echo '<script>swal("Thêm Khách Sạn Thành Công", "<br>","success");</script>';
        unset($_SESSION['them']); 
    }
?>

<div class="admin-header">
        <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Danh Sách Khách Sạn Quản Lý</h3>
            <p class="help-block">Tổng cộng: <?=$data['phantrang']['tongSoHang']?>  khách sạn</p>
        </div>
        <div class="col-md-3">
            <a href="index.php?controller=quan-ly/dang-ky&step=2" type="button" class="btn btn-primary">Thêm khách sạn</a>
        </div>
</div>

</div>
<div class="admin-content">
    <div class="box row" style="min-height:200px;">
        <div class="box-content" style="padding:50px 50px;">
        <?php if($data['DanhSachKhachSan']):?>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách Sạn</th>
                        <th>Địa Chỉ</th>
                        <th>Trạng Thái</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = ($data['phantrang']['pageHienTai'] -1)*$this->soHangTrenPage + 1;
                    foreach ($data['DanhSachKhachSan'] as $key => $value):  
                    ?>
                    <tr>
                        <td id="mks" style="display:none"><?=$value['id'];?></td>
                        <td><?=$i++?></td>
                        <td id="tenks" class="col-md-4 col-sm-4">
                            <?="<a href='index.php?controller=quan-ly/khach-san&hotel=".$value['id']."'>".$value['ten']."</a>";?>
                        </td>
                        <td class="col-md-4  col-sm-4"><?=$value['diachi'];?></td>
                        <td class="col-md-2 col-sm-2"><?=$value['TrangThai']?"Đang hoạt động":"Chưa xác nhận" ?></td>
                        <td class="col-sm-2" >
                            <a  href="index.php?controller=quan-ly/thong-tin-khach-san&act=edit&hotel=<?=$value['id'];?>" class="btn btn-success col-md-5 col-xs-12 col-sm-8">Sửa</a>
                            <button class="btn btn-danger col-md-offset-2 col-md-5 col-sm-8 col-xs-12 xoa"  data-toggle="modal" data-target="#myModal">xóa</button>
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
                    <?php else: echo "<h4>Bạn chưa có khách sạn nào, vui lòng thêm khách sạn để quản lý</h4> <br>"; endif;?>
            <div class="col-md-12 text-center">  <?=$data['phantrang']['html']; ?>    </div>  
           <p class="text-danger"> *Note: Các khách sạn chưa được xác nhận cần liên hệ với Admin LT Hotel để được xác nhận và hoạt động</p>
        </div>
    </div>
</div>
</body>

<script>
   $(document).ready(function(){
        $(".xoa").click(function(){
           var tenks = $(this).parent().siblings("#tenks").find("a").html();
           $(".modal-title").html("Bạn muốn xóa "+ tenks);
           var mks =  $(this).parent().siblings("#mks").html();
           $(".modal-body a").click(function(){
               XoaKhachSan(mks);
           })
           console.log(tenks);
        })
        
        function XoaKhachSan(hotel){
            $.ajax({
                url:"API-admin-xoa-ks",
                type:"POST",
                dataType:"json",
                data:{
                    hotel:hotel
                },
                success: function(t){
                    if(t.trangthai == 'loi'){
                        swal(t.thongbao, "<br>", "error");
                        setTimeout(function(){ location.reload();}, 2000);
                    }
                    else
                    {
                        window.location.href=window.location.href;
                    }
                },
                error: function(t){
                    console.log(t); 
                }

            })
        }
   });

   $(document).ready(function() {
        $("#naptien").click(function() {
            $("#NT").modal("toggle");
        });
    });
</script>

