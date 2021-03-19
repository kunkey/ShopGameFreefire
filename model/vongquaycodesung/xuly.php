<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

// 1 - Thành Công
// 3 - Chưa đăng nhập
// 4 - ko đủ tiền


$vongquay = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_codesung`"));


if(!$_SESSION['token']){
	$status = 3; // false
	$msg = 'Ops! Bạn Chưa Đăng Nhập!';
}else if($user['money'] < $vongquay['giatien']){
	$status = 4; // false
	$msg = 'Bạn không đủ tiền trong tài khoản, vui lòng nạp thêm để quay!';
}else{

	require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Element.php';
	require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Randomizer.php';

	  $randomizer = new Randomizer();
  
	  $randomizer          ->add( new Element('1', $vongquay['item_1'])) 
	                       ->add( new Element('2', $vongquay['item_2'])) 
	                       ->add( new Element('3', $vongquay['item_3']))
	                       ->add( new Element('4', $vongquay['item_4'])) 
	                       ->add( new Element('5', $vongquay['item_5']))
	                       ->add( new Element('6', $vongquay['item_6'])) 
	                       ->add( new Element('7', $vongquay['item_7'])) 
	                       ->add( new Element('8', $vongquay['item_8'])) 
	                          ;
      	$kundeptrai = $randomizer->get();       
 	
$qua = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_codesung_gift`"));


		switch ($kundeptrai) {
		    case '1':
		    $location = 360;
		    $gift = 'Ak47 Giác Đấu';
		    $code =  $qua['item_1'];
		        break;
		    case '2':
		    $location = 320;     
		    $gift = 'Scar Titan';   
		    $code =  $qua['item_2'];
		        break;
		    case '3':
		    $location = 270;
		    $gift = 'Thêm 30% Trúng'; 
		    $code =  $qua['item_3'];       
		        break;
		    case '4':
		    $location = 230; 
		    $gift = 'M1014 Địa Ngục'; 
		    $code =  $qua['item_4'];      
		        break;
		    case '5':
		    $location = 180;
		    $gift = 'Mp40 Sấm Sét';  
		    $code =  $qua['item_5'];     
		        break;
		    case '6':
		    $location = 130;   
		    $gift = 'Ak47 Tình Yêu';    
		    $code =  $qua['item_6']; 
		        break;
		    case '7':
		    $location = 85;
		    $gift = 'Ak47 Hỏa Kỳ Lân';
		    $code =  $qua['item_7'];        
		        break;
		    case '8':
		    $location = 44;   
		    $gift = 'XM8 Cá Mập Vàng';   
		    $code =  $qua['item_8'];  
		        break;
		    default:
		    $location = ""; 
		    $gift = '';  
		        break;
		}

	$status = 1; // true

    $msg = $gift;

    	// Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Vòng Quay Code Súng', '".$code."', '-".number_format($vongquay['giatien'])."đ', 'Nhận được Code ".$gift."', '".time()."')");
    	// Update Tiền User
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` - '".$vongquay['giatien']."' WHERE `username` = '".$user["username"]."'"); 

}


echo json_encode(array('status' => $status, 'item' => $kundeptrai,'location' => $location, 'msg' =>'Bạn Nhận Được '.$msg));