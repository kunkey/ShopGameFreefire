<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
require $_SERVER['DOCUMENT_ROOT'].'/lib/Pusher/Pusher.php';
$kun = new System;
$user = $kun->user();
	
	// Pusher RealTime Noti By Kunkey
	$options = array(
	    'encrypted' => true
	);
	$pusher = new Pusher(
	        '10d5ea7e7b632db09c72', 'a496a6f084ba9c65fffb', '234217', $options
	);


$myfile = fopen("log_card/log.txt", "a");
$txt = $_GET['Code']."|".$_GET['Mess']."|".number_format($_GET['CardValue'])."|".$_GET['TrxID']."\n";
fwrite($myfile, $txt);
fclose($myfile);



if($_GET['Code']) {
	    
			$code = $_GET['Code'];
			$tranid = $_GET['TrxID'];

			$get = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `tranid` = '".$tranid."' "));

 			$money = $get['amount'];


	if ($code == 1) {
			// update tiền
		 mysqli_query($kun->connect_db(), "UPDATE `users` SET `money` = `money` + '".$money."' WHERE `username` = '".$get['username']."' ");
		 	// update tiền nạp
		 mysqli_query($kun->connect_db(), "UPDATE `users` SET `money_nap` = `money_nap` + '".$money."' WHERE `username` = '".$get['username']."' ");
		 	// update trạng thái thẻ
	 	 mysqli_query($kun->connect_db(), "UPDATE `napthe` SET `status` = '1' WHERE `tranid`='".$tranid."'");   
		 	// update lịch sử giao dịch
		 mysqli_query($kun->connect_db(), "UPDATE `users` SET `diemtichluy` = `diemtichluy` + '5' WHERE `uid` = '".$get['username']."' ");
    	// Update vào lịch sử user
	     mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$get['username']."', 'Nạp Thẻ', 'Nạp Thẻ Tự Động', '+".number_format($money)."đ', 'Nạp Thẻ ".$get['type']." Thành Công!', '".time()."')");

	    // Pusher
		$data['type'] = 'success';
		$data['title'] = 'Nạp Thẻ Thành Công!';
		$data['message'] = 'Nạp Thẻ '.$get['type'].' Mệnh Giá '.number_format($money).'đ Thành Công!';
		$pusher->trigger($get['username'], 'realtime', $data);


    } else if ($code == 5) {
    	// update trạng thái thẻ
 		 mysqli_query($kun->connect_db(), "UPDATE `napthe` SET `status` = '0' WHERE `tranid`='".$tranid."'");  
 		 	// Pusher
			$data['type'] = 'error';
			$data['title'] = 'Nạp Thẻ Thất Bại!';
			$data['message'] = 'Nạp Thẻ '.$get['type'].' Mệnh Giá '.number_format($money).'đ Thất Bại!';
			$pusher->trigger($get['username'], 'realtime', $data);
	} else if ($code == 2) {
    	// update trạng thái thẻ
 		 mysqli_query($kun->connect_db(), "UPDATE `napthe` SET `status` = '0' WHERE `tranid`='".$tranid."'");  
 		 	// Pusher
			$data['type'] = 'error';
			$data['title'] = 'Nạp Thẻ Thất Bại!';
			$data['message'] = 'Nạp Thẻ '.$get['type'].' Mệnh Giá '.number_format($money).'đ Thất Bại!';
			$pusher->trigger($get['username'], 'realtime', $data);
        }else{
						echo $_GET['Mess'];
					}


				}