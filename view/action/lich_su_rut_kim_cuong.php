<?php
defined('KUNKEYPR') or exit('Restricted Access');
require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';
$xss = new Xss_Anti; 

$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `username`='".$user['username']."' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `username`='".$user['username']."'"));
?>

<div class="c-layout-sidebar-content ">
				<!-- BEGIN: PAGE CONTENT -->
				<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
				<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">Lịch sử rút kim cương</h3>
					<div class="c-line-left"></div>
				</div>

					<div class="row">


				<table class="table table-hover table-custom-res">
					<tbody>
					<tr>
						<th>ID</th>
						<th>ID GAME</th>
						<th>Kim Cương</th>
						<th>Nội Dung</th>
						<th>Trạng Thái</th>
						<th>Thời gian</th>

					</tr>

					</tbody>
					<tbody>
<?php 
	while($row = mysqli_fetch_array($result)) {
		if($row['status'] == 0) {
			$status = '<p style="color: red;">Thất Bại</p>';
		}else if($row['status'] == 1) {
			$status = '<p style="color: green;">Thành Công</p>';
		}else if($row['status'] == 2) {
			$status = '<p style="color: black;">Chờ Duyệt</p>';
		}
		?>
                                    <tr>
                                        <td>#<?php echo $xss->xss_clean($row['id']);?></td>
                                        <td><?php echo $xss->xss_clean($row['idgame']);?></td>                                        
                                        <td><span class="c-font-bold text-danger"><?php echo number_format($xss->xss_clean($row['kimcuong']));?> kc</span></td>
                                        <td><?php echo $xss->xss_clean($row['noidung']);?></td>
                                        <td><?php echo $status;?></td>
                                        <td><?php echo date('d/m H:i', $row['time']);?></td>
                                    </tr>

		<?php } ?>

                        </tbody>
                    </table>
                    <!-- END: PAGE CONTENT -->        

                  <div class="text-center">	<center>
<?php
if ($tong > $kmess){
echo '<center>' . $kun->phantrang('/user/lichsurutkimcuong/', $start, $tong, $kmess) . '</center>';
}
?></div>



                    </div>
              </div>
          </div>