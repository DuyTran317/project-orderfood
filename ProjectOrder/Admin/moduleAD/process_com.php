<?php
if(isset($_GET['del']))
{
    $sql_del = "delete from of_rate where id={$_GET['del']}";
    if(mysqli_query($link,$sql_del))
    {
        header("location:?mod=com_list&mes3=3");
    }else echo $sql_del;
}