<?php
// Kiểm tra trạng thái cài đặt website
if (!(file_exists('config.php'))) {   
header("Location: /install");            
}

 // Define Chống vào thẳng file
define("KUNKEYPR", true); // gán defined chống khách vào thẳng file

 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user(); // gọi giá trị user đang login

	// web setting

$_logo = $kun->settings('logo');
$_banner = $kun->settings('banner');
$_title = $kun->settings('title');
$_admin = $kun->settings('admin');
$_color = $kun->settings('color');
$_thongbao = $kun->settings('thongbao');


	// Title

$exec_url = $_SERVER['REQUEST_URI'];
	
	if($exec_url == '/' || $exec_url == '/home' || $exec_url == '/index.php' || $exec_url == '/index.html') {
		$title = $_title['title'].' - '.$_title['name'];
	}else if ($kun->tim_chuoi($exec_url, 'vongquaykimcuong')) {
		$title = 'Vòng Quay Kim Cương';
	}else if ($kun->tim_chuoi($exec_url, 'homthinhbian')) {
		$title = 'Hòm Thính Bí Ẩn';
	}else if ($kun->tim_chuoi($exec_url, 'vanmaybingo')) {
		$title = 'Vận May Bingo';
	}else if ($kun->tim_chuoi($exec_url, 'nickfreefire')) {
		$title = 'Tài Khoản FreeFire';
	}else if ($kun->tim_chuoi($exec_url, 'napthe')) {
		$title = 'Nạp Thẻ';
	}else if ($kun->tim_chuoi($exec_url, 'doimatkhau')) {
		$title = 'Đổi Mật Khẩu';
	}else if ($kun->tim_chuoi($exec_url, 'lichsugiaodich')) {
		$title = 'Lịch Sử Giao Dịch';
	}else if ($kun->tim_chuoi($exec_url, 'lichsunapthe')) {
		$title = 'Lịch Sử Nạp Thẻ';
	}else if ($kun->tim_chuoi($exec_url, '/user/rutkimcuong')) {
		$title = 'Rút Kim Cương Freefire';
	}else if ($kun->tim_chuoi($exec_url, 'lichsurutkimcuong')) {
		$title = 'Lịch Sử Rút Kim Cương Freefire';
	}else if ($kun->tim_chuoi($exec_url, 'rutkimcuong')) {
		$title = 'Rút Kim Cương Freefire';
	}else if ($kun->tim_chuoi($exec_url, 'user/accfreefire')) {
		$title = 'Tài Khoản Freefire Đã Mua';
	}else if ($kun->tim_chuoi($exec_url, '/user/thongtin')) {
		$title = 'Thông Tin Tài Khoản';
	}else if ($kun->tim_chuoi($exec_url, '/user/doimatkhau')) {
		$title = 'Đổi Mật Khẩu';
	}else if ($kun->tim_chuoi($exec_url, '/user/lichsugiaodich')) {
		$title = 'Lịch Sử Giao Dịch';
	}else if ($kun->tim_chuoi($exec_url, '/user/napthe')) {
		$title = 'Nạp Thẻ';
	}else if ($kun->tim_chuoi($exec_url, '/user/lichsunapthe')) {
		$title = 'Lịch Sử Nạp Thẻ';
	}else if ($kun->tim_chuoi($exec_url, '/latthe')) {
		$title = 'Lật Hình May Mắn';
	}else if ($kun->tim_chuoi($exec_url, '/sieucap')) {
		$title = 'Vòng Quay Siêu Cấp'; 
	}else if ($kun->tim_chuoi($exec_url, '/random-freefire/')) {
		$title = 'Random Nick Freefire';
	}else if ($kun->tim_chuoi($exec_url, '/user/random-freefire')) {
		$title = 'Nick Random Nick Freefire Đã Mua';
	}else if ($kun->tim_chuoi($exec_url, '/signin.html')) {
		$title = 'Đăng Nhập';
	}else if ($kun->tim_chuoi($exec_url, '/register.html')) {
		$title = 'Đăng Kí';
	}else if ($kun->tim_chuoi($exec_url, 'vongquaycodesung.html')) {
		$title = 'Vòng Quay Code Súng';
	}



 // một vài cái linh tinh
$token = $_SESSION['token'];
if($token) $btn_login = $user['name'].' - <o id="head_money">'.number_format($user['money']).'</o> vnd'; else $btn_login = "Đăng nhập";
if($token) $btn_reg = "Đăng Xuất"; else $btn_reg = "Đăng Kí";
if($token) $href_login = '/user/thongtin'; else $href_login = "/signin.html";
if($token) $href_reg = "/signout.html"; else $href_reg = "/register.html";
if($kun->is_admin()) $btn_admin = '<li><a href="/admin" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-white c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> Admin Panel</a></li>'; else $btn_admin = '';

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
