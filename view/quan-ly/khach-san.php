<?php //print_r($data); ?>

<head>
    <style>
            .doanh-thu{padding:0px;}
            @media only screen and (min-width: 992px) 
                 {.doanh-thu{padding:0 0 0 15px;}
                
            }
            .gopy-line{
                padding: 2px 15px; 
                border:1px solid #ccc;
                border-left: 7px solid rgb(194, 187, 187);
                margin-bottom: 20px;
            }
            .gopy-line .label{margin-right:10px;padding:5px}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="admin-content">
            <div class="box">
                <div class="box-content">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-3">
                                <img style="border-radius: 50%;display: inline;" width="80px" src="img/avt.jpg" alt="">
                            </div>
                            
                            <div class="col-sm-9">
                                <h4><a data-toggle="tooltip" data-original-title="Bấm để chuyển tới khách sạn" data-placement="bottom" href="index.php?controller=trang-chu/thong-tin-khach-san&hotel=<?=$data['thongtinkhachsan']['id'] ?>" target="_blank"> <?=$data['thongtinkhachsan']['ten'] ?></a></h4>
                                <p class="fas star-<?=$data['thongtinkhachsan']['sao']?>"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4> Địa Chỉ: </h4>
                        <p><?=$data['thongtinkhachsan']['diachi']?></p>
                    </div>
                    <div class="col-sm-4">
                        <h4>Đánh Giá:</h4>
                        <p>
                            <?php 
                            if($data['tongquan']['danhgiatb']) 
                                 echo round($data['tongquan']['danhgiatb'],2)."/10";
                            else
                                echo "Chưa Tồn Tại Đánh Giá"
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <div    >
                <!-- <a href="" class="btn bg-den btn-item col-sm-3">
                    <h1 style="margin-bottom:0">
                    <?php echo $data['hoadonthanhcong']; ?>
                    </h1>
                    <span>ĐƠN ĐẾN</span>
                </a> -->
                <div class="col-md-6 col-sm-12">
                    <div class="row hoa-don">
                        <a href="index.php?controller=quan-ly/don-dat-phong&hotel=<?=$data['thongtinkhachsan']['id'];?>&type=xuly" class="btn bg-tcong btn-item col-sm-6" style="width:49%">
                            <h1 style="margin-bottom:0">
                            <?php echo $data['hoadonthanhcong']; ?> 
                            </h1>
                            <span>ĐƠN THÀNH CÔNG</span>
                        </a>
            
                        <a href="index.php?controller=quan-ly/don-dat-phong&hotel=<?=$data['thongtinkhachsan']['id'];?>" class="btn bg-chuaxn btn-item col-sm-6 pull-right" style="width:49%">
                            <h1 style="margin-bottom:0">
                                <?php echo $data['hoadonchuaxacnhan']; ?>
                            </h1>
                            <span>ĐƠN CHƯA XÁC NHẬN</span>
                        </a>
                    </div>
                    <div class="row">
                         <div class="col-md-12">
                            <div class="row box" style="min-height:250px; ">
                                <div class="box-header">Tổng Doanh Thu</div>
                                <div class="box-content">
                                    <h2 class="text-primary"> <?=number_format($data['tongdoanhthu']['TongDanhThu']);?> <sup>vnđ</sup></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                <div class="col-md-6 col-sm-12 doanh-thu">
                    <div class="box" style="min-height:380px;margin:0">
                       <div class="box-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="label label-primary" for="NgayBatDau">Ngày Bắt Đầu</label>
                                    <div class="input-group" id="datetimepicker1">
                                        <input type="text" id="NgayBatDau" class="form-control"/>
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="label label-primary" for="NgayKetThuc">Ngày Kết Thúc</label>
                                    <div class="input-group" id="datetimepicker2">
                                        <input type="text" id="NgayKetThuc" class="form-control"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                       </div>
                        <input type="hidden" id="MKs" value="<?=$data['thongtinkhachsan']['id'];?>">
                       <div class="box-content">
                           <h4>Doanh Thu Theo Thời Gian:</h4>
                            <h2 class="text-primary"  id="DoanhThu"></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
            <div class="box row" style="min-height:300px;">
                <div class="box-header">Đánh giá từ khách hàng</div>
                    <div class="box-content"  id="danhgia" style="max-height:320px">
                    <?php if($data['danhgia']):?>
                        <div id="danhgia-content">
                        <?php foreach($data['danhgia'] as $key => $value) :?>
                        <div class="gopy-line">
                            <span class='label label-primary'>Vị Trí: <?= $value['ViTri']?></span>
                            <span class='label label-primary'>Phục Vụ: <?= $value['PhucVu']?></span>
                            <span class='label label-primary'>Tiện Nghi: <?= $value['TienNghi']?></span>
                            <span class='label label-primary'>Giá Cả: <?= $value['Gia']?></span>
                            <span class='label label-primary'>Vệ Sinh: <?= $value['VeSinh']?></span>
                            <span class="pull-right" data-toggle="tooltip" title="<?=$value['email']?>"><?= $value['Ten']?></span>
                
                            <div style="margin-top:10px"> <?= $value['NhanXet']?></div>
                            <span class="help-block" style="font-size:12px"> <?=date("d-m-Y", strtotime($value['Ngay']));?></span>   
                         </div>
                        <?php endforeach; ?>
                        </div>
                        <div id="loading" class="text-center hidden"><span class="fa fa-circle-o-notch fa-spin"></span> Loading</div>
                    <?php else:?>
                        <div class="text-danger">Khách sạn chưa có đánh giá nào.</div>
                    <?php endif; ?>
                    </div>
                   
                 </div>
            </div>
