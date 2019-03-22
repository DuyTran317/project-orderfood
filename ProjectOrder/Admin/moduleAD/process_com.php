<?php

if(isset($_GET['del']))
{
    $sql_del = sql_delete_com('of_rate');;
    if(mysqli_query($link,$sql_del))
    {
        header("location:danh-sach-danh-gia.html");
    }else echo $sql_del;
}
if(isset($_GET['actives']))
{
    $sql = "update `of_rate` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-danh-gia.html");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_rate` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-danh-gia.html");
}