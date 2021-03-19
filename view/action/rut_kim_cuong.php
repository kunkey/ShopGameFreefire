<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
?>

<div class="c-layout-sidebar-content ">
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Rút Kim Cương Free Fire</h3>
                    <div class="c-line-left"></div>
                </div>

           <div class="alert alert-info alert-dismissible" role="alert">
             <b>Những Đơn Hàng Rút Kim Cương Từ Hệ Thống Lưu Ý : </b><br>
– Bắt Buộc Rút Từ 90 Kim Cương Trở Lên .<br>
– Sau Khi Đặt Lệnh Rút Kim Cương Vui Lòng Chờ Từ 5p-30p<br>
– Nếu Quá Lâu Xin Vui Lòng Liên Hệ Với Hệ Thống Bằng Cách Nhắn Tin Với Hệ Thống Dưới Góc Tay Phải Màn Hình …<br>
                        </div>



<style type="text/css">
.form-group {
    margin-bottom: 0px;
}
</style>
<form class="form-horizontal" method="POST">


  <?php

    if(isset($_POST['rutkimcuong'])) {

      require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';

      $xss = new Xss_Anti;

      $idgame = mysqli_real_escape_string($kun->connect_db(), $xss->xss_clean($_POST['idgame']));
      $kimcuong = intval($xss->xss_clean($_POST['kimcuong']));
      $noidung = strip_tags(mysqli_real_escape_string($kun->connect_db(), $xss->xss_clean($_POST['noidung'])));
      $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `idgame`='".$idgame."' AND `status` = '2'"));


  if(empty($idgame) || empty($kimcuong)) {
    echo '<div class="alert alert-danger"> Xin vui lòng nhập đầy đủ thông tin!</div>';
  }else if($user['kimcuong'] < 90){
    echo '<div class="alert alert-danger"> Bạn Không Đủ Kim Cương Để Rút !</div>';
  }else if($kimcuong > $user['kimcuong']){
    echo '<div class="alert alert-danger"> Kim Cương Bạn Cần Rút Phải Nhỏ Hơn Số Kim Cương Hiện Tại !</div>';
  }else if($check > 0){
    echo '<div class="alert alert-danger"> Đơn Rút Này Đã Tồn Tại Ở Hệ Thống. Vui Lòng Chờ Admin Xử Lý ! ( Trừ '.$kimcuong.' Kim Cương Tại Hệ Thống)</div>';
  } else {

    // update kimcuong user
  mysqli_query($kun->connect_db(), "UPDATE `users` SET `kimcuong` = `kimcuong` - '".$kimcuong."' WHERE `username` = '".$user['username']."' ");
   // update vào lịch sử rút
  mysqli_query($kun->connect_db(), "INSERT INTO `rut_kim_cuong` SET 
  `username` = '".$user['username']."',
  `idgame` = '".$idgame."',
  `kimcuong` = '".$kimcuong."',
  `noidung` = '".$noidung."',
  `status` = '2',
  `time` = '".time()."'");

        // Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Rút Kim Cương Freefire', 'Rút Kim Cương Freefire', '-".number_format($kimcuong)." kc', 'Rút ".number_format($kimcuong)." kim cương vào ID ".$idgame."', '".time()."')");


    echo '<div class="alert alert-success"> Bạn rút kim cương thành công, xin chờ Admin duyệt! (Trừ '.$kimcuong.' Kim Cương Tại Hệ Thống )</div>';  
}


    }



  ?>


      <div class="form-group">
            <label class="col-md-3 control-label">Kim Cương Hiện Tại:</label>
            <div class="col-md-6">
                       <div class="input-group c-square">
                           <p class="form-control c-square c-theme c-theme-static m-b-0"><?php echo $user['kimcuong'];?></p>
                           <span class="input-group-btn">
                               <span class="btn btn-default c-font-dark"><?php echo $user['username'];?></span>
                           </span>
                       </div>
                   </div>
               </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">ID GAME:</label>
            <div class="col-md-6">
                <input class="form-control c-square c-theme" type="text" name="idgame" placeholder="Nhập ID Cần Rút Kim Cương ..." required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Kim Cương:</label>
            <div class="col-md-6">
                    <select class="form-control c-square c-theme" name="kimcuong">
                    <option value="90">90 kim cương</option>
                    <option value="230">230 kim cương</option>
                    <option value="465">465 kim cương</option>
                    <option value="950">950 kim cương</option>
                    <option value="2375">2375 kim cương</option>
                    <option value="9999">9999 kim cương</option>
                    </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Nội dung:</label>
            <div class="col-md-6">
                <input class="form-control c-square c-theme" type="text" name="noidung" placeholder="Nhập nội dung gửi cho admin nếu cần thiết ..." required="required">
            </div>
        </div>
        <div class="form-group c-margin-t-40">
            <div class="col-md-offset-3 col-md-6">
                <button type="submit" name="rutkimcuong" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">THỰC HIỆN</button>
            </div>
        </div>
        <br>

    </form>





</div>
</div>