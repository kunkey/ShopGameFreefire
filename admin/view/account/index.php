<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);


 $sql = mysqli_query($kun->connect_db(), "SELECT * FROM `users` ORDER BY `time` DESC LIMIT $start, $kmess");
 $tong1 = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `users`"));
?>


<div class="row clearfix">



<?php 


if(isset($_POST['congtienpost'])) {
	if(isset($_POST['id_user'])) {
		mysqli_query($kun->connect_db(), "UPDATE `users` SET `money` = '".$_POST['money']."', `kimcuong`='".$_POST['kimcuong']."' WHERE `id` = '".$_POST['id_user']."'");
		echo '<div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Thao tác Thành công!
		</div>';
		echo '<meta http-equiv="refresh" content="1;URL=" /> ';
	}else {
        echo '<div class="alert alert-danger fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>FAIL!</strong> Vui lòng nhập đủ thông tin</div>';
	}
}




if(isset($_POST['congtien'])) {
	if(isset($_POST['id'])) {
		$current_user = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `id`='".$_POST['id']."'"));
		?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Cộng Tiền & Kim Cương Cho User "<?php echo strtolower($current_user['username']);?>"
                            </h2>
                        </div>
                        <div class="body" style="height: 370px;">
		                    <form method="post" action="">
	                           <input type="hidden" name="id_user" value="<?php echo $current_user['id'];?>">
		                    	<div class="col-lg-4 col-sm-12 col-md-4">
	                                <label for="username">Username</label>
	                                <div class="form-group">
	                                    <div class="form-line">

	                                        <input name="username" type="text" class="form-control" value="<?php echo $current_user['username'];?>" readonly>
	                                    </div>
	                                </div>
								</div>

		                    	<div class="col-lg-4 col-sm-12 col-md-4">
	                                <label for="username">Tiền Hiện Tại</label>
		                                <div class="form-group">
		                                    <div class="form-line">
		                                        <input name="money" type="text" class="form-control" value="<?php echo $current_user['money'];?>" required>
		                                    </div>
		                                </div>
								</div>

		                    	<div class="col-lg-4 col-sm-12 col-md-4">
	                                <label for="username">Kim Cương Hiện Tại</label>
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name="kimcuong" type="text" class="form-control" value="<?php echo $current_user['kimcuong'];?>" required>
	                                    </div>
	                                </div>
								</div>



		                    <div class="col-lg-12 col-sm-12 col-md-12">								
                                <center><button type="submit" name="congtienpost" class="btn btn-primary m-t-15 waves-effect">THAY ĐỔI</button></center>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

	<?php
	}else {
        echo '<div class="alert alert-danger fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>FAIL!</strong> Vui lòng nhập đủ thông tin</div>';
	}
}
?>






















                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>DANH SÁCH THÀNH VIÊN</b>
                            </h2>
                        </div>
                        <div class="body">



<div class="table-responsive">  
<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
	   <th>ID #</th>
	   <th>Tài Khoản</th>
	   <th>Họ tên</th>
     <th>Email</th>
	   <th>Tiền</th>
     <th>Tiền Nạp</th>
	   <th>Kim Cương</th>
     <th>Quân Huy</th>
     <th>Địa Chỉ IP</th>
	   <th>Hành động</th>
   </tr>
</thead>
<tbody>
  <?php
    while ($row = mysqli_fetch_array($sql)) { ?>
<tr>
   <th scope="row">#<?php echo $row['id'];?></th>
   <td><?php echo $row['username'];?></td>
   <td><?php echo $row['name'];?></td>
   <td><?php echo $row['email'];?></td>
   <td><?php echo number_format($row['money']);?><sup>đ</sup></td>
   <td><?php echo number_format($row['money_nap']);?><sup>đ</sup></td>
   <td><?php echo number_format($row['kimcuong']);?></td>
   <td><?php echo number_format($row['quanhuy']);?></td>   
   <td><?php echo $row['ip'];?></td>      
   <td>
    <div class="col-md-3 col-sm-3">
    <form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
      <button type="submit" name="congtien" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duyệt thẻ" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info">+Tiền/KC</button>
    </form>
       </div>
  </td>
</tr> 
    <?php
    }
    ?>


</tbody>
</table>
<!-- Phần hiển thị Nick -->
</div>
<?php
if ($tong1 > $kmess){
echo '<center>' . $kun->phantrang('/admin/users/', $start, $tong1, $kmess) . '</center>';
}
?>
</div>
</div>

</div></div>