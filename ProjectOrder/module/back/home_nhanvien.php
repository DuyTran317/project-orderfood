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
				$sql="select * from `of_order` where `active`=0 and `num_table`='{$name}'";
				$qr=mysqli_query($link,$sql);
				$kq=mysqli_fetch_assoc($qr);
				$id_order= $kq['id'];
				if($slban['active']==2)
				{
					   ?> 
					   <a href="?mod=confirm_order&id=<?= $id_order ?>&num_table=<?= $name ?>" style="text-decoration:none; color:#000">
						 <div class="fw-place-within-col" style='background-color: #FF0; height: 200px; padding: 40px 0px;'" >
							<div style="font-size: 40px;" ><?= $slban['name']?></div>
							<?php 
							
							//lấy số món
							$sql="select  * 
								from `of_order` as a, `of_order_detail` as b
								where a.`id`=b.`order_id` and `num_table`='{$name}'";
							$rs=mysqli_query($link,$sql);
							$somon=mysqli_num_rows($rs);
							?>
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