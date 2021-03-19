<?php
 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

?>




<div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">Đăng Kí Hôm Nay</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $kun->thong_ke_today('user');?>" data-speed="15" data-fresh-interval="20"><?php echo $kun->thong_ke_today('user');?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">Thẻ Nạp Hôm Nay</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $kun->thong_ke_today('napthe');?>" data-speed="1000" data-fresh-interval="20"><?php echo $kun->thong_ke_today('napthe');?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">event_available</i>
                        </div>
                        <div class="content">
                            <div class="text">Thẻ Đúng Hôm Nay</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $kun->thong_ke_today('napthedung');?>" data-speed="1000" data-fresh-interval="20"><?php echo $kun->thong_ke_today('napthedung');?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_atm</i>
                        </div>
                        <div class="content">
                            <div class="text">Thu Nhập Hôm Nay</div>
                            <div class="number"><?php echo number_format($kun->thong_ke_today('thunhaphomnay'));?>đ</div>
                        </div>
                    </div>
                </div>
</div>







<div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">Tổng Thành Viên</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $kun->thong_ke_he_thong('user');?>" data-speed="15" data-fresh-interval="20"><?php echo $kun->thong_ke_he_thong('user');?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">Tổng Thẻ Nạp</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $kun->thong_ke_he_thong('napthe');?>" data-speed="1000" data-fresh-interval="20"><?php echo $kun->thong_ke_he_thong('napthe');?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">event_available</i>
                        </div>
                        <div class="content">
                            <div class="text">Tổng Thẻ Đúng</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $kun->thong_ke_he_thong('napthedung');?>" data-speed="1000" data-fresh-interval="20"><?php echo $kun->thong_ke_he_thong('napthedung');?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_atm</i>
                        </div>
                        <div class="content">
                            <div class="text">Tổng Thu Nhập</div>
                            <div class="number"><?php echo number_format($kun->thong_ke_he_thong('thunhap'));?>đ</div>
                        </div>
                    </div>
                </div>
</div>















<div class="row clearfix">




                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Thống Kê Truy Cập Url</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>Thời Gian</th>
                                            <th>Người Dùng</th>
                                            <th>Access</th>
                                            <th>IP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            <?php
            $array = $kun->parse_access_url();

            for($i=1;$i<=10;$i++) {
                
                ?>
                                        <tr>
                                            <td><?php echo $kun->time_ago($array[$i]['time']); ?></td>
                                            <td><?php echo $array[$i]['username']; ?></td>
                                            <td><?php echo $array[$i]['url']; ?></td>
                                            <td><?php echo $array[$i]['ip']; ?></td>
                                        </tr>
                <?php
                } 
                ?>

                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->




                <!-- Giao Dịch Gần Đây -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Giao Dịch Gần Đây</h2>
                        </div>
                        <div class="body">




                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>Thời Gian</th>
                                            <th>Người Dùng</th>
                                            <th>Hoạt Động</th>
                                            <th>Mô Tả</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql = mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` ORDER BY `time` DESC LIMIT 0,10");
    while ($row = mysqli_fetch_array($sql)) {
    	$is_new = $row['time'] + 300;
    	if($is_new > time()) $new = 'class="active"'; else $new = '';
     ?>
                                        <tr <?php echo $new;?>>
                                            <td><?php echo date('H:i d/m', $row['time']);?></td>
                                            <td><?php echo $row['username'];?></td>
                                            <td><?php echo $row['action'];?></td>
                                            <td><?php echo $row['mota'];?></td>
                                        </tr>
<?php } ?>



                                    </tbody>
                                </table>
                            </div>





                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>            