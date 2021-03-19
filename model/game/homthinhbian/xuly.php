<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

$id = $_POST['id'];

if(!$_SESSION['token']) {
    die("<script>swal('Lỗi', 'Bạn Cần Đăng Nhập', 'error');setTimeout(function(){location.href='/signin.html';}, 1500);</script>");
}

$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `homthinhbian` WHERE `id`='".$id."' AND `status`='1'"));


if($row['giatien'] > $user['money']) {
    die("<script>swal('Lỗi', 'Bạn Không Đủ Tiền để mua hòm thính này!', 'error');</script>");
}



if(!$row['id']) {
    die("<script>swal('Lỗi', 'Hòm Thính Này Không Còn Tồn Tại!', 'error');</script>");
}

    	//UPDATE Kimcuong vào acc
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `kimcuong` = `kimcuong` + '".$row['kimcuong']."' WHERE `username` = '".$user["username"]."'");
    	// Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Hòm Thính Bí Ẩn FreeFire', 'Hòm Thính Bí Ẩn FreeFire', '-".number_format($row['giatien'])."đ', 'Nhận được ".$row['kimcuong']." Kim Cương', '".time()."')");
    	// Update Tiền User
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` - '".$row['giatien']."' WHERE `username` = '".$user["username"]."'");
    	// Update Trạng thái hòm thính
    mysqli_query($kun->connect_db(),"UPDATE `homthinhbian` SET `nguoimua` = '".$user['username']."', `status`='0' WHERE `id` = '".$id."'");

    echo "<script>swal('Thông Báo!', 'Bạn Nhận Được ".$row['kimcuong']." Kim Cương Từ Hòm Thính Này!', 'success');</script>";
?>
