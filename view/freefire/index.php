<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kmess = 16; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `status`='1' AND `nguoimua`='null' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `status`='1' AND `nguoimua`='null'"));
?>





<div class="col-sm-12" style="margin-top: 30px;">



<div class="alert alert-info" role="alert">
<h2 class="alert-heading">Free Fire - FF</h2>
<p></p><ul>
<li>Game <strong><a href="https://ff.garena.vn/" target="_blank"><span style="color:#e74c3c">Free Fire</span></a></strong><span style="color:#e74c3c">&nbsp;</span>thuộc thể loại game mobile nhập do <a href="https://www.garena.vn/" target="_blank"><span style="color:#e74c3c"><strong>GARENA</strong></span></a>&nbsp;độc quyền phát hành tại Việt Nam.</li>
<li><strong><a href="https://nick.vn/vinagame/free-fire-ff" target="_blank">Web Mua Bán Nick FF - Free Fire&nbsp;UY TÍN - GIÁ RẺ</a></strong>&nbsp;của&nbsp;<strong><a href="https://www.facebook.com/quanplay.9/" target="_blank">Quanplay</a> - </strong>chủ <strong><a href="https://webnick.vn/" target="_blank">WEBNICK.VN</a> ( Website mua bán nick liên quân - LMHT lớn nhất Việt Nam )&nbsp;</strong>.&nbsp;<strong><a href="https://nick.vn/vinagame/free-fire-ff" target="_blank">Shop bán acc - tài khoản FF VIP</a></strong>.&nbsp;</li>
<li>Ngoài <strong>mua&nbsp;bán nick lq</strong>&nbsp;website còn <strong><a href="https://nick.vn/mua-the" target="_blank"><span style="color:#e74c3c">bán thẻ Garena</span></a></strong><span style="color:#e74c3c">&nbsp;,</span><strong><a href="https://nick.vn/dich-vu/ban-kim-cuong-free-fire" target="_blank"><span style="color:#e74c3c">Bán Kim Cương Free Fire giá rẻ</span></a></strong>,<a href="https://nick.vn/mua-ban-nick-game-random" target="_blank"> <strong>bán acc Free Fire random</strong></a> chỉ từ 12k - 18k -60k và rất nhiều dịch vụ khác về <strong><a href="https://www.facebook.com/freefirevn/" target="_blank">game Free Fire</a></strong></li>
</ul><p></p>
</div>

<style type="text/css">
.row-flex-safari .classWithPad {
    height: 347px;
    max-height: 360px;
}

</style>



<div class="row row-flex  item-list">

<?php 
while ($row = mysqli_fetch_array($result)) { ?>



	<div class="col-sm-6 col-md-3">
		<div class="classWithPad">
			<div class="image">
			<a href="/nickfreefire/nick-<?php echo $row['id'];?>.html">
			<img src="<?php echo $kun->get_thumb_freefire($row['id']);?>">
			<span class="ms">Acc: #<?php echo $row['id'];?></span>
			</a>
			</div>
			<div class="description">
				<?php echo $row['noibat'];?>
			</div>

			<div class="attribute_info">
			<div class="row">
				<div class="col-xs-6 a_att">
				Tỉ lệ: <b>100% trúng</b>
				</div>
				<div class="col-xs-6 a_att">
				Thể loại: <b>Random</b>
				</div>
				<div class="col-xs-6 a_att">
				Tỉ lệ: <b>100% trúng</b>
				</div>
				<div class="col-xs-6 a_att">
				Tỉ lệ: <b>100% trúng</b>
				</div>
			<div class="a-more">
			<div class="row">
			<div class="col-xs-6">
				<div class="price_item">
					<?php echo number_format($row['giatien']);?>đ
				</div>
			</div>
			<div class="col-xs-6 ">
			  	<div class="price_item" style="border: 1px solid #089dff;color: #423838;">
					<a href="/nickfreefire/nick-<?php echo $row['id'];?>.html">Xem Thêm</a>
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
echo '<center>' . $kun->phantrang('/nickff/', $start, $tong, $kmess) . '</center>';
}
?>
	</center>
</div>

</div>


</div>

