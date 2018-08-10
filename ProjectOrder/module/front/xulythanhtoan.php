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
?>
