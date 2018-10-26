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
	
	$sql="update `of_bill` set `active`=1 where `order_id`={$orderID}";
	mysqli_query($link,$sql);
	
	$sql="update `of_solve_pay` set `active`=1 where `num_table`={$num_table}";
	mysqli_query($link,$sql);
    
	
	//reload menu va nhanvien su dung taikhoan pusher 2
	require('Pusher.php');
	$options = array(
	'cluster' => 'ap1',
    'encrypted' => true
	);
 	$pusher = new Pusher(
    'aaee585e94d28c3959f4',
    'd6433e5a7ff7ceeff7a1',
    '631874',
    $options
	);
	$data['name']=$num_table;
	$pusher->trigger('Reload', 'loadmenu_nhanvien', $data);
	
?>
<script>
	alert("Hoàn Tất Thanh Toán!");
	window.location="?mod=in_hoadon&id=<?=$orderID?>&num_table=<?=$num_table?>";
</script>