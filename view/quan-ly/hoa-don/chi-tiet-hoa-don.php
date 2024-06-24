<?php //print_r($data) ;
    $sodem = sodem($data['chitiethoadon']['NgayTra'],$data['chitiethoadon']['NgayDat']);
    $sophong = $data['chitiethoadon']['SL'];
    if(isset($_SESSION['xacnhan'])&&$_SESSION['xacnhan']==true)
    {
        echo '<script>swal("Xác Nhận Thành Công", "<br>", "success");</script>';
        unset($_SESSION['xacnhan']); 
    }
    if(isset($_SESSION['traphong'])&&$_SESSION['traphong']==true)
    {
        echo '<script>swal("Trả Phòng Thành Công", "<br>", "success");</script>';
        unset($_SESSION['traphong']); 
    }
?>
<div class="admin-header">
        <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Chi Tiết Hóa Đơn - Mã hóa đơn: 00<?= $data['chitiethoadon']['MHd'] ?></h3>
            <input type="hidden" id="MKs" value="<?= $data['thongtinkhachsan']['id'] ?>">
            <input type="hidden" id="MHd" value="<?= $data['chitiethoadon']['MHd'] ?>">    
            <br>
            <a style="cursor: pointer;" onclick="window.history.back();">
                     <span class="glyphicon glyphicon-chevron-left"></span> Trở Lại
                </a>
        </div>  
</div>

