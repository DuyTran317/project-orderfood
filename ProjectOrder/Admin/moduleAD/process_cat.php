<?php
include("connect.php");
if(isset($_POST['theloai']))
{
    $theloai = $_POST['theloai'];
    $trangthai = $_POST['trangthai'];
    $thutu = $_POST['thutu'];

    $file = $_FILES['image'];
    if($file['name'] != '')
    {
        $img_url = mt_rand().$file['name'];
        copy($file['tmp_name'],"../img/sp/{$img_url}");
    }
     $sql_add = "insert into `of_category` VALUES(NULL,'{$theloai}','{$img_url}','{$thutu}','{$trangthai}') ";
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

    $file = $_FILES['suaimage'];
    if($file['name']!= '')
    {
      $img_url= mt_rand().$file['name'];
      copy($file['tmp_name'],"../img/sp/{$img_url}");

        $sql_edit="update `of_category` set `name`='{$theloai}',`order`='{$thutu}',`active`='{$trangthai}',`img_url`='{$img_url}' where `id`={$id}";
        
        mysqli_query($link,$sql_edit);
    }
    else{
        $sql_edit="update `of_category` set `name`='{$theloai}',`order`='{$thutu}',`active`='{$trangthai}' where `id`={$id}";
        mysqli_query($link,$sql_edit);
    }
header('Location:?mod=cat_list&mes2=2');
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
if(isset($_GET['actives']))
{
    $sql = "update `of_category` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=cat_list");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_category` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=cat_list");
}
