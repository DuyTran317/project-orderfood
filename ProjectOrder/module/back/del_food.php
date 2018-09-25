<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	if(isset($_GET['num_table']))
	{
		$num_table=$_GET['num_table'];
	}
	if(isset($_GET['id_food']))
	{
		$id_food=$_GET['id_food'];
	}
	
	$sql="select * from `of_order` where `num_table`={$num_table} and `id`={$id}";
	$kq=mysqli_query($link,$sql);
	$k=mysqli_fetch_assoc($rs);
	
	if($r['active']==0)
	{						
		$sql="select * from `of_order_detail` where `order_id`={$id} and `active`=1";
		$rs2=mysqli_query($link,$sql);
		if(mysqli_num_rows($rs2)==0)
		{			
			$sql="select * from `of_order_detail` where `order_id`={$id} and `active`=0";
			$rs=mysqli_query($link,$sql);
			
			$dem = mysqli_num_rows($rs);
			if($dem==1)
			{
				$sql="delete from `of_order` where `id`={$id} and `active`=0";
				mysqli_query($link,$sql);
				
				$sql="delete from `of_order_detail` where `active`=0 and `order_id`={$id} and `id`={$id_food}";
				mysqli_query($link,$sql);			
							
				$sql="delete from `of_note_order` where `order_id`={$id} and `active`=0";
				mysqli_query($link,$sql);
			}	
			else
			{
				$sql="delete from `of_order_detail` where `active`=0 and `order_id`={$id} and `id`={$id_food}";
				mysqli_query($link,$sql);												
			}
		}
		else
		{
			$sql="select * from `of_order_detail` where `order_id`={$id} and `active`=0";
			$rs=mysqli_query($link,$sql);
			
			$dem = mysqli_num_rows($rs);
			if($dem==1)
			{				
				$sql="update `of_order` set `active`=1 where `id`={$id}";
				mysqli_query($link,$sql);
				
				$sql="delete from `of_order_detail` where `active`=0 and `order_id`={$id} and `id`={$id_food}";
				mysqli_query($link,$sql);	
				
				$sql="delete from `of_note_order` where `order_id`={$id} and `active`=0";
				mysqli_query($link,$sql);
			}
			else
			{				
				$sql="delete from `of_order_detail` where `active`=0 and `order_id`={$id} and `id`={$id_food}";
				mysqli_query($link,$sql);					
			}
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
	$pusher->trigger('hihi', 'delfood', @$data);
	
	header("location:?mod=check_order&id=$id&num_table=$num_table");
?>