<?php 
defined('KUNKEYPR') or exit('Restricted Access');
$ros = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `setting_sieucap`"));
?>
<div class="c-layout-page">

<style>
    .btn + .btn{
        margin-left: 0!important;
    }

    .btn-right .btn{
        float: left;
        width: 100%;
        background: #fb236a;
        font-size: 13px;
        color: #ffffff;
        text-align: center;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        -ms-border-radius: 8px;
        -o-border-radius: 8px;
        border-radius: 8px;
        border: 2px solid #fb236a;
        padding: 11px 0;
        margin-top: 10px;
        font-size: 20px;
        font-weight: bold;
    }

    .btn-right .btn:hover{
        background-color: #ff8db2;
        border: 2px solid #ff8db2;
    }
    .square{
        width: 100%;
    }
    #squaredesktop .box{
        min-width: 40px;
        min-height: 40px;
        /*background-color: #ccc;*/
        padding: 10px;
    }
    #squaremobile .box{
        padding: 5px;
    }
    .box img.active{

          box-shadow:
            0 0  5px #fff, 
            0 0  10px #fff, 
            0 0  15px #fff, 
            0 0  20px #ef1c70, 
            0 0  35px #ff4991
    }
    .outer-btn{
        width: 100%
    }
    .outer-btn:hover{
        opacity: 0.7
    }
    #squaremobile .outer-btn{
        margin-bottom: -50px;
    }
    .nopadding{
        padding: 0;
    }

</style>
<div class="c-content-title-1 pd50">
<h3 class="c-center c-font-uppercase c-font-bold">VÒNG QUAY GIẢI CỨU THẾ GIỚI 19K</h3>
<center><b><font color="red">Chú ý : <?php echo $kun->compact_number($ros['giatien']);?>/1 lần quay </font></b></center>
<div class="c-line-center c-theme-bg"></div>
</div>
<div class="col-lg-1 col-md-hidden"></div>
<div id="boxfull" class="col-lg-6 col-md-12">
<div class="c-content-box c-size-md">

<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
<div class="row-flex-safari game-list" style="display: flex; flex-wrap: wrap">
<table id="squaredesktop" class="square">
                        <tbody><tr>
                            <td></td>
                            <td><div id="id21525" data-num="1" class="gift1 box"><img src="https://i.imgur.com/ySOYWJF.png"></div></td>
                            <td><div id="id21526" data-num="2" class="gift2 box"><img src="https://i.imgur.com/yZkIl69.png"></div></td>
                            <td><div id="id21527" data-num="3" class="gift3 box"><img src="https://i.imgur.com/0It0qP4.png"></div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div id="id21538" data-num="12" class="gift12 box"><img src="https://i.imgur.com/Im2lcYW.pngg"></div></td>
                            <td colspan="3"></td>
                            <td><div id="id21528" data-num="4" class="gift4 box"><img src="https://i.imgur.com/4O3PIwU.png"></div></td>
                        </tr>
                        <tr>
                            <td><div id="id21537" data-num="11" class="gift11 box"><img src="https://i.imgur.com/WVOlIel.png"></div></td>
                            <td colspan="3">
                                <div class="outer-btn">
                                <div class="play" style="display: block; margin: 0 auto; width: 80%;position: relative;z-index: 1;">
                                    <img src="https://i.imgur.com/sos86SA.png" alt="" style="position: absolute;top: 0px;left: 17%;width:70%">
                                </div>
                                </div>
                            </td>
                            <td><div id="id21529" data-num="5" class="gift5 box"><img src="https://i.imgur.com/J1UzSga.png"></div></td>
                        </tr>
                        <tr>
                            <td><div id="id21536" data-num="10" class="gift10 box"><img src="https://i.imgur.com/PkAmfDi.png"></div></td>
                            <td colspan="3"></td>
                            <td><div id="id21530" data-num="6" class="gift6 box"><img src="https://i.imgur.com/oWfNt8V.png"></div></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><div id="id21535" data-num="9" class="gift9 box"><img src="https://i.imgur.com/i59Ej71.png"></div></td>
                            <td><div id="id21533" data-num="8" class="gift8 box"><img src="https://i.imgur.com/CWWxWLB.png"></div></td>
                            <td><div id="id21531" data-num="7" class="gift7 box"><img src="https://i.imgur.com/EyDigM8.png"></div></td>
                            <td></td>
                        </tr>
                    </tbody></table>

</div>
</div>

</div>
</div>
<div class="col-lg-1 col-md-hidden"></div>
<div class="col-lg-3 col-md-12 col-sm-12 btn-right" style="margin-top: 156px;">

