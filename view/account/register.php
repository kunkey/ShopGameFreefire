<link rel="stylesheet" href="/assets/Scripts/toastr/toastr.min.css"/>
<o id="result"></o>

<div class="c-layout-page">

<div class="login-box" style="margin-top: -10px;margin-bottom: 130px;">

<div class="login-box-body box-custom">
<p class="login-box-msg">Đăng ký thành viên</p>
<span class="help-block" style="text-align: center;color: #dd4b39">
<strong></strong>
</span>

<div class="form-group has-feedback  ">
<input type="text" class="form-control" id="name" value="" placeholder="Họ Và Tên">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback  ">
<input type="text" class="form-control" id="username" value="" placeholder="Tên Tài khoản">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="text" class="form-control" id="email" value="" placeholder="Email">
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" id="password" placeholder="Mật khẩu" aria-autocomplete="list">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" id="repassword" placeholder="Xác nhận mật khẩu">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">

<div class="col-xs-12">
<button type="submit" id="submit" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng ký</button>
</div>

</div>

<div class="social-auth-links text-center">
</div>

</div>

</div>

<style>
        .login-box, .register-box {
            width: 400px;
            margin: 7% auto;
            padding: 20px;;
        }

        @media (max-width: 767px){
            .login-box, .register-box {
                width: 100%;
            }

        }

        .login-box-msg, .register-box-msg {
            margin: 0;
            text-align: center;
            padding: 0 20px 20px 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .box-custom{
			background: #000;
			border: 1px solid #cccccc;
			padding: 20px;
			color: #fff;
        }
    </style>

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
            repassword: $("#repassword").val()
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
