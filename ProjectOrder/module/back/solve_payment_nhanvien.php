<?php 
if(isset($_GET['name']))
{
	$name = takeGet('name');
	$order_id = takeGet('order_id');	

	$sql="insert into `of_solve_pay` values(NULL,{$order_id},{$name},'0')";
	mysqli_query($link,$sql);
	
	$sql="update `of_user` set `active`= 1 where `name`={$name}";
	$rs=mysqli_query($link,$sql);
	
	//pusher 
	sendPusher('161363aaa8197830a033', '46f2ba3b258f514f6fc7', '577033', 'Reload', 'loadthanhtoan');
	header("location:?mod=home_nhanvien");
}
?>