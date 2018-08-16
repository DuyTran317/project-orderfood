<?php
    $link = @mysqli_connect("localhost","root","","orderfood") or die("Lỗi Kết Nối");
    mysqli_set_charset($link,'utf8');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
?>