        <div class="col-md-12 col-xs-12" style="margin-top: 5px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Đánh giá khách sạn
                </div>
                <div class="panel-body">
                    <section id="danhgiangay">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <div class="col-md-12">
                    <p class="pull-right"><button class="btn btn-warning" data-toggle="modal" data-target="#VietDanhGia" data-backdrop="static">Viết đánh giá</button></p>
                </div>
                            <?php if($tongquatdiem>0):?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <h1><?=$tongquatdiem;?> điểm</h1>
                                        <p><strong>Từ <?=$tongdanhgia;?> Nhận xét</strong></p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!-- đánh giá vị trí-->
                                    <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Vị trí</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$ViTritb;?></strong></p>
                                        </small> 
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$ViTritb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$ViTritb*10;?>%">
                                            <span class="sr-only"><?=$ViTritb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh giá vị trí/-->

                                    <!-- đánh giá phục-->
                                    <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Phục vụ</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$PhucVutb;?></strong></p>
                                        </small> 
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$PhucVutb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$PhucVutb*10;?>%">
                                            <span class="sr-only"><?=$PhucVutb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh giá phục/-->

                                    <!-- đánh giá tiện nghi-->
                                    <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Tiện nghi</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$TienNghitb;?></strong></p>
                                        </small> 
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$TienNghitb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$TienNghitb*10;?>%">
                                            <span class="sr-only"><?=$TienNghitb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh tiện nghi/-->

                                    <!-- đánh giá giá cả-->
                                    <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Giá cả</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$Giatb;?></strong></p>
                                        </small> 
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$Giatb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$Giatb*10;?>%;">
                                            <span class="sr-only"><?=$Giatb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh giá giá cả/-->

                                    <!-- đánh giá vệ sinh-->
                                    <div class="col-md-12"> 
                                        <small>
                                            <p class="pull-left"><strong>Vệ sinh</strong></p> 
                                            <p class="pull-right text-success"><strong><?=$VeSinhtb;?></strong></p> 
                                        </small>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$VeSinhtb*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$VeSinhtb*10;?>%;">
                                            <span class="sr-only"><?=$VeSinhtb*10;?>% Complete (success)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <!-- đánh giá vệ sinh/-->
                                </div>
                            </div>
                        <?php endif;?>
                        </div>
                    </div>
                    </section>
                    <hr>
                    <?php
                    if($data['danhsachdanhgia']):
                        foreach ($data['danhsachdanhgia'] as $key => $gt):
                           ?>

                           <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <i class="fas fa-user"></i> <?php echo $gt['Ten'];?>
                                <hr>
                                ngày <?php echo date("m-d-Y",strtotime($gt['Ngay']))?>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="col-md-6">
                                            <!-- đánh giá vị trí-->
                                            <div class="col-md-12"> 
                                                <small>
                                                    <p class="pull-left"><strong>Vị trí</strong></p> 
                                                    <p class="pull-right text-success"><strong><?=$gt['ViTri']?></strong></p>
                                                </small> 
                                            </div>
                                            <div class="col-md-12">
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$gt['ViTri']*10?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$gt['ViTri']*10?>%">
                                                    <span class="sr-only"><?=$gt['ViTri']*10?>% Complete (success)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <!-- đánh giá vị trí/-->

                                            <!-- đánh giá Phuc Vu-->
                                            <div class="col-md-12"> 
                                                <small>
                                                    <p class="pull-left"><strong>Vị trí</strong></p> 
                                                    <p class="pull-right text-success"><strong><?=$gt['PhucVu']?></strong></p>
                                                </small> 
                                            </div>
                                            <div class="col-md-12">
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$gt['PhucVu']*10?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$gt['PhucVu']*10?>%">
                                                    <span class="sr-only"><?=$gt['PhucVu']*10?>% Complete (success)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <!-- đánh giá Phuc Vu/-->

                                            <!-- đánh giá tiện nghi-->
                                            <div class="col-md-12"> 
                                                <small>
                                                    <p class="pull-left"><strong>Tiện nghi</strong></p> 
                                                    <p class="pull-right text-success"><strong><?=$gt['TienNghi']?></strong></p>
                                                </small> 
                                            </div>
                                            <div class="col-md-12">
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: <?=$gt['TienNghi']*10;?>%">
                                                    <span class="sr-only"><?=$gt['TienNghi']*10?>% Complete (success)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <!-- đánh tiện nghi/-->

                                            <!-- đánh giá giá cả-->
                                            <div class="col-md-12"> 
                                                <small>
                                                    <p class="pull-left"><strong>Giá cả</strong></p> 
                                                    <p class="pull-right text-success"><strong><?=$gt['Gia'];?></strong></p>
                                                </small> 
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$gt['Gia']*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$gt['Gia']*10;?>%;">
                                                    <span class="sr-only"><?=$gt['Gia']*10;?>% Complete (success)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <!-- đánh giá giá cả/-->

                                            <!-- đánh giá vệ sinh-->
                                            <div class="col-md-12"> 
                                                <small>
                                                    <p class="pull-left"><strong>Vệ sinh</strong></p> 
                                                    <p class="pull-right text-success"><strong><?=$gt['VeSinh'];?></strong></p> 
                                                </small>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?=$gt['VeSinh']*10;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$gt['VeSinh']*10;?>%;">
                                                    <span class="sr-only"><?=$gt['VeSinh']*10;?>% Complete (success)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <!-- đánh giá vệ sinh/-->


                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <small><?=$gt['NhanXet'];?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                        <?php
                        endforeach;
                        endif;
                        if($act == 'danh-gia'):
                        ?>
                        <div class="col-md-8 col-md-offset-3">
                        <?=$data['PhanTrang']['html'];?>
                        </div>
                        <?php else:?>
                        <div class="pull-right">
                            <a href="index.php?controller=trang-chu%2Fthong-tin-khach-san&hotel=<?=$_GET['hotel'];?>&act=danh-gia"><em><small>Xem chi tiết thêm</small></em></a>
                        </div>
                        <?php endif;?>
                </div>
            </div>
        </div>