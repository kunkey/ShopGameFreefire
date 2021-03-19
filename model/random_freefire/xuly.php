<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

$id = addslashes($_POST['id']);

if(!$_SESSION['token']) {
    die("<script>swal('Lỗi', 'Bạn Cần Đăng Nhập', 'error');setTimeout(function(){location.href='/signin.html';}, 1500);</script>");
}

$thread = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `id`='".$id."' AND `status`='true'"));

//echo var_dump($thread);

if(!$thread['id']) {
    die("<script>swal('Lỗi', 'Random Này Không Còn Tồn Tại!', 'error');</script>");
}

$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` WHERE `cname`='".$thread['cname']."'"));
//echo var_dump($row);

if($row['giatien'] > $user['money']) {
    die("<script>swal('Lỗi', 'Bạn Không Đủ Tiền để mua random này!', 'error');</script>");
}


    	// Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Mua Acc Random', '".$thread['id']."', '-".number_format($row['giatien'])."đ', 'Mua Acc #".$id." Loại ".$row['name']."', '".time()."')");


    	// Update Tiền User
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` - '".$row['giatien']."' WHERE `username` = '".$user["username"]."'");
    	// Update Trạng thái hòm thính
    mysqli_query($kun->connect_db(),"UPDATE `random_freefire_nick` SET `nguoimua` = '".$user['username']."', `status`='false', `time`='".time()."' WHERE `id` = '".$id."'");

    echo "<script>swal('Thông Báo!', 'Nhận Thưởng Thành Công! Vui Lòng Kiểm tra Kết Quả Random tại mục Random Đã Mua!', 'success');</script>";
?>
