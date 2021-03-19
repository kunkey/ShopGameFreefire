<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

if(!$_SESSION['token']) {
    die("<script>swal('Lỗi', 'Bạn Cần Đăng Nhập', 'error');setTimeout(function(){location.href='/signin.html';}, 1500);</script>");
}

$id = $_POST['id'];
$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `id`='".$id."' AND `status`='0' AND `nguoimua`='".$user['username']."'"));

if(!$row['id']) {
    die("<script>swal('Lỗi', 'Nick Freefire Này Không Tồn Tại!', 'error');</script>");
}else {
    ?>
<style type="text/css">
  .modal-dialog {
    top: 90;
}
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Thông Tin Nick Freefire #<?php echo $row['id'];?></h4>
</div>
<div class="modal-body">
        <div class="form-horizontal">
            <div class="form-group m-t-10">
                <label class="col-md-3 control-label"><b>Tài khoản:</b></label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme" type="text" placeholder="Tài khoản" readonly="" value="<?php echo $row['taikhoan'];?>">
                </div>
            </div>
            <div class="form-group m-t-10">
                <label class="col-md-3 control-label"><b>Mật khẩu:</b></label>
                <div class="col-md-6">
                    <div class="input-group c-square">
                        <input type="text" class="form-control c-square c-theme show_password" id="pass" placeholder="Mật khẩu" readonly="" value="<?php echo $row['matkhau'];?>">
                        <span class="input-group-btn">
                                    <button class="btn btn-default c-font-dark" type="button" id="getpass">Copy</button>
                                </span>
                    </div>
                    <span class="help-block">Click vào nút copy để sao chép mật khẩu hoặc nhấp đúp vào ô mật khẩu để thấy mật khẩu.</span>
                </div>
            </div>
                        <div class="form-group m-t-10">
                <label class="col-md-4 control-label"><b>Mã Login Facebook:</b></label>
                <div class="col-md-5">
                    <input class="form-control c-square c-theme" type="text" placeholder="Mã Đăng Nhập" readonly="" value="1234654">
                </div>
            </div>
                <center>            
            <p class="c-font-bold c-font-blue">
                Tài khoản #<?php echo $row['id'];?> mua lúc: <?php echo date('d/m/20y - H:i:s', $row['time']);?>
            </p>
                </center>            
            <div class="alert alert-danger c-font-dark">
                <b>Để tránh các trường hợp xấu xảy ra, quý khách vui lòng thêm thông tin ( Email và SĐT ) để đảm bảo không có vấn đề sau khi giao dịch tại shop! Xin cảm ơn.</b>
            </div>
            <div class="alert alert-info c-font-dark">
                Sau khi nhận tài khoản mật khẩu bạn hãy thực hiện đổi mật khẩu để bảo mật.<br></div>
        </div>
    </div>
                                            <div class="modal-footer">
                            <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                        </div>

</div>

    </div>
</div>

 
</div>

<script>
    document.querySelector('#getpass').addEventListener('click', function (event) {
        var copyTextarea = document.querySelector('#pass');
        copyTextarea.select();

        try {
            document.execCommand('copy');
        } catch (err) {
            alert('Trình duyệt của bạn không thể thực hiện thao tác copy nhanh');
        }
        if (document.selection) {
            document.selection.empty();
        } else if (window.getSelection) {
            window.getSelection().removeAllRanges();
        }
    });
    document.querySelector('#getpassemail').addEventListener('click', function (event) {
        var copyTextarea = document.querySelector('#passemail');
        copyTextarea.select();

        try {
            document.execCommand('copy');               
        } catch (err) {
            alert('Trình duyệt của bạn không thể thực hiện thao tác copy nhanh');
        }
        if (document.selection) {
            document.selection.empty();
        } else if (window.getSelection) {
            window.getSelection().removeAllRanges();
        }
    });



</script>


<?php } ?>
