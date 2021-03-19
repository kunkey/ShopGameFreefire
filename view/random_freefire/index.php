<?php
defined('KUNKEYPR') or exit('Restricted Access');

// phân trang trang 2 trở đi bị lỗi nên phải thêm đoạn này
if($kun->tim_chuoi($_GET['cname'], '/page=')) {
	$exp = explode("/page=", $_GET['cname']);
	$_GET['cname'] = $exp[0];
	$_REQUEST['page'] = $exp[1];
}


$kmess = 16; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $thread = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` WHERE `cname`='".$_GET['cname']."'"));

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `status`='true' AND `cname`='".$_GET['cname']."' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `status`='true' AND `cname`='".$_GET['cname']."'"));
?>





<div class="col-sm-12">



<div class="alert alert-info" role="alert">
<h2 class="alert-heading"><?php echo strtoupper($thread['name']);?> [GIÁ: <b><?php echo number_format($thread['giatien']);?>đ</b>]</h2>
<p></p><ul>
<li><strong>Random FreeFire</strong>&nbsp;là cách giúp bạn nhận được ngẫu nhiên nick freefire mà không cần phải cày cuốc game!</li>
<li>100% Nhận Được Acc</li>
<li>10% Acc Free Fire Víp</li>
<li>30% Nhận Gói Nạp 2000 Kim Cương</li>
<li>20% Nhận Gọi Nạp 3500 Kim Cương</li>
<li>40% Nhận Gói Nạp Kim Cương Bất Kỳ</li>
</ul><p></p>
</div>

<style type="text/css">
.row-flex-safari .classWithPad {
    height: 307px;
    max-height: 360px;
}
</style>



<div class="row row-flex  item-list">

<?php 
while ($row = mysqli_fetch_array($result)) { ?>



	<div class="col-sm-6 col-md-3">
		<div class="classWithPad">
			<div class="image">
			<a href="#" class="load-modal" rel="/buyruby/201059">

			<img src="https://i.imgur.com/ziiRUw0.gif">
			<span class="ms">MS: #<?php echo $row['id'];?></span>
			</a>
			</div>


			<div class="attribute_info">
			<div class="row">
			<div class="col-xs-6 a_att">
			Tỉ lệ: <b>100% trúng</b>
			</div>
			<div class="col-xs-6 a_att">
			Thể loại: <b>Random</b>
			</div>

			<div class="a-more">
			<div class="row">
			<div class="col-xs-6">
			<div class="price_item">
			<?php echo number_format($thread['giatien']);?>đ
			</div>
			</div>
			<div class="col-xs-6 ">
			<div class="view">
			<a href="#" class="load-modal" onclick="getdata('<?php echo $row['id'];?>')">Mua ngay</a>
			</div>
			</div>


			</div>
			</div>


			</div>
			</div>
		</div>
	</div>

<?php } ?>

<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
	<center>
<?php
if ($tong > $kmess){
echo '<center>' . $kun->phantrang('/random-freefire/'.$_GET['cname'].'/', $start, $tong, $kmess) . '</center>';
}
?>
	</center>
</div>

</div>


</div>

<style type="text/css">
	.modal-dialog {
    top: 180;
}
</style>

<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>



<script type="text/javascript">
	function getdata(id) {
		var curModal = $('#LoadModal');
		curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/img/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");


			$.ajax({
                method: "POST",
                url: "/model/random_freefire/laythongtin.php",
                data: {
                    id: id
                },
                success : function(response){
					curModal.modal('show').find('.modal-content').html(response);
                }
            });



	}
</script>