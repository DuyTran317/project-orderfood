<?php
$id=$_SESSION['user_idban'];
$sql="update `of_user` set `active`= 1 where `id`={$id}";
$rs=mysqli_query($link,$sql);

unset($_SESSION['user_idban']);
unset($_SESSION['user_nameban']);
unset($_SESSION['cart']);
header("location:?mod=dangnhap");
?>