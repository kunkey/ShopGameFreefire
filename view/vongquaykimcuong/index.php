<?php
defined('KUNKEYPR') or exit('Restricted Access');
$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong` WHERE `id`='".$_GET['id']."' AND `status`='true'"));
if(!$row['id']) die("<center><h1>Không Tìm Thấy Vòng Quay!</center>");


?>
<?php //echo $kun->compact_string('kun', 5, '***');?>



<input type="hidden" id="document" value="<?php echo $_GET['id'];?>">
<form id="form"></form>

<div class="c-content-title-1 pd50" style="margin-top: 50px;">
<h3 class="c-center c-font-uppercase c-font-bold"><?php echo $row['name'];?></h3>
<center><b><font color="red">Chú ý : <?php echo $kun->compact_number($row['giatien']);?>/1 lần quay </font></b></center>
<div class="c-line-center c-theme-bg"></div>
</div>

<div class="col-lg-6 col-md-12" style="margin: 0px;margin-bottom: 100px;">


<div class="item item-left">
<section class="rotation">
<div class="play-spin">
<a class="ani-zoom" id="start"><img src="/assets/img/btn-quay.png" alt="Play Center"></a>
<img style="width: 100%;max-width: 100%;opacity: 1;" src="<?php echo $kun->vongquaykimcuong_image($_GET['id'], 'image');?>"alt="Play" id="rotate">
</div>
<div class="text-center">
</div>
</section>
</div>

</div>
</div>



<div class="col-lg-6 col-md-12 list-roll">
<div class="btn-top">
<a href="#" class="thele btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Thể Lệ</span>
</span>
</a>
<a href="/login" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Rút quà</span>
</span>
</a>
<a href="/rubywheel/logacc/1281" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Lịch sử quay</span>
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
<h3 class="c-center c-font-uppercase c-font-bold">LƯỢT QUAY GẦN ĐÂY</h3>
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
$res = mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` WHERE `action`='Vòng Quay FreeFire' AND `action_name`='".$row['name']."' ORDER BY `time` DESC LIMIT 0, 50");
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


<script src="/assets/Scripts/client_0x2165x1.js"></script>
<script type="text/javascript">
$( document ).ready(function() {

    var bRotate = false;

   function rotateFn(angles, txt, type){
        bRotate = !bRotate;
        $('#rotate').stopRotate();
        $('#rotate').rotate({
            angle:0,
            animateTo:angles+1800,
            duration:11000, // tốc độ quay tay
            callback:function (){
               var awar = txt;

		swal("Thành công!", awar, type);
            reload_money(); 
                bRotate = !bRotate;
            }
        })
    }



    $('#start').click(function (){

        if(bRotate)return;



  $.ajax({ 
        type: 'post', 
        dataType: "JSON",
        url: '/system/vongquaykimcuong', 
        data: {
        	csrf: $('#csrf').val()
        }, 
        success: function (json) {

        	if(json.status == 3) {
	 swal("Lỗi!", "Vui lòng đăng nhập để quay!", "error");    		
        	}else if(json.status == 4) {
	 swal("Lỗi!", "Bạn Không Đủ Tiền Trong Tài Khoản Vui Lòng Nạp Thêm!", "error");  
        	}else if(json.status == 1) {
        		if(json.item > 0 && json.item < 9) {
   rotateFn(json.location, json.msg, "success");    
}else {
	swal("Lỗi!", "Lỗi hệ thống!", "error"); 
}

        	}else {
	 swal("Lỗi!", "Lỗi hệ thống!", "error");         		
        	}

	}
});

    });

});
</script>
