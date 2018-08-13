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
    'encrypted' => true
);
$pusher = new Pusher(
        '10d5ea7e7b632db09c72', 'a496a6f084ba9c65fffb', '234217', $options
);
$data['name'] = $name ;
$data['message'] = 'Thanh Toán!!!!!';
$pusher->trigger('hihi', 'notice', $data);
?>

