<!DOCTYPE html>
<html>
<head>
    <title>Đăng Ký</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta itemprop="description" content="Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam.">
      
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap  -->
    <link href="/assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/frontend/css/LTE.css">
    <script src="/assets/Scripts/jquery-3.3.1.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="/assets/Scripts/sweetalert/sweetalert.min.js"></script>
    <script src="/assets/Scripts/helpers.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/frontend/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/Scripts/loadingoverlay/loadingoverlay.min.js"></script>
    <script src="/assets/Scripts/loadingoverlay/loadingoverlay_progress.min.js"></script>
        <!-- Toastr Css -->
      <link rel="stylesheet" href="/assets/Scripts/toastr/toastr.min.css"/>
    <!-- Sweetalert Css -->
    <link href="/assets/Scripts/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->    
</head>
<body>
    <div class="loader"></div>
	<p id="result" style="display: none;"></p>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('/assets/img/background.jpg'); ">
            <div class="login-box">
                     
                    <!-- /.login-logo -->
                    <div class="login-box-body">
                        <div class="login-logo">
                            <a href="/"><img src="/img/logo.png" alt="" title="" media-simple="true" style="width: 115px;"></a>
                        </div>
                        </br>
                        <!--<h2 class="login-box-msg">QUÊN MẬT KHẨU</h2>-->
                        <div>
                            <div class="form-group">
                                <input type="text" id="name" class="form-control input-lg no-border" placeholder="Họ và tên">
                                <!--<span class="fa fa-user t40 form-control-feedback"></span>-->
                            </div>
                          <div class="form-group">
                                <input type="text" id="username" class="form-control input-lg no-border" placeholder="Tên Đăng Nhập">
                                <!--<span class="fa fa-user t40 form-control-feedback"></span>-->
                            </div>
                       
                            <div class="form-group">
                                <input type="text" id="email" class="form-control input-lg no-border" placeholder="Email">
                                <!--<span class="fa fa-phone t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group">
                                <input type="password" id="password"  class="form-control input-lg no-border" placeholder="Mật khẩu">
                                <!--<span class="fa fa-lock t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group">
                                <input type="password" id="repassword" class="form-control input-lg no-border" placeholder="Xác nhận mật khẩu">
                                <!--<span class="fa fa-lock t40 form-control-feedback"></span>-->
                            </div>
                          
							<div class="form-group">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <img style="cursor:pointer;width: 100%; height: 46px;" id="imgcaptcha" src="/assets/captcha/captcha.php?rand=<?php echo rand();?>" onclick="document.getElementById('imgcaptcha').src = '/assets/captcha/captcha.php?rand='+ Math.random(); document.getElementById('captcha').focus();">
                                        
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" id="captcha" class="form-control input-lg no-border text-center t14" placeholder="Nhập mã xác nhận">
                                    </div>
                                </div>
                            </div>						  
						  
						  
						  
						  
						  
						  
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" id="submit" class="btn btn-gray btn-lg btn-block no-border">Đăng ký</button>
                                </div>
                            </div>

                            <!-- /.social-auth-links -->
                            <div class="login-fg text-center">
                                <i style="color:#616161;">Đã có tài khoản ? </i>
                                <a href="/signin.html" class="bb t16" style="color:#616161;">Đăng nhập</a>
                            </div>
                            </br>
                        </div>

                    </div>

            </div>
        </div>
    </div>
















<script src="/assets/Scripts/toastr/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    $('#submit').click(function() {
        document.getElementById("submit").disabled = true;
        document.getElementById('submit').innerHTML = "Đang kiểm tra";

    $.ajax({
        type: "POST",
        url: 'system/user',
        data: {
        	type : 'register',
            name: $("#name").val(),   
            username: $("#username").val(),			
            email: $("#email").val(),
            password: $("#password").val(),
            repassword: $("#repassword").val(),
			captcha: $("#captcha").val()
        },
        success: function(result)
        {
                    document.getElementById("submit").disabled = false;
            document.getElementById('submit').innerHTML = "Đăng kí";

           $("#result").html(result);
        }
    });

});

});

    $(document).on('keypress',function(e) {
    if(e.which == 13) {
        $('#submit').click();
    }
});
</script>


<script>
    $(document).ready(function () {

        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-right",
            "closeButton": true,
            "progressBar": true
        };

    });
</script>


   
</body>
</html>
