<form method="POST" enctype="multipart/form-data" id="myForm">
    <input type="hidden" name="MKs" id="MKs" value="<?=$_GET['hotel'];?>">
    <div class="admin-header">
        <div class="row">
            <div class="col-md-9 admin-header-left">
                <h3>Thông tin khách sạn</h3>
            </div>
            <div class="col-md-3">
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
            <div class="box-content">
                <div class="row">
                    <div class="col-md-7">
                        <div class="col-md-12">
                            <div class="form-group">
                                <p>Tên khách sạn: </p>
                                <input class="form-control" id="TenKs" name="TenKs" value="<?=$data['thongtinkhachsan']['ten']?>"
                                    placeholder="Tên khách sạn">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="box-content-line">
                                <p>Địa chỉ: </p>
                                <input class="form-control" name="DiaChi" id="DiaChi" value="<?=$data['thongtinkhachsan']['dc']?>"
                                    placeholder="Địa chỉ">
                            </div>
                            <div class="form-group">
                                <p>Loại Hình: </p>
                                <select name="Loai" id="Loai" class="form-control">
                                    <option value="0">Nhà Nghỉ</option>
                                    <option value="1">Khách Sạn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <p>Tỉnh/TP: </p>
                                 
                                <select name="TP" id="TP" class="form-control" id="">
                                    <?php
                                    $selected="";
                                    foreach($data['danhsachtinh'] as $key=> $value){
                                        if($data['thongtinkhachsan']['matp']==$value['matp'])
                                        {
                                            $selected="selected";
                                        }
                                        echo "<option value='".$value['matp']."'".$selected.">".$value['name']."</option>";
                                        $selected="";
                                    } 
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Quận/Huyện: </p>
                                <p class="help-block" id="Maqh" style="display:none">
                                    <?=$data['thongtinkhachsan']['maqh']?>
                                </p>
                                <select class="form-control" name="Huyen" id="Huyen">

                                </select>
                            </div>
                        </div>
                        
                    </div> 
                    <div class="col-md-5"  style="padding-left:0px;">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-5"  style="padding-left:0px">
                            <div class="form-group">
                                <p>Hạng Sao: </p>
                                <select name="sao" id="sao" class="form-control">
                                    <?php
                                    $selected="";
                                    for($i=1;$i<=5;$i++){
                                        if($i==$data['thongtinkhachsan']['sao']){
                                            $selected="selected";
                                        }
                                        echo "<option value='".$i."'".$selected.">".$i." Sao</option>";
                                        $selected="";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Phong Cách: </p>
                                <select name="PhongCach" id="PhongCach" class="form-control">
                                    <?php
                                    $selected="";
                                    for($i=1;$i<=2;$i++){
                                        if($i==$data['thongtinkhachsan']['PhongCach']){
                                            $selected="selected";
                                        }
                                        if($i==1){
                                            $name="Hiện Đại";
                                        }
                                        else{
                                            $name="Cổ Điển";
                                        }
                                        echo "<option value='".$i."'".$selected.">".$name."</option>";
                                        $selected="";
                                    }
                                ?>
                                </select>
                            </div>

                            <div class="box-content-line">
                                <p>Trạng Thái: </p>
                                <p class="help-block">
                                    <?php 
                                    if($data['thongtinkhachsan']['TrangThai']==0)
                                        echo "Chưa xác nhận";
                                    else {
                                        echo "Đang hoạt động";
                                    }
                                ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-7" style="padding:0">
                            <div class="box-content-line"  >
                                <p class="text-center">Ảnh đại diện cho khách sạn: </p>
                                <img id="avt" src="<?=$data['thongtinkhachsan']['Avatar']!=""? $data['thongtinkhachsan']['Avatar']:"assets/img/avt-default.webp" ?>" class="img-thumbnail" alt="Avatar-ks">
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
                        </div>
                    </div>
                </div>
                
                <div id="Loi">
                </div>
                <div class="alert alert-danger"  role="alert" style="display:none;"></div>


            </div>
        </div>
        <!-- <div class="box">
        <div class="box-header">
            Mô Tả Khách Sạn
        </div>
        <div class="box-content" style="min-height:200px">
            <?=$data['thongtinkhachsan']['Mota']?>
        </div>
    </div> -->
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">Mô Tả Khách Sạn</div>
                    <div class="box-content">
                        <!-- <?=$data['thongtinkhachsan']['Mota']?> -->
                        <textarea name="Mota" id="Mota" placeholder="Mô tả khách sạn" class="ckeditor"
                            style="height:250px;resize:vertical;"><?=$data['thongtinkhachsan']['Mota']?></textarea>
                    </div>
                </div>
            </div>
  
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">Giới Thiệu</div>
                    <div class="box-content">
                        <textarea name="GioiThieu" id="GioiThieu" placeholder="Giới thiệu khách sạn" class="ckeditor"
                            style="height:250px;resize:vertical;"><?=$data['thongtinkhachsan']['GioiThieu']?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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

     

// ================== Load Quận Huyện theo Tỉnh/ TP ========================
        var matp = $("#TP").val();
     //   console.log(matp);
        LoadHuyen(matp);
        $("#TP").change(function () {
            LoadHuyen($(this).val());
        })
        var mqh = $("#Maqh").html();
        function LoadHuyen(matp) {
            $.ajax({
                url: "API-DVHC",
                data: {
                    t: matp
                },
                dataType: 'json',
                type: "POST",
                success: function (data) {
                    //console.log(data);
                    var str = "";
                    var selected = "";
                    for (i = 0; i < data.length; i++) {
                        if (data[i]['maqh'] == mqh) {
                            selected = " selected";
                        }
                        str += '<option value="' + data[i]['maqh'] + '"' + selected + '>' + data[i]['name'] + '</option>';
                        selected = "";
                    }
                    $("#Huyen").html(str);
                },
                error: function (data) {
                    console.log(data);
                }
            })
        }


    //     // ===================Submit update ================================
    //     var error ='<div class="alert alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>';
    //     $("#submit").click(function(){
    //         var TenKs = $("#TenKs").val().trim() ,DiaChi = $("#DiaChi").val().trim(), Loai = $("#Loai").val();
    //         var TP = $("#TP").val(), Huyen  = $("#Huyen").val() ,sao  = $("#sao").val();
    //         var PhongCach  = $("#PhongCach ").val(), Mota  = CKEDITOR.instances.Mota.getData(), GioiThieu  = CKEDITOR.instances.GioiThieu.getData();
    //         var  MKs = $("#hotel").val();
            
    //         // var file_data = $('#file').prop('files')[0];
    //         // var form_data = new FormData();
	// 		// form_data.append('file', file_data);
        
    //         if(TenKs==''){
    //             $("#Loi").html(error + 'Tên Khách Sạn không được để trống' +'</div>');
    //             event.preventDefault();
    //             return $("#TenKs").focus();
    //         }
    //         else if(DiaChi=='')
    //         {
    //             $("#Loi").html(error + 'Địa Chỉ không được để trống' +'</div>');
    //             event.preventDefault();
    //             return $("#DiaChi").focus();
    //         }
    //         $.ajax({
    //             url: "API-admin-sua-ks",
    //             data: {
    //                 MKs: MKs, TenKs: TenKs, DiaChi: DiaChi, Loai: Loai, TP:TP, Huyen: Huyen,
    //                 sao: sao, PhongCach: PhongCach, Mota: Mota, GioiThieu: GioiThieu,
    //             },
    //             dataType: 'json',
    //             type: "POST",
    //             success: function (data) {
    //                 if(data.trangthai=='loi'){
    //                     swal(data.thongbao, "<br>", "error");
    //                     setTimeout(function(){ location.reload();}, 2000);
    //                 }
    //                 else{
    //                    window.location.href="index.php?controller=quan-ly/thong-tin-khach-san&hotel="+ MKs;
    //                 }
    //             },
    //             error: function (data) {
    //                     console.log(data);
                
    //             }
    //         })
    //     })

    // })


      // ===================Submit update ================================
     
        $("#myForm").on('submit', function(e){
            var TenKs = $("#TenKs").val().trim() ,DiaChi = $("#DiaChi").val().trim();
            var  MKs = $("#MKs").val();
            $("#Mota").val(CKEDITOR.instances.Mota.getData());
            $("#GioiThieu").val( CKEDITOR.instances.GioiThieu.getData());
            e.preventDefault();
            
        
            if(TenKs==''){
                $("#Loi").html(error + 'Tên Khách Sạn không được để trống' +'</div>');
                event.preventDefault();
                return $("#TenKs").focus();
            }
            else if(DiaChi=='')
            {
                $("#Loi").html(error + 'Địa Chỉ không được để trống' +'</div>');
                event.preventDefault();
                return $("#DiaChi").focus();
            }
            $.ajax({
               
                url: "API-admin-sua-ks",
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
                       window.location.href="index.php?controller=quan-ly/thong-tin-khach-san&hotel="+ MKs;
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
</body>