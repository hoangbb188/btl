<?php
//print_r($data);
?>
<div class="col-md-12">
	<h2>Lịch sử giao dịch</h2>
	<hr>
</div>
<div class="col-md-12">
	<div class="row">
		<h4>Thông tin chi tiết</h4>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
				    <tr>
					    <th>STT</th>
					   	<th>Nội dung</th>
					    <th class="text-center">Thời gian tạo</th>
					    <th class="text-right">Thay đổi</th>
					    <th class="text-center">Trạng thái</th>
				    </tr>
			    </thead>
			    <tbody>
			    	<?php
			    	$i = ($data['PhanTrang']['pageHienTai']-1)*$this->soHangTrenPage +1;
			    	if($data['LichSuGD']):
			    	foreach ($data['LichSuGD'] as $key => $gt): ?>
			    		<tr>
						<td class="col-md-1"><?=$i;?></td>
						<td class="col-md-5"><?=$gt['Noidung'];?><br>
						<?php if($gt['Loai'] == 1):?>
						<a class="label label-warning" href="index.php?controller=trang-chu/don-dat-phong&mhd=<?=$gt['MHd'];?>">Xem chi tiết hóa đơn</a>
						<?php endif;?>
						</td>	
						<td class="col-md-3"><div class="text-center"><?=date("d/m/Y H:i:s",strtotime($gt['ThoiGian']));?></div></td>
						<td class="col-md-2"><div class="pull-right"><?=number_format($gt['ThayDoi']);?><sup>đ</sup></div></td>
						<td class="col-md-1">
						<?php
						if(isset($gt['TrangThai']) && $gt['TrangThai'] == 0)
						{
							if(strtotime($gt['NgayTra'])<time())
							{
								echo '<span class="label label-danger">Đã hết hạn</span>';
							}else{
								echo '<span class="label label-primary">Chưa nhận phòng</span>';
							}
						} else {
							echo '<span class="label label-success">Đã hoàn thành</span>';
						}

						?></td>
			    		</tr>
			    	<?php $i++; endforeach; endif;?>
			    </tbody>
			</table>
		</div>
	</div>

</div>
<div class="col-xs-12 col-md-12 text-center">
            <?=$data['PhanTrang']['html'];?>
        </div>