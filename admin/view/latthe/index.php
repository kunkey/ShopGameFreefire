<?php
defined('KUNKEYPR') or exit('Restricted Access');
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>Chỉnh sửa tỉ lệ Lật Thẻ</b>
                            </h2>
                        </div>
                        <div class="body">

<?php

     //lấy tỷ lệ vòng quay bingo
    $_bingo = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `setting_latthe`"));
    $item_1 = $_bingo['item_1'];
    $item_2 = $_bingo['item_2'];
    $item_3 = $_bingo['item_3'];
    $item_4 = $_bingo['item_4'];
    $item_5 = $_bingo['item_5'];
    $item_6 = $_bingo['item_6'];
    $giatien = $_bingo['giatien']; 



if(isset($_POST['submit'])) {

    $item_1s = $_POST["item_1"];
    $item_2s = $_POST["item_2"];
    $item_3s = $_POST["item_3"];
    $item_4s = $_POST["item_4"];
    $item_5s = $_POST["item_5"];
    $item_6s = $_POST["item_6"];
    $giatien = $_POST["giatien"];

      if(
       $item_1s ||
       $item_2s || 
       $item_3s || 
       $item_4s || 
       $item_5s || 
       $item_6s || 
       $giatien
   ){
$cmd = "UPDATE `setting_latthe` SET
        `item_1` = '$item_1s',
        `item_2` = '$item_2s',
        `item_3` = '$item_3s',
        `item_4` = '$item_4s',
        `item_5` = '$item_5s',
        `item_6` = '$item_6s',
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
<div class="col col-md-2"><label>Chúc Bạn May Mắn</label><input type="text" name="item_1" class="form-control" value="<?php echo $item_1;?>"></div>
<div class="col col-md-2"><label>10 Kim Cương</label><input type="text" name="item_2" class="form-control" value="<?php echo $item_2;?>"></div>
<div class="col col-md-2"><label>5000 Kim Cương</label><input type="text" name="item_3" class="form-control" value="<?php echo $item_3;?>"></div>
<div class="col col-md-2"><label>50 Kim Cương</label><input type="text" name="item_4" class="form-control" value="<?php echo $item_4;?>"></div>
<div class="col col-md-2"><label>9999 Kim Cương</label><input type="text" name="item_5" class="form-control" value="<?php echo $item_5;?>"></div>
<div class="col col-md-2"><label>500 Cương</label><input type="text" name="item_6" class="form-control" value="<?php echo $item_6;?>"></div>
</div>


 <div class="row form-group">
<div class="col-md-6 col-sm-12 col-lg-6">

                                <label for="giatien">Số Tiền Mỗi Lần Lật Thẻ:</label>
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
                                        <span>Cập Nhập Lật Thẻ</span>
                                    </button></div>
                            </form>
                        </div>
                    </div>
                </div>