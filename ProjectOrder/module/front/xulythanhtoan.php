<?php 
if(isset($_GET['id']))
{
	$name = $_GET['name'];
	$id = $_GET['id'];	
	$sql="insert into `of_solve_pay` values(NULL,{$id},'0')";
	mysqli_query($link,$sql);
?>
<script>
alert("Đã Nhận Được Yêu Cầu! Vui Lòng Đợi!");
window.location="?mod=home&id=<?=$id?>&name=<?=$name?>";
</script>

<?php

}
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
	$data['name'] = $name ;
	$data['message'] = 'Thanh Toán!!!!!';
	$pusher->trigger('hihi', 'notice', $data);
?>

