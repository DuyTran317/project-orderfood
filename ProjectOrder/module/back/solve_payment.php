<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	$orderID = takeGet('orderID');
	$num_table = takeGet('num_table');
	$total = takeGet('total');	
	
	$sql="update `of_bill` set `active`=1, `total`={$total} where `order_id`={$orderID}";
	mysqli_query($link,$sql);
	
	$sql="update `of_solve_pay` set `active`=1 where `num_table`={$num_table}";
	mysqli_query($link,$sql);
    //reload menu va nhanvien su dung taikhoan pusher 2
	sendPusher2('aaee585e94d28c3959f4', 'd6433e5a7ff7ceeff7a1', '631874', 'Reload', 'loadmenu_nhanvien',$num_table);
?>
<script>
	alert("Hoàn Tất Thanh Toán!");
	window.location="?mod=in_hoadon&id=<?=$orderID?>&num_table=<?=$num_table?>";
</script>