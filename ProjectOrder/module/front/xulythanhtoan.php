<?php 
if(isset($_GET['id']))
{
	$thanhtoan=$_GET['id'];	
	$_SESSION['luuthanhtoan']=$thanhtoan;
?>
<script>
alert("Đã Nhận Được Yêu Cầu! Vui Lòng Đợi!");
window.location="?mod=home";
</script>

<?php

}
?>
