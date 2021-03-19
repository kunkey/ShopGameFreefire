<?php 
defined('KUNKEYPR') or die("ACCESS DENIED!");
$kun->login_required();
?>

<div class="c-layout-sidebar-content ">
                <!-- BEGIN: PAGE CONTENT -->
                <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Đổi mật khẩu</h3>
                    <div class="c-line-left"></div>
                </div>



<?php 
if(isset($_POST['submit'])) {
    if($_POST['old_password'] && $_POST['password'] && $_POST['repassword']) {

        $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT `password` FROM `users` WHERE `password`='".md5($_POST['old_password'])."' AND `username`='".$user['username']."' "));
        if($check < 1) {
            echo '<div class="alert alert-danger"> Mật khẩu cũ của bạn không đúng!</div>';
        }else {
            if(strlen($_POST['password']) > 6) {
                if($_POST['password'] != $_POST['repassword']) {
                    echo '<div class="alert alert-danger"> 2 Mật Khẩu bạn vừa nhập không giống nhau!</div>';
                }else {
                    mysqli_query($kun->connect_db(), "UPDATE `users` SET `password`='".md5($_POST['password'])."' WHERE `username`='".$user['username']."'");
                    echo '<div class="alert alert-success"> Đổi Mật Khẩu Thành Công!</div>';                    
                }
            }else {
                echo '<div class="alert alert-danger"> Mật Khẩu mới phải lớn hơn 6 kí tự!</div>';
            }

        }


    }else {
        echo '<div class="alert alert-danger"> Vui lòng nhập đầy đủ thông tin!</div>';
    }
}
?>


                <form method="POST" action="" class="form-horizontal form-charge">

                <div class="form-group">
                    <label class="col-md-3 control-label">Mật khẩu cũ:</label>
                    <div class="col-md-6">
                        <input class="form-control c-square c-theme " name="old_password" type="password" maxlength="32" placeholder="Mật khẩu hiện tại">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Mật khẩu mới:</label>
                    <div class="col-md-6">
                        <input class="form-control c-square c-theme " name="password" type="password" maxlength="32" placeholder="Mật khẩu mới">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Xác nhận:</label>
                    <div class="col-md-6">
                        <input class="form-control c-square c-theme " name="repassword" type="password" maxlength="32" placeholder="Xác nhận mật khẩu mới">

                    </div>
                </div>



                <div class="form-group c-margin-t-40">
                    <div class="col-md-offset-3 col-md-6">
                        <button type="submit" name="submit" class="btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" data-loading-text="<i class='fa fa-spinner fa-spin'></i>">Đổi mật khẩu
                        </button>
                    </div>
                </div>
                </form>

    <!-- END: PAGE CONTENT -->
            <!-- END: PAGE CONTENT -->
        </div>
    </div>


