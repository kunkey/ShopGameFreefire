<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';

$kun = new System;
$user = $kun->user();
$_get_settings = $kun->settings('napthe');



if(!$_SESSION['token']) {
   die(json_encode(array('status' => false, 'msg' => 'Bạn Chưa Đăng Nhập!')));
}


switch ($_get_settings['kieunap']) {
    case 'napcham':

$loaithe = $_POST['type'];
$menhgia = $_POST['amount'];
$seri = str_replace('/[^0-9]/', '', $_POST['serial']);
$mathe = str_replace('/[^0-9]/', '', $_POST['pin']);

$arr_loaithe = array("VIETTEL", "VINAPHONE", "MOBIFONE");
$arr_menhgia = array("10000", "20000", "50000", "100000", "200000", "500000","1000000");

 if (!in_array($loaithe, $arr_loaithe)) die(json_encode(array('status' => false, 'msg' => 'Lỗi Hệ Thống!')));
 if (!in_array($menhgia, $arr_menhgia)) die(json_encode(array('status' => false, 'msg' => 'Lỗi Hệ Thống!')));
 if (!$seri) die(json_encode(array('status' => false, 'msg' => 'Vui Lòng Nhập Vào Mã Serial!')));
 if (!$mathe) die(json_encode(array('status' => false, 'msg' => 'Vui Lòng Nhập Vào Mã Thẻ!')));


if($kun->check_int($seri) == false) die(json_encode(array('status' => false, 'msg' => 'Mã Serial Phải Là Dạng Số!')));

if($kun->check_int($mathe) == false) die(json_encode(array('status' => false, 'msg' => 'Mã Thẻ Phải Là Dạng Số!')));

if(strlen($seri) < 10) die(json_encode(array('status' => false, 'msg' => 'Độ dài mã Seri không hợp lệ!')));
if(strlen($mathe) < 10) die(json_encode(array('status' => false, 'msg' => 'Độ dài mã thẻ không hợp lệ!')));





$tranid = rand(1000,999999);
$cmd = "INSERT INTO `napthe` SET `username` = '".$user['username']."', `type` = '".$loaithe."', `amount` = '".$menhgia."', `serial` = '".$seri."', `pin` = '".$mathe."', `tranid` = '".$tranid."', `status` = '2', `time` = '".time()."'";
mysqli_query($kun->connect_db(), $cmd);


die(json_encode(array('status' => true, 'msg' => 'Thẻ '.$loaithe.' mệnh giá '.number_format($menhgia).'đ đã được lưu vào hệ thống thành công! Vui lòng chờ admin duyệt thẻ trong 30p - 1h!')));




        break;


    case 'naptudong':



            function curl_post($url = null, $header = [])
                {
                    if (!empty($url)) {
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        if (curl_errno($ch)) {
                            $res = "Lỗi: " . curl_error($ch);
                        } else {
                            $res = curl_exec($ch);
                        }
                        curl_close($ch);
                        return $res;
                    }
                }


                if (!isset($_POST['type']) || !isset($_POST['serial']) || !isset($_POST['pin']) || !isset($_POST['amount'])) {
                    die(json_encode(array('status' => false, 'msg' => 'Bạn cần nhập đầy đủ thông tin!')));
                } else {

                    $type = $_POST['type'];
                    $serial = $_POST['serial'];
                    $pin = $_POST['pin'];
                    $amount = $_POST['amount'];

                    $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `pin` = '".$pin."' AND `serial` = '".$serial."'"));

                    if ($check > 0) {
                        die(json_encode(array('status' => false, 'msg' => 'Thẻ này đã tồn tại trên hệ thống!')));
                    } else {


                        $tranid = rand(10000, 99999);  /// Cái này có thể mà mã order của bạn, nó là duy nhất (enique) để phân biệt giao dịch.

                        switch ($type) {
                            case 'VIETTEL':
                                $network = 'VTT';
                                break;
                            case 'VINAPHONE':
                                $network = 'VNP';   
                                break;
                            case 'MOBIFONE':
                                $network = 'VMS';
                                break;
                        }

                        $api_key = $_get_settings['api_key'];
                        $call_back = $config['CALLBACK_URL'];

                        $api = 'http://gachthe.vn/API/NapThe?APIKey='.$api_key.'&Network='.$network.'&CardCode='.$pin.'&CardSeri='.$serial.'&CardValue='.$amount.'&URLCallback='.$call_back.'&TrxID='.$tranid;


                        $post = json_decode(curl_post($api), true);
                                            
                                            // {"Code":1,"Message":"Đã nhận thẻ"}

                                           if ($post['Code'] == 1) {

                           $cmd = "INSERT INTO `napthe` SET `username` = '".$user['username']."', `type` = '".$type."', `amount` = '".$amount."', `serial` = '".$serial."', `pin` = '".$pin."', `tranid` = '".$tranid."', `status` = '2', `time` = '".time()."'";

                           mysqli_query($kun->connect_db(), $cmd);


                        die(json_encode(array('status' => true, 'msg' => 'Thẻ '.$type.' mệnh giá '.number_format($amount).'đ đã được lưu vào hệ thống thành công! Vui lòng chờ duyệt thẻ trong 30s - 2 phút!')));

                                            }else{
                        die(json_encode(array('status' => false, 'msg' => $post['Message'])));
                                            }

                                }
                }




        break;
}

