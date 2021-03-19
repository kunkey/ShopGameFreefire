<?php 
defined('KUNKEYPR') or exit('Restricted Access');
$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` WHERE `id`='".$_GET['id']."'"));

if(!$row['id']) die("<center><h1>Không Tìm Thấy Gói Này!</center>");

?>




<?php
if(isset($_POST['sua_goi'])) {
	if( isset($_POST['name']) && isset($_POST['giatien']) && isset($_POST['id']) && isset($_POST['thumb'])) {


		if(is_numeric($_POST['giatien'])) {

			if($_POST['giatien'] >= 0) {

	mysqli_query($kun->connect_db(), "UPDATE `random_freefire` SET `name`='".$_POST['name']."', `giatien`='".$_POST['giatien']."', `thumb`='".$_POST['thumb']."' WHERE `id`='".$_POST['id']."'");

echo '<div class="alert alert-success alert-highlighted" role="alert">Đã Cập Nhật Gói Random <b>"'.$_POST['name'].'"</b>!</div>';
		echo '<meta http-equiv="refresh" content="1;URL=" /> ';
			} else {
				echo '<div class="alert alert-danger alert-highlighted" role="alert">Giá Phải Lớn Hơn Hoặc Bằng 0!</div>';			
			}



		}else {
				echo '<div class="alert alert-danger alert-highlighted" role="alert">Giá Phải Là Dạng Số!</div>';			
		}

	}else {
				echo '<div class="alert alert-danger alert-highlighted" role="alert">Vui Lòng Nhập Đầy Đủ Thông Tin!</div>';
	}
}
?>





<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>SỬA GÓI FREEFIRE RANDOM "<b><?php echo $row['name'];?></b>"</h2>
                            <small>Lưu ý: Bạn Chỉ Có Thể Chỉnh Sửa Tên Và Giá, Nếu Xóa thì toàn bộ acc trong gói sẽ bị xóa theo!</small>
                        </div>
                        <div class="body">

                            <form action="" method="post">
                            <div class="row clearfix">

                            	<input type="hidden" name="id" value="<?php echo $row['id'];?>">

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Nhập Tên Gói Random</label>
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" placeholder="Nhập Tên Gói Random" class="form-control" value="<?php echo $row['name'];?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Link Thumbnail</label>
                                    <div class="form-line">
                                        <input type="text" id="name" name="thumb" placeholder="Nhập Link Thumbnail" class="form-control" value="<?php echo $row['thumb'];?>">
                                    </div>
                                </div>
                            </div>


                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Giá Tiền</label>
                                        <div class="form-line">
                                           <input type="number" name="giatien" placeholder="Nhập Giá Tiền" class="form-control" value="<?php echo $row['giatien'];?>">
                                        </div>
                                    </div>
                                </div>

                            <div class="col-md-12"> 
                                <center><button type="submit" name="sua_goi" class="btn bg-light-blue">SỬA GÓI RANDOM</button></center>
                            </div>
                        

                        </div></form>
                    </div>
                </div>
            </div>
</div>