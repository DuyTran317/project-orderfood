<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_POST['vi_theloai']))
{
    $department_id=$_POST['chungloai'];
    $vi_theloai = $_POST['vi_theloai'];
    $en_theloai = $_POST['en_theloai'];
    $trangthai = $_POST['trangthai'];
    $thutu = $_POST['thutu'];

    
     $sql_add = insert_cate($department_id,$vi_theloai,$en_theloai,$thutu,$trangthai);
     if(mysqli_query($link,$sql_add))
     {
        $_SESSION['chungloai'] = $department_id;
        $_SESSION['them'] = 'themthanhcong';
         header('Location:danh-sach-the-loai.html');
     }
    else {
         echo $sql_add;
        }
}
if(isset($_POST['vi_suatheloai']))
{
    $department_id=$_POST['suachungloai'];
    $vi_theloai = $_POST['vi_suatheloai'];
    $en_theloai = $_POST['en_suatheloai'];
    $trangthai = $_POST['suatrangthai'];
    $thutu = $_POST['suathutu'];
    $id= $_POST['id'];

        $sql_edit=update_cate($department_id,$vi_theloai,$en_theloai,$thutu,$trangthai,$id);
       if(mysqli_query($link,$sql_edit)) 
       {
         $_SESSION['chungloai'] = $department_id;
         $_SESSION['sua'] = 'suathanhcong';
         header('Location:danh-sach-the-loai.html');
       }
       else echo $sql_edit;
    
   
}


if(isset($_GET['del']))
{
	$sql="select `department_id` from `of_category` where `id`='{$_GET['del']}'";
	$rs=mysqli_query($link,$sql);
	$r=mysqli_fetch_assoc($rs);
	$idchungloai = $r['department_id'];
    $_SESSION['chungloai'] = $idchungloai;
	//Xóa hình 
	if(is_file("../img/cate/{$r['img_url']}"))
	{
		unlink("../img/cate/{$r['img_url']}");	
	}
	
    $sql_del=sql_delete_cate('of_category');
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
    $sql = active_show_cate('of_category');
    mysqli_query($link,$sql);
    header("location:danh-sach-the-loai.html");
}
if(isset($_GET['activeh']))
{
    $sql = active_hide_cate('of_category');
    mysqli_query($link,$sql);
    header("location:danh-sach-the-loai.html");
}
