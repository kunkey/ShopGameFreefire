<?php 
if($kun->is_mobile()) $h = '514'; else $h = '460';
?>

<style type="text/css">
.box.box-solid.box-danger {
    border: 1px solid #565656;
}
.box {
    position: relative;
    border-radius: 0px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.box.box-solid.box-danger > .box-header {
	color: #fff;
    background: #1d1d1d;
    background-color: #1d1d1d;
}
ol, ul {
    list-style: none;
}
.active {
    color: rgb(50, 197, 210);
}
.box-header > .fa, .box-header > .glyphicon, .box-header > .ion, .box-header .box-title {
    display: inline-block;
    font-size: 23px;
    margin: 0;
    line-height: 1;
    color: #fff;
}
.box-body {
	background: #1d1d1d;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    /* color: #f22; */
    background-color: #565656;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
    cursor: default;
}	

.nav-tabs>li.active>a, .nav-tabs>li a:hover, .nav-tabs>li a:hover {
    /* color: #f22; */
    background-color: #565656;
    //border: 1px solid #ddd;
    border-bottom-color: transparent;
    cursor: default;
}	



.form-horizontal .form-group {
    margin-bottom: 0;
}

</style>

<div class="c-content-box c-size-md">



<div >
		<!-- Begin: Testimonals 1 component -->
		<div class="c-content-client-logos-slider-1 c-bordered" style="padding-top: 26px;background: rgb(0 0 0 / 67%);" data-slider="owl">
			<!-- Begin: Title 1 component -->
<div class="c-content-title-1">
<h3 class="c-center c-font-uppercase c-font-bold">THÔNG TIN & HƯỚNG DẪN</h3>
</div>

		 	<div class="row">


		 		<div class="col-md-4 col-lg-4 col-xs-12">
		 			
                    <div class="box box-danger collapsed-box box-solid" style="padding: 0;">
                        <div class="box-header with-border">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active"><a data-toggle="tab" href="#napthe" aria-expanded="true"><h3 class="box-title">NẠP THẺ</h3></a></li>
                                <li class="hidden-xs"><a data-toggle="tab" href="#topnap" aria-expanded="false"><h3 class="box-title">TOP NẠP</h3></a></li>
                                <li class="hidden-xs"><a data-toggle="tab" href="#daigia" aria-expanded="false"><h3 class="box-title">ĐẠI GIA</h3></a></li>
                            </ul>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="tab-content">


                                <div id="napthe" class="tab-pane fade active in">
                                    <div class="box-body" style="color: #505050;padding:0px;min-height: 40px;line-height: 2; ">






<form method="POST" action="" accept-charset="UTF-8" class="form-horizontal form-charge">
    
        <style type="text/css">
        .sa-bntbox .form-control {
            height: 41px;
            color: #ffffff;
            background: #1f2228;
            border: 1px solid #30343c;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }

        .sa-bntbox input[type="text"]{
            color: #fff !important;
        }

        .sa-bntbox .btn-submit{
            border-color: none!important;
            outline: !important;
            width: 100%!important;
            text-align: center;
            font-weight: 700!important;
            font-size: 18px!important;
            color: #000000!important;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            background: linear-gradient(to top, #FFE900 0%, #F2AC00 100%)!important;
            background: -moz-linear-gradient(to top, #FFE900 0%, #F2AC00 100%)!important;
            background: -o-linear-gradient(to top, #FFE900 0%, #F2AC00 100%)!important;
            background: -ms-linear-gradient(to top, #FFE900 0%, #F2AC00 100%)!important;
            background: -webkit-linear-gradient(bottom, #FFE900 0%, #F2AC00 100%)!important;
        }
        .sa-bntbox .btn-submit:hover{
            color: #000;
        }

        .sa-bntbox .alert{
            margin-bottom: 5px;
        }

        .sa-bntbox .alert-dismissable, .alert-dismissible{
            padding-top: 0px;
            padding-bottom: 0px;
        }
    </style>
    <div class="form-group">
        <div class="col-md-12">
            <select class="form-control  c-square c-theme" name="type" id="type1">
                                                            <option value="VIETTEL">VIETTEL</option>
                                            <option value="VINAPHONE">VINAPHONE</option>
                                            <option value="MOBIFONE">MOBIFONE</option>
                                                </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <select class="form-control  c-square c-theme" name="amount" id="amount1">
			<option value="10000">10,000</option>
			<option value="20000">20,000</option>
			<option value="50000">50,000</option>
			<option value="100000">100,000</option>
			<option value="200000">200,000</option>
			<option value="500000">500,000</option>
			<option value="1000000">1,000,000</option>

    </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <input class="form-control  c-square c-theme " name="pin" type="text" maxlength="16" placeholder="Mã số thẻ">
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-12">
            <input class="form-control c-square c-theme " name="serial" type="text" maxlength="16" placeholder="Số serial">
        </div>
    </div>


<o id="result"><div class="alert alert-info">Nhập chính xác thông tin thẻ!</div></o>



    <div class="form-group c-margin-t-0">
        <div class="col-md-12">
            <button type="submit" name="submit" class="btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" data-loading-text="<i class='fa fa-spinner fa-spin '></i>">NẠP THẺ
            </button>

        </div>
    </div>
    </form>

                                    </div>
                                </div>



                                <div id="topnap" class="tab-pane fade" style="height: 380px;overflow-x: hidden;">
<?php 
$meow = mysqli_query($kun->connect_db(), "SELECT * FROM `users` ORDER BY `money_nap` DESC LIMIT 10");
$i = 1;
while ($eow = mysqli_fetch_array($meow)) { ?>
    <a href="#" class="list-group-item list-group-item-action">
        <span style="background: #f7b038; color: #fff; padding: 2px 8px 2px 8px; border-radius: 25px;"><?php echo $i;?></span> <?php echo $eow['name'];?>
        <span class="btn btn-danger btn-xs pull-right"><?php echo number_format($eow['money_nap']);?>đ</span>
    </a>
<?php
$i++;
 } ?>
                                </div>


                                <div id="daigia" class="tab-pane fade" style="height: 380px;overflow-x: hidden;">
<?php 
$meow = mysqli_query($kun->connect_db(), "SELECT * FROM `users` ORDER BY `money` DESC LIMIT 10");
$i = 1;
while ($eow2 = mysqli_fetch_array($meow)) { ?>
    <a href="#" class="list-group-item list-group-item-action">
        <span style="background: #f7b038; color: #fff; padding: 2px 8px 2px 8px; border-radius: 25px;"><?php echo $i;?></span> <?php echo $eow2['name'];?>
        <span class="btn btn-danger btn-xs pull-right"><?php echo number_format($eow2['money']);?>đ</span>
    </a>
<?php
$i++;
 } ?>
                                </div>




                            </div>
                            
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
		 		</div>


			 	<div class="col-md-8 col-lg-8 col-xs-12 hidden-xs">
			 		<iframe width="100%" height="445" src="<?php echo $_banner['url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		 		</div>	 		


		 	</div>


		 	<div class="c-content-title-1">
				<center><span style="font-weight:bold;font-family:&quot;Times New Roman&quot;;font-size:35px;"><span style="color:#FF0000;"></span></span></center>
				<div class="c-line-center c-theme-bg"></div>
			</div>



		</div>

</div>

</div>




<script type="text/javascript">
        $("form").submit(function(e) {
    e.preventDefault();
    var form = this;
    var cont = $('#result');

    var type = $('select[name=type]').val();
    var amount = $('select[name=amount]').val();
    var serial = $('input[name=serial]').val();
    var pin = $('input[name=pin]').val();

    if(!type) {
        cont.html('<div class="alert alert-danger"> Lỗi hệ thống!</div>');
    }else if(!amount) {
        cont.html('<div class="alert alert-danger"> Lỗi hệ thống!</div>');
    }else if(!serial) {
        cont.html('<div class="alert alert-danger"> Bạn chưa nhập mã Seri!</div>');
    }else if(!pin) {
        cont.html('<div class="alert alert-danger"> Bạn chưa nhập mã Pin!</div>');
    }else {
        cont.html('');
        $('button[name=submit]').attr("disabled", true);
        //$('button[name=submit]').removeAttr("disabled");
        $('button[name=submit]').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý');
                $.ajax({ 
                        type: 'post', 
                        dataType: "JSON",
                        url: '/system/napthe', 
                        data: {
                            type: type,
                            amount: amount,
                            serial: serial,
                            pin: pin,
                            token: '<?php echo $user['token'];?>'
                        }, 
                        success: function (json) {
                            if(json.status == false) {
                                swal("Lỗi!", json.msg, "error");
                                cont.html('<div class="alert alert-danger">Lỗi: '+json.msg+'</div>');
                            }else if(json.status == true) {
                                swal("Thành Công!", json.msg, "success");
                                cont.html('<div class="alert alert-success">Thành Công: '+json.msg+'</div>');
                            }else {
                                swal("Lỗi!", "Lỗi hệ thống!", "error");
                            }
                                $('button[name=submit]').html('NẠP THẺ');
                                $('button[name=submit]').removeAttr("disabled");
                    }
                });

    }

});
</script>












