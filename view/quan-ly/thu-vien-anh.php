<?php
//print_r($data);
?>
<div class="admin-header">
    <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Thư Viện Ảnh</h3>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#ThemAnh">Thêm ảnh mới</button>
        </div>
    </div>
</div>

<div class="admin-content">
    <div class="box" style="min-height:200px;">
        <div class="box-content">
            <div class="col-md-12 col-xs-12">
                <div class="text-right">
                    <button class="btn btn-primary btn-md" id="buttonXoaTuyChon">Xóa tùy chọn</button>
                </div>
            <div class="table-responsive">
                <table class="table table-hover">
                        <thead>
                                <tr>
                                <th id="thChon" style="display:none;">Chọn</th>
                                  <th class="text-center">STT</th>
                                  <th>Tên Ảnh</th>
                                  <th class="text-center">Hình ảnh</th>
                                  <th class="text-center">Loại</th>
                                  <th class="text-center">Phòng</th>
                                  <th class="text-center">Thao tác</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php 
                                  $i = ($data['PhanTrang']['pageHienTai']-1)*$this->soHangTrenPage +1;
                                  if(!empty($data['thuvienanh'])):
                                  foreach($data['thuvienanh'] as $gt): 
                                  $MP = ''; 
                                  if($gt['Loai'] == 1)
                                  { 
                                        $loai = "Ảnh chung"; 
                                    } else{ 
                                        $loai = "Ảnh phòng"; 
                                    }
                                  ?>
                                  <tr>
                                    <td class="text-center chon" style="display:none;"><input type="checkbox" name="chon[]" value="<?php echo $gt['id'];?>"></td>
                                  <td class="col-md-1 text-center"><?php echo $i;?></td>
                                  <td class="col-md-2"><?php echo $gt['TenAnh'];?></td>
                                  <td class="col-md-4"><img id="avt" class="img-thumbnail" src="<?php echo $gt['UrlAnh'];?>"/></td>
                                  <td class="col-md-1"><span class="label label-primary"><?php echo $loai;?></span></td>
                                  <td class="col-md-2 text-center"><span class="label label-warning"><?php echo $gt['LoaiP'];?></span></td>
                                  <td class="col-md-1 text-center"><a class="btn btn-danger btn-sm" onclick="XoaAnh([<?php echo $gt['id'];?>]);">Xóa</a></td>
                                  </tr>
                                  <?php $i++; endforeach; endif;?>
                </table>

            </div>
                </div>
            <div class="col-md-12 col-xs-12 text-center">
                    <?=$data['PhanTrang']['html'];?>
                </div>

        </div>
    </div>
</div>

