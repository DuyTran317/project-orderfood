<?php 
if(isset($_GET['id']))
{
	$name = $_GET['name'];
	$id = $_GET['id'];
	$order_id=$_GET['order_id'];	

	$sql="insert into `of_solve_pay` values(NULL,{$order_id},{$id},'0')";
	mysqli_query($link,$sql);
	
	$sql="update `of_user` set `active`= 1 where `id`={$id}";
	$rs=mysqli_query($link,$sql);
	
	//pusher 
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
			$pusher->trigger('Reload', 'loadthanhtoan', @$data);

	header("location:?mod=home_nhanvien");
}
?>