<?php
if(!defined('LTW')) die();
$keyword = isset($_GET['keyword']) ? htmlspecialchars(strip_tags($_GET['keyword'])) : '';
?>
<div class="container" style="padding-top: 20px;">
    <div class="row">
        <!-- Breadcrumbs -->
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li class="active"><a href="">Khách sạn</a></li>
                <li>Tìm kiếm 
                    <?php
                    if(isset($_GET['keyword']) && !empty($_GET['keyword'])):
                        echo 'với từ khóa "'.$keyword.'"';
                    endif;
                    ?>
                </li>
            </ul>
        </div>
        <!-- Breadcrumbs -->
        <div class="col-md-12 col-xs-12"><hr></div>
        <!-- Tìm kiếm -->
        <div class="col-md-12 col-xs-12">
            <div class="col-md-10 col-xs-12 col-md-offset-2 col-xs-offset-0">
                        <form action="index.php" method="GET">
                            <input type="hidden" name="controller" value="trang-chu/tim-kiem">
                            <div class="form-group">
                                <div class="col-md-8 col-xs-8">
                                    <input class="form-control" type="text" value="<?=$keyword;?>" name="keyword"/>
                                    
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
        <!-- Tìm kiếm -->
        <div class="col-md-12 col-xs-12" style="margin-top: 30px">
            <a href="index.php?controller=trang-chu/tim-kiem&type=hotel&keyword=<?=$keyword;?>" class="btn btn-default" style="margin-right: 10px">Khách sạn</a>
            <a href="index.php?controller=trang-chu/tim-kiem&type=city&keyword=<?=$keyword;?>" class="btn btn-default" style="margin-right: 10px">Tỉnh thành</a>
            <a href="index.php?controller=trang-chu/tim-kiem&type=district&keyword=<?=$keyword;?>" class="btn btn-default" style="margin-right: 10px">Quận/huyện</a>
        </div>
        <?php
            if($data['kq']):
                $type = isset($_GET['type']) ? $_GET['type'] : 'hotel';
                switch ($type) {
                    case 'city':
                        $url = 'index.php?controller=trang-chu/danh-sach-khach-san&city=';
                        break;
                    case 'district':
                        $url = 'index.php?controller=trang-chu/danh-sach-khach-san&district=';
                        break;
                    default:
                        $url = 'index.php?controller=trang-chu/thong-tin-khach-san&hotel=';
                        break;
                }
            foreach($data['kq'] as $index => $giatri):
        ?>
        <!-- Thông tin khách sạn -->
        <div class="col-md-12 col-xs-12" style="margin-top: 20px">
            <div class="col-md-3 col-xs-3">
                <a href="<?=$url.$giatri['id'];?>">
                <?php if($type == 'hotel'):?>
                <img class="img-thumbnail" src="<?=$giatri['Avatar']!=""? $giatri['Avatar']:"assets/img/avt-default.webp"?>"/>
                <?php else: ?>
                <img class="img-thumbnail" src="assets/img/avt-default.webp"/>
                <?php endif;?>
                </a>
            </div>
            <div class="col-md-9 col-xs-9">
                <div class="text-left">
                    <h4><a href="<?=$url.$data['kq'][$index]['id'];?>"><?php echo $data['kq'][$index]['ten'];?></a></h4>

                    <span class="text-mute"><i class="fas fa-map-marker-alt"></i> <?php echo $giatri['diachi'];?></span>
                </div>
                <div class="text-right">
                    <a href="<?=$url.$giatri['id'];?>" class="btn btn-warning">Xem phòng</a>
                </div>

            </div>
        </div>
        <div class="col-md-12 col-xs-12"><hr></div>
        <!-- Thông tin khách sạn /-->
        <?php
            endforeach;
        endif;
        ?>
        <div class="col-md-12 text-center">
            <?=$data['PhanTrang']['html'];?>
        </div>
    </div>
</div>