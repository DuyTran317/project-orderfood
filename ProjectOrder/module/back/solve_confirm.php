<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	$orderID = takeGet('orderID');
	$num_table = takeGet('num_table');
	$total = takeGet('total');			
	
	$sql="update `of_order` set `active`=2 where `id`={$orderID}";
	mysqli_query($link,$sql);
	$sql="update `of_note_order` set `active`=2 where `order_id`={$orderID}";
	mysqli_query($link,$sql);
	
	$r = selectActiveBill_OrAc($link, 'of_order_detail', $orderID);
	while($rs = mysqli_fetch_assoc($r))
	{
		$sql_sl = "update `of_order_detail` set `active` = 2 where `order_id`={$orderID} and `food_id` = {$rs['food_id']} and `active` = 0";
		mysqli_query($link,$sql_sl);			
	}
	
	$sql_sl = "delete from `of_order_detail` where `order_id`={$orderID} and `active` = 0";
	mysqli_query($link,$sql_sl);

	$r = selectActiveBill_OrAc($link, 'of_bill', $orderID);
	$rs=mysqli_num_rows($r);
	if($rs==0)
	{
		$k_mhd = selectWithCondition_OrByIdDes($link, 'of_bill');
		
		$mh=$k_mhd['id']+1;
		$mh=date('Ym').$mh;
		
        $khuyen_mai = selectWithCondition_Act0($link, 'of_discount', 1);
		$show_km = mysqli_fetch_assoc($khuyen_mai);
		$giatri_km = $show_km['discount'];
		if(mysqli_num_rows($khuyen_mai)==0)
		{
			$giatri_km = 0;
		}
		
		$date = date("Y-m-d G:i:s");		
		$sql_ins_thanhtoan="insert into `of_bill` values(NULL, '{$mh}', '$orderID', '$num_table', '$total', '$date', '$giatri_km','0')";
		mysqli_query($link,$sql_ins_thanhtoan);
	}
	else 
	{
		$sql_update_thanhtoan="update `of_bill` set `total`=$total where `order_id`=$orderID";
		mysqli_query($link,$sql_update_thanhtoan);
	}
			sendPusher('161363aaa8197830a033', '46f2ba3b258f514f6fc7', '577033', 'Reload', 'reloadbep');
?>
<script>
	window.location="?mod=home_nhanvien";
</script>