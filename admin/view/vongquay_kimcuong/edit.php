<?php 
defined('KUNKEYPR') or exit('Restricted Access');
$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong` WHERE `id`='".$_GET['id']."'"));

if(!$row['id']) die("<center><h1>Không Tìm Thấy Vòng Quay!</center>");

?>


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SỬA VÒNG QUAY KIM CƯƠNG "<?php echo $row['name'];?>"
                                <small>Ghi đúng thông tin nếu không sẽ có lỗi xảy ra!</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">


        <?php 

        if(isset($_POST['submit'])) {


                $name = $_POST['name'];
                $giatien = $_POST['giatien'];
                $mota = $_POST['mota'];

                $item = 'text_';
                $kimcuong = 'kimcuong_';
                $tyle = 'tyle_';


                for($i=1;$i<=8;$i++) {
                    $data[] = array(
                        'text' => $_POST[$item.$i],
                        'kimcuong' => $_POST[$kimcuong.$i],
                        'tyle' => $_POST[$tyle.$i]
                    );
                }

                //echo json_encode($data);

                mysqli_query($kun->connect_db(), "UPDATE `vongquay_kimcuong` SET `name` = '".$name."', `mota` = '".$mota."', `giatien` = '".$giatien."' WHERE `id`='".$_GET['id']."'");

                mysqli_query($kun->connect_db(), "UPDATE `vongquay_kimcuong_gift` 
                    SET 
                    `item_1` = '".mysqli_real_escape_string($kun->connect_db(), json_encode($data[0]))."', 
                    `item_2` = '".mysqli_real_escape_string($kun->connect_db(), json_encode($data[1]))."', 
                    `item_3` = '".mysqli_real_escape_string($kun->connect_db(), json_encode($data[2]))."', 
                    `item_4` = '".mysqli_real_escape_string($kun->connect_db(), json_encode($data[3]))."', 
                    `item_5` = '".mysqli_real_escape_string($kun->connect_db(), json_encode($data[4]))."', 
                    `item_6` = '".mysqli_real_escape_string($kun->connect_db(), json_encode($data[5]))."', 
                    `item_7` = '".mysqli_real_escape_string($kun->connect_db(), json_encode($data[6]))."', 
                    `item_8` = '".mysqli_real_escape_string($kun->connect_db(), json_encode($data[7]))."' WHERE `id_vongquay`='".$_GET['id']."'");

                    echo '<div class="alert bg-green alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Update Thành Công Vòng Quay <b>"'.$name.'" Thành Công!</b></div>';

        }

        ?>  

         
                                </div>


                        <form action="" onsubmit="return validate()" method="post" enctype="multipart/form-data">

                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
                                <div class="col-xs-12 col-lg-3 col-md-3 col-sm-12">
                                    <h2 class="card-inside-title">Tên Vòng Quay</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên cho vòng quay" value="<?php echo $row['name'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-3 col-md-3 col-sm-12">
                                    <h2 class="card-inside-title">Giá Tiền mỗi lần quay</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="giatien" name="giatien" class="form-control" placeholder="Nhập giá mỗi lần quay cho vòng quay" value="<?php echo $row['giatien'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php 
$rows = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong_gift` WHERE `id_vongquay`='".$_GET['id']."'"));
$item = 'item_';
for($x=1;$x<=8;$x++) {
$items = $rows[$item.$x];

$json = json_decode($items, true);

 ?>



                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Thông Số Phần Quà <?php echo $x;?>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                    <h2 class="card-inside-title">Text hiện khi quay trúng</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="text_<?php echo $x;?>" name="text_<?php echo $x;?>" class="form-control" placeholder="Text Hiện Khi Quay Trúng" value="<?php echo $json['text'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6 col-md-6 col-sm-12">
                                    <h2 class="card-inside-title">Giá Trị(Kim Cương)</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="kimcuong_<?php echo $x;?>" name="kimcuong_<?php echo $x;?>" min="0" class="form-control" placeholder="Kim Cương Trúng" required="" value="<?php echo $json['kimcuong'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6 col-md-6 col-sm-12">
                                    <h2 class="card-inside-title">Tỷ Lệ Trúng(%)</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="tyle_<?php echo $x;?>" name="tyle_<?php echo $x;?>" min="0" max="100" class="form-control" placeholder="Tỷ Lệ Trúng" value="<?php echo $json['tyle'];?>" required="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


        <?php } ?>

                                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                    <h2 class="card-inside-title">Mô Tả Cho Vòng Quay</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                        
                                            <textarea name="mota" rows="8" class="form-control no-resize" placeholder="Bạn muốn nói gì về vòng quay kim cương này..."><?php echo $row['mota'];?></textarea>

                                        </div>
                                    </div>
                                </div>


                                <center>
                                    <button type="submit" name="submit" class="btn btn-primary waves-effect">
                                        <i class="material-icons">update</i>
                                        <span>Cập Nhập Vòng Quay</span>
                                    </button>
                                </center>

                            </form>





                            </div>
                        </div>
                    </div>
                </div>
            </div>


