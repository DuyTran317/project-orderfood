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
	if(isset($_GET['qty']))
	{
		$qty=$_GET['qty'];
	}
	$sql = "select * from `of_order_detail` where `order_id` ={$idorder} and `active` = 2";
	$rs = mysqli_query($link,$sql);
	$dem = 1;
	$tong =0;
	while($r = mysqli_fetch_assoc($rs))
	{
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
			sendPusher2('05d67b2777b04b8a83db', 'd7e2016ecdb311bba59b', '636618', 'Reload', 'loadmenu2',$num_table);
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
			
			$sql_sl = "delete from `of_order_detail` where `order_id`={$idorder} and `active` = 2 and `food_id`={$id}";
			mysqli_query($link,$sql_sl);
		}
		else
		{
			$sql_sl = "update `of_order_detail` set `active` = 1 where `order_id`={$idorder} and `food_id` = {$id}";
			mysqli_query($link,$sql_sl);
			
			$sql="update `of_food` set `solve` = `solve` + {$qty} where `id` ={$id}";
			mysqli_query($link,$sql);
		}
	
	header("location:?mod=home");
	
?>