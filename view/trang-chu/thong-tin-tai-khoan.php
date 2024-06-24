<?php
if(!defined('LTW')) die();
?>

<div class="container" style="padding-top: 20px;">
    <div class="row">
        <div class="col-md-4">
        	<ul class="list-group">
                 <a class="list-group-item" href="index.php?controller=trang-chu/thong-tin-tai-khoan&act=quan-ly">Lịch sử giao dịch</a>
                 <a class="list-group-item" href="index.php?controller=trang-chu/thong-tin-tai-khoan&act=danh-gia">Đánh giá khách sạn</a>
                <a class="list-group-item" href="index.php?controller=trang-chu/thong-tin-tai-khoan&act=info">Quản lý tài khoản</a>
            </ul>
        </div>
        <div class="col-md-8">
            <?php
            $act = isset($_GET['act']) ? $_GET['act'] : 'quan-ly';
            $file = 'view/trang-chu/accounts/'.$act.'.php';
            if(file_exists($file)) include $file;
            //else header("Location:404");

            ?>
        </div>
    </div>
</div>