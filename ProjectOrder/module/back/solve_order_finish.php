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
	while(mysqli_fetch_assoc($rs))
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
	}

	$sql = "update `of_order_detail` set `active` = 1 where `food_id` = {$id}";
	mysqli_query($link,$sql);
	
	header("location:?mod=check_order&num_table={$num_table}&id={$idorder}");
?>