

<div class="admin-header">
        <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Nạp Tiền</h3>
        </div>
</div>

</div>
<div class="admin-content">
    <div class="box" style="min-height:200px;">
        <div class="box-content" style="padding:50px;">
            <div class="form-horizontal">
                <div class="form-group">
                    <label>Tài khoản cần nạp tiền:</label>
                    <input type="text" name="email" id="email_nt" class="form-control">
                </div>
                <div class="form-group">
                    <label>Số tiền cần nạp:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="sotien" name="sotien">
                        <span class="input-group-addon">.000 <sup>VNĐ</sup></span>
                    </div>
                </div>
                <div class="form-group">
                    <button id="button_nt" class="btn btn-primary" onclick="NapTien();">Nạp tiền</button>
                </div>
                <div class="form-group" id="loint"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        function NapTien(){
        var email = $("#email_nt").val();
        var tien = $("#sotien").val();
        var box_alert = '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>';
        if(email == ''){
            $("#loint").html(box_alert + 'Nhập email nạp tiền đi người anh em' + '</div>');
            return false;        
        }

        if(tien == ''){
            $("#loint").html(box_alert + 'Nhập số tiền cần nạp tiền đi người anh em' + '</div>');
            return false;        
        }

        if(tien <= 0){
            $("#loint").html(box_alert + 'Sô tiền cần nạp không hợp lệ' + '</div>');
            return false;
        }

        $.ajax({
            url:"API-admin-nap-tien",
            type:"POST",
            typeData:"json",
            data:{
                email:email,
                tien:tien
            },
            success: function(t){
                if(t.trangthai == 'loi'){
                    $("#loint").html(t.thongbao);
                }else{
                    $("#loint").html('<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>Nạp tiền thành công</div>');
                    $("#button_nt").attr("disabled",true); 
                }
            },
            error: function(){
                console.log();
            }
        })

    }
</script>