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
    <!-- alert sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/lthotel.css">
     <!-- ckeditor -->
    <script src="ckeditor/ckeditor.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    
<style>
        body {
            overflow-x: hidden;
        }
       /* =================================== Menu Left ================================== */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            border-right: 1px solid #ccc;
            overflow-x: hidden;
            transition: 0.5s;
        }
        .sidebar img {
            padding: 5px;
            min-height: 53px;
            height: 53px;
            margin-left: 10px;
        }
        .sidebar a:nth-child(2) {
            border-top: 1px solid #ccc;
        }
        .sidebar a {
            transition: 0.3s;
        }
        .menu-left .dropdown .dropdown-menu li a{padding:10px 15px;}
        .menu-left .dropdown .dropdown-menu{width:100px;}
        ul.menu-left li {
            min-width: 250px;
            text-transform: capitalize;
        }
        ul.menu-left li a span{
            margin:0 15px 0 5px;
        }
        #main {
            transition: margin-left .5s;
            margin-left: 250px;
        }
        .openbtn {
            cursor: pointer;
            font-size: 50
        }
       
        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

        /* =================================== Menu TOP ADMIN KS ================================== */
        .menu-top {
            border-bottom: 1px solid #ccc;
            height: 50px;
            position: sticky;
            top: 0;
            z-index: 1;
        }
        .menu-top .navbar{border:none;border-bottom: 1px solid #ccc;}
        .navbar-right li {
            border-right: 1px solid #ccc;
        }
        .navbar-right li:last-child {
            border-right: none;
        }
        @media only screen and (max-width: 992px) {
            .menu-top .date, .menu-top .time {
                display: none;
            }
        }

        /* =================================== ADMIN CONTENT ================================== */
        .btn-item {
            height: 100px;
            color: white;
            border: none;
            font-size: 20px;
        }

        .bg-den {
            background: linear-gradient(90deg, #a18cd1 0, #fbc2eb);
        }

        .bg-tcong {
            background: linear-gradient(270deg, #4fd0fe 0, #42acfd);
        }

        .bg-chuaxn {
            background: linear-gradient(90deg, #f78ca0 0, #f9748f 19%, #fd868c 60%, #fe9a8b);
        }
        .box {
            border: 1px solid #ccc;
            border-radius: 10px;
            /* padding: 15px; */
            margin-bottom:20px;
            margin-top: 30px;
        }
        .box-header{
            border-bottom: 1px solid #ccc;
            padding:15px;
            text-transform: uppercase;
            font-size:18px;
       }
       .box-content{padding:15px;overflow-y:auto;}
        .box-content-line {
            margin-bottom: 20px;
        }
        .box-content-line p:not(.help-block) {
            text-transform: capitalize
        }
        .admin-content{padding: 0px 2%;} 
        .admin-header {border-bottom: 1px solid #ccc;padding: 30px 50px;background: #f9fbfd;}
        .admin-header-left {padding: 5px 0;}
        .admin-header-left h3 {margin: 0;padding: 0}

        /* ======================== Thanh Scroll ======================= */
        ::-webkit-scrollbar{width:10px;background: transparent; z-index: 1;}
        ::-webkit-scrollbar-thumb{background: linear-gradient(270deg, #4fd0fe 0, #42acfd);border: 2px solid #fff;}
        ::-webkit-scrollbar-thumb:hover{background: #337ab7;}
    </style>
<script>
       var i = 0;
        $(document).ready(function(){
            // ============================= Đóng mở thanh menu trái =============================
            $(".openbtn").click(function(){
                if (i == 1) {
                    $("#mySidebar").css("width","250px");
                    $("#main").css("margin-left","250px");
                    i = 0;
                }
                else {
                    $("#mySidebar").css("width","53px");
                    $("#main").css("margin-left","53px");
                    i = 1;
                }

                if(i==1){
                    $(".menu-left").mouseover(function () {
                        $("#mySidebar").css("width","250px");
                        $("#main").css("margin-left","250px");
                        if(i==0) i=0; 
                    })
                    $(".menu-left").mouseleave(function () {
                        $("#mySidebar").css("width","53px");
                        $("#main").css("margin-left","53px");
                        if(i==0) i=0; 
                    }) 
                }
                else{
                    $(".menu-left").off("mouseover mouseleave");
                }
            });

           var url = window.location.href;
          var active = "#khach-san";
         if(url.indexOf("index.php?controller=quan-ly/khach-san-admin")!=-1){
             active = "#khach-san-admin";
         }
         else  if(url.indexOf("index.php?controller=quan-ly/thong-tin-khach-san")!=-1){
             $("#thong-tin-chung").click();
             active = "#thong-tin";
         }
         else if(url.indexOf("index.php?controller=quan-ly/tien-nghi")!=-1 ){
            $("#thong-tin-chung").click();
             active = "#tien-nghi"
         }
		 else if(url.indexOf("index.php?controller=quan-ly/thu-vien-anh")!=-1 ){
            $("#thong-tin-chung").click();
             active = "#thu-vien-anh"
         }
         else if(url.indexOf("index.php?controller=quan-ly/phong")!=-1 ){
            $("#thong-tin-chung").click();
             active = "#phong";
         }
         else if(url.indexOf("index.php?controller=quan-ly/ma-giam-gia")!=-1 ){
             active = "#ma-giam-gia";
         }
         else if(url.indexOf("index.php?controller=quan-ly/lich-su")!=-1){
             active = "#lich-su";
         }
         else if(url.indexOf("index.php?controller=quan-ly/don-dat-phong")!=-1){
             active = "#don-dat-phong";
         }
         else if(url.indexOf("index.php?controller=quan-ly/nap-tien")!=-1){
             active = "#nap-tien";
         }
         
         $(active).addClass("active");
            // ============================= Cập Nhật Ngày Giờ =============================

            // Giờ
            function Time() {
            var d = new Date();
            var n = d.toLocaleTimeString();
            document.getElementById("time").innerHTML = n;
            }
            Time();
            setInterval(Time, 1000);

            //Ngày
            var days = new Array("Chủ nhật", "Thứ hai", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7");
            function tDate() {
                var d = new Date();
                var year = d.getFullYear();
                var month = d.getMonth() + 1;
                var day = d.getDate();
                var thu = d.getDay();
                document.getElementById("date").innerHTML = days[thu] + ", " + day + "/ " + month + "/ " + year;
            }
            tDate();
        });        
    </script>

</head>

<body>
<div id="mySidebar" class="sidebar">
        <a href="index.php?controller=quan-ly/trang-chu"><img src="assets/img/lthotel.png" alt=""></a>
        <ul class="nav nav-pills nav-stacked menu-left">
           <?php
                if($_SESSION['quanly']['loai']==1):
           ?>
            <li id="khach-san"><a title="Trang Chủ" href="index.php?controller=quan-ly/khach-san&hotel=<?php if(isset($data['thongtinkhachsan'])) echo $data['thongtinkhachsan']['id'] ?>"><span class="glyphicon glyphicon-home" ></span> Trang Chủ</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" id="thong-tin-chung" title="Thông tin chung" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-info-sign"></span> Thông tin chung<span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li id="thong-tin"><a title="Thông tin khách sạn" href="index.php?controller=quan-ly/thong-tin-khach-san&hotel=<?php if(isset($data['thongtinkhachsan'])) echo $data['thongtinkhachsan']['id'] ?>">Thông tin khách sạn</a></li>
                    <li id="tien-nghi"><a title="Tiện nghi khách sạn" href="index.php?controller=quan-ly/tien-nghi&hotel=<?php if(isset($data['thongtinkhachsan'])) echo $data['thongtinkhachsan']['id'] ?>">Tiện Nghi khách sạn</a></li>
                    <li id="thu-vien-anh"><a title="Thư viện ảnh" href="index.php?controller=quan-ly/thu-vien-anh&hotel=<?php if(isset($data['thongtinkhachsan'])) echo $data['thongtinkhachsan']['id'] ?>">Thư viện ảnh</a></li>        
                    <li id="phong"><a title="Thông tin phòng" href="index.php?controller=quan-ly/phong&hotel=<?php if(isset($data['thongtinkhachsan'])) echo $data['thongtinkhachsan']['id'] ?>">Thông tin phòng</a></li>                    
                </ul>
            </li>
            <li id="ma-giam-gia">
                <a title="Khuyến mãi" href="index.php?controller=quan-ly/ma-giam-gia&hotel=<?php if(isset($data['thongtinkhachsan'])) echo $data['thongtinkhachsan']['id'] ?>">
                   <span class="fas fa-money-bill"></span>Khuyến Mãi
                 </a>
            </li>                    
            <li id="don-dat-phong"><a href="index.php?controller=quan-ly/don-dat-phong&hotel=<?php if(isset($data['thongtinkhachsan'])) echo $data['thongtinkhachsan']['id'] ?>"  title="Đơn đặt phòng" ><span class="glyphicon glyphicon-tags"></span> Đơn đặt phòng</a></li>
            <li id="lich-su"><a href="index.php?controller=quan-ly/lich-su&hotel=<?php if(isset($data['thongtinkhachsan'])) echo $data['thongtinkhachsan']['id'] ?>"  title="Lịch sử" ><span class="fas fa-history"></span> Lịch sử</a></li>
        <?php
            elseif($_SESSION['quanly']['loai']==2):
        ?>
             <li id="khach-san"><a title="Trang Chủ" href="index.php?controller=quan-ly/trang-chu"><span class="glyphicon glyphicon-home" ></span> Trang Chủ</a></li>
            <li id="khach-san-admin">
                <a title="Quản Lý Khách Sạn" href="index.php?controller=quan-ly/khach-san-admin">
                    <span class="fas fa-building"></span> Quản Lý Khách Sạn
                </a>
            </li>
            <li id="ma-giam-gia"><a title="Mã Giảm Giấ" href="index.php?controller=quan-ly/ma-giam-gia-admin">
                   <span class="fas fa-money-bill"></span>Mã Giảm Giá
                 </a></li>
            <li id="nap-tien">
                <a title="Nạp Tiền" href="index.php?controller=quan-ly/nap-tien">
                   <span class="fas fa-money-check-alt"></span>Nạp Tiền
                 </a>
            </li>                    
            <li id="lich-su"><a href="index.php?controller=quan-ly/lich-su-admin"  title="Lịch sử" ><span class="fas fa-history"></span> Lịch sử</a></li>
       
       <?php
            endif;
        ?>
        </ul>
    </div>
<!--  Bên phải  -->
    <div id="main">

    <!-- ============================= Menu Top ============================= -->
        <div class="menu-top">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h4 style="margin-left:0;padding:0;font-size:20px; " class="navbar-text"><span class="openbtn">☰</span></h4>
                    </div>
                    <ul class="nav navbar-nav navbar-right border-right">
                        <li>
                            <h4 class="navbar-text"> &nbsp;
                                <?php 
                                 if($_SESSION['quanly']['loai']==2){
                                     echo "ADMIN LT HOTEL";
                                 }
                                 else{
                                    if(isset($data['thongtinkhachsan'])) 
                                    if(strlen($data['thongtinkhachsan']['ten']) >30)
                                        echo substr(($data['thongtinkhachsan']['ten']),  0, 45)."...";
                                    else echo $data['thongtinkhachsan']['ten'];
                                 }
                                ?>
                            </h4>
                        </li>
                        <li class="date">
                            <span class="navbar-text glyphicon glyphicon-calendar" style="margin-right:0;"></span>
                            <span class="navbar-text" style="margin-left:5px;" id="date"></span>
                        </li>
                        <li class="time">
                            <span class="navbar-text glyphicon glyphicon-time" style="margin-right:0;"></span>
                            <span class="navbar-text" style="margin-left:5px;" id="time"></span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class='fas fa-user'></i>&nbsp; 
                               <?php echo $_SESSION['quanly']['Ten'] ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="index.php?controller=quan-ly/thong-tin-tai-khoan"><span class="fas fa-users-cog"></span> Thiết Lập Tài Khoản</a></li>
                                <li><a href="/admin-logout"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Đăng Xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row"><div class="col-sm-12"></div> </div>

       

