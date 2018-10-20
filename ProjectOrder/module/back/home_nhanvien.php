<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
     //chanel trùng voi chanel trong send.php
    channel.bind('notices', function () {
		
        //code xử lý khi có dữ liệu từ pushe
		 window.location.reload();
         //kết thúc code xử lý thông báo
    });
</script>

<html>

<body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg);  font-family: 'Anton', sans-serif;">
<div class="container" style="margin-top: 5%; background-color: white; border-radius: 20px; padding: 20px;">
    <h1 align="center">Danh sách bàn</h1>
    <div class="row">
    <?php 
	//show bàn ra
	$sql1="select * from `of_user` where `active`!=0";
	$c=mysqli_query($link,$sql1);
	while($slban=mysqli_fetch_assoc($c)):
	$name=$slban['name']; ?>
        <div class="col-md-3 col-sm-4 col-xs-6 " style="padding: 10px; font-size: 25px;" align="center">
        <?php
				//lấy id_order và name bàn
				$sql="SELECT *,`of_order`.`id` as id_or FROM `of_order` LEFT JOIN `of_bill` ON `of_order`.`id` = `of_bill`.`order_id` where (`of_order`.`active` <> 1 or `of_bill`.`active` <> 1) and `of_order`.`num_table` = '{$name}'";
				$qr=mysqli_query($link,$sql);
				
				$kq=mysqli_fetch_assoc($qr);
				$id_order= $kq['id_or'];
				
				//lấy số món
				$sql="select  * 
				from `of_order` as a, `of_order_detail` as b
				where a.`id`=b.`order_id` and `num_table`='{$name}' and b.`active`=0  ";
				$rs=mysqli_query($link,$sql);
				$somon=mysqli_num_rows($rs);
			
				if(mysqli_num_rows($qr)>0) 
				{
					   ?> 
					   <a href="?mod=confirm_order&id=<?= $id_order ?>&num_table=<?= $name ?>" style="text-decoration:none; color:#000">
						 <div class="fw-place-within-col" style='background-color: #FF0; height: 200px; padding: 40px 0px;'>
							<div style="font-size: 40px;" ><?= $slban['name']?></div>
							Số món đã đặt: <?= $somon ?>
						   </a>
							<?php } 
						
				
				
				else
							{
							 ?>
							<div class="fw-place-within-col"style='background-color: #999; height: 200px; padding: 40px 0px;'" >
							<div style="font-size: 40px;" ><?= $slban['name']?></div>
							<?php } ?> 
							
						</div>
					</div>
        <?php endwhile ?>
    </div>
</div>
</body>
</html>