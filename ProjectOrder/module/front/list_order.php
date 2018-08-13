<style>
	th{
		text-align:center;
	}
</style>

<?php
	if(! isset($_SESSION['user_idban']))
	{
		header("location:?mod=dangnhap");
	}
	if(isset($_GET['id_ban']))
	{
		$id_ban=$_GET['id_ban'];
	}
	if(isset($_GET['name_ban']))
	{
		$name_ban=$_GET['name_ban'];
	}
	$id = $_GET['id'];
	
?>	

<div class="container">
	<h2 style="color:#C06">Danh Sách Đã Chọn</h2>
<div class="row">


<form action="" method="post">
<table border="1" class="col-md-12 col-sm-12 col-xs-12" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <th width="42">STT</th>
    <th width="220">Tên Sản Phẩm</th>
    <th width="140">Giá Sản Phẩm</td>
    <th width="106">Số Lượng</th>
    <th width="198">Tổng Tiền</th>
  </tr>
  
  <?php
  	$sql="select b.`name`,a.`price`, a.`qty`
		  from `of_order_detail` as a, `of_food` as b
		  where a.`food_id`= b.`id` and `order_id`={$id}";
	$rs=mysqli_query($link,$sql);
	
	$s=0;
	$i=0;
	while($r=mysqli_fetch_assoc($rs)) {
		$s+= $r['price']*$r['qty'];	
  ?>
  
  <tr style="text-align:center; height:50px">
    <td><?=++$i?></td>    
    <td><?=$r['name']?></td>
    <td><?=number_format($r['price'])?><u>đ</u></td>
    <td><input type="number" min="1" value="<?=$r['qty']?>" style="width:50%; text-align:center" disabled></td>
    <td><?=number_format($r['price']*$r['qty'])?><u>đ</u></td>
  </tr>

<?php } ?>
</table>

</div>

<div class="row" style="margin-top:30px">
	<div class="col-md-4 col-sm-4 col-xs-12"><span style="font-weight:bold; font-size:20px; text-decoration:underline">Tổng thành tiền: <?=number_format($s)?>đ</span></div>                 	
</div>

</form>

</div>
