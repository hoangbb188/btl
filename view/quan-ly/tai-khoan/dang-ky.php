<?php
$step = isset($_GET['step']) ? intval($_GET['step']) :'1';
?>

<head><style>.sidebar{width:0px;}#main{margin-left:0px;}.menu-top{display:none;}</style></head>
<div class="bg">
        <div class="container">
            <a href="index.php?controller=quan-ly/trang-chu"><img src="assets/img/lthotel-lg.png" class="img-responsive" style="width:200px" alt=""></a>
        </div>   
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5 class="text-uppercase">đăng ký khách sạn</h5>
                    </div>
                    <div class="panel-body">
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="<?=$progress_current;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$progress_current;?>%;"><?=$progress_current;?>%</div>
                        </div>
                        <?php
                        $file = 'view/quan-ly/tai-khoan/dang-ky/step-'.$step.'.php';
                        if(file_exists($file))
                        include_once $file;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>