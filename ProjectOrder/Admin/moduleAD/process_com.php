<?php
if(isset($_GET['del']))
{
    $sql_del = "delete from of_rate where id={$_GET['del']}";
    if(mysqli_query($link,$sql_del))
    {
        header("location:?mod=com_list&mes3=3");
    }else echo $sql_del;
}
if(isset($_GET['actives']))
{
    $sql = "update `of_rate` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=com_list");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_rate` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=com_list");
}