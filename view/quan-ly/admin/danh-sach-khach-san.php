<?php
//print_r($data);
    if(isset($_SESSION['duyet']) && $_SESSION['duyet']==true) 
    {
        echo '<script>swal("Duyệt Khách Sạn Thành Công", "<br>","success");</script>';
        unset($_SESSION['duyet']); 
    }
    if(isset($_SESSION['xoa']) && $_SESSION['xoa']==true) 
    {
        echo '<script>swal("Xóa Khách Sạn Thành Công", "<br>","");</script>';
        unset($_SESSION['xoa']); 
    }
?>

<div class="admin-header">
        <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Danh Sách Khách Sạn</h3>
            <?php if(isset($_GET['type'])&&$_GET['type']=='xacnhan') :?>
                 <p class="help-block">Số khách sạn chưa xác nhận:<?=$data['phantrang']['tongSoHang']?></p>
            <?php else: ?>
                <p class="help-block">Số khách sạn đang hoạt động: <?=$data['phantrang']['tongSoHang']?></p>
            <?php endif;?>
        </div>  
</div>

</div>
<div class="admin-content">
    <a href="index.php?controller=quan-ly/khach-san-admin" class="btn btn-default <?php if(!(isset($_GET['type'])&&$_GET['type']=='xacnhan')) echo "active"?>">Khách Sạn Đang Hoạt Động</a>
    <a href="index.php?controller=quan-ly/khach-san-admin&type=xacnhan" class="btn btn-default  <?php if(isset($_GET['type'])&&$_GET['type']=='xacnhan') echo "active"?>">Khách Sạn Chưa Xác Nhận</a>
    <div class="box" style="min-height:200px;">
        <div class="box-content" style="padding:3%">
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
                                <?="<a href='index.php?controller=quan-ly/khach-san-admin&hotel=".$value['id']."'>".$value['ten']."</a>";?>
                            </td>
                            <td class="col-md-4  col-sm-4"><?=$value['diachi'];?></td>
                            <td class="col-md-2 col-sm-2"><?=$value['TrangThai']?"Đang hoạt động":"Chưa xác nhận" ?></td>
                            <td class="col-sm-2">
                                <?php if($value['TrangThai']==1): ?>
                                <button class="btn btn-danger btn-block" onclick="ThongBao($(this),'xóa ');" style="max-width:80px;" data-toggle="modal" data-target="#myModal">xóa</button>
                                <?php elseif($value['TrangThai']==0): ?>
                                <button class="btn btn-primary btn-block" onclick="ThongBao($(this),'duyệt ');" style="max-width:80px;" data-toggle="modal" data-target="#myModal">Duyệt</button>
                                <?php endif;?>
                                
                            </td>
                        </tr>   
                        <?php endforeach; ?>
                        <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">  
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 style="padding: 25px;" class="modal-title text-center"></h4>
                                        </div>
                                        <div class="modal-body" style="padding: 25px 30%;">
                                            <button type="button" style="margin-right:30%;" class="btn btn-default btn-lg" data-dismiss="modal">Hủy</button>
                                            <?php if($value['TrangThai']==1): ?>
                                            <a type="button" url="API-admin-xoa-ks" class="btn btn-danger btn-lg pull-right">Xóa</a> 
                                            <?php elseif($value['TrangThai']==0): ?> 
                                            <a type="button" url="API-admin-duyet-ks" class="btn btn-primary btn-lg pull-right">Duyệt</a> 
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </tbody>
                </table>
            <?php else: echo "<h4>Tạm Thời Hệ Thống Vẫn Chưa Có Khách Sạn Nào</h4> <br>"; endif;?>
                <div class="col-md-12 text-center">  <?=$data['phantrang']['html']; ?>    </div>  
        </div>
    </div>
</div>

<script>

    function ThongBao(obj,action){ 
        console.log(obj,action);
        var tenks = obj.parent().siblings("#tenks").find("a").html();
        $(".modal-title").html("Bạn muốn " + action + tenks);
        var mks =  obj.parent().siblings("#mks").html();
        $(".modal-body a").click(function(){
           var url = $(this).attr("url");
            ThucHien(mks,url);
        })
     }

        function ThucHien(hotel,url){
        $.ajax({
            url:url,
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


  

</script>