<script type="text/javascript">
    
function validate(){

  valid = true;

     if($("#name").val() == ''){
        valid = false;
        alert('Thiếu Tên!');
     }else if($("#giatien").val() == '') {
        valid = false;
        alert('Thiếu Giá Tiền!');
     }else {
        

         if($("#text_1").val() == ''){
            valid = false;
            alert('Thiếu Text Phần Quà 1!');
         }else if($("#kimcuong_1").val() == '') {
            valid = false;
            alert('Thiếu Giá Trị 1!');
         }else if ($("#tyle_1").val() == '') {
            valid = false;
            alert('Thiếu Tỷ Lệ 1!');
         }else if($("#text_2").val() == ''){
            valid = false;
            alert('Thiếu Text Phần Quà 2!');
         }else if($("#kimcuong_2").val() == '') {
            valid = false;
            alert('Thiếu Giá Trị 2!');
         }else if ($("#tyle_2").val() == '') {
            valid = false;
            alert('Thiếu Tỷ Lệ 2!');
         }else if($("#text_3").val() == ''){
            valid = false;
            alert('Thiếu Text Phần Quà 3!');
         }else if($("#kimcuong_3").val() == '') {
            valid = false;
            alert('Thiếu Giá Trị 3!');
         }else if ($("#tyle_3").val() == '') {
            valid = false;
            alert('Thiếu Tỷ Lệ 3!');
         }else if($("#text_4").val() == ''){
            valid = false;
            alert('Thiếu Text Phần Quà 4!');
         }else if($("#kimcuong_4").val() == '') {
            valid = false;
            alert('Thiếu Giá Trị 4');
         }else if ($("#tyle_4").val() == '') {
            valid = false;
            alert('Thiếu Tỷ Lệ 4!');
         }else if($("#text_5").val() == ''){
            valid = false;
            alert('Thiếu Text Phần Quà 5!');
         }else if($("#kimcuong_5").val() == '') {
            valid = false;
            alert('Thiếu Giá Trị 5!');
         }else if ($("#tyle_5").val() == '') {
            valid = false;
            alert('Thiếu Tỷ Lệ 5!');
         }else if($("#text_6").val() == ''){
            valid = false;
            alert('Thiếu Text Phần Quà 6!');
         }else if($("#kimcuong_6").val() == '') {
            valid = false;
            alert('Thiếu Giá Trị 6!');
         }else if ($("#tyle_6").val() == '') {
            valid = false;
            alert('Thiếu Tỷ Lệ 6!');
         }else if($("#text_7").val() == ''){
            valid = false;
            alert('Thiếu Text Phần Quà 7!');
         }else if($("#kimcuong_7").val() == '') {
            valid = false;
            alert('Thiếu Giá Trị 7!');
         }else if ($("#tyle_7").val() == '') {
            valid = false;
            alert('Thiếu Tỷ Lệ 7!');
         }else if($("#text_8").val() == ''){
            valid = false;
            alert('Thiếu Text Phần Quà 8!');
         }else if($("#kimcuong_8").val() == '') {
            valid = false;
            alert('Thiếu Giá Trị 8!');
         }else if ($("#tyle_8").val() == '') {
            valid = false;
            alert('Thiếu Tỷ Lệ 8!');
         }else {
             valid = true;
         }



     }

    return valid //true or false
}

</script>