<?php require '../Core.php';
$kun = new System;
$_thongbao = $kun->settings('thongbao');
?>

<!-- MODAL NOTIFY -->


        <div style="margin-top: 200px;" class="modal show" id="noticeModal" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                    </div>

                    <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                        <?php echo nl2br($_thongbao['thongbao']);?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" onclick="javascript:void($('#modal_bigin').hide(500))">Đóng</button>
                    </div>
                </div>
            </div>
        </div>