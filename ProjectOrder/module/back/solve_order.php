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
	
	$sql_ins_thanhtoan="insert into `of_bill` values(NULL, '$orderID', '$num_table', '$total', now(), '0')";
	mysqli_query($link,$sql_ins_thanhtoan);
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
	$data['message'] = 'Đơn Hàng Mới!!!';
	$pusher->trigger('hihi', 'newbill', $data);
?>
<script>
	alert("Hoàn Tất Đơn Hàng!");
	window.location="?mod=home";
</script>