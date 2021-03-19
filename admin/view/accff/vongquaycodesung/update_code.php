<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>VÒNG QUAY CODE SÚNG 30K</b>
                            </h2>
                        </div>
                        <div class="body">








<?php
if(isset($_POST['submit'])) {

      if($_POST['item'] && $_POST['code']){

    $prefix = 'item_';
    $row = $prefix.$_POST['item'];

$cmd = "UPDATE `vongquay_codesung_gift` SET
        `".$row."` = '".$_POST['code']."'
        ";

         mysqli_query($kun->connect_db(), $cmd);


        echo '<div class="alert alert-success fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Chỉnh sửa thành công</div>';
        echo '<meta http-equiv=refresh content="1; URL=">';
    }else{
        echo '<div class="alert alert-danger fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>FAIL!</strong> Vui lòng nhập đủ thông tin</div>';
    }
}
?>





  <form method="POST">
<div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">

                               <div class="form-group">
                                    <label class=" form-control-label">Loại Code Súng!</label>
                                    <div class="input-group">
                                    <select name="item" class="form-control show-tick" tabindex="-98">
                                        <option value="1">Ak47 Giác Đấu</option>
                                        <option value="2">Scar Titan</option>
                                        <option value="3">Thêm 30% Trúng</option>
                                        <option value="4">M1014 Địa Ngục</option>
                                        <option value="5">Mp40 Sấm Sét</option>
                                        <option value="6">Ak47 Tình Yêu</option>
                                        <option value="7">Ak47 Hỏa Kỳ Lân</option>
                                        <option value="8">XM8 Cá Mập Vàng</option>
                                    </select>
                                    </div>
                                    
                                </div>
</div>

<div class="col-md-8 col-sm-12 col-xs-12 col-lg-8">

									             <div class="form-group">
                                    <label class=" form-control-label">UPDATE CODE SÚNG TẠI ĐÂY !</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                        <input type="text" name="code" id="info" rows="9" placeholder="Update code từng loại tại đây" class="form-control">
                                    </div>
                                    
                                </div>
</div>


    <center>
                               <button type="submit" name="submit" class="btn bg-light-blue">UPDATE CODE VÀO HỆ THỐNG</button>
                 </center>              
                             </form>
                           </div>
                        </div>






<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> 
                                <b>Danh Sách Code Súng</b>
                            </h2>
                        </div>
                        <div class="body">


  
<div class="table-responsive">  
<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
     <th>Loại Code</th>
     <th>Mã Code</th>
   </tr>
</thead>
<tbody>

<?php
$try = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_codesung_gift` LIMIT 0,1")); ?>

<tr>
   <td>Ak47 Giác Đấu</td>
   <td><?php echo $try['item_1'];?></td>
</tr> 
<tr>
   <td>Scar Titan</td>
   <td><?php echo $try['item_2'];?></td>
</tr> 
<tr>
   <td>Thêm 30% Trúng</td>
   <td><?php echo $try['item_3'];?></td>
</tr> 
<tr>
   <td>M1014 Địa Ngục</td>
   <td><?php echo $try['item_4'];?></td>
</tr> 
<tr>
   <td>Mp40 Sấm Sét</td>
   <td><?php echo $try['item_5'];?></td>
</tr> 
<tr>
   <td>Ak47 Tình Yêu</td>
   <td><?php echo $try['item_6'];?></td>
</tr> 
<tr>
   <td>Ak47 Hỏa Kỳ Lân</td>
   <td><?php echo $try['item_7'];?></td>
</tr> 
<tr>
   <td>XM8 Cá Mập Vàng</td>
   <td><?php echo $try['item_8'];?></td>
</tr> 



</tbody>
</table>
<!-- Phần hiển thị Nick -->
</div>
</div>

</div></div></div>