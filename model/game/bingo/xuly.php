<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

// check session
if(!$_SESSION['token']) {
		die(json_encode(array('status' => 3,'data' => 'Bạn Cần Đăng Nhập!','msg' => 'lỗi!')));
}

$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `setting_bingo`"));

// check tiền
if($row['giatien'] > $user['money']) {
		die(json_encode(array('status' => 4,'data' => 'Bạn không đủ tiền để chơi!','msg' => 'lỗi!')));
}

// thư viện tỷ lệ
	require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Element.php';
	require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Randomizer.php';


// chạy tỷ lệ
  $randomizer = new Randomizer();
  
  $randomizer          ->add( new Element('1', $row['item_1'])) 
                       ->add( new Element('2', $row['item_2'])) 
                       ->add( new Element('3', $row['item_3']))
                       ->add( new Element('4', $row['item_4'])) 
                       ->add( new Element('5', $row['item_5']))
                       ->add( new Element('6', $row['item_6'])) 
                       ->add( new Element('7', $row['item_7'])) 
                       ->add( new Element('8', $row['item_8'])) 
                       ->add( new Element('9', $row['item_9'])) 
                          ;
            $kundeptrai = $randomizer->get();       


// gán item và hình ảnh sau khi chạy tỷ lệ
switch ($kundeptrai) {
    case '1':
    $vongquay = 1;
    $location = array('role_1' => $vongquay, 'role_2' => $vongquay, 'role_3' => $vongquay);
        break;
    case '2':
    $vongquay = 2;
    $location = array('role_1' => $vongquay, 'role_2' => $vongquay, 'role_3' => $vongquay);       
        break;
    case '3':
    $vongquay = 3;
    $location = array('role_1' => $vongquay, 'role_2' => $vongquay, 'role_3' => $vongquay);     
        break;
    case '4':
    $vongquay = 4;
    $location = array('role_1' => $vongquay, 'role_2' => $vongquay, 'role_3' => $vongquay);   
        break;
    case '5':
    $vongquay = 5;
    $location = array('role_1' => $vongquay, 'role_2' => $vongquay, 'role_3' => $vongquay); 
        break;
    case '6':
    $vongquay = 6;
    $location = array('role_1' => $vongquay, 'role_2' => $vongquay, 'role_3' => $vongquay); 
        break;
    case '7':
    $vongquay = 7;
    $location = array('role_1' => $vongquay, 'role_2' => $vongquay, 'role_3' => $vongquay);  
        break;
    case '8':
    $vongquay = 8;
    $location = array('role_1' => $vongquay, 'role_2' => $vongquay, 'role_3' => $vongquay);
        break;
    case '9':
    $vongquay = "9";
    $role_1=rand(1,8);$role_2=rand(1,8);$role_3=rand(1,8);
    $location = array('role_1' => $role_1, 'role_2' => $role_2, 'role_3' => $role_3); 
        break;    
}

// gán random giá trị nổ hũ 
$_rand = Rand($nohu_from, $nohu_to); 

// gán giá trị theo tỷ lệ 
if($vongquay == 1){
    $gift = "Bạn Trúng 2000 Kim Cương"; 
    $kimcuong = 2000;
}elseif($vongquay == 2){
    $gift = "Bạn Trúng 1000 Kim Cương";
    $kimcuong = 1000;
}elseif($vongquay == 3){
    $gift = "Bạn Trúng 10000 Kim Cương";
    $kimcuong = 10000;
}elseif($vongquay == 4){
    $gift = "Bạn Trúng 8000 Kim Cương";
    $kimcuong = 8000;
}elseif($vongquay == 5){
    $gift = "Bạn Nổ Hũ '".$_rand."'";
    $kimcuong = $_rand;
}elseif($vongquay == 6){
    $gift = "Bạn Trúng 5000 Kim Cương";
    $kimcuong = 5000;
}elseif($vongquay == 7){
    $gift = "Bạn Trúng 350 Kim Cương";
    $kimcuong = 350;
}elseif($vongquay == 8){
    $gift = "Bạn Trúng 250 Kim Cương";
    $kimcuong = 250;
}else if($vongquay == 9){
    $gift = "Chúc Bạn May Mắn Lần Sau (Đen Thôi Đỏ Quên Đi)";
    $kimcuong = 0;
}

//UPDATE Kimcuong vào acc
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `kimcuong` = `kimcuong` + '".$kimcuong."' WHERE `username` = '".$user["username"]."'");
// Update Lần sử dụng vòng quay
    mysqli_query($kun->connect_db(), "UPDATE `setting_bingo` SET `sudung` = `sudung` + 1");
// update tiền  
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` - '".$row['giatien']."' WHERE `username` = '".$user["username"]."'"); 
// update lich su
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Bingo FreeFire', 'Bingo FreeFire', '-".number_format($row['giatien'])."đ', '".$gift."', '".time()."')");
// xuất json
	die(json_encode(array('status' => 1,'data' => $location,'msg' => $gift)));

