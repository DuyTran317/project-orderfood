<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	$orderID = takeGet('orderID');
	$num_table = takeGet('num_table');
	$total = takeGet('total');	
	
	$sql="update `of_order` set `active`=1 where `id`={$orderID}";
	mysqli_query($link,$sql);
	$sql="update `of_note_order` set `active`=1 where `order_id`={$orderID}";
	mysqli_query($link,$sql);
	
	$r = selectActiveBill_OrActive($link, 'of_order_detail', $orderID, 2);
	while($rs = mysqli_fetch_assoc($r))
	{
		$r1 = selectWithCondition_OrdActFoo($link, 'of_order_detail', $orderID, $rs['food_id'], 1);
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
			$sql_sl = "update `of_order_detail` set `active` = 1 where `order_id`={$orderID} and `food_id` = {$rs['food_id']}";
			mysqli_query($link,$sql_sl);
			
			$sql="update `of_food` set `solve` = `solve` + {$rs['qty']} where `id` ={$rs['food_id']}";
			mysqli_query($link,$sql);
		}
	}
	$r = selectActiveBill_OrActive($link, 'of_bill', $orderID, 0);
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
	//pussher
	sendPusher2('770fa0ac91f2e68d3ae7', 'ba6aadbd24eaa367edb6', '631845', 'Reload', 'newbill',$num_table);
?>
<script>
	 alert("Hoàn Tất Đơn Hàng!");
	 window.location="?mod=home";
</script>