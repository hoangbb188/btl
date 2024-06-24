<?php
if(!defined('LTW')) die();
?>
<!-- Modal Góp ý -->
<div id="GopY" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-uppercase">góp ý website</h4>
            </div>
            <div class="modal-body">
                <p><strong>Đánh giá của bạn về website <span class="text-danger">(*)</span></strong></p>
                <label class="radio-inline"><input type="radio" id="optradio" name="optradio" value="0">Rất không hài lòng</label>
                
                <label class="radio-inline"><input type="radio" id="optradio" name="optradio" value="1">Không hài lòng</label>
                
                <label class="radio-inline"><input type="radio" id="optradio" name="optradio" value="2">Bình thường</label>
                
                <label class="radio-inline"><input type="radio" id="optradio" name="optradio" value="3">Hài lòng</label>
                
                <label class="radio-inline"><input type="radio" id="optradio" name="optradio" value="4">Rất hài lòng</label>
                <br><br><br>
                <p><strong>Góp ý của bạn dành cho chúng tui <span class="text-danger">(*)</span></strong></p>
                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea name="comment_gopy" id="comment_gopy" class="ckeditor" rows="3" placeholder="Bạn muốn góp ý gì với chúng tui ?"></textarea>  
                    </div>
                </div>

                <p><strong>Email liên hệ tới bạn <span class="text-danger">(*)</span></strong></p>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="text" id="contact" name="contact" class="form-control">
                    </div>
                </div>
                <div id="loigopy"></div>
            </div>
            <div class="modal-footer">
                <button id="button_gopy" type="button" class="btn btn-success" onclick="GuiGopY();">Gửi</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Góp ý -->

    <!-- ============================ footer ============================ -->
    <footer class="footer-content">
        <div class="text-center">
            <a href="#myPage" class="top" title="To Top">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
        </div>
        <div class="container row">
            <div class="col-md-5 col-md-offset-1">
                <section id="lienhe">
                <h3 style="border-bottom: 2px solid #daa520;width:40%;">Liên Hệ</h3>
                <ul class="list-unstyled">
                    <li>
                        <p><span class="glyphicon glyphicon-home"></span> &nbsp; Địa chỉ văn phòng: 70/10 đường Tô Ký,
                            quận 12, Thành phố Hồ Chí Minh</p>
                    </li>
                    <li>
                        <p><span class="glyphicon glyphicon-envelope"></span> &nbsp; Email: lthotel@gmail.com </p>
                    </li>
                    <li>
                        <p><span class="glyphicon glyphicon-earphone"></span> &nbsp; Sđt: 016 5555 5555</p>
                    </li>
                    <li>
                        <p>Số ĐKKD: 0105983269 cấp ngày 26/05/2021</p>
                    </li>
                    <li>
                        <p>Nơi cấp: Sở kế hoạch và đầu tư thành phố Tp.HCM</p>
                    </li>
                    <li>
                        <p>Lĩnh vực kinh doanh: Đại lý du lịch</p>
                    </li>
                    <li>
                        <p>Tài khoản ngân hàng số: 0021000266617</p>
                    </li>
                </ul>

            </div>
            </section>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <h3 style="border-bottom: 2px solid #daa520;width:40%;">Điều Khoản</h3>
                <ul class="list-unstyled">
                    <li><a href="#">Chính sách và quy định chung</a></li>
                    <li><a href="#">Quy định về thanh toán</a></li>
                    <li><a href="#">Quy định về xác nhận thông tin đặt phòng</a></li>
                    <li><a href="#">Chính sách về hủy đặt phòng và hoàn trả tiền</a></li>
                    <li><a href="#">Chính sách bảo mật thông tin</a></li>
                </ul>


            </div>
        </div>
        <hr>
        <p class="text-center">©2021 LTHotel.vn All Rights Reserved.

        </p>
    </footer>
    <script type="text/javascript">
    function GuiGopY(){
        var optradio = $("#optradio:checked").val();
        var comment_gopy = CKEDITOR.instances.comment_gopy.getData();

        var contact = $("#contact").val();
        var box_alert = '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>';
        //alert(optradio);
        if(optradio == '' || optradio === undefined){
            $("#loigopy").html(box_alert + "Chưa chọn đánh giá" + "</div>");
            return false;

        }

        if(comment_gopy == ''){
            $("#loigopy").html(box_alert + "Chưa nhập góp ý" + "</div>");
            return false;
        }

        if(contact == ''){
            $("#loigopy").html(box_alert + "Chưa nhập Email liên hệ" + "</div>");
            return false;
        }

        $.ajax({
            url:"API-GopY",
            type:"POST",
            dataType:"json",
            data:{
                rate:optradio,
                binhluan:comment_gopy,
                contact:contact
            },
            success: function(t){
                if(t.trangthai == 'loi'){
                    $("#loigopy").html(t.thongbao);
                }else{
                    $("#loigopy").html('<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>Gửi thành công, Cảm ơn bạn đã góp ý!</div>');
                    $("#button_gopy").attr("disabled",true);
                    setTimeout(function(){
                        $("#GopY").modal('hide');    
                    },1500);
                }


            },
            error: function(t){
                console.log();
            }
        })

    }
</script>
</body>
</html>