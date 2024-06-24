<?php
if(!defined('LTW')) die();
$sodem = sodem($data['chitiethoadon']['NgayTra'],$data['chitiethoadon']['NgayDat']);
$sophong = $data['chitiethoadon']['SL'];
//print_r($data);
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
					<p class="fas star-<?=$data['thongtinkhachsan']['sao'];?>"></p>
					<small>
						<p class="text-mute"><i class="fas fa-map-marker-alt"></i> <?=$data['thongtinkhachsan']['diachi'];?></p>
						<div class="col-md-12 col-xs-12">
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<div class="row text-left">
										<p><strong>Nhận phòng:</strong></p>
										<p><strong>Trả phòng:</strong></p>
										<p><strong>Tổng Số ngày thuê:</strong></p>
									</div>
								</div>
								<div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-0">
									<div class="row">
										<p>00:01, <?=dinh_dang_thu($data['chitiethoadon']['NgayDat']);?>, ngày <strong><?=date("d-m-Y",strtotime($data['chitiethoadon']['NgayDat']));?></strong></p>
										<p>00:01, <?=dinh_dang_thu($data['chitiethoadon']['NgayTra']);?>, ngày <strong><?=date("d-m-Y",strtotime($data['chitiethoadon']['NgayTra']));?></strong></p>
										<p><strong><?=$sodem;?></strong> ngày</p>
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
									<?=$data['chitiethoadon']['email'];?>
								</div>
							</div>
							<div class="col-md-5 col-md-offset-1">
								<div class="form-group">
									<label>Số điện thoại:</label>
									<?=$_SESSION['trangchu']['SDT'];?>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Họ và tên:</label>
									<?=$_SESSION['trangchu']['Ten'];?>
								</div>
							</div>
							<div class="col-md-5 col-md-offset-1">
								<div class="form-group">
									<label>Tỉnh/TP:</label>
									<?=$data['tinh']['tentinh'];?>
									</select>
								</div>
							</div>
							<div class="col-md-12 row">
								<div class="alert alert-success text-center">Mã bảo mật <strong><?=$data['chitiethoadon']['MaBaoMat']?></strong> 
								</div>
							</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">Thông tin!</div>
				<div class="panel-body">
					<div class="col-md-12">
						<small>
							<p><strong><?=$data['thongtinphong']['LoaiP'];?></strong></p>
							<p><?=$sophong?> phòng</p>
						</small>
					</div>
					<div class="col-md-12"><hr></div>
					<div class="col-md-12">
						<p class="pull-left"><strong>Tổng tiền:</strong></p>
						<p class="pull-right text-success"><strong><?=number_format($data['chitiethoadon']['Tien']);?>&nbsp;₫</strong></p>
					</div>
					<div class="col-md-12"><hr></div>
					<div class="col-md-12">
						<strong>
						<div class="pull-left">GIẢM GIÁ:</div>
						<div class="pull-right text-success"><strong><?=number_format($data['chitiethoadon']['GiamGia']);?>&nbsp;₫</strong></div>
						<br>
						<div class="pull-left">THANH TOÁN:</div>
						<div class="pull-right text-success" id="thanhtoan"><?=number_format($data['chitiethoadon']['Tien']-$data['chitiethoadon']['GiamGia']);?>&nbsp;₫</div>
						</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>