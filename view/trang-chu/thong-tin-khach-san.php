<?php
if(!defined('LTW')) die();
//print_r($data);
$act = isset($_GET['act']) ? $_GET['act'] : 'thong-tin';
$tongdanhgia = $data['tongquan']['SL'];
$tongquatdiem = !empty($data['tongquan']['danhgiatb']) ? round($data['tongquan']['danhgiatb'],1) : 0;
$ViTritb = !empty($data['tongquan']['ViTritb']) ? round($data['tongquan']['ViTritb'],1) : 0;
$PhucVutb = !empty($data['tongquan']['PhucVutb']) ? round($data['tongquan']['PhucVutb'],1) : 0;
$TienNghitb = !empty($data['tongquan']['TienNghitb']) ? round($data['tongquan']['TienNghitb'],1) : 0;
$Giatb = !empty($data['tongquan']['Giatb']) ? round($data['tongquan']['Giatb'],1) : 0;
$VeSinhtb = !empty($data['tongquan']['VeSinhtb']) ? round($data['tongquan']['VeSinhtb'],1) : 0;

if($act == 'thong-tin'):
?>
<div class="container" style="padding-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <form action="index.php" method="GET" class="form-horizontal">
                <input type="hidden" name="controller" value="trang-chu/thong-tin-khach-san">
                <input type="hidden" name="hotel" value="<?=$_GET['hotel'];?>">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="TenKs" value="<?=$data['thongtinkhachsan']['ten'];?>" class="form-control" disabled="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group" id="datetimepicker1">
                        <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span></span>
                        <input type="text" name="check-in" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group" id="datetimepicker2">
                        <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span></span>
                        <input type="text" name="check-out" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-warning btn-block">CẬP NHẬT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="container" style="padding-top: 20px;">
    <div class="row">
        <!-- Breadcrumbs -->
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Khách sạn</a></li>
                <li><a href="index.php?controller=trang-chu/danh-sach-khach-san&city=<?=$data['thongtinkhachsan']['matp'];?>"><?=$data['thongtinkhachsan'][ 'tinhtp'];?></a></li> <!-- Tỉnh TP --->
                <li><a href="index.php?controller=trang-chu/danh-sach-khach-san&district=<?=$data['thongtinkhachsan']['maqh'];?>"><?=$data['thongtinkhachsan']['quanhuyen'];?></a></li> <!-- Quận/huyện -->
                <?php if($act == 'thong-tin'):?>
                <li class="active"><?=$data['thongtinkhachsan']['ten'];?></li> <!-- Tên khách sạn -->
                <?php else:?>
                <li><a href="index.php?controller=trang-chu/thong-tin-khach-san&hotel=<?=$_GET['hotel'];?>"><?=$data['thongtinkhachsan']['ten'];?></a></li> <!-- Tên khách sạn -->
                <li class="active">Đánh giá <?=$data['thongtinkhachsan']['ten'];?></li> <!-- Tên khách sạn -->
                <?php endif;?>
            </ul>
        </div>
        <!-- Breadcrumbs -->
        <div class="col-md-12"><hr></div>
        <div class="col-md-12">
            <div class="pull-left">
                <h3><?=$data['thongtinkhachsan']['ten'];?></h3> <!-- Tên khách sạn -->
                <span class="text-mute"><i class="fas fa-map-marker-alt"></i> <?=$data['thongtinkhachsan']['diachi'];?></span> <!-- Địa chỉ-->
            </div>
           
            <div class="pull-right">
                <?php if($act == 'thong-tin'):?>
                <!-- <img class="img-reponesive" width="100px" height="auto" src="assets/img/ico_dam_bao_hoan_tien.webp"/> -->
                <?php endif;?>
            </div>  
            
        </div>
        <div class="col-md-6 col-xs-6">
            <div class="row">
                <div class="col-md-3">
                    <div class="btn-group-vertical">
                        <?php if($tongquatdiem>0):?>
                        <a href="#danhgia" class="btn btn-primary btn-block" data-toggle="tooltip" title="Có <?=$tongdanhgia;?> đánh giá"><span><?=$tongquatdiem;?> điểm</span></a>
                        <span class="label label-warning">(<?=$tongdanhgia;?> đánh giá)</span><!-- Tên đánh giá -->
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-xs-6">
            <div class="text-right">
                <?php if($act == 'thong-tin'):?>
                <a href="#datphong" class="btn btn-warning btn-md text-uppercase">Đặt phòng ngay giữ giá tốt</a>
                <?php else:?>
                <a href="index.php?controller=trang-chu/thong-tin-khach-san&hotel=<?=$_GET['hotel'];?>" class="btn btn-warning btn-md text-uppercase">Xem khách sạn</a>
                <?php endif;?>
                
            </div>  
        </div>
        <?php
        $file = "view/trang-chu/khachsan/$act.php";
        if(file_exists($file)) include $file;
        ?>
        
    </div>