</div>       
            
</div>
</body>
<script>
    var page =1;
    var stopLoad = false;
    var dangLoad = false;
    $(document).ready(function(){

        
        $("#danhgia").on("scroll",function(){ 
            var MKs = $("#MKs").val();
           if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
               if(stopLoad == true || dangLoad == true) 
                    return false;
                dangLoad = true;  // gán trạng thái đang load để vào ajax
                page++;    
                $("#loading").removeClass("hidden");
             //   $("#danhgia-content").append("<p>tan</p>");
                $.ajax({
                url:"API-admin-load-danh-gia",
                type:"post",
                dataType:"html",
                data:{
                  page:page,
                  MKs:MKs,
                },
                 success: function(t){
                    $("#danhgia-content").append(t);
                    $('[data-toggle="tooltip"]').tooltip(); 
                 },
                error: function(t){
                    console.log(t); 
                },
                })
                .always(function()
                {
                    // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
                    $("#loading").addClass('hidden');
                    dangLoad = false;
                });
            return false;
            }
         })

         //$(window).scroll(function () { alert("đang cuộn");  })
       
        $("#NgayBatDau").val('<?php echo date("d-m-Y",time() - 3600*24 )?>');
        $("#NgayKetThuc").val('<?php echo date("d-m-Y",time())?>');
         CapNhatDoanhThu();  
        function CapNhatDoanhThu() 
        { 
            var NgayBatDau = $("#NgayBatDau").val();
            var NgayKetThuc = $("#NgayKetThuc").val();
            var MKs = $("#MKs").val();
            $.ajax({
                url:"API-admin-doanh-thu",
                type:"POST",
                dataType:"html",
                data:{
                   NgayBatDau: NgayBatDau, NgayKetThuc: NgayKetThuc, MKs: MKs,
                },
                 success: function(t){
                //     // if(t.trangthai == 'loi'){
                //     //     swal(t.thongbao, "<br>", "error");
                //     //     setTimeout(function(){ location.reload();}, 1000);
                //     // }
                //     // else
                //     // {
                //     //     window.location.reload();
                //     // }
                    $("#DoanhThu").html(t);
                 },
                error: function(t){
                    console.log(t); 
                }

            });
        }   
       
// ===================================== Datetimepicker ================================================
        <?php
            $datetimepicker = array();
            $datetimepicker[0] = date("m/d/Y",time() + 3600*24);
            $datetimepicker[1] = date("m/d/Y",time() + 3600*24*2);
        ?>
        $(function () {
            $('#datetimepicker1').datetimepicker({
                defaultDate: "<?php echo $datetimepicker[0]?>",
                format: 'DD-MM-YYYY',
                //minDate
              //  startDate: 
                //useCurrent: false
            });
            $('#datetimepicker2').datetimepicker({
                defaultDate: "<?php echo $datetimepicker[1]?>",
                format: 'DD-MM-YYYY',
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker1").on("dp.change", function (e) {
                $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
                CapNhatDoanhThu();
            });
            $("#datetimepicker2").on("dp.change", function (e) {
                $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);  
                CapNhatDoanhThu();      
            });
        });

    });
     </script>
