<?php 
defined('KUNKEYPR') or exit('Restricted Access');

//echo $kun->hienthi_game('banaccff');
function option_default($value) {
    switch ($value) {
        case '1':
            return '<option value="1">Đang Bật</option>';
            break;
        case '0':
            return '<option value="0">Đang Tắt</option>';
            break;
    }
}

$banaccff = option_default($kun->hienthi_game('banaccff'));
$vanmayff = option_default($kun->hienthi_game('vanmayff'));
$homthinhff = option_default($kun->hienthi_game('homthinhff'));
$lattheff = option_default($kun->hienthi_game('lattheff'));
$sieucapff = option_default($kun->hienthi_game('sieucapff'));
$codesungff = option_default($kun->hienthi_game('codesungff'));


if(isset($_POST['submit'])) {

    $data = array(
        'banaccff' => $_POST['banaccff'],
        'vanmayff' => $_POST['vanmayff'],
        'homthinhff' => $_POST['homthinhff'],
        'lattheff' => $_POST['lattheff'],
        'sieucapff' => $_POST['sieucapff'],
        'codesungff' => $_POST['codesungff']
    );

    mysqli_query($kun->connect_db(), "UPDATE `settings` SET `value`='".mysqli_escape_string($kun->connect_db(), json_encode($data))."' WHERE `key`='hienthi_game'"); 
    echo '<div class="alert alert-success"><strong>CẬP NHẬT THÀNH CÔNG!</strong></div>';
    echo '<meta http-equiv=refresh content="1; URL=">';
}
?>







                            <div class="row clearfix">


<div class="card">
                        <div class="header">
                            <h2>
                                <b>CÀI ĐẶT HIỂN THỊ GAME</b>
                            </h2>
                        </div>
                        <div class="body" style="height: 800px;">



                            <form method="post" action="">




<div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1" class="">
                                                        BÁN ACC FREEFIRE
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Hiển Thị</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="banaccff">
                                                            <?php echo $banaccff;?>
                                                            <option value="1">Bật</option>
                                                            <option value="0">Tắt</option>
                                                        </select>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                        </div>
 </div>






<div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1" class="">
                                                        VẬN MAY BINGO
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Hiển Thị</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="vanmayff">
                                                            <?php echo $vanmayff;?>
                                                            <option value="1">Bật</option>
                                                            <option value="0">Tắt</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                        </div>
 </div>



<div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1" class="">
                                                        HÒM THÍNH BÍ ẨN
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Hiển Thị</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="homthinhff">
                                                            <?php echo $homthinhff;?>
                                                            <option value="1">Bật</option>
                                                            <option value="0">Tắt</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                        </div>
 </div>



<div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1" class="">
                                                        Vòng Quay Siêu Cấp
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Hiển Thị</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="sieucapff">
                                                            <?php echo $sieucapff;?>
                                                            <option value="1">Bật</option>
                                                            <option value="0">Tắt</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                        </div>
 </div>





<div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1" class="">
                                                        LẬT HÌNH MAY MẮN
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Hiển Thị</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="lattheff">
                                                            <?php echo $lattheff;?>
                                                            <option value="1">Bật</option>
                                                            <option value="0">Tắt</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                        </div>
 </div>





<div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1" class="">
                                                        VÒNG QUAY CODE SÚNG
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Hiển Thị</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="codesungff">
                                                            <?php echo $codesungff;?>
                                                            <option value="1">Bật</option>
                                                            <option value="0">Tắt</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                        </div>
 </div>





                            <div class="col-md-12"> 
                                <center><button type="submit" name="submit" class="btn bg-light-blue">CẬP NHẬT HIỂN THỊ</button></center>
                            </div>
                               

                             </form>
                           </div>
</div>


</div>