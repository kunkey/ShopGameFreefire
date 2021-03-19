<?php
defined('KUNKEYPR') or exit('Restricted Access');
$ros = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `setting_bingo`"));
?>
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
 
<div class="c-content-title-1 pd50">
    <h3 class="c-center c-font-uppercase c-font-bold">VÒNG QUAY BINGO TẾT THIẾU NHI 20K</h3>
<center><b><font color="red">Chú ý : <?php echo $kun->compact_number($ros['giatien']);?>/1 lần lật hình </font></b></center>
    <div class="c-line-center c-theme-bg"></div>
</div>
  <div class="container"><div class="content">

    <div class="contentquay contentquaysingle">

        <div class="row">

            <div class="col-lg-6 col-md-6 col-xs-12">

<?php if($kun->is_mobile())$cao='215';else $cao='400';?>
          <div class="col-md-12 col-lg-12 col-xs-12" style="background-color: #2b1919; height: <?php echo $cao;?>px;margin-top: 50px;border-radius: 16px;border: 1px solid #ccc!important;">

			<div style="margin-top: 30px;"></div>

	<div class="col-lg-4 col-xs-4 col-md-4"><img id="role_1" style="width: 100%;" src="/assets/img/bingo/bingo_minc.gif"></div>
	<div class="col-lg-4 col-xs-4 col-md-4"><img id="role_2" style="width: 100%;" src="/assets/img/bingo/bingo_minc.gif"></div>
	<div class="col-lg-4 col-xs-4 col-md-4"><img id="role_3" style="width: 100%;" src="/assets/img/bingo/bingo_minc.gif"></div>


		<div class="col-lg-12 col-xs-12 col-md-12" style="margin-top: 30px;"><center><button id="quay" class="btn btn-lg btn-success">Quay Bingo</button></center></div>

            </div>

</div>



<style type="text/css">
    .list-roll-inner {
    width: 85%;
    margin-top: 30px;
    max-height: 380px;
    overflow-y: scroll;
    margin: 0 auto;
}
</style>
<div class="col-lg-6 col-md-6 col-xs-12 list-roll">
    <div class="btn-top">
        <a href="/user/rutkimcuong" class="uytin btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
            Rút Quà
        </a>
        <a href="/user/lichsugiaodich" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
            Lịch Sử
        </a>
    </div>

<div class="list-roll-inner">
<table class="table table-hover table-custom-res">
                        <thead>
                        <tr>
                            <th>STT</th>                            
                            <th>Username</th>
                            <th>Phần thưởng</th>
                            <th>Thời Gian</th>
                        </tr>
                        </thead>
                        <tbody>
<?php 
$res = mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` WHERE `action`='Bingo FreeFire' AND `action_name`='Bingo FreeFire' ORDER BY `time` DESC LIMIT 0, 50");
while ($row = mysqli_fetch_array($res)) {
    ?>
                            <tr>
                                <td>#<?php echo $row['id'];?></td>                                
                                <td><?php echo $kun->compact_string($row['username'], 7, '***');?></td>
                                <td><?php echo $row['mota'];?></td>      
                                <td><?php echo date('H:i d/m', $row['time']);?></td>                              
                            </tr>
    <?php } ?>                        
                        </tbody>
                    </table>
</div>
</div>

    </div>
</div>



<!-- END: PAGE CONTAINER -->

         </div>
        </div>
        <?php
        for($i=1; $i <= 8; $i++) { 
echo '<img style="display: none;" src="/assets/img/bingo/'.$i.'.gif">';            
        }
?>


<script type="text/javascript">
$( document ).ready(function() {
});




    $('#quay').click(function (){

    document.getElementById("quay").disabled = true;
    document.getElementById("quay").innerHTML = "Đang Kiểm Tra!";

  $.ajax({ 
        type: 'post', 
        dataType: "JSON",
        url: '/system/bingo', 
        data: {}, 
        success: function (json) {

            if(json.status == 3) {
     swal("Lỗi!", "Vui lòng đăng nhập để quay!", "error");   
         document.getElementById("quay").disabled = false;
         document.getElementById("quay").innerHTML = "Quay";    
            }else if(json.status == 4) {
     swal("Lỗi!", "Bạn Không Đủ Tiền Trong Tài Khoản Vui Lòng Nạp Thêm!", "error");  
         document.getElementById("quay").disabled = false;
         document.getElementById("quay").innerHTML = "Quay!";
            }else if(json.status == 1) {

         document.getElementById("quay").disabled = true;
         document.getElementById("quay").innerHTML = "Đang Quay";

                var data = json.data;

                console.log("OK");

                 loop_wait(data.role_1, data.role_2, data.role_3, json.msg);

            }else {
     swal("Lỗi!", "Lỗi hệ thống!", "error");                
            }

    }
});

    });


function loop_wait(role_1, role_2, role_3, msg) {

    var items = [1,2,3,4,5,6,7,8];  // name of img random images

    var stop_bingo_1 = 100; // 10s
    var stop_bingo_2 = 130; // 13s
    var stop_bingo_3 = 160; // 16s


// Bingo 1
for (let i=1; i<=stop_bingo_1; i++) {setTimeout( function timer(){
 var item_1 = items[Math.floor(Math.random() * items.length)];
  change_img("role_1", item_1);
 if(i == stop_bingo_1) {
  change_img("role_1", role_1); 
  return
 }
 }, i*100 );}

// Bingo 1
for (let i=1; i<=stop_bingo_2; i++) {setTimeout( function timer(){
 var item_2 = items[Math.floor(Math.random() * items.length)];
 change_img("role_2", item_2);
  if(i == stop_bingo_2) {
  change_img("role_2", role_2); 
  return
 }
 }, i*100 );}

// Bingo 1
for (let i=1; i<=stop_bingo_3; i++) {setTimeout( function timer(){
 var item_3 = items[Math.floor(Math.random() * items.length)];
 change_img("role_3", item_3);
  if(i == stop_bingo_3) {
  change_img("role_3", role_3);
  return
 }
 }, i*100 );}


setTimeout( function show_ketqua(){
     swal("Thành Công!", msg, "success"); 
         document.getElementById("quay").disabled = false;
         document.getElementById("quay").innerHTML = "Quay";   
         reload_money();
 }, 16500 );



}

function change_img(id, img_name) {
        roll = document.getElementById(id);
        roll.src = "";
        roll.src = '/assets/img/bingo/'+img_name+'.gif';
}



</script>