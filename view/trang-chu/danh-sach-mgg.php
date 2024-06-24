<?php
//print_r($data);
?>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách mã giảm giá</div>
                    <div class="panel-body">
                       <div class="table-reponsive">
                           <table class="table table-bordered">
                               <thead>
                                    <th>STT</th>
                                    <th>Mã</th>
                                    <th class="text-right">Giảm giá</th>
                                    <th class="text-center">Thời gian bắt đầu</th>
                                    <th class="text-center">Thời gian kết thúc</th>
                                    <th>Áp dụng cho</th>
                                    <th>Trạng thái</th>
                               </thead>
                               <tbody>
                                   
                                   <?php
                                    $i = ($data['PhanTrang']['pageHienTai']-1)*$this->soHangTrenPage +1;
                                    //echo date("Y-m-d");
                                    $time = strtotime(date("Y-m-d",time()));
                                    if(!empty($data['DanhSachMgg'])):
                                    foreach($data['DanhSachMgg'] as $gt):
                                        $ten = '<span class="label label-success">Tất cả</span>';
                                        $status = '<label class="label label-success">OK</label>';
                                        if($gt['SL'] <= 20){
                                            $status = '<label class="label label-warning">Sắp hết lượt sử dụng</label>';
                                        }else if($gt['SL'] <= 0){
                                            $status = '<label class="label label-danger">Hết lượt sử dụng</label>';
                                        }else if(strtotime($gt['NgayBatDau']) > $time){
                                            $status = '<label class="label label-primary">Chưa đến ngày bắt đầu</label>';
                                        }else if(strtotime($gt['NgayHetHan']) < $time){
                                            $status = '<label class="label label-danger">Đã hết hạn</label>';
                                        }

                                        if($gt['Loai'] == 0){
                                            $ten = '<a class="label label-default" href="index.php?controller=trang-chu/thong-tin-khach-san&hotel='.$gt['MKs'].'" target="_blank">'.$gt['TenKs'].'</a>';
                                        }
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><span class="badge"><?=$gt['Ma'];?></span></td>
                                        <td class="text-right"><span class="badge"><?=$gt['Giam'];?>%</span> </td>
                                        <td class="text-center"><?=$this->DinhDangNgay($gt['NgayBatDau'],1);?></td>
                                        <td class="text-center"><?=$this->DinhDangNgay($gt['NgayHetHan'],1);?></td>
                                        <td><?=$ten;?></td>
                                        <td><?= $status;?></td>
                                    </tr>  
                                    <?php $i++; endforeach; endif;?>
                               </tbody>
                           </table>
                       </div> 
                    </div>
            </div>
        </div>
        <!-- Phân trang -->
			<div class="col-xs-12 col-md-12 text-center">
				<?=$data['PhanTrang']['html'];?>
			</div>
			<!-- Phân trang/ -->
    </div>
</div>