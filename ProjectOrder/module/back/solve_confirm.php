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
	
	$sql="update `of_order` set `active`=2 where `id`={$orderID}";
	mysqli_query($link,$sql);
	$sql="update `of_note_order` set `active`=2 where `order_id`={$orderID}";
	mysqli_query($link,$sql);
	
	$sql="select * from `of_order_detail` where `order_id`={$orderID} and `active` =0";
	$r = mysqli_query($link,$sql);
	while($rs = mysqli_fetch_assoc($r))
	{
		$sql1 = "select * from `of_order_detail` where `order_id`={$orderID} and `active` = 1 and `food_id` = {$rs['food_id']}";
		$r1 = mysqli_query($link,$sql1);
		$rs_sl = mysqli_num_rows($r1);
		if($rs_sl>0)
		{
			$sql_sl = "update `of_order_detail` set `qty` = `qty`+ {$rs['qty']} where `order_id`={$orderID} and `active` = 1 and `food_id` = {$rs['food_id']}";
			mysqli_query($link,$sql_sl);
			
			$sql="update `of_food` set `solve` = `solve` + {$rs['qty']} where `id` ={$rs['food_id']}";
			mysqli_query($link,$sql);
		}
		else
		{
			$sql_sl = "update `of_order_detail` set `active` = 2 where `order_id`={$orderID} and `food_id` = {$rs['food_id']}";
			mysqli_query($link,$sql_sl);
			
			$sql="update `of_food` set `solve` = `solve` + {$rs['qty']} where `id` ={$rs['food_id']}";
			mysqli_query($link,$sql);
		}
	}
	
	//pussher
	require('Pusher.php');
	$options = array(
	'cluster' => 'ap1',
    'encrypted' => true
	);
 	$pusher = new Pusher(
    '161363aaa8197830a033',
    '46f2ba3b258f514f6fc7',
    '577033',
    $options
	);
	$pusher->trigger('hihi', 'newbill', @$data);
?>
<script>
	alert("Hoàn Tất Đơn Hàng!");
	window.location="?mod=home";
</script>