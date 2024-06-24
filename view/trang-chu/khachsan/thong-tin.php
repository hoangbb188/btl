<style>
.loadimg .carousel-indicators {
    bottom: 0;
    left: 10px;
    margin-left: 5px;
    width: 90%;
    height: 100px;
    overflow: auto;
}
.loadimg .carousel-indicators li {
    border: medium none;
    border-radius: 0;
    float: left;
    height: 44px;
    margin-bottom: 5px;
    margin-left: 0;
    margin-right: 7px !important;
    margin-top: 0;
    width: 70px;
}
.loadimg .carousel-indicators img {
    border: 2px solid #FFFFFF;
    float: left;
    height: 44px;
    left: 0;
    width: 70px;
}
.loadimg .carousel-indicators .active img {
    border: 2px solid #39b3d7;
}

.loadimg .carousel-indicators::-webkit-scrollbar-track
{
	
	background-color: #F5F5F5;
}

.loadimg .carousel-indicators::-webkit-scrollbar
{
	width: 6px;
	background-color: #F5F5F5;
}

.loadimg .carousel-indicators::-webkit-scrollbar-thumb
{
	background-color: #000000;
}
</style>
        <div class="col-md-12 col-xs-12 hotel-img-wrapper" data-toggle="modal" data-target="#ThuVienAnh" style="margin-top: 5px;">
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <img class="img-thumbnail" style="width:100%;height:323px;object-fit: cover;" src="<?=$data['thongtinkhachsan']['Avatar']!=""? $data['thongtinkhachsan']['Avatar']:"assets/img/avt-default.webp"?>">
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="row thumb"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xs-12" style="margin-top: 5px">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th class="text-uppercase text-center">loại phòng</th>
                            <th class="text-uppercase text-center">tối đa</th>
                            <th class="text-uppercase text-center">giá một đêm<br>
                                <small class="text-lowercase">Chưa bao gồm thuế, phí</small></th>
                            <th class="text-uppercase text-center">số lượng</th>
                            <th class="text-uppercase text-center">đặt phòng</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php 
                            if($data['danhsachphong']): 
                                foreach ($data['danhsachphong'] as $index=> $giatri): 
                        ?>
                        <!-- Thông tin một phòng -->
                        <tr>
                            <td colspan="5">
                                <a href="" class="text-primary"><h4><?=$giatri['LoaiP'];?></h4></a>
                            </td>
                        </tr>
                        <section id="datphong">
                        <tr>
                            <form action="index.php" method="GET">
                                <input type="hidden" name="controller" value="trang-chu/thanh-toan">
                                <input type="hidden" name="hotel" value="<?=$data['thongtinkhachsan']['id'];?>"/>
                                <input type="hidden" name="room" value="<?=$giatri['MP'];?>"/>
                            <td class="col-md-4">
                                <div class="detail-room" data-toggle="modal" data-target="#DetailRoomInfo" data-name-room="<?=$giatri['LoaiP'];?>" data-id-room="<?=$giatri['MP'];?>" data-id-hotel="<?=$data['thongtinkhachsan']['id'];?>">
                                    <img width="100%" class="img-thumbnail img-responsive" src="<?=$giatri['Avatar']!=""? $giatri['Avatar']:"assets/img/avt-default.webp"?>"/>
                                    <p><a class="text-primary">Xem ảnh và tiện nghi</a></p>
                                    <p class="text-muted"><?=$giatri['Dientich'];?>m<sup>2</sup></p>
                                    <p class="text-muted">Hướng <?=huong_nhin($giatri['View']);?></p>
                                </div>
                            </td>
                            <td><span class="glyphicon glyphicon-user"></span> x <?=$giatri['SoNguoi'];?> người</td>
                            <td class="col-md-2"><h3 class="text-success text-right"><?php echo number_format($giatri['Gia']); ?> <sup>đ</sup></h3></td>
                            <td class="col-md-2">
                                <select name="sophong" class="form-control">
                                    <?php
                                    for($i = 1;$i<=10;$i++){
                                        echo '<option value="'.$i.'">'.$i.' phòng</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-warning btn-block text-uppercase">Đặt ngay</button>
                            </td>
                        </tr>
                        </form>
                        </section>
                        <!-- Thông tin một phòng/ -->
                        <?php
                            endforeach;
                        endif;
                        ?>

                        </tbody>
                    </table>
                </div>
        </div>
        <?php include 'view/trang-chu/khachsan/danh-gia.php';?>

<div id="DetailRoomInfo" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:80%;height:80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-uppercase">Đánh giá phòng </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div id="loadimg1" class="loadimg carousel slide" data-ride="carousel" style="width: 100%; overflow: hidden; position: relative;">
                            <!-- Indicators -->
                            <ol class="loadimg carousel-indicators">
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="loadimg carousel-inner"></div>
                            <!-- Left and right controls -->
                            <a class="loadimg left carousel-control" href="#loadimg1" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="loadimg right carousel-control" href="#loadimg1" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#">Tiện nghi phòng</a></li>
                        </ul>
                        <div class="tab-content">
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody class="convenience"></tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="ThuVienAnh" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:80%;height:80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div id="loadimg2" class="loadimg carousel slide" data-ride="carousel" style="width: 100%; overflow: hidden; position: relative;">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="loadimg carousel-inner"></div>
                            <!-- Left and right controls -->
                            <a class="loadimg left carousel-control" href="#loadimg2" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="loadimg right carousel-control" href="#loadimg2" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#"><?=$data['thongtinkhachsan']['ten'];?></a></li>
                        </ul>
                        <div class="tab-content">
                            <hr>
                            <?php if($tongquatdiem>0):?>
                            <div class="text-center">
                                <h1><?=$tongquatdiem;?> điểm</h1>
                                 <p>Dựa trên <strong><?=$tongdanhgia;?></strong> đánh giá của khách hàng</p>
                            </div>
                             <!-- đánh giá vị trí-->
                             <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Vị trí</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$ViTritb;?></strong></p>
                                        </small> 
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$ViTritb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$ViTritb*10;?>%">
                                            <span class="sr-only"><?=$ViTritb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh giá vị trí/-->

                                    <!-- đánh giá phục-->
                                    <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Phục vụ</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$PhucVutb;?></strong></p>
                                        </small> 
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$PhucVutb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$PhucVutb*10;?>%">
                                            <span class="sr-only"><?=$PhucVutb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh giá phục/-->

                                    <!-- đánh giá tiện nghi-->
                                    <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Tiện nghi</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$TienNghitb;?></strong></p>
                                        </small> 
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$TienNghitb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$TienNghitb*10;?>%">
                                            <span class="sr-only"><?=$TienNghitb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh tiện nghi/-->

                                    <!-- đánh giá giá cả-->
                                    <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Giá cả</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$Giatb;?></strong></p>
                                        </small> 
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$Giatb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$Giatb*10;?>%;">
                                            <span class="sr-only"><?=$Giatb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh giá giá cả/-->

                                    <!-- đánh giá vệ sinh-->
                                    <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Vệ sinh</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$VeSinhtb;?></strong></p> 
                                        </small>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$VeSinhtb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$VeSinhtb*10;?>%;">
                                            <span class="sr-only"><?=$VeSinhtb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh giá vệ sinh/-->
                            <?php else:?>
                            <h3>Chưa có đánh giá nào!</h3>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $(".detail-room").on("click",function(){
        var id_room = $(this).attr("data-id-room"),
        id_hotel = $(this).attr("data-id-hotel"),
        name_room = $(this).attr("data-name-room");
        //console.log(name_room);
        $.ajax({
            url:"API-get-img-room",
            type:"POST",
            dataType:"json",
            data:{
                id_room:id_room,
                id_hotel:id_hotel
            },
            success: function(t){
                var convenience = indicators = carousel_text = "";
                for(var i = 0;i<t.imagesRoom.length;i++){
                    indicators +=  '<li data-target="#loadimg1" data-slide-to="'+i+'"><img style="object-fit: cover;" alt="" title="" src="'+ t.imagesRoom[i].src +'"></li>';
                    carousel_text += '<div class="item"> <img src="'+ t.imagesRoom[i].src +'" alt="" style="width:100%;height:500px;object-fit: cover;"> </div>';
                }
                //console.log(t.convenience);
                var x = 0;
                if(t.convenience != 0){
                    t.convenience.forEach(function(item){
                        if(x%3 == 0) convenience += '<tr class="text-center">';
                        convenience += '<td><i class="'+ item.icon +' fa-3x text-default" data-toggle="tooltip" data-original-title="'+ item.tentn +'" style="margin-right:10px"></i></td>';
                        if((x+1)%3 == 0) convenience += '</tr>';
                    x++;
                    })
                }
                
                console.log();
                $("#DetailRoomInfo .carousel-inner").html(carousel_text);
                $("#DetailRoomInfo .carousel-indicators").html(indicators);
                $("#DetailRoomInfo .carousel-inner .item:first").addClass("active");
                $("#DetailRoomInfo .carousel-indicators li:first").addClass("active");
                $("#DetailRoomInfo h4").html(name_room);
                $("#DetailRoomInfo .convenience").html(convenience);
                $('[data-toggle="tooltip"]').tooltip();
            },
            error: function(t){

            }
        });
    });
    xuatAnh = '';
    var jsonImages = JSON.parse('<?php echo json_encode($data['thuvienanh'])?>');
    for(var i = 0;i<4;i++){
        if(i<jsonImages.length){
            xuatAnh += '<div class="col-md-6 col-xs-6 thumb"> <img class="img-thumbnail" style="width:100%;height:161.5px;object-fit: cover;" src="'+ jsonImages[i].src +'"> </div>';
        }else{
            xuatAnh += '<div class="col-md-6 col-xs-6 thumb"> <img class="img-thumbnail" style="width:100%;height:161.5px;object-fit: cover;" src="assets/img/avt-default.webp"></div>';
        }
    }
    $(".row .thumb").html(xuatAnh);
    $(".hotel-img-wrapper").on("click",function(){
        var convenience = indicators = carousel_text = "";
        var i = 0;
        //console.log(jsonImages);
        if(jsonImages != 0){
            jsonImages.forEach(function(t){
            indicators +=  '<li data-target="#loadimg2" data-slide-to="'+i+'"><img style="object-fit: cover;" alt="" title="" src="'+ t.src +'"></li>';
            carousel_text += '<div class="item"> <img src="'+ t.src +'" alt="" style="width:100%;height:500px;object-fit: cover;"> </div>';
            i++;
        });
        }
        $("#ThuVienAnh .carousel-inner").html(carousel_text);
        $("#ThuVienAnh .carousel-indicators").html(indicators);
        $("#ThuVienAnh .carousel-inner .item:first").addClass("active");
        $("#ThuVienAnh .carousel-indicators li:first").addClass("active");
    });
    
   //console.log( $(".thumb .img-thumbnail").length);
    
});
</script>