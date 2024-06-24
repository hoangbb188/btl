<?php
if(!defined('LTW')) die();
$tongkhachsan = is_array($data['danhsachkhachsan']) ? count($data['danhsachkhachsan']) : 0;
$min_value = isset($_GET['min_value']) && $_GET['min_value']>0 ? intval($_GET['min_value']) : 0;
$max_value = isset($_GET['max_value']) && $_GET['max_value']>0 ? intval($_GET['max_value']) : 0;
$min_value = ($min_value>$max_value) ? 0 : $min_value;
$sao = isset($_GET['sao']) && is_array($_GET['sao']) ? $_GET['sao'] : array();
$hotel_type = isset($_GET['hotel_type']) ? intval($_GET['hotel_type']) : 2;
$keyword = isset($_GET['name']) ? htmlspecialchars(strip_tags($_GET['name'])) : '';
//echo $_GET['name'];
//print_r($data);
?>
<div class="container" style="padding-top: 20px;">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li class="active"><a href="index.php">Khách sạn</a></li>
				<?php if(isset($_GET['district'])):?>
				<li><a href="index.php?controller=trang-chu/danh-sach-khach-san&city=<?=$data['thongtinvitri']['matp']?>"><?=$data['thongtinvitri']['tentinh']?></a></li> <!-- Tỉnh TP --->	
				<li><?=$data['thongtinvitri']['tenqh']?></li> <!-- Quận/huyện -->
				<?php else:?>
				<li><?=$data['thongtinvitri']['tentinh']?></li> <!-- Tỉnh TP --->	
				<?php endif; ?>
			</ul>
		</div>
	
		<div class="col-md-12"><hr></div>
		<div class="col-md-3">
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="index.php" method="GET" onsubmit="validForm(event);">
							<input type="hidden" name="controller" value="trang-chu/danh-sach-khach-san"/>
							<?php if(isset($_GET['district'])):?>
							<input type="hidden" name="district" value="<?=$data['thongtinvitri']['maqh']?>"/>
							<?php else:?>
							<input type="hidden" name="city" value="<?=$data['thongtinvitri']['matp']?>"/>
							<?php endif;?>
							<h4>Có tất cả <strong><?= $tongkhachsan;?> khách sạn</strong></h4>
							<hr>
							<h5><strong>Lọc khách sạn theo tên</strong></h5>
							<input type="text" class="form-control" name="name" placeholder="Nhập tên khách sạn" value="<?=$keyword;?>">
							<hr>
							<h5><strong>Theo mức giá</strong></h5>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="number" id="min_value" name="min_value" class="form-control" placeholder="Tối thiểu" value="<?=$min_value;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="number" id="max_value" name="max_value" class="form-control" placeholder="Tối đa" value="<?=$max_value;?>">
									</div>
								</div>								
							</div>
							<hr>
							<h5><strong>Hạng sao</strong></h5>
							<?php
							for($i = 1;$i<=5;$i++){
								$checked = '';
								if(in_array($i, $sao)) $checked = 'checked';
								?>
							<div class="checkbox">
								<label><input type="checkbox" value="<?=$i?>" name="sao[]" <?=$checked;?>><span class="fas star-<?=$i?>"></span></label>
							</div>
								<?php
							}
							?>
							<hr>
							<h5><strong>Loại hình</strong></h5>
							<?php $arr_type  =  array('Nhà nghỉ','Khách sạn','Tất cả');
							foreach ($arr_type as $key => $value):
								$checked = '';
								if($hotel_type == $key) $checked = 'checked';
								?>
								<div class="radio">
									<label><input type="radio" name="hotel_type" value="<?=$key;?>" <?=$checked;?>><?=$value;?></label>
								</div>
							<?php endforeach; ?>
							
							<button type="submit" class="btn btn-primary btn-block">Lọc</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Khung Show -->
	
		<div class="col-md-9">
			<div class="row">
				<?php 
				if(is_array($data['danhsachkhachsan'])):
				foreach($data['danhsachkhachsan'] as $index => $giatri):
					$tongdanhgia = $data['tongquan'][$giatri['id']]['SL'];
					$tongquatdiem = !empty($data['tongquan'][$giatri['id']]['danhgiatb']) ? round($data['tongquan'][$giatri['id']]['danhgiatb'],1) : 0;
					?>
				<!-- Thông tin -->
				<div class="col-md-12 col-xs-12">
					<div class="row">
						<!-- Thông tin chi tiết -->
						<div class="col-md-9 col-xs-12">
							<h4><a href="index.php?controller=trang-chu/thong-tin-khach-san&hotel=<?php echo $giatri['id'];?>"><?php echo $giatri['ten'];?> </a><span class="fas star-<?php echo $giatri['sao'];?>"></span></h4>

							<span class="text-mute"><i class="fas fa-map-marker-alt"></i> <?php echo $giatri['diachi'];?></span>
							<div class="row">
								<div class="col-md-4 col-xs-4">
									<img class="img-thumbnail" src="<?=$giatri['Avatar']!=""? $giatri['Avatar']:"assets/img/avt-default.webp"?>">
								</div>
								<div class="col-md-8 col-xs-8">
									<?php //đổ tiện ích, có thì xuất không thì thôi
									if(!empty($data['tienich'][$giatri['id']])):
										foreach ($data['tienich'][$giatri['id']] as $key => $value) {
											echo '<i class="'.$value['icon'].' fa-2x text-danger" data-toggle="tooltip" title="" data-original-title="'.$value['tentn'].'" style="margin-right:10px"></i>';
										}

									endif;
									?>
									<br>
									<span><small><i class="fas fa-check-circle text-success"></i> Đảm bảo hoàn tiền sớm nhất</small></span><br>
									<span><small><i class="fas fa-check-circle text-success"></i> Đảm bảo giá tốt nhất!</small></span>
								</div>
							</div>
						</div>
						
						<!-- Thông tin chi tiết/ -->
						<!-- button xem -->
						<div class="col-md-3 col-xs-12 text-right bg-success" style="padding: 15px;">
							<div class="btn-group">
								<?php if($tongquatdiem>0):?>
								<span class="btn btn-primary"><?=XepLoaiDanhGia($tongquatdiem);?></span>
								<span class="btn btn-primary"><?=$tongquatdiem;?></span>
								<?php endif;?>
							</div>
							<div style="padding-top:10px;padding-bottom:10px;height: 75px">
								<h3 class="text-success text-right">
								<?php if($data['min_price'][$giatri['id']]):
									$price = $data['min_price'][$giatri['id']];
								?>
								<?php echo number_format($price);?>
								<sup>đ</sup>
								<?php endif;?>
								</h3>
							</div>
							<a href="index.php?controller=trang-chu/thong-tin-khach-san&hotel=<?php echo $giatri['id'];?>" class="btn btn-warning text-uppercase">Xem phòng</a>
							<br>
							<small><span class="text-danger"><strong>Đảm bảo còn phòng!</strong></span></small>
						</div>
						<!-- button xem/ -->
					</div>
				</div>
				<div class="col-md-12 col-xs-12"><hr></div>
				<!-- Thông tin/ -->
				<?php endforeach; endif;?>
			</div>	

			<!-- Phân trang -->
			<div class="col-xs-12 col-md-12 text-center">
				<?=$data['PhanTrang']['html'];?>
			</div>
			<!-- Phân trang/ -->

		</div>
		<!-- Khung Show/ -->

	</div>
</div>	

<script type="text/javascript">
	function validForm(event){
		var min_value = $("#min_value").val();
		var max_value = $("#max_value").val();
		//alert(min_value);
		if(min_value < 0 || max_value <0){
			alert("Mức giá tìm kiếm phải là số dương");
			event.preventDefault();
		}
		if(min_value > max_value){
			alert("Mức giá tối thiểu không được cao hơn mức giá tối đa");
			event.preventDefault();
		}

	}
</script>