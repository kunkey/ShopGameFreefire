<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
?>

<?php $row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `username`='".$user['username']."'")) ?>

<div class="c-layout-sidebar-content ">
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Thông tin tài khoản</h3>
        <div class="c-line-left"></div>
    </div>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th scope="row">ID của bạn:</th>
                <th><span class="c-font-uppercase" data-toggle="tooltip" data-placement="top" title="" data-original-title="Đây là ID tài khoản của bạn không phải mã giới thiệu"><?php echo $row['id'];?></span></th>
            </tr>
            <tr>
                <th scope="row">Username:</th>
                <th><?php echo $row['username'];?></th>
            </tr>
            <tr>
                <th scope="row">Tên Đầy Đủ:</th>
                <th><?php echo $row['name'];?></th>
            </tr>
            <tr>
                <th scope="row">Email:</th>
                <th><?php echo $row['email'];?></th>
            </tr>
            <tr>
                <th scope="row">Kim Cương:</th>
                <th><?php echo number_format($row['kimcuong']);?> Kim Cương</th>
            </tr>
            <tr>
                <th scope="row">Số dư tài khoản:</th>
                <td><b class="text-danger"><?php echo number_format($row['money']);?>đ</b></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Số Tiền Đã Nạp:</th>
                <td><b class="text-danger"><?php echo number_format($row['money_nap']);?>đ</b></td>
            </tr>
            <tr>                
                
                <th scope="row">Nhóm tài khoản:</th>
                <td>                <a class="users-view-role"><?php echo $level;?> </a></td>
                
            </tr>
            <tr>
                <th scope="row">Ngày Tham Gia:</th>
                <td><?php echo date('d/m/20y', $row['time']);?></td>
            </tr>
        </tbody>
    </table>
    <!-- END: PAGE CONTENT -->
</div>
    </div>
</div>