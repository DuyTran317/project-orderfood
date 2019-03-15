<?php
$id=$_COOKIE['userid_login'];
$sql="update `of_user` set `active`= 1 where `id`={$id}";
$rs=mysqli_query($link,$sql);

$k = selectIdWithCondition($link, 'of_user', $id);

//Delete Cookies
setcookie("username_login", $k['name'], time() - 3600, "/");
setcookie("userid_login", $k['id'], time() - 3600, "/");

unset($_SESSION['cart']);
unset($_SESSION['remind']);

header("location:login.html");
?>