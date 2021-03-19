<?php
error_reporting(1);

 // DEfine Chống vào thẳng file
define("KUNKEYPR", true); // gán defined chống khách vào thẳng file

 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();
$root = $_SERVER['DOCUMENT_ROOT'].'/admin';


if(empty($_SESSION['token'])) {
 die('<center><h1>Login???</h1></center>');
}else {
	if(!$kun->is_admin()) {
  		die('<center><h1>Access Denied!!!</h1></center>');
 	}	
	if($kun->is_admin()) {
		require $root.'/view/header.php';

			if(!$_GET['modun'] && !$_GET['act']) {
			    require $root.'/view/index.php';
			}else {
				$modun = $_GET['modun'];
				$act = $_GET['act'];

						if (file_exists($root.'/view/'.$modun.'/'.$act.'.php')){
			    			require $root.'/view/'.$modun.'/'.$act.'.php';
						}else{
						    echo "<center>404 - Not Found</center>";
						}
			}

	    require $root.'/view/footer.php';
	}
}


