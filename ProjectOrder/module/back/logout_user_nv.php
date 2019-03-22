<?php
	$id = takeGet('id');
	
	$sql = "update `of_user` set `active` = 1 where `id` = {$id}";
	mysqli_query($link,$sql);
	
	header("location:?mod=home_nhanvien");
?>