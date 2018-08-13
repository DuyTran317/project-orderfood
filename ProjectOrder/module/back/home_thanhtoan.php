<script src="../../lib/notice.js"></script>
<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
?>
<!--Reload Page-->
<meta http-equiv="refresh" content="number;url=http://localhost/project-orderfood/ProjectOrder/admin.php?mod=home_thanhtoan">

<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('10d5ea7e7b632db09c72', {
        encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('notice', function (data) {
		
        //code xử lý khi có dữ liệu từ pusher
		n = new Notification(
                'Bạn nhận được yêu cầu thanh toán',
                {
                    body: data.name + ' đã gửi tin nhắn cho bạn:' + data.message,
                    icon: 'http://icons.iconarchive.com/icons/pauloruberto/custom-round-yosemite/128/Bitcoin-icon.png', // Hình ảnh
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
  	<p style="text-align:center"><a href="?mod=home_thanhtoan"><button class="btn btn-success">Làm Mới</button></a></p>
    <h2 style="color:#096; text-align:center"><i class="fas fa-clipboard-list"></i> Danh Sách Chờ Thanh Toán</h2>
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
	$sql = "SELECT *, b.`active` as wait from `of_order` as a, `of_bill` as b where a.`id`=b.`order_id` and a.`active`=1 and b.`active`=0";
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
    <td><h5>
      <?php
	  	if($re['wait']==0)
		echo"Dang cho thanh toan";
		
		$sql="select * from `of_solve_pay` where `num_table`={$re['num_table']} and `active`=0";
		$rs=mysqli_query($link,$sql);
		if(mysqli_num_rows($rs)>0)
		{										
				echo " <i class='fas fa-bell'></i>";	
			
	  ?>
      
      <audio style="display:none" autoplay="autoplay" src="lib/ringtone/bell-ringing-01.mp3"></audio>
	<?php
			
		}
	?>
    </h5></td>   
    <td align="center"><h5>
      <a href="?mod=payment&id=<?=$re['order_id']?>&num_table=<?=$re['num_table']?>">Xem</a>
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