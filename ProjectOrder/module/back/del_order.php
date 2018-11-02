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
	
	$sql="select * from `of_order` where `num_table`={$num_table} and `id`={$orderID}";
	$rs=mysqli_query($link,$sql);
	$r=mysqli_fetch_assoc($rs);
	
	if($r['active']==0)
	{		
		$sql="DELETE FROM `of_order_detail` WHERE `order_id`={$orderID} AND `active`=0";
		mysqli_query($link,$sql);
		
		$sql="select * from `of_order_detail` where `order_id`={$orderID} and `active`=1";
		$rs2=mysqli_query($link,$sql);
		
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
	require('Pusher.php');
	$options = array(
	'cluster' => 'ap1',
    'encrypted' => true
	);
 	$pusher = new Pusher(
    'a8fd52cd1e38d4a2bcf1',
    '3df7cccb3390bcafa3e5',
    '636610',
    $options
	);
	$data['name']=$num_table;
	$pusher->trigger('Reload', 'delorder', $data);
	
	header("location:?mod=home_nhanvien");
?>
