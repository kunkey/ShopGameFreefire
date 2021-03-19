<?php
defined('KUNKEYPR') or exit('Restricted Access');
$banaccff = $kun->hinhanh_game('banaccff');
$vanmayff = $kun->hinhanh_game('vanmayff');
$homthinhff = $kun->hinhanh_game('homthinhff');
$lattheff = $kun->hinhanh_game('lattheff');
$sieucapff = $kun->hinhanh_game('sieucapff');
$codesungff = $kun->hinhanh_game('codesungff');

if(isset($_POST['submit'])) {

    $data = array(
        'banaccff' => $_POST['banaccff'],
        'vanmayff' => $_POST['vanmayff'],
        'homthinhff' => $_POST['homthinhff'],
        'lattheff' => $_POST['lattheff'],
        'sieucapff' => $_POST['sieucapff'],
        'codesungff' => $_POST['codesungff']

    );

    mysqli_query($kun->connect_db(), "UPDATE `settings` SET `value`='".mysqli_escape_string($kun->connect_db(), json_encode($data))."' WHERE `key`='hinhanh_game'"); 
    echo '<div class="alert alert-success"><strong>CẬP NHẬT THÀNH CÔNG!</strong></div>';
    echo '<meta http-equiv=refresh content="1; URL=">';
}
?>







<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TÙY BIẾN ẢNH THUMBNAIL GAME
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">

                            	<form action="" method="post">

                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="<?php echo $banaccff;?>">
                                        <div class="caption">
                                            <center><h3>BÁN ACC FREEFIRE</h3></center>
                                            <div class="form-group form-group-lg">
		                                        <div class="form-line">
		                                            <input name="banaccff" type="text" class="form-control" placeholder="Dán Link Ảnh Vào Đây" value="<?php echo $banaccff;?>">
		                                        </div>
                           			         </div>

                                        </div>
                                    </div>
                                </div>




                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="<?php echo $vanmayff;?>">
                                        <div class="caption">
                                            <center><h3>VẬN MAY BINGO</h3></center>
                                            <div class="form-group form-group-lg">
		                                        <div class="form-line">
		                                            <input name="vanmayff" type="text" class="form-control" placeholder="Dán Link Ảnh Vào Đây" value="<?php echo $vanmayff;?>">
		                                        </div>
                           			         </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="<?php echo $homthinhff;?>">
                                        <div class="caption">
                                            <center><h3>HÒM THÍNH FREEFRIRE</h3></center>
                                            <div class="form-group form-group-lg">
		                                        <div class="form-line">
		                                            <input name="homthinhff" type="text" class="form-control" placeholder="Dán Link Ảnh Vào Đây" value="<?php echo $homthinhff;?>">
		                                        </div>
                           			         </div>

                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="<?php echo $lattheff;?>">
                                        <div class="caption">
                                            <center><h3>LẬT THẺ MAY MẮN</h3></center>
                                            <div class="form-group form-group-lg">
		                                        <div class="form-line">
		                                            <input name="lattheff" type="text" class="form-control" placeholder="Dán Link Ảnh Vào Đây" value="<?php echo $lattheff;?>">
		                                        </div>
                           			         </div>

                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="<?php echo $sieucapff;?>">
                                        <div class="caption">
                                            <center><h3>VÒNG QUAY SIÊU CẤP</h3></center>
                                            <div class="form-group form-group-lg">
                                                <div class="form-line">
                                                    <input name="sieucapff" type="text" class="form-control" placeholder="Dán Link Ảnh Vào Đây" value="<?php echo $sieucapff;?>">
                                                </div>
                                             </div>

                                        </div>
                                    </div>
                                </div>




                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="<?php echo $codesungff;?>">
                                        <div class="caption">
                                            <center><h3>VÒNG QUAY CODE SÚNG</h3></center>
                                            <div class="form-group form-group-lg">
                                                <div class="form-line">
                                                    <input name="codesungff" type="text" class="form-control" placeholder="Dán Link Ảnh Vào Đây" value="<?php echo $codesungff;?>">
                                                </div>
                                             </div>

                                        </div>
                                    </div>
                                </div>



                            <div class="col-md-12"> 
                                <center><button type="submit" name="submit" class="btn btn-lg bg-light-blue">CẬP NHẬT ẢNH</button></center>
                            </div>
							</form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>