<?php
if(!$kun->is_admin()) {
	 die('<center><h1>Access Denied!!!</h1></center>');
}else {
	mysqli_query($kun->connect_db(), "DELETE FROM `vongquay_kimcuong` WHERE `id`='".$_GET['id']."'");
	mysqli_query($kun->connect_db(), "DELETE FROM `vongquay_kimcuong_gift` WHERE `id_vongquay`='".$_GET['id']."'");
	echo '<script>location.href="http://kundeptrai.net/admin/?modun=vongquay_kimcuong&act=index";</script>';
}
?>