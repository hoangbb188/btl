<?php //print_r($data) ?>
<head><style>input[type=checkbox]{display: none} input[type=checkbox]:checked  + label{background: #4194dd;color:white;}</style></head>
<div class="admin-content">
    <div class="box row">
        <div class="box-header">
            Thông tin chung:    
        </div>
        <div class="box-content"  style="overflow:hidden;padding:25px;">
            <div class="row">
                
                <form class="form-horizontal" action="">
                <div class="form-group">
                    <div id="Loi" class="col-sm-8 col-sm-offset-2"></div>
                </div>
                <input type="hidden" name="MKs" id="MKs" value=<?=$data['thongtinkhachsan']['id'];?>>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="LoaiP">Tên Loại Phòng:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="LoaiP" id="LoaiP" placeholder="Nhập Tên Loại Phòng">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="SoLuong">Số Lượng:</label>
                    <div class="col-sm-3">
                        <input type="number" value="1" min=1 class="form-control " name="SoLuong" id="SoLuong">
                    </div>
                    <label class="control-label col-sm-2" for="Dientich">Diện Tích (m<sup>2</sup>):</label>
                    <div class="col-sm-3">
                        <input type="number" value="1" min=1 class="form-control " name="Dientich" id="Dientich">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Gia">Giá (vnđ):</label>
                    <div class="col-sm-3">
                        <input type="number" value="1000" min=1000 step="1000" class="form-control " name="Gia" id="Gia">
                    </div>
                    <label class="control-label col-sm-2" for="SoNguoi">Số Người Tối Đa:</label>
                    <div class="col-sm-3">
                        <input type="number" value="1" min=1 class="form-control " name="SoNguoi" id="SoNguoi">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="control-label col-sm-2" for="LoaiP">Hướng Phòng:</label>
                    <div class="col-sm-8">
                            <label style="min-width:20%;" class="radio-inline">
                                <input type="radio" name="View" id="View" value="0" checked>Không
                            </label>
                            <label style="min-width:20%;" class="radio-inline">
                                <input type="radio" name="View" id="View" value="1">Biển
                            </label>
                            <label style="min-width:20%;" class="radio-inline">
                                <input type="radio" name="View" id="View" value="2">Phố
                            </label>
                            <label style="min-width:20%;" class="radio-inline">
                                <input type="radio" name="View" id="View" value="3">Bể bơi
                            </label>
                    </div>
                </div>
           
                <div class="form-group">
                    <label class="control-label col-sm-2" for="LoaiP">Tiện Ích:</label>
                   
                    <div class="col-sm-8">
                    <?php foreach($data['TongTienIch'] as $value):?>
                    <input id="<?=$value['id']?>" class="form-control" value="<?=$value['id']?>" name="TienIch[]" type="checkbox"> 
                    <label style="min-width:30%;padding:5px;margin:9px 9px;" class="btn btn-default" for="<?=$value['id']?>"> 
                    <?php  echo "<span class='".$value['icon']."'></span> ".$value['tentn']; ?> 
                    </label>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div id="submit" class="btn btn-primary col-sm-8 col-sm-offset-2">Thêm</div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
</body>

<script>
    $(document).ready(function (){
        var error ='<div class="alert alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>';

        $("#submit").click(function () {
            var LoaiP = $("#LoaiP").val().trim() , SoLuong = $("#SoLuong").val(), Dientich = $("#Dientich").val();
            var Gia = $("#Gia").val(), SoNguoi = $("#SoNguoi").val(), View = $("#View:checked").val();
            var  MKs= $("#MKs").val(), TienIch = [""]
            console.log(TienIch);
            $("input[name='TienIch[]']:checked").each(function ()
            {
                TienIch.push(parseInt($(this).val()));
            });

            if(LoaiP==''){
                $("#Loi").html(error + 'Tên Loại Phòng không được để trống' +'</div>');
                event.preventDefault();
                return $("#LoaiP").focus();
            }
          
            $.ajax({
                url: "API-admin-them-phong",
                data: {
                   LoaiP: LoaiP,  SoLuong: SoLuong,  Dientich: Dientich, 
                    Gia: Gia, SoNguoi: SoNguoi, View: View, TienIch: TienIch,
                    MKs: MKs,
                },
                dataType: 'json',
                type: "POST",
                success: function (data) {
                    if(data.trangthai=='loi'){
                        swal(data.thongbao, "<br>", "error");
                        //setTimeout(function(){ location.reload();}, 1000);
                    }
                    else{
                        window.location.href="index.php?controller=quan-ly/phong&hotel="+ MKs;
                    }
                },
                error: function (data) {
                        console.log(data);
                
                }
            })
            
           
        })
    })


</script>