<div id="ThemAnh" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:80%;height:80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-uppercase">UPLOAD ẢNH</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="form1" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" value="<?=$_GET['hotel'];?>" name="MKs" id="Mks" />;
                            <label class="radio-inline">
                                <input type="radio" name="Loai" value="1" checked>Ảnh chung</label>
                            <label class="radio-inline">
                                <input type="radio" name="Loai" value="2">Ảnh phòng</label>
                            <div id="selectphong"></div>
                            <div id="loiFile"> </div>
                            <input type="file" style="display:none" name="file[]" id="file" class="form-control" multiple>
                            <label for="file" class="center-block" style="padding:50px 50px 25px 50px">
                                <div style="width:50%" class="center-block btn btn-primary btn-lg text-center">Chọn ảnh từ máy</div>
                            </label>
                            <span id="filename" class="help-block text-center "></span>
                            <p class="text-danger">Gợi Ý: Ảnh nên đạt kích thước 1000x600, có độ phân giải cao để đạt hiệu quả nhất</p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="uploadz" type="submit" name="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        var error ='<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>';
        $("input[name=Loai]").change(function() {
            var type = $("input[name=Loai]:checked").val();
            //console.log(type);
            if (type == '2') {
                var text = '';
                text += '<br><strong>Chọn phòng cần thêm ảnh</strong>';
                text += '<select name="MP" id="room" class="form-control">';
                text += '</select>';
                $("#selectphong").html(text).show();
                LoadRoom( <?= $_GET['hotel']; ?> );
            } else {
                $("#selectphong").hide();
            }
        });

        var avt = $("#avt");
        $("#huy").click(function() {
            $("#file").val(undefined);
            $("#filename").html("");
            $("#avt").replaceWith(avt);
        })
        /**
        $("#file").change(function() {
            var files = this.files;
            $("#loiFile").html("");
            //$("#filename").html("");
           
            for (var i = 0; i < files.length; i++) {
                file = files[i];

                $type = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
                //console.log(file);

                if ($.inArray(file.type, $type) == -1) {
                    $("#loiFile").html(error + 'Chúng tôi chỉ hỗ trợ file ảnh jpeg, png, jpg hoặc webp' + '</div>');
                    $("#avt").replaceWith(avt);
                    return $("#file").val(undefined);
                } else if (file.size > 5242880) {
                    $("#loiFile").html(error + 'Ảnh tối đa 5MB' + '</div>');
                    $("#avt").replaceWith(avt);
                    return $("#file").val(undefined);
                }
                var img = new Image();
                img.onload = function() {
                    console.log(this.width + " " + this.height);
                    if (this.width < 480) {
                        $("#loiFile").html(error + 'Chiều rộng ảnh tối thiểu 480px' + '</div>');
                        $("#avt").replaceWith(avt);
                        return $("#file").val(undefined);
                    } else if (this.height < 360) {
                        $("#loiFile").html(error + 'Chiều cao ảnh tối thiểu 360px' + '</div>');
                        $("#avt").replaceWith(avt);
                        return $("#file").val(undefined);
                    } else if (this.width < this.height) {
                        $("#loiFile").html(error + 'Chiều rộng ảnh phải dài hơn chiều cao ảnh' + '</div>');
                        $("#avt").replaceWith(avt);
                        return $("#file").val(undefined);
                    }

                };
                $("#filename").append(file.name + '<br>');
                img.src = window.URL.createObjectURL(file);
            }
            

            /**
             $(img).attr("class","avt");
            $("#avt").replaceWith($(img).clone(true));
            $(".avt").attr({"id":"avt", "class": "img-thumbnail"});
            

                 
        });
        
        **/
        $("#form1").on('submit',function(e){
                //alert("cc");
                $("#uploadz").attr("disabled",true);
                e.preventDefault();

                $.ajax({
                    url: "API-admin-upload-anh",
                    dataType: 'json', 
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    type: 'post',	
                    success: function(t){

                        var status = (t.success == 0) ? "error" : "success";
                        if(t.success == 0){
                            swal("Xóa thất bại","",status);
                        }else{
                            swal(t.thongbao,"",status);
                            setTimeout(function(){ location.reload();}, 1500);
                        }
                        $("#file").val(undefined);
                        $("#uploadz").removeAttr("disabled");              
                    },
                    error: function(t){
                        console.log(t);
                    }
                });
            });
        
        function LoadRoom(id) {
            $.ajax({
                url: "API-admin-danh-sach-phong",
                type: "POST",
                dataType: "json",
                data: {
                    MKs: id
                },
                success: function(t) {
                    
                    var text = '';
                    t.forEach(function(item) {
                        text += '<option value="' + item.MP + '">' + item.LoaiP + '</option>';
                    })
                    $("#room").html(text);
                },
                error: function() {
                    console.log();
                }
            })
        }

        

        
    });

    $("#buttonXoaTuyChon").on("click",function(){
        $("#buttonXoaTuyChon").removeClass("btn-primary").addClass("btn-danger");
        $("#buttonXoaTuyChon").off("click");
        $("#buttonXoaTuyChon").html("Xóa các ảnh đã chọn").attr("id","XoaTuyChon");
        $("#thChon").show();
        $(".chon").show();
        
        $("#XoaTuyChon").on("click",function(){
            //alert("cc");
            var ListIdImage = [];
            $("input[name='chon[]']:checked").each(function(){
                ListIdImage.push(parseInt( $(this).val() ));
            });
            XoaAnh(ListIdImage);

            
        });
        
    });

    

    function XoaAnh(ListIdImage){
        console.log(ListIdImage);
        if(ListIdImage.length == 0){
            swal("Chưa chọn ảnh để xóa","","error");
            return false;
        }
        if(confirm("bạn có chắc là sẽ xóa ảnh này chứ?") == false){
            return false;
            //this.preventDefault();
        }
        $("#XoaTuyChon").attr("disabled",true);
            $.ajax({
                url: "API-admin-xoa-anh",
                type: "POST",
                dataType: "json",
                data: {
                    ListIdImage: ListIdImage
                },
                success: function(t) {
                    var text;
                    if(t.success == 0) text = "Thất bại ";
                    else text = "Thành công ";
                    var status = (t.success == 0) ? "error" : "success";
                    if(t.success == 0){
                        swal("Xóa thất bại","",status);
                        
                    }else{
                        swal("Xóa thành công " + t.success + " ảnh","",status);
                        setTimeout(function(){ location.reload();}, 1000);
                    }
                },
                error: function() {
                    console.log();
                }
            })
        }
</script>