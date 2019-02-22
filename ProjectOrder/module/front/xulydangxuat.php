<?php
$id=$_COOKIE['userid_login'];
$sql="update `of_user` set `active`= 1 where `id`={$id}";
$rs=mysqli_query($link,$sql);

$sql="select `id`,`name` from `of_user` where `id`={$id}";
$kq=mysqli_query($link,$sql);
$k=mysqli_fetch_assoc($kq);

//Delete Cookies
setcookie("username_login", $k['name'], time() - 3600, "/");
setcookie("userid_login", $k['id'], time() - 3600, "/");

unset($_SESSION['cart']);

header("location:login.html");
?>