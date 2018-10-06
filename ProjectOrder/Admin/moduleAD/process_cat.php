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
         header('Location:danh-sach-the-loai.html');
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
header('Location:danh-sach-the-loai.html');
}


if(isset($_GET['del']))
{
	$sql="select `img_url` from `of_category` where `id`='{$_GET['del']}'";
	$rs=mysqli_query($link,$sql);
	$r=mysqli_fetch_assoc($rs);
	
	//Xóa hình 
	if(is_file("../img/cate/{$r['img_url']}"))
	{
		unlink("../img/cate/{$r['img_url']}");	
	}
	
    $sql_del="delete from `of_category` where `id`='{$_GET['del']}'";
    if(mysqli_query($link,$sql_del))
    {
        header('Location:danh-sach-the-loai.html');
    }
    else {
        echo $sql_del;
    }

}
if(isset($_GET['actives']))
{
    $sql = "update `of_category` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-the-loai.html");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_category` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-the-loai.html");
}
