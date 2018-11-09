<script src="lib/notice.js"></script>
<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
?>
<!--Reload Page-->
<meta http-equiv="refresh" content="number;url=http://localhost:8080/project-orderfood/ProjectOrder/admin.php?mod=home_thanhtoan">

<script src="lib/pusher.min.js"></script>
<script type="text/javascript">
    Pusher.logToConsole = true;
   var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('notice', function () {
		
        //code xử lý khi có dữ liệu từ pushe
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
	Pusher.logToConsole = true;
    var pusher = new Pusher('05d67b2777b04b8a83db', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('loadmenu2', function () {

        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('loadthanhtoan', function () {

        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
</script>
<style>
 table.dataTable{
	 border-collapse:collapse;
 }
</style>
<body style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">
        <h2 style=" text-align:center">Danh Sách Chờ Thanh Toán</h2>
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
            Bàn Số: <span style="color: red; font-size: 24px;"><?=$re['num_table']?></span>
    </h5></td>
    <td><h5>
      <?php
	  	if($re['wait']==0)

		echo"Đang Chờ Thanh Toán";
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
    <?php	
		if(mysqli_num_rows($rs)>0)
		{
	?>		
      <a href="?mod=payment&id=<?=$re['order_id']?>&num_table=<?=$re['num_table']?>">Xem</a>
	 <?php 
	 	}
	  	else
		{
			echo "<i class='fas fa-spinner'></i>";
		}
	 ?>
    </h5></td> 
  </tr>
  <?php } ?>
</table>
    </div>
</div>
</body>
<script src="lib/pusher.min.js"></script>
<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('770fa0ac91f2e68d3ae7', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('newbill', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
</script>

<script>
	$(document).ready(function(){    	
		$('#datatable').DataTable( {
   			 language: {
        		url: 'lib/datatable/Vietnamese.json'
    		}
		});
    });
	
	
</script>