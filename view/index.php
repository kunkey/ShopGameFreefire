<?php
	if($kun->is_mobile()) {
		if($kun->hienthi_web('napthe_mobile') == 1) {
			require $root.'/view/Widget/Top_Widget.php';			
		}
	}else {		
		if($kun->hienthi_web('napthe_pc') == 1) {
			require $root.'/view/Widget/Top_Widget.php';			
		}
	}
?>


<?php if($kun->hienthi_web('vongquay') == 1) { ?>

<style type="text/css">
.classWithPad2:hover {
    transform: scale(1.05);
    box-shadow: 0px 0px 15px #192231;
    transition: all 0.3s;
}
</style>



<div class="c-content-box c-size-md c-bg-dark" style="background-color: rgb(0 0 0 / 60%) !important;">
<div class="container">

<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">

<div class="c-content-title-1">
<h3 class="c-center c-font-uppercase c-font-bold">Vòng quay may mắn</h3>
<div class="c-line-center c-theme-bg"></div>
</div>

<div class="row row-flex-safari item-list">



<?php 
	$res = mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong` ORDER BY `id` DESC");
	while ($row = mysqli_fetch_array($res)) {
		if($row['status'] == 'true') {
	 ?>

<div class="col-sm-3 col-xs-6 p-5">
	<div class="classWithPad2">
		<div class="image2">
			<a href="/vongquaykimcuong/<?php echo $kun->rewrite($row['name'])?>-<?php echo $row['id'];?>.html" class="">
				<img src="<?php echo $kun->vongquaykimcuong_image($row['id'], 'thumb');?>"></a>
				</div>
					<div class="news_title"><a href="/vongquaykimcuong/<?php echo $kun->rewrite($row['name'])?>-<?php echo $row['id'];?>.html"><?php echo $row['name'];?></a></div>
						<div class="news_description">
						<p>Đã quay: <?php echo number_format($row['sudung'])?></p>
						</div>
					<div class="a-more">
					<div class="row">
					<div class="col-xs-12">
					<div class="view">
						<a href="/vongquaykimcuong/<?php echo $kun->rewrite($row['name'])?>-<?php echo $row['id'];?>.html">Quay Ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<?php } } ?>


</div>

</div>

</div>

</div>

<?php } ?>


<?php if($kun->hienthi_web('dichvu') == 1) { ?>

<div class="c-content-box c-size-md c-bg-dark" style="background-color: rgb(0 0 0 / 60%) !important;">
<div class="container">

<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">

<div class="c-content-title-1">
<h3 class="c-center c-font-uppercase c-font-bold">Dịch Vụ FreeFire</h3>
<div class="c-line-center c-theme-bg"></div>
</div>

<div class="row row-flex-safari item-list">



<?php if($kun->hienthi_game('sieucapff') == 1) { ?>
<div class="col-sm-3 col-xs-12 p-5">
	<div class="classWithPad">
		<div class="image">
			<a href="/sieucap" class="">
				<img src="<?php echo $kun->hinhanh_game('sieucapff');?>"></a>
				</div>
					<div class="news_title"><a href="/sieucap">Vòng Quay Giải Cứu Thế Giới 19k</a></div>
						<div class="news_description">
						<p>Tỷ Lệ Trúng: 100%</p>
						</div>
					<div class="a-more">
					<div class="row">
					<div class="col-xs-12">
					<div class="view">
						<a href="/sieucap">Quay Ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php } ?>






<?php if($kun->hienthi_game('lattheff') == 1) { ?>
<div class="col-sm-3 col-xs-12 p-5">
	<div class="classWithPad">
		<div class="image">
			<a href="/latthe" class="">
				<img src="<?php echo $kun->hinhanh_game('lattheff');?>"></a>
				</div>
					<div class="news_title"><a href="/latthe">Lật Hình May Mắn</a></div>
						<div class="news_description">
						<p>Tỷ Lệ Trúng: 100%</p>
						</div>
					<div class="a-more">
					<div class="row">
					<div class="col-xs-12">
					<div class="view">
						<a href="/latthe">Lật Ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php } ?>

<?php if($kun->hienthi_game('homthinhff') == 1) { ?>
<div class="col-sm-3 col-xs-12 p-5">
	<div class="classWithPad">
		<div class="image">
			<a href="/homthinhbian" class="">
				<img src="<?php echo $kun->hinhanh_game('homthinhff');?>"></a>
				</div>
					<div class="news_title"><a href="/homthinhbian">HÒM THÍNH BÍ ẨN</a></div>
						<div class="news_description">
						<p>Đang Bán: <?php echo $kun->demhomthinhbian('conlai');?></p>
						</div>
					<div class="a-more">
					<div class="row">
					<div class="col-xs-12">
					<div class="view">
						<a href="/homthinhbian">Nhặt Ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php } ?>

<?php if($kun->hienthi_game('vanmayff') == 1) { ?>
<div class="col-sm-3 col-xs-12 p-5">
	<div class="classWithPad">
		<div class="image">
			<a href="/vanmaybingo" class="">
				<img src="<?php echo $kun->hinhanh_game('vanmayff');?>"></a>
				</div>
					<div class="news_title"><a href="/vanmaybingo">VÒNG QUAY BINGO TẾT THIẾU NHI 20K</a></div>
						<div class="news_description">
							<p>Tỷ Lệ Trúng: 100%</p>
						</div>
					<div class="a-more">
					<div class="row">
					<div class="col-xs-12">
					<div class="view">
						<a href="/vanmaybingo">Chơi Ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php } ?>

<?php if($kun->hienthi_game('banaccff') == 1) { ?>
<div class="col-sm-3 col-xs-12 p-5">
	<div class="classWithPad">
		<div class="image">
			<a href="/nickfreefire" class="">
				<img src="<?php echo $kun->hinhanh_game('banaccff');?>"></a>
				</div>
					<div class="news_title"><a href="/nickfreefire">Nick Free Fire Giá Rẻ</a></div>
						<div class="news_description">
						<p>Đang Bán: <?php echo $kun->count_acc_ff('conlai');?> Acc</p>
						</div>
					<div class="a-more">
					<div class="row">
					<div class="col-xs-12">
					<div class="view">
						<a href="/nickfreefire">Mua Ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php } ?>





<?php if($kun->hienthi_game('codesungff') == 1) { ?>
<div class="col-sm-3 col-xs-12 p-5">
	<div class="classWithPad">
		<div class="image">
			<a href="/vongquaycodesung.html" class="">
				<img src="<?php echo $kun->hinhanh_game('codesungff');?>"></a>
				</div>
					<div class="news_title"><a href="/vongquaycodesung.html">Vòng Quay Code Súng</a></div>
						<div class="news_description">
						<p>Đã quay: 12.602</p>
						</div>
					<div class="a-more">
					<div class="row">
					<div class="col-xs-12">
					<div class="view">
						<a href="/vongquaycodesung.html">Quay Ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php } ?>







</div>
</div>
</div>
</div>


<?php } ?>







<?php if($kun->hienthi_web('random') == 1) { ?>

<div class="c-content-box c-size-md c-bg-dark" style="background-color: rgb(0 0 0 / 60%) !important;">
<div class="container">

<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">

<div class="c-content-title-1">
<h3 class="c-center c-font-uppercase c-font-bold">Random Freefire</h3>
<div class="c-line-center c-theme-bg"></div>
</div>

<style type="text/css">
#classWithPad {
    height: 320px;
    max-height: 340px;
}
</style>

<div class="row row-flex  item-list">


<?php 
	$res = mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` ORDER BY `id` DESC");
	while ($row = mysqli_fetch_array($res)) {
		if($row['status'] == 'true') {
			$count = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `status`='true' AND `cname`='".$row['cname']."'"));
	 ?>


	<div class="col-sm-6 col-md-3 col-lg-3">
		<div class="classWithPad" id="classWithPad">
			<div class="image">
			<a href="/random-freefire/<?php echo $row['cname'];?>">
			<img src="<?php echo $row['thumb'];?>">
			<span class="ms">Giá: <?php echo number_format($row['giatien'])?>đ</span>
			</a>
			</div>

			<div class="attribute_info">
					<div class="news_title"><a href="/random-freefire/<?php echo $row['cname'];?>"><?php echo $row['name'];?></a></div>
						<div class="news_description">
						<p>Còn Lại: <?php echo number_format($count)?></p>
						</div>
			<div class="a-more">
			<div class="row">
			<div class="col-xs-12">
					<div class="view">
						<a href="/random-freefire/<?php echo $row['cname'];?>">Mua Ngay</a>
					</div>
			</div>


			</div>
			</div>


			</div>
			</div>
		</div>

	<?php } } ?>

</div>

</div>

</div>

</div>

<?php } ?>







