<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

// check session
if(!$_SESSION['token']) {
       exit(json_encode(array("status" => "login", "msg" => "Bạn Cần Đăng Nhập!")));
}

$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `setting_sieucap`"));

// check tiền
if($row['giatien'] > $user['money']) {
        exit(json_encode(array("status" => "error","msg" => 'Bạn Không Đủ Tiền để chơi!')));
}

// thư viện tỷ lệ
    require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Element.php';
    require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Randomizer.php';

//cập nhật dữ liệu người dùng
     $randomizer = new Randomizer();
     $randomizer 
                     ->add( new Element('1', $row['item_1'])) // 100 Kim Cương
                     ->add( new Element('2', $row['item_2'])) // 3000 Kim Cương
                     ->add( new Element('3', $row['item_3'])) // 15000 Kim Cương
                     ->add( new Element('4', $row['item_4'])) // 8000 Kim Cương
    ;
            $kundeptrai = $randomizer->get();    

// gán item và hình ảnh sau khi chạy tỷ lệ
switch ($kundeptrai) {
    case '1':
        $gift = '100 Kim Cương';
        $location = '21525';
        $kc = 100; 
        break;
    case '2':
        $gift = '3000 Kim Cương';
        $location = '21537';
        $kc = '3000';      
        break;
    case '3':
        $gift = '15000 Kim Cương';
        $location = '15000 Kim Cương';
        $kc = '15000';    
        break;
    case '4':
        $gift = '8000 Kim Cương';
        $location = '21536';
        $kc = '8000';   
        break;

}
 

//UPDATE Kimcuong vào acc
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `kimcuong` = `kimcuong` + '".$kc."' WHERE `username` = '".$user["username"]."'");
// update tiền  
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` - '".$row['giatien']."' WHERE `username` = '".$user["username"]."'"); 
// update lich su
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Vòng Quay Siêu Cấp', 'Vòng Quay Siêu Cấp', '-".number_format($row['giatien'])."đ', 'Nhận Được ".$gift."', '".time()."')");
// xuất json
   echo json_encode(array("msg" => array("id"=>"$location","name" => "Chúc Mừng! Bạn nhận được $gift", "pos" => $kundeptrai, "num_roll_remain" => 1), "status" => "OK"));
