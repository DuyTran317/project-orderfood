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
	
	$sql="update `of_order` set `active`=1 where `id`={$orderID}";
	mysqli_query($link,$sql);
	$sql="update `of_note_order` set `active`=1 where `order_id`={$orderID}";
	mysqli_query($link,$sql);
	
	$sql="select * from `of_order_detail` where `order_id`={$orderID} and `active` = 2 ";
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
			$sql_sl = "update `of_order_detail` set `active` = 1 where `order_id`={$orderID} and `food_id` = {$rs['food_id']}";
			mysqli_query($link,$sql_sl);
			
			$sql="update `of_food` set `solve` = `solve` + {$rs['qty']} where `id` ={$rs['food_id']}";
			mysqli_query($link,$sql);
		}
	}
	/*$sql_sl = "delete from `of_order_detail` where `order_id`={$orderID} and `active` = 2";
	mysqli_query($link,$sql_sl);*/
	/*$sql="update `of_order_detail` set `active`=1 where `order_id`={$orderID}";
	mysqli_query($link,$sql);*/
	$sql="select `id` from `of_bill` where `order_id`=$orderID and `active` = 0";
	$r=mysqli_query($link,$sql);
	$rs=mysqli_num_rows($r);
	if($rs==0)
	{
		$sql="select `id` from `of_bill` order by `id` desc limit 0,1";
		$kq_mhd=mysqli_query($link,$sql);
		$k_mhd=mysqli_fetch_assoc($kq_mhd);
		
		$mh=$k_mhd['id']+1;
		$mh=date('Ym').$mh;
		
		$sql="select * from `of_discount` where `active` =1";
        $khuyen_mai = mysqli_query($link,$sql);
		$show_km = mysqli_fetch_assoc($khuyen_mai);
		$giatri_km = $show_km['discount'];
			
		$sql_ins_thanhtoan="insert into `of_bill` values(NULL, '{$mh}', '$orderID', '$num_table', '$total', now(), '$giatri_km','0')";
		mysqli_query($link,$sql_ins_thanhtoan);
	}
	else 
	{
		$sql_update_thanhtoan="update `of_bill` set `total`=$total where `order_id`=$orderID";
		mysqli_query($link,$sql_update_thanhtoan);
	}
	//pussher
	require('Pusher.php');
	$options = array(
	'cluster' => 'ap1',
    'encrypted' => true
	);
 	$pusher = new Pusher(
    '770fa0ac91f2e68d3ae7',
    'ba6aadbd24eaa367edb6',
    '631845',
    $options
	);
	$data['name'] = $num_table;
	$pusher->trigger('Reload', 'newbill', $data);
?>
<script>
	alert("Hoàn Tất Đơn Hàng!");
	window.location="?mod=home";
</script>