<?php
if(isset($_POST['submit'])) {
    if($_POST['goi']) {

        if($_POST['listacc']) {

            $exp = explode("\n", $_POST['listacc']);

            $i = 1;
            foreach ($exp as $key) {
                $data = explode("|", $key);

                if(!$data[0]) {
                    echo '<div class="alert alert-danger alert-highlighted" role="alert">Lỗi! Acc '.$i.' thiếu Tên Nick</div>';   
                }else if(!$data[1]) {
                    echo '<div class="alert alert-danger alert-highlighted" role="alert">Lỗi! Acc '.$i.' thiếu Mật Khẩu Nick</div>';   
                }else {

        mysqli_query($kun->connect_db(), "INSERT INTO `random_freefire_nick` (`cname`, `username`, `password`, `status`, `time`) VALUES ('".$_POST['goi']."', '".$data[0]."', '".$data[1]."', 'true', '".time()."')");

        echo '<div class="alert alert-success alert-highlighted" role="alert">Đăng Bán Nick <b>"'.$i.'"</b> Thành Công!</div>';
                }

                $i++;
            }


        }else {
            echo '<div class="alert alert-danger alert-highlighted" role="alert">Vui lòng nhập vào list account!</div>';
        }


    }else {
        echo '<div class="alert alert-danger alert-highlighted" role="alert">Vui lòng chọn một gói random!</div>';
    }
}
?>









<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>THÊM NICK FREEFIRE RANDOM</h2>
                        </div>
                        <div class="body">

                            <form action="" method="post">
                            <div class="row clearfix">

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Chọn Gói RANDOM</label>
                                    <div class="form-line">
                                        <select name="goi" class="form-control show-tick" tabindex="-98">
                                        <option value="">-- Vui Lòng Lựa Chọn Gói Random  --</option>
    <?php
        $sql = mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` ORDER BY `time` DESC");
        while ($row = mysqli_fetch_array($sql)) { ?> 
                                        <option value="<?php echo $row['cname'];?>"><?php echo $row['name'];?> (<?php echo number_format($row['giatien']);?>đ/nick)</option>
                            <?php } ?>

                                    </select>
                                    </div>
                                </div>
                            </div>




                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Nhập List Account</label>
                                        <div class="form-line">
                                            <textarea name="listacc" rows="8" class="form-control no-resize" placeholder="Tài Khoản|Mật Khẩu"><?php echo $_POST['listacc'];?></textarea>
                                        </div>
                                    </div>
                                </div>

                            <div class="col-md-12"> 
                                <center><button type="submit" name="submit" class="btn bg-light-blue">ĐĂNG BÁN RANDOM</button></center>
                            </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>