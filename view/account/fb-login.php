<?php
 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;


require_once ('Facebook/autoload.php');


$fb = new Facebook\Facebook ([
  'app_id' => $config['facebook_app_id'], // Id app
  'app_secret' => $config['facebook_app_key'], // Mã bảo mật app
  'default_graph_version' => 'v3.0', //Giữ Nguyên
  ]);
$domain = $config['home'].'/view/account/fb-login.php';




$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}




try {
$accessToken = $helper->getAccessToken($domain);
//$accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
    




if (! isset($accessToken)) {
    
    $permissions = array('public_profile','email'); // Optional permissions
    $loginUrl = $helper->getLoginUrl($domain,$permissions);
    
    //echo'<pre>';
//echo $loginUrl;
//echo $domain;
    header("Location: ".$loginUrl);  
    //echo $loginUrl;
  exit;
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $fields = array('id', 'name', 'email');
//  $response = $fb->get('/me?fields='.implode(',', $fields).'', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}




$response = $fb->get('/me?fields=id,name,email,gender', $accessToken);
$fb_name = $response->getGraphUser()['name'];
$email = $response->getGraphUser()['email'];
$fb_id = $response->getGraphUser()['id'];
$sex = $response->getGraphUser()['sex'];


$time = time();

if($kun->check_user_fb_register($fb_id) == false) {

    $cmd = "INSERT INTO `users` (`fbid`, `admin`, `name`, `username`, `password`, `email`, `money`, `money_nap`, `kimcuong`, `quanhuy`, `token`, `auth`, `ip`, `verify`, `verify_code`, `time`) VALUES ('".$fb_id."', '0', '".$fb_name."', '".$fb_id."', 'NULL', '".$email."', '0', '0', '0', '0', '".md5($token)."', '".$token."', '".$_SERVER['REMOTE_ADDR']."', '1', '0', '".$time."')";
    $token = $kun->Creat_Token(30);  
      //echo $cmd;

    $res = mysqli_query($kun->connect_db(), $cmd);

     $_SESSION['token'] = $token;

}else {
    $token = $kun->Creat_Token(30);  
    $res = mysqli_query($kun->connect_db(), "UPDATE `users` SET `token` = '".$token."', `ip` = '".$_SERVER['REMOTE_ADDR']."' WHERE `fbid`='".$fb_id."'");
    $_SESSION['token'] = $token;
}




      /* ---- vị trí header sau session ----*/
      header("Location: ".$config['home']."/home");



?>