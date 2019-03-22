<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	$orderID = takeGet('orderID');
	$num_table = takeGet('num_table');
	
	$rs = selectIdNum($link, 'of_order', $orderID, $num_table);
	$r = mysqli_fetch_assoc($rs);
	
	if($r['active']==0)
	{		
		$sql="DELETE FROM `of_order_detail` WHERE `order_id`={$orderID} AND `active`=0";
		mysqli_query($link,$sql);
		
		$rs2 = selectActiveBill_OrActive($link, 'of_order_detail', $orderID, 1);
		
		if(mysqli_num_rows($rs2)==0)
		{
			$sql="DELETE FROM `of_order` WHERE `id`={$orderID} AND `active`=0";
			mysqli_query($link,$sql);
			
			$sql="delete from `of_note_order` where `order_id`={$orderID} and `active`=0";
			mysqli_query($link,$sql);
		}
		else
		{
			$sql="update `of_order` set `active`=1 where `id`={$orderID}";
			mysqli_query($link,$sql);
			
			$sql="delete from `of_note_order` where `order_id`={$orderID} and `active`=0";
			mysqli_query($link,$sql);
		}
	}
	
	//pussher
	sendPusher2('a8fd52cd1e38d4a2bcf1', '3df7cccb3390bcafa3e5', '636610', 'Reload', 'delorder',$num_table);
	header("location:?mod=home_nhanvien");
?>
