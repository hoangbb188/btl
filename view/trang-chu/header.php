<?php
if(!defined('LTW')) die();
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
        <script src="ckeditor/ckeditor.js"></script>
        <style type="text/css">
        .progress{
            height: 10px;
        }
        #myCarousel .carousel-inner .item img{
            width:100%;height: 309px;
        }
        </style>
        <!-- Xàm --
        <script src="assets/js/bootstrap-slider.js"></script>
        <link rel="stylesheet" href="assets/css/bootstrap-slider.css">.
        <-- Xàm -->
        <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        </script>
    </head>
    <body>
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
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#about"> <i class='far fa-building'></i> KHÁCH SẠN</a></li>
                        <li class="dropdown dropdown-hover">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i
                                class='glyphicon glyphicon-info-sign'></i> THÔNG TIN
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menuhover">
                                    <li><a href="index.php?controller=trang-chu/danh-sach-mgg">ƯU ĐÃI MÃ GIẢM GIÁ</a></li>
                                    <li><a href="index.php?controller=quan-ly/trang-chu">ĐỐI TÁC LT HOTEL</a></li>
                                    <!-- <li><a href="#">KHÁCH SẠN TỐT NHẤT 2019</a></li> -->
                                    <li><a href="#lienhe">VỀ CHÚNG TÔI</a></li>
                                </ul>
                            </li>
                            <li><a href="#lienhe">LIÊN HỆ</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <p class="navbar-text">Sđt: 016 5555 5555 <span class="glyphicon glyphicon-phone-alt"></span>
                            </p>
                        </li>
                        <li ><a data-toggle="modal" data-target="#GopY" data-backdrop="static"><span
                        class="glyphicon glyphicon-comment"></span></a></li>
                        <?php if(!isset($_SESSION['trangchu'])):?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class='far fa-user'></i> TÀI KHOẢN
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a href="index.php?controller=trang-chu/dang-nhap"><span class="glyphicon glyphicon-log-in"></span> ĐĂNG NHẬP</a></li>
                                    <li><a href="index.php?controller=trang-chu/dang-ky"><span class="glyphicon glyphicon-user"></span> ĐĂNG KÝ</a></li>
                                </ul>
                            </li>
                            <?php
                            else:
                            $ten = !empty($_SESSION['trangchu']['Ten']) ? $_SESSION['trangchu']['Ten'] : 'Khách';
                            ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class='far fa-user'></i> <?php  echo $ten;?>
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-left">
                                        <li><a href="index.php?controller=trang-chu/thong-tin-tai-khoan&act=quan-ly">Quản lý giao dịch</a></li>
                                        <li><a href="index.php?controller=trang-chu/thong-tin-tai-khoan&act=info">Quản lý tài khoản</a></li>
                                        <li><a href="logout" onclick="logout();">Đăng xuất</a></li>
                                    </ul>
                                </li>
                                <?php
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>