</div>
                <?php

                    $datetimepicker = array();
                    if (isset($_SESSION['time']['check-in'], $_SESSION['time']['check-out'])) {
                        $datetimepicker[0] = $_SESSION['time']['check-in'];
                        $datetimepicker[1] = $_SESSION['time']['check-out'];
                    } else {
                        $datetimepicker[0] = date("m/d/Y", time() + 3600 * 24);
                        $datetimepicker[1] = date("m/d/Y", time() + 3600 * 24 * 2);
                    }
                ?>
                <script type="text/javascript">

                    $(function () {
                        $('#datetimepicker1').datetimepicker({
                            defaultDate: "<?php echo $datetimepicker[0]?>",
                            format: 'DD-MM-YYYY'
                            //useCurrent: false
                        });
                        $('#datetimepicker2').datetimepicker({
                            defaultDate: "<?php echo $datetimepicker[1]?>",
                            format: 'DD-MM-YYYY',
                            useCurrent: false //Important! See issue #1075
                        });
                        $("#datetimepicker1").on("dp.change", function (e) {
                            $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
                        });
                        $("#datetimepicker2").on("dp.change", function (e) {
                            $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
                        });
                    });

                    function GuiReview(mks){
                        var rate_vitri = $("#vitri").val();
                        var rate_phucvu = $("#phucvu").val();
                        var rate_tiennghi = $("#tiennghi").val();
                        var rate_giaca = $("#giaca").val();
                        var rate_vesinh = $("#vesinh").val();
                        var nhanxet = CKEDITOR.instances.nhanxet.getData();
                        var box_alert = '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>';
                        if(nhanxet == ''){
                            $("#thongbaoreview").html(box_alert + 'Oánh vài dòng nhận xét ik bạn eii' + '</div>');
                            return false;
                        }

                        $.ajax({
                            url:"API-DanhGia",
                            type:"POST",
                            dataType:"json",
                            data:{
                                rate_vitri:rate_vitri,
                                rate_phucvu:rate_phucvu,
                                rate_tiennghi:rate_tiennghi,
                                rate_giaca:rate_giaca,
                                rate_vesinh:rate_vesinh,
                                nhanxet:nhanxet,
                                MKs:mks
                            },
                            success: function(t){
                                if(t.trangthai == 'loi'){
                                    $("#thongbaoreview").html(t.thongbao);
                                }else{
                                    $("#thongbaoreview").html('<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>Đánh giá thành công, cám ơn bạn đã nhận xét!</div>');
                                    $("#button_review").attr("disabled",true);
                                    setTimeout(function(){
                                        //$("#VietDanhGia").modal('hide');
                                        location.reload();
                                    },1000);
                                }
                            },
                            error: function(){
                                console.log();
                            }
                        })
                    }
                </script>

<!-- Modal Đánh giá -->
<div id="VietDanhGia" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-uppercase">Đánh giá khách sạn</h4>
            </div>
            <div class="modal-body">
                <p><strong>Vui lòng chọn thang điểm đánh giá <span class="text-danger">(*)</span></strong></p>
                <div class="form-group row">
                    <div class="col-md-2">
                        <p><strong>Vị trí</strong></p>
                        <select class="form-control" id="vitri">
                            <?php for($i=10;$i>0;$i--):?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>
                        </select>  
                    </div>
                    <div class="col-md-2">
                        <p><strong>Phục vụ</strong></p>
                        <select class="form-control" id="phucvu">
                            <?php for($i=10;$i>0;$i--):?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>
                        </select>  
                    </div>
                    <div class="col-md-2">
                        <p><strong>Tiện nghi</strong></p>
                        <select class="form-control" id="tiennghi">
                            <?php for($i=10;$i>0;$i--):?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>
                        </select>  
                    </div>
                    <div class="col-md-2">
                        <p><strong>Giá cả</strong></p>
                        <select class="form-control" id="giaca">
                            <?php for($i=10;$i>0;$i--):?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>
                        </select>  
                    </div>
                    <div class="col-md-2">
                        <p><strong>Vệ sinh</strong></p>
                        <select class="form-control" id="vesinh">
                            <?php for($i=10;$i>0;$i--):?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>
                        </select>  
                    </div>
                </div>    
                <p><strong>Nhận xét <span class="text-danger">(*)</span></strong></p>
                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea name="nhanxet" id="nhanxet" class="ckeditor" rows="3" placeholder="Bạn muốn có gì mún nói với tui hok ?"></textarea>  
                    </div>
                </div>
                <div id="thongbaoreview"></div>
            </div>
            <div class="modal-footer">
                <button id="button_review" type="button" class="btn btn-success" onclick="GuiReview(<?=$data['thongtinkhachsan']['id'];?>);">Gửi</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Đánh giá -->                