<script src="lib/notice.js"></script>
<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
?>
<?php  
getPusher('05d67b2777b04b8a83db', 'Reload', 'loadmenu2');
getPusher('161363aaa8197830a033', 'Reload', 'notice');
getPusher('161363aaa8197830a033', 'Reload', 'loadthanhtoan');
?>
<style>
 table.dataTable{
	 border-collapse:collapse;
 }
</style>
<body style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">
            <?php 
				//Truy vấn tên nv
				$show_cashier = selectWithCondition_Cate($link, 'of_manage', 2);
            ?>
            <h4 style="position: absolute; top: 0px;">Thu ngân: <?=$show_cashier['name']?></h4>
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
  <?php /*?>
  <?php   	
	
	$select = selectHomeThanhToan($link);
	foreach($select as $re){
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
		$rs = selectWithCondition_QueryNumAct($link, 'of_solve_pay', $re['num_table'], 0);
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
  <?php } ?><?php */
  $i=1;
  $sql="select * from `of_solve_pay` where `active`=0";
  $r=mysqli_query($link,$sql);
  while($rs=mysqli_fetch_assoc($r)){
  ?>
  <tr>
  	<td align="center"> <?=$i++?></td>
    <td align="center"><h5>&nbsp;&nbsp;Bàn Số: <span style="color: red; font-size: 24px;"><?=$rs['num_table']?></span></h5></td>
    <td><h5><i class='fas fa-bell'></i></h5><audio style="display:none" autoplay="autoplay" src="lib/ringtone/bell-ringing-01.mp3"></audio></td>
    <td><h5><a href="?mod=payment&id=<?=$rs['order_id']?>&num_table=<?=$rs['num_table']?>">Xem</a></h5></td>
  </tr>
  <?php } ?>
</table>
    </div>
</div>
</body>
<?php getPusher('770fa0ac91f2e68d3ae7', 'Reload', 'newbill'); ?>
<script>
	$(document).ready(function(){    	
		$('#datatable').DataTable( {
   			 language: {
        		url: 'lib/datatable/Vietnamese.json'
    		}
		});
    });
	
	
</script>