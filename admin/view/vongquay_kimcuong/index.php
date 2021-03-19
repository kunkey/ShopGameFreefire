<?php
defined('KUNKEYPR') or exit('Restricted Access');
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>DANH SÁCH VÒNG QUAY KIM CƯƠNG</b>
                            </h2>

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="?modun=vongquay_kimcuong&act=add" class=" waves-effect waves-block">Thêm Vòng Quay</a></li>
                                    </ul>
                                </li>
                            </ul>


                        </div>
                        <div class="body">

<div class="table-responsive">  

<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
	   <th>ID #</th>
	   <th>Tên Vòng Quay</th>
	   <th>Trạng Thái</th>
	   <th>Đã Quay</th>
	   <th>Giá Tiền</th>
	   <th>Thời Gian</th>
	   <th>Thao tác</th>
   </tr>
</thead>
<tbody>

	<?php
		$sql = mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong` ORDER BY `time` DESC");
		while ($row = mysqli_fetch_array($sql)) {
			if($row['status'] == 'false')$check='';else $check='checked';
			?>

		<tr>
		   <th scope="row">#<?php echo $row['id'];?></th>
		   <td><?php echo $row['name'];?></td>
		   <td>
		   		<div class="switch">
                   <label>
                   	<input onclick="options(<?php echo $row['id'];?>, 'vq_<?php echo $row['id'];?>')" id="vq_<?php echo $row['id'];?>" type="checkbox" <?php echo $check;?>>
                   	<span class="lever switch-col-red"></span>
                   </label>
                </div>
           </td>
		   <td><?php echo number_format($row['sudung']);?> <sup>lần</sup></td>
		   <td><?php echo number_format($row['giatien']);?> <sup>vnđ</sup></td>
		   <td><?php echo date('H:i d/m', $row['time']);?></td>
		<td>
		   <a href="?modun=vongquay_kimcuong&act=edit&id=<?php echo $row['id'];?>">
		   <button type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="material-icons">edit</i></button>
		   </a>
		   <button onclick="del(<?php echo $row['id'];?>, '<?php echo $row['name'];?>')" type="button" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="material-icons">delete</i></button>
		</td>
		</tr> 

		<?php
		}
		?>

</tbody>
</table>
<!-- Phần hiển thị Nick -->
</div>
</div>
</div>

</div></div>

<script type="text/javascript">
function del(id, name) {
	 if (confirm('Bạn có chắc muốn xóa '+name+'?')) {
	 		location.href = '?modun=vongquay_kimcuong&act=delete&id='+id;
		} else {
			alert('Hãy suy nghĩ kĩ trước khi xóa gì đó nhé!');
		}
}

function options(id, element) {

		var checkbox = $('#'+element);

		if(checkbox.prop("checked") == true){
	 			$.ajax({url: '/admin/model/vongquaykimcuong/status_vongquay.php',
	                type: 'POST',
	                dataType: 'text',
	                data: {
	                    id: id,
	                    status: checkbox.prop("checked")
	                }
	            }).done(function(res) {});
            }else if(checkbox.prop("checked") == false){
				$.ajax({url: '/admin/model/vongquaykimcuong/status_vongquay.php',
	                type: 'POST',
	                dataType: 'text',
	                data: {
	                    id: id,
	                    status: checkbox.prop("checked")
	                }
	            }).done(function(res) {});
            }
}

</script>

