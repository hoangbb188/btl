<?php   //print_r($data) 
?>
<div class="admin-header">
        <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Đơn Đặt Phòng</h3>
            <?php if(isset($_GET['type'])&&$_GET['type']=='thanhcong') :?>
                <p class="help-block">Số đơn đã hoàn thành: <?=$data['phantrang']['tongSoHang']?></p>
             <?php elseif(isset($_GET['type'])&&$_GET['type']=='xuly') : ?>
                <p class="help-block">Số đơn đang xử lý: <?=$data['phantrang']['tongSoHang']?></p>
            <?php else: ?>
                <p class="help-block">Số đơn chưa xác nhận:<?=$data['phantrang']['tongSoHang']?></p>
            <?php endif;?>
        </div>  
</div>

</div>
<div class="admin-content">
    <a href="index.php?controller=quan-ly/don-dat-phong&hotel=<?=$data['thongtinkhachsan']['id']?>" class="btn btn-default <?php if(!((isset($_GET['type'])&&$_GET['type']=='thanhcong')||(isset($_GET['type'])&&$_GET['type']=='xuly'))) echo "active"?>">Đơn Chưa Xác Nhận</a>
    <a href="index.php?controller=quan-ly/don-dat-phong&hotel=<?=$data['thongtinkhachsan']['id']?>&type=xuly" class="btn btn-default  <?php if(isset($_GET['type'])&&$_GET['type']=='xuly') echo "active"?>">Đơn Đang Xử Lý</a>
    <a href="index.php?controller=quan-ly/don-dat-phong&hotel=<?=$data['thongtinkhachsan']['id']?>&type=thanhcong" class="btn btn-default  <?php if(isset($_GET['type'])&&$_GET['type']=='thanhcong') echo "active"?>">Đơn Đã Hoàn Thành</a>
    <div class="box" style="min-height:200px;">
        <div class="box-content" style="padding:3%">
        <?php if($data['hoadon']): ?>
            <table class="table table-bordered table-responsive">
                <thead>
                  <tr>
                  <th>STT</th>
                  <th>Họ Và Tên</th>
                  <th>Phòng</th>
                  <th>Số Lượng</th>
                  <th>Ngày Đặt</th>
                  <th>Ngày Trả</th>
                  <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
               <?php 
                    $i = ($data['phantrang']['pageHienTai'] -1 )*$this->soHangTrenPage +1;
                    foreach ($data['hoadon'] as  $value): ?>
			    		<tr>
						<td class="col-md-1"><?=$i++;?></td>
						<td class="col-md-4"><?=$value['Ten'];?><br>
						
                        <a class="label label-warning" href="<?="index.php?controller=quan-ly/don-dat-phong&hotel=".$data['thongtinkhachsan']['id']."&hoadon=".$value['MHd'];?>">
                        <?php
                            if($value['TrangThai'] == 0) echo "Click để vào xác nhận phòng"; 
                             else if($value['TrangThai'] == 1)
                              echo  "Click để vào trả phòng";
                        else
                            echo  "Click để vào xem chi tiết hóa đơn";
                       ?>
                        </a>
            
						</td>	
                        <td class="col-md-4"><?=$value['LoaiP'];?></td>
                        <td class="col-md-2"><div class="pull-right"><?=$value['SL'];?></div></td>
                        <td ><div class="text-center"><?=date("d/m/Y",strtotime($value['NgayDat']));?></div></td>
                        <td><div class="text-center"><?=date("d/m/Y",strtotime($value['NgayTra']));?></div></td>
						<td class="col-md-1"><?php
						if($value['TrangThai'] == 0)
						{
							if(strtotime($value['NgayTra'])<time())
							{
								echo '<span class="label label-danger">Đã hết hạn</span>';
							}else{
								echo '<span class="label label-primary">Chưa nhận phòng</span>';
							}
                        } 
                        else if($value['TrangThai'] == 1) 
                        {
							echo '<span class="label label-primary">Đang Xử Lý</span>';
						}
                        else if($value['TrangThai'] == 2) 
                        {
							echo '<span class="label label-success">Hoàn Thành</span>';
						}

						?></td>
			    		</tr>
			    	<?php  endforeach; ?>
                </tbody>
              </table>
              <div class="col-md-12 text-center"><?=$data['phantrang']['html'] ?></div>
                    <?php else:?>
                        <p class="text-danger">Bạn Chưa Có Đơn Nào</p>
                    <?php endif; ?>
        </div>
    </div>
</div>