<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	if(isset($_GET['num_table']))
	{
		$num_table=$_GET['num_table'];
	}
?>

<div class="container-fluid" style="margin-bottom:50px">

<table border="1" class="col-md-12 col-sm-12 col-xs-12" style="margin-top:50px; margin-bottom:30px">
	<caption style="text-align:center">
    	<h2 style="color:#096">Danh Sách Bàn Số <?=$num_table?></h2>
  	</caption>
  <?php
  	$sql="select a.*,b.`img_url` as hinh from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`name` = b.`name`";
	$rs=mysqli_query($link,$sql);
	$total=0;
	while($r=mysqli_fetch_assoc($rs)):
  ?>  
  <tr>
    <td width="108" height="36" align="center"><strong style="font-size:20px"><?=$r['name']?></strong></td>
    <td width="297" align="left">&nbsp;
    	<div class="container-fluid">
        <div class="row">
    		<img src="" alt="" style="width:149px; height:145px; margin-bottom:20px;" class="col-md-3 col-sm-3 col-xs-12">
            <div class="col-md-9 col-sm-9 col-xs-12" style="margin-left:10px;">
                <p><strong>Số Lượng</strong>: <?=$r['qty']?></p>
                <p><strong>Ghi Chú</strong>: <?=$r['note']?></p>
            </div>
        </div>    
        </div>
    </td>
 </tr>
 <?php 
 	$total += $r['price']*$r['qty'];
	endwhile 

 ?>
  
 <tr align="center">
    <td height="51" colspan="2">
      <a href="?mod=solve_payment&orderID=<?=$id?>&num_table=<?=$num_table?>&total=<?=$total?>"><input type="button" value="Hoàn Tất" class="btn btn-success"></a>
      </td>
  </tr>
    
</table>	
</form>

</div>
