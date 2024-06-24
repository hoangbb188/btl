<?php
if(!isset($_SESSION['quanly'])) header("Location:index.php?controller=quan-ly/dang-ky&step=1");
?>

<h2 class="line_title">
         <span>Thông tin chung:</span>
</h2>
<div class="form-horizontal">
    <div class="form-group"> 
        <label class="control-label col-md-3">Tên khách sạn</label> 
        <div class="col-md-9"> 
            <input placeholder="Ví dụ: Khách sạn Tình Yêu" type="text" id="TenKs" name="TenKs" class="form-control" value=""> 
        </div> 
    </div>

    <div class="form-group"> 
        <label class="control-label col-md-3 ">Địa chỉ</label> 
        <div class="col-md-9"> 
            <select class="form-control" id="TP" name="TP" onchange="LoadHuyen(this.value);">
                        <?php
                            foreach ($data['tinh'] as $gt) {
                                echo '<option value="'.$gt['matp'].'">'.$gt['name'].'</option>';
                            }
                        ?>
            </select>
        </div> 
        <div class="col-md-9 col-md-offset-3"> 
            <select class="form-control" name="Huyen" id="Huyen">
                
            </select>
        </div>
        <div class="col-md-9 col-md-offset-3"> 
            <input placeholder="Ví dụ: 07 Tada" type="text" id="DiaChi" name="DiaChi" class="form-control" value="">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 ">Loại</label>
        <div class="col-md-9">
            <label class="radio-inline"><input type="radio" name="Loai" value="0" checked>Khách sạn</label>
            <label class="radio-inline"><input type="radio" name="Loai" value="1" >Nhà nghỉ</label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 ">Phong cách</label>
        <div class="col-md-9">
            <label class="radio-inline"><input type="radio" name="PhongCach" value="1" checked>Sang trọng</label>
            <label class="radio-inline"><input type="radio" name="PhongCach" value="2">Cổ điển</label>
        </div>
    </div>
    <div class="form-group"> 
        <label class="control-label col-md-3 ">Sao</label> 
        <div class="col-md-9"> 
            <select class="form-control" name="sao" id="sao">
                    <option value="0" selected="selected">Chọn</option>
                    <option value="1">1 sao</option>
                    <option value="2">2 sao</option>
                    <option value="3">3 sao</option>
                    <option value="4">4 sao</option>
                    <option value="5">5 sao</option>

            </select>
        </div>
    </div>

    <div class="form-group"> 
        <label class="control-label col-md-3 ">Mô tả</label> 
        <div class="col-md-9"> 
            <textarea class="ckeditor" name="Mota" id="Mota"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button class="btn btn-primary btn-block" type="submit" name="submit" onclick="DangKy();">Lưu và tiếp tục</button>
        </div>
    </div>
    <div class="form-group">
    <div class="col-md-9 col-md-offset-3">
        <div id="loi">

        </div>
    </div>
</div>  
                        </div>
<script type="text/javascript">
    var matp = $("#TP").val();
    LoadHuyen(matp);
    function LoadHuyen(matp) {
            $.ajax({
                url: "API-DVHC",
                data: {
                    t: matp
                },
                dataType: 'json',
                type: "POST",
                success: function(data) {
                    //console.log(data);
                    var str = '<option value="">Chọn Quận/Huyện</option>';
                    for (i = 0; i < data.length; i++) {
                        str += '<option value="' + data[i]['maqh'] + '">' + data[i]['name'] + '</option>';
                    }
                    $("#Huyen").html(str);
                    //console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            })
    }

    function DangKy() {
        var TenKs = $("#TenKs").val().trim();
        var TP = $("#TP").val();
        var Huyen = $("#Huyen").val();
        var diachi = $("#DiaChi").val();
        var sao = $("#sao").val();
        var Mota = CKEDITOR.instances.Mota.getData();
        var Loai = $("input[name=Loai]").val();
        var PhongCach = $("input[name=PhongCach]").val();
        var tb = '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'; 
        if (TenKs == '') {
            $("#loi").html(tb + 'Nhập Tên khách sạn đi dân chơi</div>');
            //alert("cc");
            return false;
        } else if (Huyen == '') {
            $("#loi").html(tb + 'Chọn huyện đi dân chơi</div>');
            return false;
        } else if (diachi == '') {
            $("#loi").html(tb + 'Nhập Địa chỉ đi dân chơi</div>');
            return false;
        } else if (sao == '' || sao == 0) {
            $("#loi").html(tb + 'Chọn sao đi dân chơi</div>');
            return false;
        } else if (Mota == '') {
            $("#loi").html(tb + 'Nhập mô tả đi dân chơi</div>');
            return false;
        }
        $.ajax({
            url:"API-admin-dang-ky",
            type:"POST",
            dataType:"json",
            data:{
                step:2,
                TenKs:TenKs,
                TP:matp,
                Huyen:Huyen,
                DiaChi:diachi,
                sao:sao,
                Loai:Loai,
                PhongCach:PhongCach,
                Mota:Mota
            },
            success: function(t){
                if(t.trangthai == 'loi'){
                $("#loi").html(t.thongbao);
                }else{
                window.location.href = 'index.php?controller=quan-ly/trang-chu';
                }
            },
            error: function(){
                console.log();
            }
        })
    }

</script>