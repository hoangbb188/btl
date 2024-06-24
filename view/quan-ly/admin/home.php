<?php //print_r($data);?>
<head>
    <style>
             .btn-item{height:120px}
            
            .doanh-thu{padding:0px;}
            @media only screen and (min-width: 992px)
                 {.doanh-thu{padding:0 0 0 15px;}

            }
            .gopy-line{
                padding: 2px 15px; 
                border:1px solid #ccc;
                border-left: 7px solid rgb(194, 187, 187);
                margin-bottom: 10px;
            }
    </style>
</head>

<div class="admin-content">
<input type="hidden" id="email" value="<?=$_SESSION['quanly']['TaiKhoan']?>">
            <div style="margin-top:30px">
                <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="hoa-don">
                        <a href="index.php?controller=quan-ly/khach-san-admin" class="btn bg-tcong btn-item col-sm-6" style="width:49%">
                            <h1 style="margin-bottom:0">
                            <?php echo $data['KhachSanDangHoatDong']; ?>
                            </h1>
                            <span>Khách Sạn Đang Hoạt Động</span>
                        </a>

                        <a href="index.php?controller=quan-ly/khach-san-admin&type=xacnhan" class="btn bg-chuaxn btn-item col-sm-6 pull-right" style="width:49%">
                            <h1 style="margin-bottom:0">
                                <?php echo $data['KhachSanChuaXacNhan']; ?>
                            </h1>
                            <span>Khách Sạn Chưa Xác Nhận</span>
                        </a>
                    </div>
                </div>
                </div>
                <div class="col-md-12">
                   <div class="row">
                   <div class="col-md-6">
                        <div class="row box" style="min-height:300px;">
                            <div class="box-header">Tổng Doanh Thu</div>
                            <div class="box-content">
                                <h2 class="text-primary"> <?=number_format($data['admin']['SoDu']);?> <sup>vnđ</sup></h2>
                            </div>
                        </div>
                     </div>
                     <div class="col-md-6 doanh-thu">
                        <div class="box" style="min-height:300px;">
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
                        <div class="box-content">
                            <h4>Doanh Thu Theo Thời Gian:</h4>
                                <h2 class="text-primary"  id="DoanhThu"></h2>
                            </div>
                        </div>
                    </div>
                </div>
                   </div>
            </div>
        <div class="col-md-12">
            <div class="box row" style="min-height:300px;">
                <div class="box-header">Góp Ý từ người dùng</div>
                    <div class="box-content" style="max-height:320px">
                        <?php foreach($data['gopY'] as $key => $value) :?>
                        <div class="gopy-line">
                            <span class="pull-right"><?= $value['contact']?></span>
                            <?php
                                switch($value['rate']){
                                    case 0:
                                        echo "<span class='label label-danger'>Rất Không Hài Lòng</span>";
                                        break;
                                    case 1:
                                        echo "<span class='label label-warning'>Không Hài Lòng</span>";
                                        break;
                                    case 2:
                                        echo "<span class='label label-info'>Bình Thường</span>";
                                        break;
                                    case 3:
                                        echo "<span class='label label-primary'>Hài Lòng</span>";
                                        break;
                                    default:
                                        echo "<span class='label label-success'>Rất Hài Lòng</span>";
                                }
                            ?>
                        
                        <div style="margin-top:10px"> <?= $value['binhluan']?></div>
                        <span class="help-block" style="font-size:12px"> <?=date("H:i:s d-m-Y", strtotime($value['ThoiGian']));?></span>   
                    </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>            
    </div>
</body>
<script>
    $(document).ready(function(){

        $("#NgayBatDau").val('<?php echo date("d-m-Y",time() - 3600*24 )?>');
        $("#NgayKetThuc").val('<?php echo date("d-m-Y",time())?>');
         CapNhatDoanhThu();
        function CapNhatDoanhThu()
        {
            var NgayBatDau = $("#NgayBatDau").val();
            var NgayKetThuc = $("#NgayKetThuc").val();
            var email = $("#email").val();
            $.ajax({
                url:"API-admin-doanh-thu",
                type:"POST",
                dataType:"html",
                data:{
                   NgayBatDau: NgayBatDau, NgayKetThuc: NgayKetThuc, email:email,
                },
                 success: function(t){
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
            $datetimepicker[0] = date("m/d/Y", time() + 3600 * 24);
            $datetimepicker[1] = date("m/d/Y", time() + 3600 * 24 * 2);
        ?>
        
        $(function () {
            $('#datetimepicker1').datetimepicker({
                defaultDate: "<?php echo $datetimepicker[0] ?>",
                format: 'DD-MM-YYYY',
                //minDate
              //  startDate:
                //useCurrent: false
            });
            $('#datetimepicker2').datetimepicker({
                defaultDate: "<?php echo $datetimepicker[1] ?>",
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
