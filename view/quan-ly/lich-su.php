<?php //print_r($data)
?>
<div class="admin-header">
        <div class="row">
        <div class="col-md-9 admin-header-left">
            <h3>Lịch Sử Giao Dịch</h3>
		</div>  	
</div>

</div>
<div class="admin-content">
    <div class="box" style="min-height:200px;">
		<div class="box-content" style="padding:50px 50px;">
		<?php if($data['LichSuGD']): ?>
            <table class="table table-bordered table-responsive">
                <thead>
                  <tr>
                  <th>STT</th>
                  <th>Nội dung</th>
                  <th>Thời gian tạo</th>
                  <th>Thay đổi</th>
                  <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
							 <?php 
								 $i = ($data['phantrang']['pageHienTai'] -1)*$this->soHangTrenPage +1;
								 foreach ($data['LichSuGD'] as $key => $value):
							  ?>
			    		<tr>
						<td class="col-md-1"><?=$i++;?></td>
						<td class="col-md-5"><?=$value['Noidung'];?><br>
						<?php if($value['Loai'] == 2):?>
						<a class="label label-warning" href="<?="index.php?controller=quan-ly/don-dat-phong&hotel=".$data['thongtinkhachsan']['id']."&hoadon=".$value['MHd'];?>">Xem chi tiết hóa đơn</a>
						<?php endif;?>
						</td>	
						<td class="col-md-3"><div class="text-center"><?=date("d/m/Y H:i:s",strtotime($value['ThoiGian']));?></div></td>
						<td class="col-md-2"><div class="pull-right">+<?=number_format($value['ThayDoi']);?><sup>đ</sup></div></td>
						<td class="col-md-1">
							<?php
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
								echo '<span class="label label-warning">Đang Xử Lý</span>';
							}
													else if($value['TrangThai'] == 2) 
													{
								echo '<span class="label label-success">Hoàn Thành</span>';
							}
							?>
						</td>
			    		</tr>
			    	<?php  endforeach; ?>
                </tbody>
				</table>
					<div class="col-md-12 text-center"><?=$data['phantrang']['html']?></div>
					<?php else:?>
					<p class="text-danger">Lịch sử giao dịch trống</p>
					<?php endif;?>
        </div>
    </div>
</div>