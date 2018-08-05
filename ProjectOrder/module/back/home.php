<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
?>

<style>
 table.dataTable{
	 border-collapse:collapse;
 }
</style>
 
<div class="container-fluid"> 
 <div class="row">
  <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">  
  <caption>
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