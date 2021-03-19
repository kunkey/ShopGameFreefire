<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

$id = base64_decode(base64_decode(base64_decode($_POST['csrf'])));

$vongquay = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong` WHERE `id`='".$id."'"));
if(!$vongquay) die(json_encode(array('status' => false,'item' => '','location' => '', 'msg' => 'Lỗi hệ thống!')));


// 1 - Thành Công
// 3 - Chưa đăng nhập
// 4 - ko đủ tiền


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
  
	  $randomizer          ->add( new Element('1', $kun->vongquaykimcuong_gift($id, 1, 'tyle'))) 
	                       ->add( new Element('2', $kun->vongquaykimcuong_gift($id, 2, 'tyle'))) 
	                       ->add( new Element('3', $kun->vongquaykimcuong_gift($id, 3, 'tyle')))
	                       ->add( new Element('4', $kun->vongquaykimcuong_gift($id, 4, 'tyle'))) 
	                       ->add( new Element('5', $kun->vongquaykimcuong_gift($id, 5, 'tyle')))
	                       ->add( new Element('6', $kun->vongquaykimcuong_gift($id, 6, 'tyle'))) 
	                       ->add( new Element('7', $kun->vongquaykimcuong_gift($id, 7, 'tyle'))) 
	                       ->add( new Element('8', $kun->vongquaykimcuong_gift($id, 8, 'tyle'))) 
	                          ;
      	$kundeptrai = $randomizer->get();       
 	
		switch ($kundeptrai) {
		    case '1':
		    $location = 360;
		        break;
		    case '2':
		    $location = 320;        
		        break;
		    case '3':
		    $location = 270;        
		        break;
		    case '4':
		    $location = 230;        
		        break;
		    case '5':
		    $location = 180;       
		        break;
		    case '6':
		    $location = 130;        
		        break;
		    case '7':
		    $location = 85;        
		        break;
		    case '8':
		    $location = 44;        
		        break;
		    default:
		    $location = "";   
		        break;
		}

	$status = 1; // true

    $msg = $kun->vongquaykimcuong_gift($id, $kundeptrai, 'text');
    	//UPDATE Kimcuong vào acc
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `kimcuong` = `kimcuong` + '".$kun->vongquaykimcuong_gift($id, $kundeptrai, 'kimcuong')."' WHERE `username` = '".$user["username"]."'");
    	// Update Lần sử dụng vòng quay
    mysqli_query($kun->connect_db(), "UPDATE `vongquay_kimcuong` SET `sudung` = `sudung` + 1 WHERE `id` = '".$id."'");
    	// Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Vòng Quay FreeFire', '".$vongquay['name']."', '-".number_format($vongquay['giatien'])."đ', 'Nhận được ".$kun->vongquaykimcuong_gift($id, $kundeptrai, 'kimcuong')." Kim Cương', '".time()."')");
    	// Update Tiền User
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` - '".$vongquay['giatien']."' WHERE `username` = '".$user["username"]."'"); 


}


echo json_encode(array('status' => $status, 'item' => $kundeptrai,'location' => $location, 'msg' =>$msg));