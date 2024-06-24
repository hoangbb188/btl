<?php //print_r($data) ?>
<head>
    <style>
        th,td{padding:6px !important; text-align: center}
        th{width:40%;background-color: #f1f6fa;color: #8b99a7;}
        input[type=checkbox]{display: none} 
        label{min-width:270px;padding:5px;margin:40px 15px;}
        input[type=checkbox]:checked  + label{
            background: #4194dd;
            color:white;
        }
    </style>
</head>
<form method="POST" enctype="multipart/form-data" id="myForm">

<input type="hidden" name="MP" id="MP" value="<?=$data['phong']['MP'];?>">
<input type="hidden" name="MKs" id="MKs" value="<?=$data['thongtinkhachsan']['id'];?>">

<div class="admin-header">
    <div class="row">
        <div class="col-md-9 admin-header-left">
            <div class="box-content-line" style="font-size:16px;">
                <a style="cursor: pointer;" onclick="window.history.back();">
                     <span class="glyphicon glyphicon-chevron-left"></span> Trở Lại
                </a>
            </div>
            <h3>Sửa Chi Tiết Phòng - Phòng <?=$data['phong']['LoaiP']?></h3>
        </div>
        <div class="col-md-3">
            <!-- <a id="submit" class="btn btn-primary" href='index.php?controller=quan-ly/phong&hotel=<?php echo $data['thongtinkhachsan']['id']."&phong=".$data['phong']['MP']?>'>
                Lưu Thay Đổi
            </a> -->
            <!-- <div class="btn btn-primary" id="submit">Lưu Thay Đổi</div> -->
            <input type="submit" class="btn btn-primary" id="submit" value="Lưu Thay Đổi">
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
                    <h4 class="text-center">Ảnh Đại Diện</h4>
                    <img id="avt" src="<?=$data['phong']['Avatar']!=""? $data['phong']['Avatar']:"assets/img/avt-default.webp"?>" style="margin:0 0 15px 15px;" class="img-thumbnail" alt="Avatar-ks">
                    <div class="form-group">
                        <button type="button" class="btn btn-link center-block text-center" data-toggle="modal" data-target="#myModal">Upload Avatar</button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">  
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center"><div class="fa fa-image center-block text-primary" style="font-size:50px;margin:20px;"></div> UpLoad Ảnh Đại Diện</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="loiFile"> </div>
                                    <input type="file" style="display:none" name="file"  id="file" class="form-control">
                                    <label for="file" class="center-block" style="padding:50px 50px 25px 50px">
                                        <div style="width:50%" class="center-block btn btn-primary btn-lg text-center">Chọn ảnh từ máy</div>
                                    </label>
                                    <span id="filename" class="help-block text-center "></span>
                                    <p class="text-danger">Gợi Ý: Ảnh nên đạt kích thước 1000x600, có độ phân giải cao để đạt hiệu quả nhất</p>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-6"><button id="huy" type="button" class="btn text-danger btn-lg center-block" data-dismiss="modal">Hủy</button></div>
                                    <div class="col-md-6"><button type="button" class="btn btn-primary btn-lg center-block" data-dismiss="modal">Chọn</button></div>
                                </div>
                            </div>   
                            </div>
                        </div>
                    </div>
                </div>
    
       
                <div class="col-md-8">
                    <h4>Thông Tin Phòng</h4>
                    <div id="Loi"></div>
                    <table class="table table-bordered  table-responsive">
                        <tr class="form-group">
                            <th>Loại</th>
                            <td>
                                <input name="LoaiP" id="LoaiP" type="text" class="form-control" value='<?=$data['phong']['LoaiP']?>' placeholder="Tên Loại Khách Sạn">
                            </td>
                        </tr>
                        <tr>
                            <th>Số Lượng</th>
                            <td><input type="number" name="SoLuong" id="SoLuong" class="form-control" min=1  value='<?=$data['phong']['SoLuong']?>'></td>
                        </tr>
                        <tr>
                            <th>Diện Tích (m<sup>2</sup>)</th>
                            <td><input type="number" name="Dientich" id="Dientich"  class="form-control" min=1  value='<?=$data['phong']['Dientich']?>'></td>
                        </tr>
                        <tr>
                            <th>Giá (vnđ)</th>
                            <td><input type="number" name="Gia" id="Gia" step="1000"  class="form-control" min=1000  value='<?=$data['phong']['Gia']?>'></td>
                        </tr>
                        <tr>
                            <th>Số Người Tối Đa</th>
                            <td><input type="number" name="SoNguoi" id="SoNguoi"  class="form-control" min=1  value='<?=$data['phong']['SoNguoi']?>'></td>
                        </tr>
                    </table>
                   
                </div>
            </div>
       
            
            <div class="col-md-12" style="margin:15px 0;">
                    <h4>Hướng Phòng</h4>
                <div>
                    <?php 
                    $checked="";
                    for($i=0;$i<=3;$i++){
                        if($i==$data['phong']['View']){
                            $checked = "checked";
                        }
                        echo "<label style='min-width:20%;margin:0' class='radio-inline'><input type='radio' value='$i'name='View' id='View' ".$checked."> ".huong_nhin($i)."</label>";
                        $checked ="";
                    }
                ?>
             </div>
            </div>
            <div class="col-md-12" style="margin:15px 0;">
            <h4>Tiện Nghi Phòng</h4>
            <?php foreach($data['TongTienIch'] as $value):?>
                <input id="<?=$value['id']?>" class="form-control" value="<?=$value['id']?>" name="TienIch[]" type="checkbox" <?= in_array($value['id'],$data['phong']['TienIch']) ? "checked":"" ?>> 
                <label class="btn btn-default btn-lg" for="<?=$value['id']?>"> 
           <?php  echo "<span class='".$value['icon']."'></span> ".$value['tentn']; ?> 
          </label>
          <?php endforeach; ?>
            </div>
        </div>
    </div>
</form>

</div>
</body>
<script>
    $(document).ready(function (){

        var error ='<div class="alert alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>';
        var avt = $("#avt");
        $("#huy").click(function(){
            $("#file").val(undefined); 
            $("#filename").html("");
            $("#avt").replaceWith(avt);
        })
        $("#file").change(function(){
            
            $("#loiFile").html("");
            var file = this.files[0];
            
            $("#filename").html(file.name);
            
            $type =["image/jpeg","image/png","image/jpg","image/webp"];
            //console.log(file);

           if($.inArray(file.type,$type)==-1){
                $("#loiFile").html(error + 'Chúng tôi chỉ hỗ trợ file ảnh jpeg, png, jpg hoặc webp' +'</div>');
                $("#avt").replaceWith(avt);
               return $("#file").val(undefined); 
           }
           else if(file.size>5242880){
                $("#loiFile").html(error + 'Ảnh tối đa 5MB' +'</div>');
                $("#avt").replaceWith(avt);
                return $("#file").val(undefined); 
           }

           var img = new Image();
           
           img.onload = function() {
                console.log(this.width+" "+this.height);    
               if(this.width<480){
                    $("#loiFile").html(error + 'Chiều rộng ảnh tối thiểu 480px' +'</div>');
                    $("#avt").replaceWith(avt);
                    return $("#file").val(undefined); 
               }
               else if(this.height<360){
                    $("#loiFile").html(error + 'Chiều cao ảnh tối thiểu 360px' +'</div>');
                    $("#avt").replaceWith(avt);
                    return $("#file").val(undefined); 
               }
               else if(this.width<this.height){
                    $("#loiFile").html(error + 'Chiều rộng ảnh phải dài hơn chiều cao ảnh' +'</div>');
                    $("#avt").replaceWith(avt);
                    return $("#file").val(undefined); 
               }     
           };
           img.src = window.URL.createObjectURL(file);
           $(img).attr("class","avt");
           $("#avt").replaceWith($(img).clone(true));
           $(".avt").attr({"id":"avt", "class": "img-thumbnail"});

        })


        $("#myForm").on('submit', function(e){
            var LoaiP = $("#LoaiP").val().trim();
            var  MKs= $("#MKs").val(), MP = $("#MP").val();

            e.preventDefault();
           
            if(LoaiP==''){
                $("#Loi").html(error + 'Tên Loại Phòng không được để trống' +'</div>');
                event.preventDefault();
                return $("#LoaiP").focus();
            }
          
            $.ajax({
                url: "API-admin-sua-phong",
                dataType: 'json', 
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData(this),
                type: 'post',
                success: function (data) {
                    if(data.capnhat.trangthai=='loi'){
                        swal(data.capnhat.thongbao, "<br>", "error");
                        //setTimeout(function(){ location.reload();}, 2000);
                    }
                    else if(data.upfile.trangthai=='loi'){
                        swal(data.upfile.thongbao, "<br>", "error");
                        //setTimeout(function(){ location.reload();}, 2000);
                    }
                    else{
                        window.location.href="index.php?controller=quan-ly/phong&hotel="+ MKs +"&phong="+MP;
                    }
                   // console.log(data);
                },
                error: function (data) {
                        console.log(data);
                
                }
            })
            
           
        })
    })
</script>