<?php
if(!defined('LTW')) die();
//print_r($_SESSION);
//print_r($data);
$hotel = isset($_GET['hotel']) ? intval($_GET['hotel']) : 0;
$email = $_SESSION['trangchu']['TaiKhoan'];

$sodem = sodem($data['time']['check-out'],$data['time']['check-in']);
$sophong = $data['soluong'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LT Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="shortcut icon" href="assets/img/icon.png" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/lthotel.css">
    <script type="text/javascript">
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<!-- ====================Thanh menu top==================== -->

    <nav class="navbar navbar-default" style="margin:0px;" id="myPage">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="padding:0px 10px;" href="index.php"><img  class="" src="assets/img/lthotel.png" alt="lthotel"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text">Sđt: 016 5555 5555 <span class="glyphicon glyphicon-phone-alt"></span>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container" style="margin-top: 20px">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-body bg-success">
					<h4><a href="index.php?controller=trang-chu/thong-tin-khach-san&hotel=<?=$data['thongtinkhachsan']['id'];?>" class="text-danger" style="text-decoration: none;"><?=$data['thongtinkhachsan']['ten'];?></a></h4>
					<p class="fas star-2"></p>
					<small>
						<p class="text-mute"><i class="fas fa-map-marker-alt"></i> <?=$data['thongtinkhachsan']['diachi'];?></p>
						<div class="col-md-12 col-xs-12">
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<div class="row text-left">
										<p><strong>Nhận phòng:</strong></p>
										<p><strong>Trả phòng:</strong></p>
										<p><strong>Tổng số ngày thuê:</strong></p>
									</div>
								</div>
								<div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-0">
									<div class="row">
										<p>00:01, <?=dinh_dang_thu($data['time']['thu-check-in']);?>, ngày <?=$this->DinhDangNgay($data['time']['check-in'],1);?></p>
										<p>00:01, <?=dinh_dang_thu($data['time']['thu-check-out']);?>, ngày <?=$this->DinhDangNgay($data['time']['check-out'],1);?></p>
										<p><?=$sodem;?> ngày <a class="label label-danger text-underline" href="index.php?controller=trang-chu/thong-tin-khach-san&hotel=<?=$_GET['hotel'];?>">Thay đổi ngay</a></p>
									</div>
								</div>
							</div>
						</div>

					</small>
				</div>
				<div class="panel-body" style="margin-top: 20px">
					<h4 class="text-capitalize">Thông tin liên hệ</h4>
					<div class="form-horizontal">
						
							<div class="col-md-5">
								<div class="form-group">
									<label>Email:</label>
									<!--
									<small>
										<p><i class="fa fa-info-circle"></i> Xác nhận đơn phòng sẽ được gửi qua email này.</p>
									</small>
									-->
									<input type="email" id="email" name="email" value="<?=$email;?>" class="form-control" disabled=""/>
								</div>
							</div>
							<div class="col-md-5 col-md-offset-1">
								<div class="form-group">
									<label>Số điện thoại:</label>
									<!--
										<small>
											<p><i class="fa fa-info-circle"></i> Xác nhận đơn phòng sẽ được gửi qua số điện thoại này.</p>
										</small>
									-->
									<input type="text" id="sdt" name="phone" class="form-control" value="<?=$_SESSION['trangchu']['SDT'];?>" />
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Họ và tên:</label>
									<!--
									<small>
										<p><i class="fa fa-info-circle"></i> Xác nhận đơn phòng sẽ được gửi qua email này.</p>
									</small>
									-->
									<input type="text" id="name" name="name" class="form-control" value="<?=$_SESSION['trangchu']['Ten'];?>"/>
								</div>
							</div>
							<div class="col-md-5 col-md-offset-1">
								<div class="form-group">
									<label>Tỉnh/TP:</label>
									<!--
										<small>
											<p><i class="fa fa-info-circle"></i> Xác nhận đơn phòng sẽ được gửi qua số điện thoại này.</p>
										</small>
									-->
									<select id="TP" name="TP" class="form-control">
										<?php
                                            foreach ($data['tinh'] as $gt) {
                                                $selected = '';
												if($_SESSION['trangchu']['TP'] == $gt['matp']) $selected = 'selected';
											?>
				<option value="<?=$gt['matp']?>" <?=$selected;?>><?=$gt['name']?></option>
                                            <?php  } ?>
									</select>
								</div>
							</div>
							<div class="col-md-12 row">
								<div class="alert alert-success text-center">Thanh toán ngay để giữ <strong>phòng trống</strong> và <strong>giá tốt nhất</strong>! 
								</div>
							</div>
							<div class="col-md-12 row">
								<div id="loi"></div>
							</div>
							<div class="col-md-3 col-md-offset-4">
								<div class="form-group">
									<button class="btn btn-primary btn-block" id="button_datphong" onclick="DatPhong();">Đặt phòng</button>
								</div>
							</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">Đặt ngay!</div>
				<div class="panel-body">
					<div class="col-md-12">
						<small>
							<p><strong><?=$data['thongtinphong']['LoaiP'];?></strong></p>
							<p><?=$data['soluong'];?> phòng</p>
						</small>
					</div>
					<div class="col-md-12"><hr></div>
					<div class="col-md-12">
						<p class="pull-left"><strong>Tổng tiền:</strong></p>
						<p class="pull-right text-success"><strong><?=number_format($data['thongtinphong']['Gia']*$sodem*$sophong);?></strong></p>
					</div>
					<div class="col-md-12"><hr></div>
					<div class="col-md-12">
						<strong>
						<div id="mgg" style="display: none;">
							<div class="pull-left">GIẢM GIÁ:</div>
							<div class="pull-right text-success" id="tru"></div>
						</div>
						<br>
						<div class="pull-left">THANH TOÁN:</div>
						<div class="pull-right text-success" id="thanhtoan"><?=number_format($data['thongtinphong']['Gia']*$sodem*$sophong);?>&nbsp;₫</div>
						</strong>
					</div>
					<div class="col-md-12"><hr></div>
					<p class="text-primary">Bạn có mã giảm giá ?</p>
					<form class="form-inline">
						<div class="row">
							<div class="col-md-7">
								<div class="form-group">
									<input type="text" class="form-control" id="code" name="code"/>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-1">
								<div class="form-group">
									<button type="button" class="btn btn-default" onclick="KiemTraMGG();">Áp dụng</button>
								</div>
							</div>
							<div class="col-md-12" id="thongbao" style="margin-top: 20px"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var codemgg = '';
	function KiemTraMGG(){
		var code = $("#code").val();
		var hotel = '<?=$hotel?>';
		var tongtien = '<?=$data['thongtinphong']['Gia']*$sodem*$sophong;?>';
		if(code == ''){
			$("#thongbao").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>Mã giảm giá đâu?</div>');
			return false;
		}
		$.ajax({
			url: "API-kiemtra-mgg",
            type: "POST",
            dataType: "json",
			data:{
				mgg:code,
				hotel:hotel
			},
			success: function(t) {
				if(t.trangthai == 'loi'){
		        	$("#thongbao").html(t.thongbao);
		        }else{
		        	codemgg = code;
		        	var tong_tru = tongtien / 100 * t.discount;
		        	var thanhtoan = tongtien - tong_tru;
		        	$("#mgg").css("display","block");
		        	var dinhdangtientru = tong_tru.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
		        	var dinhdangthanhtoan = thanhtoan.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
		        	$("#tru").html( '- ' + dinhdangtientru + '');
		        	$("#thanhtoan").html(dinhdangthanhtoan + '');
		        	$("#thongbao").html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>Áp mã thành công, tiếp tục đặt phòng!</div>');
		        }
				//console.log(t);
			},
			error: function(t){
				console.log(t);
			}
		})
	}

	function DatPhong(){
		var email = $("#email").val();
		var name = $("#name").val();
		var sdt = $("#sdt").val();
		var TP = $("#TP").val();
		if(email == ''){
			$("#loi").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>Email đâu ?</div>');
			return false;
		}else if(name == ''){
			$("#loi").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>Tên đâu ?</div>');
			return false;
		}else if(sdt == ''){
			$("#loi").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>SĐT đâu ?</div>');
			return false;
		}else{
			$.ajax({
				url:"API-thanhtoan",
				type:"POST",
				data:{
					ten:name,
					email:email,
					sdt:sdt,
					TP:TP,
					code: codemgg,
					hotel: '<?=$_GET['hotel']?>',
					room: '<?=$_GET['room']?>',
					soluong: '<?=$sophong;?>'
				},
				dataType:"json",
				success: function(t){
					if(t.trangthai == 'loi'){
						//alert(codemgg);
						$("#loi").html(t.thongbao);
						console.log(t);
					}else{
						$("#button_datphong").attr("disabled",true);
						$("#loi").html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span></button>Bạn đã đặt phòng thành công, Vui lòng đợi chuyển hướng!</div>');
						setTimeout(function(){
							location.href = 'index.php?controller=trang-chu/thong-tin-tai-khoan&act=quan-ly';
						},2000);
						//console.log(t);
					}
				},
				error: function(t){
					console.log(t);
				}
			})

		}
	}
</script>
<?php

?>