</div>
<div class="admin-content">
    <div class="box" style="min-height:200px;">
        <div class="box-content" style="padding:50px 20px;">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body bg-success">
                        <h4><?=$data['thongtinkhachsan']['ten'];?></h4>
                        <p class="fas star-2"></p>
                        <small>
                            <p class="text-mute"><i class="fas fa-map-marker-alt"></i> <?=$data['thongtinkhachsan']['diachi'];?></p>
                            <div class="col-md-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-3 col-xs-4">
                                        <div class="row text-left">
                                            <p><strong>Nhận phòng:</strong></p>
                                            <p><strong>Trả phòng:</strong></p>
                                            <p><strong>Tổng Số ngày thuê:</strong></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-0">
                                        <div class="row">
                                            <p>00:01, <?=dinh_dang_thu($data['chitiethoadon']['NgayDat']);?>, ngày <strong><?=date("d-m-Y",strtotime($data['chitiethoadon']['NgayDat']));?></strong></p>
                                            <p>00:01, <?=dinh_dang_thu($data['chitiethoadon']['NgayTra']);?>, ngày <strong><?=date("d-m-Y",strtotime($data['chitiethoadon']['NgayTra']));?></strong></p>
                                            <p><strong><?=$sodem;?></strong> ngày</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </small>
                    </div>
                    <div class="panel-body" style="margin-top: 20px">
                        <h4 class="text-capitalize">Thông tin liên hệ</h4>
                        <div class="form-horizontal">
                            
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <?=$data['chitiethoadon']['email'];?>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Số điện thoại:</label>
                                        <?=$data['chitiethoadon']['SDT'];?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Họ và tên:</label>
                                        <?=$data['chitiethoadon']['Ten'];?>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Tỉnh/TP:</label>
                                        <?=$data['chitiethoadon']['TP']['tentinh'];?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                <!-- // Trạng thái 0 là chưa nhận phòng -->
                                    <?php if($data['chitiethoadon']['TrangThai']==1):?>
                                        <div class="alert alert-success text-center">
                                            Mã bảo mật <strong><?=$data['chitiethoadon']['MaBaoMat']?></strong> 
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-success"  data-toggle="modal" data-target="#myModal" <?=strtotime($data['chitiethoadon']['NgayTra']) <= time()?"":"disabled";?>>Trả Phòng</button>
                                            <?php
                                                if(strtotime($data['chitiethoadon']['NgayTra']) > time())
                                                echo "<div class='text-danger' style='margin-top:5px'>Chưa đến ngày trả phòng</div>"
                                            ?>
                                        </div>
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">  
                                                <div class="modal-content">
                                                    <div class="modal-header" >
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title text-center" style="padding:15px;">Bạn Có Muốn Trả Phòng</h4>
                                                    </div>
                                                    <div class="modal-body" style="padding: 15px 30%;">
                                                        <button  type="button" style="margin-right:30%;" class="btn btn-default btn-lg" data-dismiss="modal">Hủy</button>
                                                        <a type="button" class="btn btn-primary btn-lg pull-right" onclick="TraPhong();" >Trả</a>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function TraPhong() {
                                                var MKs = $("#MKs").val(), MHd= $("#MHd").val();
                                                $.ajax({
                                                    url: "API-admin-xac-nhan-hoa-don",
                                                    data: {
                                                        MKs: MKs, MHd: MHd,
                                                    },
                                                    dataType: 'json',
                                                    type: "POST",
                                                    success: function (data) {
                                                        if(data.trangthai=='loi'){
                                                            swal(data.thongbao, "<br>", "error");
                                                            setTimeout(function(){ location.reload();}, 2000);
                                                        }
                                                        else{
                                                            window.location.href="/index.php?controller=quan-ly/don-dat-phong&hotel="+ MKs +"&hoadon="+MHd;
                                                        }
                                                        //console.log(data);   
                                                    },
                                                    error: function (data) {
                                                            console.log(data);
                                                    }
                                                })      
                                            }
                                        </script>
                                    <?php elseif($data['chitiethoadon']['TrangThai']==2): ?>
                                         <div class="alert alert-success text-center">
                                            Mã bảo mật <strong><?=$data['chitiethoadon']['MaBaoMat']?></strong> 
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-danger disabled">Đã Trả Phòng</button>
                                        </div>;
                                    <?php elseif($data['chitiethoadon']['TrangThai']==0): 
                                        if(strtotime($data['chitiethoadon']['NgayTra']) >= time()):?>
                                        <button data-toggle="modal" data-target="#xac-nhan" id="openModal" class="btn btn-block btn-primary text-center" <?=(strtotime($data['chitiethoadon']['NgayDat']) > time())?"disabled":"" ?> >
                                            Nhập Mã Bảo Mật
                                        </button>
                                        <?php if((strtotime($data['chitiethoadon']['NgayDat']) > time())) echo "<div class='text-danger text-center' style='margin-top:15px'>Chưa đến ngày nhận phòng, không thể nhập mã</div>" ?>
                                        <!-- Modal -->
                                        <div id="xac-nhan" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h3 class="modal-title">Nhập Mã Xác Nhận</h3>
                                                    </div>
                                                    <div class="modal-body row" style="padding:5%;">
                                                        <div id="Loi"></div>
                                                        <div class="col-md-9">
                                                            <input id="MaBaoMat" type="text" class="form-control input-lg">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button id="submit" class="btn btn-primary btn-lg">Xác Nhận</button>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <script>
                                               $(document).ready(function(){
                                                    // Nếu Mỗi lần mở modal nó sẽ ẩn lỗi trước đó
                                                    $("#openModal").click(function(){
                                                        $("#Loi").html("");
                                                      })

                                                    var error ='<div class="alert alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>';
                                                    
                                                    $("#submit").click(GuiMaBaoMat);

                                                    $("#MaBaoMat").keydown(function(e){
                                                        if(e.keyCode == 13)
                                                            GuiMaBaoMat();
                                                    });

                                                    function GuiMaBaoMat() { 
                                                        var MaBaoMat = $("#MaBaoMat").val().trim(); // lấy mã bảo mật
                                                        if(MaBaoMat == ''){  // kiểm tra mã có trống không
                                                            $("#Loi").html(error + 'Mã Xác Nhận Không Được Để Trống' +'</div>');
                                                            return $("#MaBaoMat").focus();
                                                        }
                                                        var MKs = $("#MKs").val(), MHd= $("#MHd").val();
                                                        $.ajax({
                                                            url: "API-admin-xac-nhan-hoa-don",
                                                            data: {
                                                                MKs: MKs, MHd: MHd, MaBaoMat: MaBaoMat,
                                                            },
                                                            dataType: 'json',
                                                            type: "POST",
                                                            success: function (data) {
                                                                if(data.trangthai=='loi'){
                                                                    $("#Loi").html(error + data.thongbao +'</div>');
                                                                    return $("#MaBaoMat").focus();
                                                                }
                                                                else{
                                                                    window.location.href="/index.php?controller=quan-ly/don-dat-phong&hotel="+ MKs +"&hoadon="+MHd;
                                                                }
                                                              // console.log(data);
                                                            },
                                                            error: function (data) {
                                                                    console.log(data);
                                                            }
                                                      })
                                                    }


                                                });
                                            
                                            </script>
                                        <?php else:  ?>
                                         <div class="alert alert-danger text-center">
                                          Hóa Đơn Đã Hết Hạn
                                        </div>
                                    <?php  endif; endif; ?>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thông tin!</div>
                    <div class="panel-body">
                        <div class="col-md-12">   
                            <p><strong><?=$data['phong']['LoaiP'];?></strong></p>
                            <p><?=$sophong?> phòng</p>
                        </div>
                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                            <p class="pull-left"><strong>Tổng tiền:</strong></p>
                            <p class="pull-right text-success"><strong><?=number_format($data['chitiethoadon']['Tien']);?>&nbsp;₫</strong></p>
                        </div>
                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                            <strong>
                            <div class="pull-left">GIẢM GIÁ:</div>
                            <div class="pull-right text-success"><strong><?=number_format($data['chitiethoadon']['GiamGia']);?>&nbsp;₫</strong></div>
                            <br>
                            <div class="pull-left">THANH TOÁN:</div>
                            <div class="pull-right text-success" id="thanhtoan"><?=number_format($data['chitiethoadon']['Tien']-$data['chitiethoadon']['GiamGia']);?>&nbsp;₫</div>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>