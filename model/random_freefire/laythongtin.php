<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

if(!$_SESSION['token']) {
    die("<script>swal('Lỗi', 'Bạn Cần Đăng Nhập', 'error');setTimeout(function(){location.href='/signin.html';}, 1500);</script>");
}


$id = $_POST['id'];
$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `id`='".$id."' AND `status`='true'"));
$thread = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` WHERE `cname`='".$row['cname']."'"));
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Xác nhận acc random freefire</h4>
</div>
                <div class="modal-body" id="buy">
                    <p style="display: none;" id="result"></p>
				<table class="table table-striped">
					<tbody><tr>
						<th colspan="2">Xác nhận mua acc random freefire mã số #<?php echo $row['id'];?></th>
					</tr>
						<tr>
							<td>Nhà phát hành:</td>
							<th class="text-danger">Garena</th>
						</tr>
						<tr>
							<td>Loại:</td>
							<th class="text-danger">Acc Random FreeFire</th>
						</tr>
						<tr>
							<td>Giá tiền:</td>
							<th class="text-info"><?php echo number_format($thread['giatien']);?>đ</th>
						</tr>
				</tbody></table>

					                        <div class="modal-footer">
							<button id="mua" type="submit" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" Onclick="muaacc('<?php echo $row['id'];?>')">Mua luôn</button>
                            <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                        </div>
										                </div>


</div>
	</div>
</div>
<script>
function muaacc(id) {
    document.getElementById("mua").disabled = true;

$.ajax({
                method: "POST",
                url: "/model/random_freefire/xuly.php",
                data: {
                    id: id
                },
                success : function(response){
                    $('.close').click();
                        $('#result').html(response);
                        reload_money();
                }
            });


}

</script>
  
 
</div>