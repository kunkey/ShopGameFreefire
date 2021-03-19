<?php 
defined('KUNKEYPR') or exit('Restricted Access');
$ros = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `setting_latthe`"));
?>
<div class="row-flex-safari game-list">
                
<div class="c-content-title-1 pd50" style="margin-top: 50px;">
<h3 class="c-center c-font-uppercase c-font-bold">Lật Hình May Mắn</h3>
<center><b><font color="red">Chú ý : <?php echo $kun->compact_number($ros['giatien']);?>/1 lần lật hình </font></b></center>
<div class="c-line-center c-theme-bg"></div>
</div>

<style type="text/css">
img.shake-image:hover {
  /* Start the shake animation and make the animation last for 0.5 seconds */
  animation: shake 0.5s; 

  /* When the animation is finished, start again */
  animation-iteration-count: infinite; 
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}

</style>


               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="row" id="okmain">
                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6" id="gift1">
                                                <img id="img1" class="" src="https://i.imgur.com/XHpdcpZ.png">
                                                <img onclick="umbalaxibua('gift1', 'imgnen1')" id="imgnen1" class="shake-image" src="https://i.imgur.com/NVW3eib.png">
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6" id="gift2">
                                                <img id="img2" class="" src="https://i.imgur.com/fBJKnV7.png">
                                                <img onclick="umbalaxibua('gift2', 'imgnen2')" id="imgnen2" class="shake-image" src="https://i.imgur.com/NVW3eib.png">
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6" id="gift3">
                                                <img id="img3" class="" src="https://i.imgur.com/KoL5EFh.png">
                                                <img onclick="umbalaxibua('gift3', 'imgnen3')" id="imgnen3" class="shake-image" src="https://i.imgur.com/NVW3eib.png">
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6" id="gift4">
                                                <img id="img4" class="" src="https://i.imgur.com/EZ0b4I9.png">
                                                <img onclick="umbalaxibua('gift4', 'imgnen4')" id="imgnen4" class="shake-image" src="https://i.imgur.com/NVW3eib.png">
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6" id="gift5">
                                                <img id="img5" class="" src="https://i.imgur.com/NWiaOZ8.png">
                                                <img onclick="umbalaxibua('gift5', 'imgnen5')" id="imgnen5" class="shake-image" src="https://i.imgur.com/NVW3eib.png">
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6" id="gift6">
                                                <img id="img6" class="" src="https://i.imgur.com/XPBwWPK.png">
                                                <img onclick="umbalaxibua('gift6', 'imgnen6')" id="imgnen6" class="shake-image" src="https://i.imgur.com/NVW3eib.png">
                                    </div>
                          </div>

                    <div class="col-xs-12 col-md-12 col-lg-12"><center><button id="chehinh" class="btn btn-lg btn-success">ÚP HÌNH</button></center></div>

        </div>

</div>

               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="list-roll" style="margin-top: 120px;">
<div class="btn-top">
<a href="#" class="thele btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Thể Lệ</span>
</span>
</a>
<a href="/user/rutkimcuong" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Rút quà</span>
</span>
</a>

</div>

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

<style type="text/css">
    .list-roll-inner {
    width: 85%;
    margin-top: 30px;
    max-height: 400px;
    overflow-y: scroll;
    margin: 0 auto;
}
</style>


<div class="c-content-title-1" style="margin: 21 auto">
<h3 class="c-center c-font-uppercase c-font-bold">LẬT THẺ GẦN ĐÂY</h3>
</div>
<div class="list-roll-inner">
<table cellpadding="10" class="table table-striped">
<tbody>
<tr>
<th>Account</th>
<th>Giải thưởng</th>
<th>Thời gian</th>
</tr>
</tbody>
<tbody>

<?php 
$res = mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` WHERE `action`='Lật Thẻ FreeFire' AND `action_name`='Lật Thẻ FreeFire' ORDER BY `time` DESC LIMIT 0, 50");
while ($row = mysqli_fetch_array($res)) {
    ?>
  
 <tr>
<td><?php echo $kun->compact_string($row['username'], 7, '***');?></td>
<th><?php echo $row['mota'];?></th>
<th><?php echo date('H:i d/m', $row['time']);?></th>
</tr>    

<?php } ?>

</tbody>
</table>
</div>
</div>

               </div>




<script type="text/javascript">
    $(document).ready(function(){

        hide_all_select();

        $('#chehinh').click(function() {
            hide_all_gift();
            show_all_select();
        });

    }); 

    function umbalaxibua(selector, card) {
        roll = document.getElementById(card);
        roll.src = "";
        roll.src = '/assets/img/latthe/nen_latthe.png';

          $.ajax({ 
        type: 'post', 
        dataType: "JSON",
        url: '/system/latthe', 
        data: {}, 
        success: function (json) {

          if(json.status == 3) {
   swal("Lỗi!", "Vui lòng đăng nhập để quay!", "error");        
          }else if(json.status == 4) {
   swal("Lỗi!", "Bạn Không Đủ Tiền Trong Tài Khoản Vui Lòng Nạp Thêm!", "error");  
          }else if(json.status == 1) {
            document.getElementById("okmain").style['pointer-events'] = 'none';
                    roll = document.getElementById(card);
                    roll.src = "";
                    roll.src = json.img;

                setTimeout(function(){
                     swal('Thông Báo!', json.msg, 'success');
                     reload_money();
                }, 1000);
          }else {
   swal("Lỗi!", "Lỗi hệ thống!", "error");            
          }

  }
});

    }



    function hide_all_select() {
        for(var i=1;i<=6;i++) {
          $('#imgnen'+i).hide();
        }
    }

    function hide_all_gift() {
        for(var i=1;i<=6;i++) {
          $('#img'+i).hide();
        }
    }

    function show_all_select() {
        for(var i=1;i<=6;i++) {
          $('#imgnen'+i).fadeIn(3000);
        }
    }



</script>