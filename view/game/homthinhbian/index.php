<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kmess = 16; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `homthinhbian` WHERE `status`='1' AND `nguoimua`='null' ORDER BY RAND() LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM homthinhbian WHERE `status`='1' AND `nguoimua`='null'"));
?>





<div class="col-sm-12">



<div class="alert alert-info" role="alert">
                    <h2 class="alert-heading">Hòm Thính Bí Ẩn</h2>
                    <p><p>Anh em sẽ nhận ngẫu nhi&ecirc;n kim cương 100% nhận được</p>

<p>Kim cương từ 50-10000&nbsp;kc</p>

<p>Tỉ lệ kim cương nhiều cao.</p>

<p>Ch&uacute;c Anh Em May Mắn !</p></p>
                </div>
            </div>
        </div>

<style type="text/css">
.row-flex-safari .classWithPad {
    height: 307px;
    max-height: 360px;
}
</style>



<div class="row item-list">

<?php 
while ($row = mysqli_fetch_array($result)) { ?>



	<div class="col-sm-6 col-md-3">
		<div class="classWithPad">
			<div class="image">
			<a href="#" class="load-modal" rel="/buyruby/201059">

			<img src="https://i.imgur.com/VOssMlG.gif">
			<span class="ms">MS: <?php echo $row['id'];?></span>
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
			<?php echo number_format($row['giatien']);?>đ
			</div>
			</div>
			<div class="col-xs-6 ">
			<div class="view" style="background-image: url(/images/bgbtn.png) !important;background-size: 100% 100% !important;background-position: center;color: #000;">
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
echo '<center>' . $kun->phantrang('/homthinhbian/', $start, $tong, $kmess) . '</center>';
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
                url: "/model/game/homthinhbian/laythongtin.php",
                data: {
                    id: id
                },
                success : function(response){
					curModal.modal('show').find('.modal-content').html(response);
                }
            });



	}
</script>