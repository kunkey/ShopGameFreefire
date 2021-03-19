
<?php

     //lấy tỷ lệ vòng quay bingo
    $_bingo = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_codesung`"));
    $item_1 = $_bingo['item_1'];
    $item_2 = $_bingo['item_2'];
    $item_3 = $_bingo['item_3'];
    $item_4 = $_bingo['item_4'];
    $item_5 = $_bingo['item_5'];
    $item_6 = $_bingo['item_6'];
    $item_7 = $_bingo['item_7'];
    $item_8 = $_bingo['item_8'];
    $giatien = $_bingo['giatien'];



if(isset($_POST['update'])) {

    $item_1s = $_POST["item_1"];
    $item_2s = $_POST["item_2"];
    $item_3s = $_POST["item_3"];
    $item_4s = $_POST["item_4"];
    $item_5s = $_POST["item_5"];
    $item_6s = $_POST["item_6"];
    $item_7s = $_POST["item_7"];
    $item_8s = $_POST["item_8"];
    $giatien = $_POST["giatien"];

      if(
       $item_1s ||
       $item_2s || 
       $item_3s || 
       $item_4s || 
       $item_5s || 
       $item_6s || 
       $item_7s || 
       $item_8s ||
       $giatien
   ){
$cmd = "UPDATE `vongquay_codesung` SET
        `item_1` = '$item_1s',
        `item_2` = '$item_2s',
        `item_3` = '$item_3s',
        `item_4` = '$item_4s',
        `item_5` = '$item_5s',
        `item_6` = '$item_6s',
        `item_7` = '$item_7s',
        `item_8` = '$item_8s',
        `giatien` = '$giatien'
        ";

         mysqli_query($kun->connect_db(), $cmd);


        echo '<div class="alert alert-success fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Chỉnh sửa thành công</div>';
        echo '<meta http-equiv=refresh content="1; URL=">';
    }else{
        echo '<div class="alert alert-danger fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>FAIL!</strong> Vui lòng nhập đủ thông tin</div>';
    }
}
?>





<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>Chỉnh sửa tỷ lệ & Giá Tiền vòng quay code súng</b>
                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST">
                                <div class="row form-group">
<div class="col col-md-2"><label>Ak47 Giác Đấu</label><input type="text" name="item_1" class="form-control" value="<?php echo $item_1;?>"></div>
<div class="col col-md-2"><label>Scar Titan</label><input type="text" name="item_2" class="form-control" value="<?php echo $item_2;?>"></div>
<div class="col col-md-2"><label>Thêm 30% Trúng</label><input type="text" name="item_3" class="form-control" value="<?php echo $item_3;?>"></div>
<div class="col col-md-2"><label>M1014 Địa Ngục</label><input type="text" name="item_4" class="form-control" value="<?php echo $item_4;?>"></div>
<div class="col col-md-2"><label>Mp40 Sấm Sét</label><input type="text" name="item_5" class="form-control" value="<?php echo $item_5;?>"></div>
<div class="col col-md-2"><label>Ak47 Tình Yêu</label><input type="text" name="item_6" class="form-control" value="<?php echo $item_6;?>"></div>
</div>
 <div class="row form-group">
<div class="col col-md-2"><label>Ak47 Hỏa Kỳ Lân</label><input type="text" name="item_7" class="form-control" value="<?php echo $item_7;?>"></div>
<div class="col col-md-2"><label>XM8 Cá Mập Vàng</label><input type="text" name="item_8" class="form-control" value="<?php echo $item_8;?>"></div>
</div>
                          


 <div class="row form-group">
<div class="col-md-6 col-sm-12 col-lg-6">

                                <label for="giatien">Số Tiền Mỗi Lượt Quay:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="giatien" type="text" class="form-control" placeholder="Nhập Số Tiền Mỗi Lượt Quay" value="<?php echo $_bingo['giatien'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                               <button type="submit" name="update" class="btn bg-light-blue">EDIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>