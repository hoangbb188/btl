<?php
  // print_r($data);
   if(isset($_SESSION['xoa']) && $_SESSION['xoa']==true) 
   {
       echo '<script>swal("Xóa Thành Công", "<br>");</script>';
       unset($_SESSION['xoa']); 
   }
   if(isset($_SESSION['sua']) && $_SESSION['sua']==true) 
   {
       echo '<script>swal("Sửa Mã Giảm Giá Thành Công", "<br>","success");</script>';
       unset($_SESSION['sua']); 
   }
   if(isset($_SESSION['them']) && $_SESSION['them']==true) 
   {
       echo '<script>swal("Thêm Mã Giảm Giá Thành Công", "<br>","success");</script>';
       unset($_SESSION['them']); 
   }
?>
<div class="admin-header">
        <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Mã Giảm Giá</h3>
            <p class="help-block">Tổng Cộng:  <?=$data['phantrang']['tongSoHang']?></p>
        </div>
        <div class="col-md-3">
            <button  data-toggle="modal" data-target="#mgg" class="btn btn-primary" id="them">Thêm Mã Giảm Giá</button>
        </div>
</div>

</div>
<div class="admin-content">
    <div class="box" style="min-height:200px;">
        <div class="box-content" style="padding:50px 50px;">
        <div id="MKs" style="display:none"><?=isset($data['thongtinkhachsan']) ?$data['thongtinkhachsan']['id']:"0"?></div>
            <?php   if($data['mgg']):?>
        <table class="table table-responsive table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Giảm Giá</th>
                        <th>Ngày Bắt Đầu</th>
                        <th>Ngày Hết Hạn</th>
                        <th>Giảm (%)</th>
                        <th>Số Lượng</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $i = ($data['phantrang']['pageHienTai'] -1 )*$this->soHangTrenPage +1;
                    foreach ($data['mgg'] as $key => $value):  
                    ?>
                    <tr>
                        <td id="IdMgg" style="display:none"><?=$value['IdMgg'];?></td>
                        <td><?=$i++;?></td>
                        <td id="Ma"><?=$value['Ma'];?></td>
                        <td id="NgayBatDau"><?=date("d-m-Y", strtotime($value['NgayBatDau']));?></td>
                        <td id="NgayHetHan"><?=date("d-m-Y", strtotime($value['NgayHetHan']))?></td> 
                        <td id="Giam"><?=$value['Giam'];?></td>
                        <td id="SL"><?=$value['SL'];?></td>
                        <td class="col-sm-2">
                            <button  data-toggle="modal" data-target="#mgg" class="sua btn btn-success col-md-5 col-xs-12 col-sm-8">Sửa</button>
                            <button class="btn btn-danger col-md-offset-2 col-md-5 col-sm-8 col-xs-12 xoa" data-toggle="modal" data-target="#myModal">xóa</a>
                        </td>
                    </tr>   
                    <?php endforeach; else:?>
                        <p class="text-danger"> * Bạn Chưa có Mã Giảm giá Nào. Vui Lòng Ấn Thêm mã Giảm Giá để thêm</p>
                    <?php endif; ?>
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
            <div class="modal fade" id="mgg" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sửa Mã Giảm Giá</h4>
                    </div>
                    <div class="modal-body" style="padding: 25px;">
                        <div id="Loi"></div>
                        <input type="hidden" id="act" value="">
                        <input type="hidden" id="M_IdMgg" value="">
                        <form action="">
                        <div class="form-group">
                            <label for="M_Ma">Mã Giảm Giá:</label>
                            <input type="text" class="form-control" id="M_Ma" placeholder="Nhập Mã Giảm Giá">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="M_NgayBatDau">Ngày Bắt Đầu</label>
                                <div class="input-group" id="datetimepicker1">
                                    <input type="text" id="M_NgayBatDau" class="form-control"/>
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <label for="M_NgayHetHan">Ngày Hết Hạn</label>
                                <div class="input-group" id="datetimepicker2">
                                    <input type="text" id="M_NgayHetHan" class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="M_Giam">Giảm (%)</label>
                                <input type="number" id="M_Giam" min=1 value=1 class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label for="M_SL">Số Lượng</label>
                                <input type="number" id="M_SL" min=1 value=1 class="form-control"/>
                            </div>
                        </div>
                        </form>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default col-md-5" data-dismiss="modal">Hủy</button>
                        <a type="button" id="Luu" class="btn btn-primary col-md-5 pull-right">Lưu</a>  
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
        $(document).ready(function(){
            var error ='<div class="alert alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>';
            $("#Luu").click(function(){
                var Ma = $("#M_Ma").val().trim(), SL = $("#M_SL").val(),  Giam = $("#M_Giam").val();
                var NgayBatDau = $("#M_NgayBatDau").val(),      NgayHetHan = $("#M_NgayHetHan").val();
                var act = $("#act").val(),   IdMgg = $("#M_IdMgg").val(),     MKs = $("#MKs").html();
                if(Ma==''){
                    $("#Loi").html(error + 'Mã Giảm Giá không được để trống' +'</div>');
                    return $("#M_Ma").focus(); 
                }
                else if(Ma.length<6){
                    $("#Loi").html(error + 'Mã Giảm Giá tối thiểu 6 kí tự' +'</div>');
                    $("#M_Ma").val("");
                    return $("#M_Ma").focus(); 
                }
                else if(Ma.length>50){
                    $("#Loi").html(error + 'Mã Giảm Giá tối đa 50 kí tự' +'</div>');
                    $("#M_Ma").val("");
                    return $("#M_Ma").focus(); 
                }
                $.ajax({
                    url: "API-admin-cap-nhat-mgg",
                    data: {
                        Ma: Ma, SL: SL, Giam: Giam,
                        NgayBatDau: NgayBatDau, NgayHetHan: NgayHetHan,
                        act: act, IdMgg, MKs:MKs
                    },
                    dataType: 'json',
                    type: "POST",
                    success: function (data) {
                        if(data.trangthai=='loi'){
                            swal(data.thongbao, "<br>", "error");
                            setTimeout(function(){ location.reload();}, 2000);
                          }
                        else{
                            window.location.reload();
                        }
                    },
                    error: function (data) {
                            console.log(data);
                    
                    }
                })
            })
           
             //=================================== Them 1 MÃ Giảm Giá=======================================
            $("#them").click(function(){
                $("#Loi").html("");     $("#M_IdMgg").val('');
                $("#M_Ma").val("");      $("#M_SL").val(1);    $("#M_Giam").val(1);  
                $("#M_NgayBatDau").val('<?php echo date("d-m-Y",time() + 3600*24)?>');
                $("#M_NgayHetHan").val('<?php echo date("d-m-Y",time() + 3600*24*2)?>'); 
                $(".modal-title").html("Thêm Mã Giảm Giá");
                $("#act").val("them");
                })
            //=================================== Sửa 1 MÃ Giảm Giá=======================================
            $(".sua").click(function(){
                $("#Loi").html("");
                var M_IdMgg = $(this).parent().siblings("#IdMgg").html();
                var M_Ma = $(this).parent().siblings("#Ma").html();
                var M_SL = $(this).parent().siblings("#SL").html();
                var M_Giam = $(this).parent().siblings("#Giam").html();
                var M_NgayBatDau = $(this).parent().siblings("#NgayBatDau").html();
                var M_NgayHetHan = $(this).parent().siblings("#NgayHetHan").html();
                $("#M_IdMgg").val(M_IdMgg);
                $("#M_NgayBatDau").val(M_NgayBatDau);
                $("#M_NgayHetHan").val(M_NgayHetHan); 
                $("#M_Ma").val(M_Ma);
                $("#M_SL").val(M_SL);
                $("#M_Giam").val(M_Giam);  
                $(".modal-title").html("Sửa Mã Giảm Giá "+ M_Ma);
                $("#act").val("sua");
            })
 
            //=================================== Xóa 1 MÃ Giảm Giá=======================================
             $(".xoa").click(function(){
                var Ma = $(this).parent().siblings("#Ma").html();
                $(".modal-title").html("Bạn muốn xóa mã "+ Ma);
                $(".modal-body a").click(function(){
                    XoaMgg(Ma);
                })
             })
     
             function XoaMgg(Ma){
                 $.ajax({
                     url:"API-admin-xoa-mgg",
                     type:"POST",
                     dataType:"json",
                     data:{
                         Ma: Ma,
                     },
                     success: function(t){
                         if(t.trangthai == 'loi'){
                             swal(t.thongbao, "<br>", "error");
                             setTimeout(function(){ location.reload();}, 1000);
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
            });
            $("#datetimepicker2").on("dp.change", function (e) {
                $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
            });
        });
     </script>
