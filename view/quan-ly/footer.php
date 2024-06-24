<?php if(in_array($arr_con[1],$arr_user)): ?>
<div id="container_footer">
        <div class="footer">
            <a class="logo" href="http://mytour.vn"><img src="https://mytourcdn.com/themes/images/logo_hms.png" />
            </a>
            <div class="left_end_footer">
                <span>
         <b>Công ty TNHH Mytour Việt Nam</b><br />
         Số DKKD: 0105983269 cấp ngày 30/08/2012<br />
         Văn phòng Hà Nội: Tầng 4, Tòa nhà GP Invest, 170 Đê La Thành, Đống Đa<br />
         Văn phòng HCM: Tầng 5, Tòa nhà HDTC, Số 36 Bùi Thị Xuân, Q.1
      </span>
            </div>
            <div class="left_end_footer">
                <span>
         <b>Dịch vụ:</b><br />
         Khách sạn Việt Nam, đặt phòng, vé tàu, vé máy bay<br />
         Tour du lịch, thông tin địa danh, địa điểm du lịch<br />
         Thông tin nhà hàng, địa điểm giải trí
      </span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    </div>
<?php else:?>
<div id="container_footer">
    <script>
        var datepicker_regional = "vn";
        var array_currency = new Array();
        array_currency[1] = new Array("VNĐ", 1, "₫");
        array_currency[2] = new Array("USD", 21000, "$");
        array_currency[5] = new Array("EUR", 27180, "€");
        array_currency[3] = new Array("JPY", 269.68, "¥");
        array_currency[4] = new Array("AUD", 22060, "$");
        var convert = 1;
    </script>
    <script type="text/javascript" src="https://mytourcdn.com/themes/js/langpicker.js"></script>
    <script src="https://mytourcdn.com/themes/v1/js/jquery.widget.min.js"></script>
    <script src="https://mytourcdn.com/themes/v1/js/metro-input-control.js"></script>
    <script type="text/javascript" src="https://mytourcdn.com/themes/v1/js/hms.time.js"></script>
    <script type="text/javascript" src="https://mytourcdn.com/themes/v1/js/metro-calendar.js"></script>
    <script type="text/javascript" src="https://mytourcdn.com/themes/v1/js/hms.min.js"></script>
    <style type="text/css">
        .overlay,
        .head_tutorial {
            display: block;
        }
    </style>
    <script type="text/javascript">
        $(function() {
            $(".overlay").click(function() {
                $(".overlay, .head_tutorial, .arrow_tut, .title_tut, .content_tutorial").hide();
            });
            $(".tutorial_now, .content_tutorial").click(function() {
                $(".content_tutorial").hide();
                $("#container_left").css({
                    'position': 'relative',
                    'z-index': '1000'
                });
                $(".arrow_tut").show();
                $(".title_tut").show();
            });
        });
    </script>
</div>
<script type="text/javascript">
    $(function() {
        var url = window.location.href;
        $('ul.wap_sub li a').each(function() {
            if (url == this.href) {
                $(this).parent().addClass('active_sub');
            }
        });
    });

    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-46983583-9', 'auto');
    ga('send', 'pageview');
</script>

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMPLNQC" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<script type="text/javascript" src="https://mytourcdn.com/themes/v1/js/hms.event-tracking.js"></script>
</div>    
<?php endif;?>    
</body>

</html>