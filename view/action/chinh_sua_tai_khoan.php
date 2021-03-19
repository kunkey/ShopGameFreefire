<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>
<div class="panel panel-filled">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                            Chỉnh Sửa Thông Tin Tài Khoản
                        </div>
                        <div class="panel-body">

                            <p>Bạn có thể tùy chỉnh thông tin tài khoản của mình tại đây.</p>

                                <div class="form-group"><label for="exampleInputPassword1">Tên người dùng</label> <input type="text" class="form-control" placeholder="<?php echo $user['username'];?>" value="<?php echo $user['username'];?>" disabled>
                                                                    <p class="form-text">Dùng để đăng nhập. Vui lòng liên hệ admin để thay đổi.</p>
                                </div>


                                <div class="form-group"><label for="exampleInputPassword1">Facebook ID</label> <input type="text" class="form-control" placeholder="<?php echo $user['fbid'];?>" disabled>
                                                                    <p class="form-text">Không thể thay đổi thông tin này.</p>
                                </div>

                                <div class="form-group"><label for="exampleInputPassword1">Tên Của Bạn</label> <input type="text" class="form-control" id="name" value="<?php echo $user['name'];?>" placeholder="<?php echo $user['name'];?>">
                                </div>

                                <div class="form-group"><label for="exampleInputPassword1">Địa chỉ Email</label> <input type="text" class="form-control" id="email" value="<?php echo $user['email'];?>" placeholder="<?php echo $user['email'];?>">
                                </div>


                                <div class="form-group"><label for="exampleInputPassword1">Giới tính</label> 
<select id="sex" class="select2_demo_1 form-control select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true">
                                        <option value="<?php echo $user['sex'];?>"><?php echo strtoupper($user['sex']);?></option>
                                        <option value="male">Bạn là FuckBoy</option>
                                        <option value="female">Bạn là FuckGirl</option>
                                    </select>
                                </div>


                                <div class="form-group"><label for="exampleInputPassword1">Ảnh đại diện</label> <input type="text" class="form-control" id="avatar" value="<?php echo $user['avatar'];?>" placeholder="<?php echo $user['avatar'];?>">
                                                <p class="form-text">Link ảnh đuôi jpg, png.</p>
                                </div>


                                <div class="form-group"><label for="exampleInputPassword1">Auth Token Api</label> <input type="text" class="form-control" placeholder="<?php echo $user['token'];?>" value="<?php echo $user['token'];?>" disabled>
                                                                    <p class="form-text">Thông tin tự thay đổi.</p>
                                </div>



                                <div class="form-group"><label for="exampleInputPassword1">IP truy vấn</label> <input type="text" class="form-control" placeholder="<?php echo $user['ip'];?>" disabled>
                                                                    <p class="form-text">Thông tin tự thay đổi.</p>
                                </div>



                                <div class="form-group"><label for="exampleInputPassword1">Thời gian đăng kí</label> <input type="text" class="form-control" placeholder="<?php echo $kun->time_ago($user['time']);?>" disabled>
                                                                    <p class="form-text">Không thể thay đổi thông tin này.</p>
                                </div>


                                <br>
                                <button type="submit" id="submit" class="btn btn-default">Đổi Thông Tin</button>

                        </div>
</div>


<p id="result"></p>














<script type="text/javascript">
    $(document).ready(function() {

    $('#submit').click(function() {
        document.getElementById("submit").disabled = true;
        document.getElementById('submit').innerHTML = "Đang kiểm tra";

    $.ajax({
        type: "POST",
        url: 'system/user/edit_account',
        data: {
            name: $("#name").val(),
            email: $("#email").val(),
            sex: $("#sex").val(),
            avatar: $("#avatar").val()

        },
        success: function(result)
        {
                    document.getElementById("submit").disabled = false;
            document.getElementById('submit').innerHTML = "Đổi Thông Tin";

           $("#result").html(result);
        }
    });

});

});



</script>



