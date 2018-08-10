<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
?>
<!--Reload Page-->
<meta http-equiv="refresh" content="number;url=http://localhost/project-orderfood/ProjectOrder/admin.php?mod=home_thanhtoan">

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
	
	//Reload Page
	init_reload();
	var time= getElementByID('#time_refresh');
    function init_reload(){
        setInterval( function() {
                   window.location.reload();
 
          },10000);
    }
</script>