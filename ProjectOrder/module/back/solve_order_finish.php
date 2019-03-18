<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	$idorder = takeGet('idorder');
	$num_table = takeGet('num_table');
	$id = takeGet('id');
	$qty = takeGet('qty');
	
	$rs = selectActiveBill_OrActive($link, 'of_order_detail', $idorder, 2);
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
		$r1 = selectWithCondition_OrdActFoo($link, 'of_order_detail', $idorder, $id, 1);
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