<a href="#" class="col-xs-12 thele btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Thể Lệ</span>
</span>
</a>
<a href="#" class="col-xs-12 luotquay btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Lượt quay gần đây</span>
</span>
</a>
<a href="/user/rutkimcuong" class="col-xs-12 btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Rút Quà</span>
</span>
</a>
<div class="text-center"> &nbsp;</div>

</div>
<div class="col-lg-2 col-md-hidden"></div>
<div class="modal fade" id="theleModal" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thể Lệ</h4>
</div>
<div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
<p><strong>Vòng quay giải cứu thế giới của các nhân vật trong Game Free Fire trước đại dịch CORONA</strong></p>
<p><strong>Mỗi lượt quay 19k có cơ hội nhận từ 100kc- 15000kc&nbsp;</strong></p>
</div>
<div class="modal-footer">
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".thele").on("click", function(){
            $("#theleModal").modal('show');
        })
        $(".uytin").on("click", function(){
            $("#uytinModal").modal('show');
        })
        $(".luotquay").on("click", function(){
            $("#luotquayModal").modal('show');
        })
    });
</script>
<div class="modal fade" id="uytinModal" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Uy Tín</h4>
</div>
<div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
</div>
<div class="modal-footer">
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="luotquayModal" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Lượt chơi gần đây</h4>
</div>
<div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
<div class="c-content-title-1" style="margin: 0 auto">
</div>
<div class="list-roll-inner">
<table cellpadding="10" class="table table-striped">
<tbody>
<tr>
<th>Tài khoản</th>
<th>Giải thưởng</th>
<th>Thời gian</th>
</tr>
</tbody>
<tbody>
<?php 
$res = mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` WHERE `action`='Vòng Quay Siêu Cấp' AND `action_name`='Vòng Quay Siêu Cấp' ORDER BY `time` DESC LIMIT 0, 50");
while ($row = mysqli_fetch_array($res)) {
    ?>
                            <tr>                            
                                <td><?php echo $kun->compact_string($row['username'], 7, '***');?></td>
                                <td><?php echo $row['mota'];?></td>      
                                <td><?php echo date('H:i d/m', $row['time']);?></td>                              
                            </tr>

    <?php } ?>      

</tbody>
</table>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="noticeModal" role="dialog" aria-hidden="true" style="display: none;">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
</div>
<div class="modal-body content-popup" style="font-family: helvetica, arial, sans-serif;">VÒNG QUAY SIÊU CẤP 20k</div>
<div class="modal-footer">
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>



</div>













<script type="text/javascript">

    document.addEventListener('touchmove', function (event) {
      if (event.scale !== 1) { event.preventDefault(); }
    }, false);
    
    var lastTouchEnd = 0;
    document.addEventListener('touchend', function (event) {
      var now = (new Date()).getTime();
      if (now - lastTouchEnd <= 300) {
        event.preventDefault();
      }
      lastTouchEnd = now;
    }, false);

$(document).ready(function(e){

    var roll_check = true;
    var num_loop = 3;
    var num = 0;
    var num_current = 0;
    var target = 0;
    $('.play').click(function(){
        if(roll_check){
            num = 0;
            num_current = 0;
            roll_check = false;
            $.ajax({
                url: '/model/game/sieucap/xuly.php',
                datatype:'json',
                data:{},
                type: 'post',
                success: function (data) {
                    data = JSON.parse(data);
                    if(data.status=='error'){
                        roll_check = true;
                        $('.box img').removeClass('active');
                        $('.gift1 img').addClass('active');
                           $('#noticeModal').modal('show');
                        $('.content-popup').html(data.msg);
                       
                        return;
                    }
                    if(data.status=='login'){
                        swal("Lỗi!", "Bạn Cần Đăng Nhập!", "error");
                        return;
                    }
                    gift_detail = data.msg;
                    num_roll_remain = gift_detail.num_roll_remain;
                    var targetId = gift_detail.id;
                    target = parseInt($('#id'+targetId).attr('data-num'));
                    loop();
                },
                error: function(){
                    $('.content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                    $('#noticeModal').modal('show');
                }
            })
        }
    })

    function loop() {
        if(num<(parseInt(num_loop*12)+target)){
           num++;
           num_current++;
           $('.box img').removeClass('active');
           $('.gift'+(num_current)+' img').addClass('active');
           var time = 400
           if(num<4){
                time = 400
            }else if(num<8){
                time = 200
            }else if(num>7){
                time = 60
            }

            if(num>((num_loop*12)+target-7) && num<((num_loop*12)+target-3)){
                time = 200;
            }

            if(num>((num_loop*12)+target-4)){
                time = 400
            }
           setTimeout(function(){
                loop();
           },time);

           if(num_current==12){
            num_current=0;
           }
        }else{
            roll_check = true;
                 $('#noticeModal').modal('show');
                 $('.content-popup').html(gift_detail.name);
            
        }
    }


});

</script>