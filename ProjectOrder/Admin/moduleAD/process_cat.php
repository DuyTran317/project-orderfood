<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include("connect.php");
if(isset($_POST['vi_theloai']))
{
    $vi_theloai = $_POST['vi_theloai'];
    $en_theloai = $_POST['en_theloai'];
    $trangthai = $_POST['trangthai'];
    $thutu = $_POST['thutu'];

    $file = $_FILES['image'];
    if($file['name'] != '')
    {
        $img_url = mt_rand().$file['name'];
        copy($file['tmp_name'],"../img/cate/{$img_url}");
    }
     $sql_add = "insert into `of_category` VALUES(NULL,'{$vi_theloai}','{$en_theloai}','{$img_url}','{$thutu}','{$trangthai}') ";
     if(mysqli_query($link,$sql_add))
     {
        $_SESSION['them'] = 'themthanhcong';
         header('Location:?mod=cat_list');
     }
        else {
         echo $sql_add;
        }
}
if(isset($_POST['vi_suatheloai']))
{
    $vi_theloai = $_POST['vi_suatheloai'];
    $en_theloai = $_POST['en_suatheloai'];
    $trangthai = $_POST['suatrangthai'];
    $thutu = $_POST['suathutu'];
    $id= $_POST['id'];

    $file = $_FILES['suaimage'];
    if($file['name']!= '')
    {
      $img_url= mt_rand().$file['name'];
      copy($file['tmp_name'],"../img/cate/{$img_url}");

        $sql_edit="update `of_category` set `vi_name`='{$vi_theloai}',`en_name`='{$en_theloai}',`order`='{$thutu}',`active`='{$trangthai}',`img_url`='{$img_url}' where `id`={$id}";
        
        mysqli_query($link,$sql_edit);
    }
    else{
        $sql_edit="update `of_category` set `vi_name`='{$vi_theloai}',`en_name`='{$en_theloai}',`order`='{$thutu}',`active`='{$trangthai}' where `id`={$id}";
        mysqli_query($link,$sql_edit);
    }
    $_SESSION['sua'] = 'suathanhcong';
header('Location:?mod=cat_list');
}


if(isset($_GET['del']))
{
    $sql_del="delete from `of_category` where `id`='{$_GET['del']}'";
    if(mysqli_query($link,$sql_del))
    {
        header('Location:?mod=cat_list');
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
