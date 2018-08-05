<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	if(isset($_GET['orderID']))
	{
		$orderID=$_GET['orderID'];
	}
	if(isset($_GET['num_table']))
	{
		$num_table=$_GET['num_table'];
	}
	if(isset($_GET['total']))
	{
		$total=$_GET['total'];
	}	
	
	$sql="update `of_bill` set `active`=1 where `order_id`={$orderID}";
	mysqli_query($link,$sql);

?>
<script>
	alert("Hoàn Tất Thanh Toán!");
	window.location="?mod=home_thanhtoan";
</script>