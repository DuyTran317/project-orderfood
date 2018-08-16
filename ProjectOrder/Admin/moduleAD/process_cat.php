<?php
include("connect.php");
if(isset($_POST['theloai']))
{
    $theloai = $_POST['theloai'];
    $trangthai = $_POST['trangthai'];
    $thutu = $_POST['thutu'];
     $sql_add = "insert into `of_category` VALUES(NULL,'{$theloai}','{$thutu}','{$trangthai}') ";
     if(mysqli_query($link,$sql_add))
     {
         header('Location:?mod=cat_list&mes=1');
     }
        else {
         echo $sql_add;
        }
}
if(isset($_POST['suatheloai']))
{
    $theloai = $_POST['suatheloai'];
    $trangthai = $_POST['suatrangthai'];
    $thutu = $_POST['suathutu'];
    $id= $_POST['id'];
    $sql_edit="update `of_category` set `name`='{$theloai}',`order`='{$thutu}',`active`='{$trangthai}' where `id`={$id}";
    if(mysqli_query($link,$sql_edit))
    {
        header('Location:?mod=cat_list&mes2=2');
    }
    else {
        echo $sql_edit;
    }
}


if(isset($_GET['del']))
{
    $sql_del="delete from `of_category` where `id`='{$_GET['del']}'";
    if(mysqli_query($link,$sql_del))
    {
        header('Location:?mod=cat_list&mes3=3');
    }
    else {
        echo $sql_del;
    }

}
