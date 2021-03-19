<?php 
defined('KUNKEYPR') or die("ACCESS DENIED!");
$napthe = $kun->settings('napthe');
if($napthe['kieunap'] == 'napcham') {
    $thong_bao = '<div class="alert alert-info">Hiện Tại Website đang sử dụng kiểu <b>Nạp Chậm</b>!<br>Yêu Cầu Nạp Thẻ của bạn sẽ được duyệt trong vòng 15 đến 30 phút!</div>';
 }else {
    $thong_bao = '<div class="alert alert-info">Hiện Tại Website đang sử dụng kiểu <b>Nạp Tự Động</b>!<br>Yêu Cầu Nạp Thẻ của bạn sẽ được duyệt trong vòng 15 đến 30 giây!</div>'; 
 }
?>

<div class="c-layout-sidebar-content ">
                <!-- BEGIN: PAGE CONTENT -->
                <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">NẠP THẺ</h3>
                    <div class="c-line-left"></div>
                </div>
                <?php echo $thong_bao;?>
                <o id="result"></o>
            

<style type="text/css">
    .form-horizontal .form-group {
    margin-left: -15px;
    margin-right: -15px;
    margin-bottom: 2;
}
</style>
        <form class="form-horizontal form-charge">
                    <div class="form-group">
            <label class="col-md-3 control-label">ID:</label>
            <div class="col-md-6">
                       <div class="input-group c-square">
                           <p class="form-control c-square c-theme c-theme-static m-b-0"><?php echo $user['id'];?></p>
                           <span class="input-group-btn">
                               <span class="btn btn-default c-font-dark"><?php echo $user['username'];?></span>
                           </span>
                       </div>
                   </div>
               </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Loại thẻ:</label>
            <div class="col-md-6">
                    <select class="form-control  c-square c-theme" name="type">
            <option value="VIETTEL">VIETTEL</option>
            <option value="VINAPHONE">VINAPHONE</option>
            <option value="MOBIFONE">MOBIFONE</option>
                    </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mệnh giá:</label>
            <div class="col-md-6">
                    <select class="form-control  c-square c-theme" name="amount">
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
            <label class="col-md-3 control-label">Số serial:</label>
            <div class="col-md-6">
                <input class="form-control  c-square c-theme" type="text" name="serial">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mã số thẻ:</label>
            <div class="col-md-6">
                <input class="form-control  c-square c-theme" type="text" name="pin">
            </div>
        </div>

                    <div class="form-group c-margin-t-0">
                        <div class="col-md-offset-3 col-md-6">
                        <button type="submit" name="submit" class="btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">Nạp thẻ
                        </button>            </div>
        </div>
                </form>

    <!-- END: PAGE CONTENT -->
            <!-- END: PAGE CONTENT -->
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

