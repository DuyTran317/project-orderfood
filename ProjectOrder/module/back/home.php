
<script src="lib/notice.js"></script>
<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	
?>
<!--Reload Page-->
<meta http-equiv="refresh" content="number;url=http://localhost/project-orderfood/ProjectOrder/admin.php?mod=home">
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('10d5ea7e7b632db09c72', {
        encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('notices', function (data) {
		
        //code xử lý khi có dữ liệu từ pusher
		n = new Notification(
                'Thông Báo!!!!!!',
                {
                    body: data.name + ' ' + data.message,
                    icon: 'http://icons.iconarchive.com/icons/google/noto-emoji-people-profession/128/10267-man-cook-light-skin-tone-icon.png', // Hình ảnh
                    tag: '' // Đường dẫn 
                });
        setTimeout(n.close.bind(n), 10000);
        // tự động đóng thông báo sau 10s
        n.onclick = function () {
            window.location.href = this.tag;
        }
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
</script>
<style>
 table.dataTable{
	 border-collapse:collapse;
 }
</style>

<div class="container-fluid"> 
 <div class="row">
  <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">  
  <caption>
  	<p style="text-align:center"><a href="?mod=home"><button class="btn btn-success">Làm Mới</button></a></p>
    <h2 style="color:#096; text-align:center"><i class="fas fa-clipboard-list"></i> Danh Sách Gọi Món</h2>
  </caption>
  </div>
 </div> 
</div>  
  
<table class="col-md-12 col-sm-12 col-xs-12 table-bordered" id="datatable" style="text-align:center; margin-top:15px">
  <thead>
  <tr align="center" bgcolor="#FFFFCC">
    <td><h4><strong>STT</strong></h4></td>
    <td><h4><strong>Số Bàn</strong></h4></td>
    <td><h4><strong>Trạng Thái</strong></h4></td>    
    <td><h4><strong>Kiểm Tra</strong></h4></td>
  </tr>
  </thead>
  <?php   	
	$sql = "SELECT * from `of_order` where `active`=0";
	$rel = mysqli_query($link,$sql);
	$i=1;
	while($re = mysqli_fetch_assoc($rel))
	{
  ?>
  <tr>
  	<td align="center"><h5>
      <?=$i++?>
    </h5></td>
    <td align="center"><h5>&nbsp;&nbsp;
      Bàn Số <?=$re['num_table']?>
    </h5></td>
    <td align="center"><h5>
      <?php
	  	if($re['active']==0)
		echo"Đang chờ xử lý";
	  ?>
    </h5></td>   
    <td align="center"><h5>
      <a href="?mod=check_order&id=<?=$re['id']?>&num_table=<?=$re['num_table']?>">Xem</a>
    </h5></td> 
  </tr>
  <?php } ?>
</table>

<script>
	$(document).ready(function(){    	
		$('#datatable').DataTable( {
   			 language: {
        		url: 'datatable/Vietnamese.json'
    		}
		});
    });
	
	
    
</script>