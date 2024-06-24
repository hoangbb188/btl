<?php
//print_r($data);
?>
<div class="col-md-12">
	<h2>Đánh giá khách sạn</h2>
	<hr>
</div>
<div class="col-md-12">
	<div class="row">
		<h4>Đánh giá khách sạn đã từng đặt!</h4>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
				    <tr>
					    <th class="text-left">STT</th>
					   	<th class="text-left">Khách sạn</th>
					   	<th class="text-center">Trạng thái</th>
					   	<th class="text-center">Tùy chọn</th>
				    </tr>
			    </thead>
			    <tbody>
			    	<?php
			    	$i = ($data['PhanTrang']['pageHienTai']-1)*$this->soHangTrenPage +1;
			    	if(!empty($data['danh-gia'])):
			    	foreach ($data['danh-gia'] as $key => $gt): 
			    		if($gt['trangthai']){
			    			$trangthai = '<span class="label label-success">Đã đánh giá</span>';
			    			$tuychon = 'Chỉnh sửa';
			    		}else{
			    			$trangthai = '<span class="label label-danger">Chưa đánh giá</span>';
			    			$tuychon = 'Đánh giá';
			    		}
			    			
			    		?>
			    		<tr>
						<td class="col-md-1"><?=$i?></td>
						<td class="col-md-7"><?=$gt['TenKs'];?><br></td>
						<td class="col-md-2 text-center"><?=$trangthai;?></td>
						<td class="col-md-2 text-center"><a href="index.php?controller=trang-chu/thong-tin-khach-san&hotel=<?=$gt['MKs'];?>#danhgiangay" class="btn btn-danger btn-sm"><?=$tuychon;?></a></td>
			    		</tr>
			    	<?php $i++; endforeach; endif;?>
			    </tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-md-12 col-xs-12 text-center">
            <?=$data['PhanTrang']['html'];?>
        </div>