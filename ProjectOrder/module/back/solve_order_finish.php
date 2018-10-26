<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	if(isset($_GET['idorder']))
	{
		$idorder=$_GET['idorder'];
	}
	if(isset($_GET['num_table']))
	{
		$num_table=$_GET['num_table'];
	}
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	
	$sql = "select * from `of_order_detail` where `order_id` ={$idorder} and `active` = 2";
	$rs = mysqli_query($link,$sql);
	$dem = 1;
	$tong =0;
	$qty = 0;
	while($r = mysqli_fetch_assoc($rs))
	{
		$qty = $r['qty'];
		$tong += $dem;	
	}
	echo $tong;
	if($tong == 1)
	{
		$sql = "update `of_order` set `active` = 1 where `id` = {$idorder} and `num_table` = {$num_table}";
		mysqli_query($link,$sql);
		
		$sql = "update `of_note_order` set `active` = 1 where `order_id` = {$idorder}";
		mysqli_query($link,$sql);
		
		
		// reload bep
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
			$data['name']=$num_table;
			$pusher->trigger('Reload', 'loadmenu2', @$data);
			
	}
		
		$sql1 = "select * from `of_order_detail` where `order_id`={$idorder} and `active` = 1 and `food_id` = {$id}";
		$r1 = mysqli_query($link,$sql1);
		$rs_sl = mysqli_num_rows($r1);
		if($rs_sl>0)
		{
			$sql_sl = "update `of_order_detail` set `qty` = `qty`+ {$qty} where `order_id`={$idorder} and `active` = 1 and `food_id` = {$id}";
			mysqli_query($link,$sql_sl);
			
			$sql="update `of_food` set `solve` = `solve` + {$qty} where `id` ={$id}";
			mysqli_query($link,$sql);
			
			$sql_sl = "delete from `of_order_detail` where `order_id`={$idorder} and `active` = 2";
			mysqli_query($link,$sql_sl);
		}
		else
		{
			$sql_sl = "update `of_order_detail` set `active` = 1 where `order_id`={$idorder} and `food_id` = {$id}";
			mysqli_query($link,$sql_sl);
			
			$sql="update `of_food` set `solve` = `solve` + {$qty} where `id` ={$id}";
			mysqli_query($link,$sql);
		}
		
	header("location:?mod=check_order&num_table={$num_table}&id={$idorder}");
?>