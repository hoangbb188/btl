<?php
if(!defined('LTW')) die();
?>
<!-- =============================  Đặt phòng và slide ảnh =============================  -->
<div class="bg">
    <div class="container">
        <div class="row">
            <!-- Đặt phòng -->
            <div class="col-md-4 col-xs-12" style="height: 100%">
                <div class="panel panel-primary" style="">
                    <div class="panel-heading"><strong>ĐẶT PHÒNG KHÁCH SẠN</strong></div>
                    <div class="panel-body">
                        <form action="index.php" method="GET" class="form-horizontal" onsubmit="validForm(event);">
                            <input type="hidden" name="controller" value="trang-chu/tim-kiem">
                            <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                    <input placeholder="Nhập tên khách sạn..." type="text" class="form-control" id = "keyword" name="keyword" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <span class="label label-default">Đặt phòng:</span>
                                    <div class="input-group" id="datetimepicker1">
                                        <input type="text" class="form-control" name="check-in" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <span class="label label-default">Trả phòng:</span>
                                        <div class="input-group" id="datetimepicker2">
                                            <input type="text" class="form-control" name="check-out" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-xs-6">
                                            <span class="label label-default">Số phòng:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                                <select id="check-room" name="check-room" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <span class="label label-default">Số khách:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <select id="check-person" name="check-person" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary btn-block">TÌM KIẾM KHÁCH
                                            SẠN</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                    <?php
                    $datetimepicker = array();
                    if(isset($_SESSION['time']['check-in'],$_SESSION['time']['check-out'])){
                    $datetimepicker[0] = $_SESSION['time']['check-in'];
                    $datetimepicker[1] = $_SESSION['time']['check-out'];
                    }else{
                    $datetimepicker[0] = date("m/d/Y",time() + 3600*24);
                    $datetimepicker[1] = date("m/d/Y",time() + 3600*24*2);
                    }
                    
                    ?>
                    $(function () {
                    $('#datetimepicker1').datetimepicker({
                    defaultDate: "<?php echo $datetimepicker[0]?>",
                    format: 'DD-MM-YYYY'
                    //useCurrent: false
                    });
                    $('#datetimepicker2').datetimepicker({
                    defaultDate: "<?php echo $datetimepicker[1]?>",
                    format: 'DD-MM-YYYY',
                    useCurrent: false //Important! See issue #1075
                    });
                    $("#datetimepicker1").on("dp.change", function (e) {
                    $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
                    });
                    $("#datetimepicker2").on("dp.change", function (e) {
                    $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
                    });
                    });
                    </script>
                    <!-- Đặt phòng/ -->
                    <div class="col-md-8 col-xs-12">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel"
                            style="width: 100%; overflow: hidden; position: relative;">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="assets/img/lthotel1.jpg" alt="Los Angeles">
                                    <div class="carousel-caption">
                                        <h3>Tháng 5 rực rỡ</h3>
                                        <p>Giảm 12% Khách sạn toàn quốc</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="assets/img/lthotel2.jpg" alt="Chicago">
                                    <div class="carousel-caption">
                                        <h3>MCR Luxury</h3>
                                        <p>Giảm 48%</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="assets/img/lthotel3.jpg" alt="New York">
                                    <div class="carousel-caption">
                                        <h3>Top Khách sạn</h3>
                                        <p>Giảm đến 50%</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="assets/img/lthotel5.jpg" alt="New York">
                                    <div class="carousel-caption">
                                        <h3>Thẻ Quốc tế SCB</h3>
                                        <p>Giảm 10%</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================ Nội dung web ============================ -->
        <script type="text/javascript">
        function validForm(event) {
            var keyword = $("#keyword").val();
            var checkroom = $("#check-room").val();
            var checkperson = $("#check-person").val();
            if (keyword == '') {
                alert("Chưa nhập từ khóa bạn ei!");
                event.preventDefault();
            } else if (checkroom > checkperson) {
                alert("Số phòng lớn hơn số khách, vui lòng chọn lại!");
                event.preventDefault();
            }
        }
        </script>