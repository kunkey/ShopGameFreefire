<?php
defined('KUNKEYPR') or exit('Restricted Access');
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>Chỉnh sửa tỉ lệ Vòng Quay Siêu Cấp</b>
                            </h2>
                        </div>
                        <div class="body">

<?php

     //lấy tỷ lệ vòng quay bingo
    $_bingo = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `setting_sieucap`"));
    $item_1 = $_bingo['item_1'];
    $item_2 = $_bingo['item_2'];
    $item_3 = $_bingo['item_3'];
    $item_4 = $_bingo['item_4'];
    $giatien = $_bingo['giatien']; 



if(isset($_POST['submit'])) {

    $item_1s = $_POST["item_1"];
    $item_2s = $_POST["item_2"];
    $item_3s = $_POST["item_3"];
    $item_4s = $_POST["item_4"];
    $giatien = $_POST["giatien"];

      if(
       $item_1s ||
       $item_2s || 
       $item_3s || 
       $item_4s || 
       $giatien
   ){
$cmd = "UPDATE `setting_sieucap` SET
        `item_1` = '$item_1s',
        `item_2` = '$item_2s',
        `item_3` = '$item_3s',
        `item_4` = '$item_4s',
        `giatien` = '$giatien'
        ";

         mysqli_query($kun->connect_db(), $cmd);


        echo '<div class="alert alert-success fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Chỉnh sửa thành công</div>';
    }else{
        echo '<div class="alert alert-danger fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>FAIL!</strong> Vui lòng nhập đủ thông tin</div>';
    }
}
?>


                            <form method="POST">
                                <div class="row form-group">
<div class="col col-md-2"><label>100 Kim Cương</label><input type="text" name="item_1" class="form-control" value="<?php echo $item_1;?>"></div>
<div class="col col-md-2"><label>3000 Kim Cương</label><input type="text" name="item_2" class="form-control" value="<?php echo $item_2;?>"></div>
<div class="col col-md-2"><label>15000 Kim Cương</label><input type="text" name="item_3" class="form-control" value="<?php echo $item_3;?>"></div>
<div class="col col-md-2"><label>8000 Kim Cương</label><input type="text" name="item_4" class="form-control" value="<?php echo $item_4;?>"></div>
</div>


 <div class="row form-group">
<div class="col-md-6 col-sm-12 col-lg-6">

                                <label for="giatien">Số Tiền Mỗi Lần Quay:</label>
                                <div class="form-group">
                                    <div class="form-line focused">
                                        <input name="giatien" type="text" value="<?php echo $giatien;?>" class="form-control" placeholder="Nhập Số Tiền Mỗi Lượt Quay">
                                    </div>
                                </div>
                            </div>

<div class="col-md-6 col-sm-12 col-lg-6">
<div class="col-md-6 col-sm-12 col-lg-6">

                                <label for="nohu_from">XXXXXXXXXXX:</label>
                                <div class="form-group">
                                    <div class="form-line focused">
                                        <input type="text" value="" class="form-control" placeholder="" disabled>
                                    </div>
                                </div>
                            </div>



<div class="col-md-6 col-sm-12 col-lg-6">

                                <label for="nohu_to">XXXXXXXXXXX:</label>
                                <div class="form-group">
                                    <div class="form-line focused">
                                        <input type="text" value="" class="form-control" placeholder="" disabled>
                                    </div>
                                </div>
                            </div>


</div>
</div>

                                
              <div class="text-center "><button type="submit" name="submit" class="btn btn-primary waves-effect">
                                        <i class="material-icons">update</i>
                                        <span>Cập Nhập</span>
                                    </button></div>
                            </form>
                        </div>
                    </div>
                </div>