<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $sql = mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` ORDER BY `time` DESC LIMIT $start, $kmess");
 $tong1 = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_kim_cuong`"));
?>




<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> 
                                <b>Danh Sách Thẻ Nạp</b>
                            </h2>
                        </div>
                        <div class="body">

<?php 

if(isset($_POST['thatbai'])) {
  if($_POST['id']) {
    mysqli_query($kun->connect_db(), "UPDATE `napthe` SET `status`='0' WHERE `id`='".$_POST['id']."'");
    echo '<div class="alert alert-success"><strong>PHÊ DUYỆT THÀNH CÔNG!</strong></div>';
    echo '<meta http-equiv=refresh content="1; URL=">';
  }
}

if(isset($_POST['thanhcong'])) {
  if($_POST['id']) {
    $rose = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `id`='".$_POST['id']."'"));
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` + '".$rose['amount']."' WHERE `username` = '".$rose["username"]."'");   
    mysqli_query($kun->connect_db(), "UPDATE `napthe` SET `status`='1' WHERE `id`='".$_POST['id']."'");
    echo '<div class="alert alert-success"><strong>PHÊ DUYỆT THÀNH CÔNG!</strong></div>';
    echo '<meta http-equiv=refresh content="1; URL=">';
  }
}





?>

	
<div class="table-responsive">  
<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
	   <th>STT</th>
	   <th>Người Nạp</th>
	   <th>Nhà Mạng</th>
	   <th>Mệnh Giá</th>
	   <th>Serial</th>
	   <th>Pin</th>
	   <th>Tình Trạng</th>
	   <th>Thời Gian</th>
     <th>Thao Tác</th>
   </tr>
</thead>
<tbody>

  <?php

    while ($row = mysqli_fetch_array($sql)) {
          if($row['status'] == 0) {
            $status = '<p style="color: red;">Thất Bại</p>';
            $action = 'Nothing';
          }else if($row['status'] == 1) {
            $status = '<p style="color: green;">Thành Công</p>';
            $action = 'Nothing!';
          }else if($row['status'] == 2) {
            $status = '<p style="color: black;">Chờ Duyệt</p>';
            $action = '<button onclick="thanhcong('.$row['id'].')" type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="material-icons">check</i></button>
                       <button onclick="thatbai('.$row['id'].')" type="button" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="material-icons">close</i></button>';
          }
      ?>
<tr>
   <th scope="row">#<?php echo $row['id'];?></th>
   <td><?php echo $row['username'];?></td>
   <td><?php echo $row['type'];?></td>
   <td><?php echo number_format($row['amount']);?><sup>đ</sup></td>
   <td><?php echo $row['serial'];?></td>
   <td><?php echo $row['pin'];?></td>   
   <td><?php echo $status;?></td>   
   <td><?php echo date('d/m G:i', $row['time']);?></td>
   <td>
      <?php echo $action;?>
    </td>
</tr> 
    <?php
    }
    ?>


</tbody>
</table>
<!-- Phần hiển thị Nick -->
</div>
<?php
if ($tong1 > $kmess){
echo '<center>' . $kun->phantrang('/admin/thenap/', $start, $tong1, $kmess) . '</center>';
}
?>
</div>

</div></div></div>

<script type="text/javascript">
function thatbai(id) {
   if (confirm('Bạn có chắc đây là thẻ lỗi?')) {
      post('', {id: id, thatbai: ''});
    } else {
      alert('Hãy kiểm tra kĩ trước khi duyệt thẻ nhé!');
    }
}

function thanhcong(id) {
   if (confirm('Bạn có chắc đây là thẻ đúng?')) {
      post('', {id: id, thanhcong: ''});
    } else {
      alert('Hãy kiểm tra kĩ trước khi duyệt thẻ nhé!');
    }
}



function post(path, params, method='post') {
  const form = document.createElement('form');
  form.method = method;
  form.action = path;

  for (const key in params) {
    if (params.hasOwnProperty(key)) {
      const hiddenField = document.createElement('input');
      hiddenField.type = 'hidden';
      hiddenField.name = key;
      hiddenField.value = params[key];
      form.appendChild(hiddenField);
    }
  }

  document.body.appendChild(form);
  form.submit();
}
</script>