<?php
    if(isset($_SESSION['sua'])&&$_SESSION['sua']==true) 
        unset($_SESSION['sua']); 
?>
<head>
  <style>
      input[type=checkbox]{display: none} 
      label{min-width:270px;padding:5px;margin:20px 10px; }
      input[type=checkbox]:checked  + label{
        background: #4194dd;
        color:white;
      }
  </style>
</head>

<div class="admin-header">
        <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Tiện Nghi Khách Sạn</h3>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary" id="submit">Chỉnh Sửa</button>
        </div>
</div>

</div>
<div class="admin-content">
    <div class="box" style="min-height:200px;">
        <div class="box-content">
          <?php foreach($data['TienIch'] as $value):?>
         <input id="<?=$value['id']?>" class="form-control" value="<?=$value['id']?>" name="TienIch[]" type="checkbox" <?= in_array($value['id'],$data['thongtinkhachsan']['TienIch']) ? "checked":"" ?>> 
         <label class="btn btn-default btn-lg" for="<?=$value['id']?>"> 
           <?php  echo "<span class='".$value['icon']."'></span> ".$value['tentn']; ?> 
          </label>
          <?php endforeach; ?>
          <p class="text-danger" style="margin-top:50px;">Nếu chưa có Tiện Nghi nào, Bạn vui lòng ấn vào Thêm Tiện Nghi để thêm nhé ^^</p>
        </div>
    </div>
</div>
  
  <input type="hidden" id="MKs" class="form-control" value="<?=$data['thongtinkhachsan']['id'] ?>">
  
<script>
    $("input[type=checkbox]:not(:checked) + label").hide();
    $("input[type=checkbox]").attr("disabled",true);

    $("#submit").click(function(){
       $("input[type=checkbox]").attr("disabled",!$("input[type=checkbox]").prop("disabled"));
      $("input[type=checkbox]:not(:checked) + label").toggle();
      if($(this).text()=="Lưu Thay Đổi"){
        $(this).text('Chỉnh Sửa');
        CapNhatTienIch();
      }
      else{
        $(this).text('Lưu Thay Đổi');
      }
      
    })

   function CapNhatTienIch() {
      var TienIch = [""]
      $("input[name='TienIch[]']:checked").each(function ()
      {
          TienIch.push(parseInt($(this).val()));
      });

      $.ajax({
            url: "API-admin-sua-ks",
            dataType: 'json',
            data:{
              TienIch: TienIch,
              MKs: $("#MKs").val(),
            },
            type: "POST",
            success: function (data) {
                if(data.capnhat.trangthai=='thanhcong')
                  {
                    swal("Cập Nhật Thành Công","<br>","success");
                    setTimeout(function(){ location.reload();}, 1000);
                  }
                else
                  swal(data.capnhat.thongbao,"<br>","error");
            },
            error: function (data) {
                console.log(data);
            }
        })
    }  
</script>
</body>
