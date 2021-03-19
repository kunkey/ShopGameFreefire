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

$napthe_mb = option_default($kun->hienthi_web('napthe_mobile'));
$napthe_pc = option_default($kun->hienthi_web('napthe_pc'));
$vongquay = option_default($kun->hienthi_web('vongquay'));
$dichvu = option_default($kun->hienthi_web('dichvu'));
$random = option_default($kun->hienthi_web('random'));




if(isset($_POST['submit'])) {

    $data = array(
        'napthe_mobile' => $_POST['napthe_mobile'],
        'napthe_pc' => $_POST['napthe_pc'],
        'vongquay' => $_POST['vongquay'],
        'dichvu' => $_POST['dichvu'],
        'random' => $_POST['random']        
    );

    mysqli_query($kun->connect_db(), "UPDATE `settings` SET `value`='".mysqli_escape_string($kun->connect_db(), json_encode($data))."' WHERE `key`='hienthi_web'"); 
    echo '<div class="alert alert-success"><strong>CẬP NHẬT THÀNH CÔNG!</strong></div>';
    echo '<meta http-equiv=refresh content="1; URL=">';
}
?>






                            <div class="row clearfix">


<div class="card">
                        <div class="header">
                            <h2>
                                <b>CÀI ĐẶT HIỂN THỊ WEBSITE</b>
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
                                                        NẠP THẺ & BANNER
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Trên Điện Thoại</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="napthe_mobile">
                                                            <?php echo $napthe_mb;?>
                                                            <option value="1">Bật</option>
                                                            <option value="0">Tắt</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4 col-lg-4 col-md-12">Trên Máy Tính</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="napthe_pc">
                                                            <?php echo $napthe_pc;?>
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
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_1" class="">
                                                        Vòng Quay
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Hiển Thị</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="vongquay">
                                                            <?php echo $vongquay;?>
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
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_3" href="#collapseOne_3" aria-expanded="true" aria-controls="collapseOne_1" class="">
                                                        Dịch Vụ
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Hiển Thị</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="dichvu">
                                                            <?php echo $dichvu;?>
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
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_3" href="#collapseOne_3" aria-expanded="true" aria-controls="collapseOne_1" class="">
                                                        Random Freefire
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="true" style="">
                                                <div class="panel-body">

                                                    <div class="col-md-4 col-lg-4 col-md-12">Hiển Thị</div>
                                                    <div class="col-md-8 col-lg-8 col-md-12">
                                                        <select name="random">
                                                            <?php echo $random;?>
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