<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(isset($_POST['vi_theloai']))
{
    $vi_theloai = $_POST['vi_theloai'];
    $en_theloai = $_POST['en_theloai'];
    $trangthai = $_POST['trangthai'];
    $thutu = $_POST['thutu'];
    $source = $_POST['manage'];

    $file = $_FILES['image'];
    if($file['name'] != '')
    {
        $img_url = mt_rand().$file['name'];
        copy($file['tmp_name'],"../img/cate/{$img_url}");
    }
    $sql_add = insert_de($vi_theloai,$en_theloai,$img_url,$thutu,$trangthai,$source);
     if(mysqli_query($link,$sql_add))
     {
        $_SESSION['them'] = 'themthanhcong';
         header('Location:danh-sach-chung-loai.html');
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
    $source = $_POST['suamanage'];


    $file = $_FILES['suaimage'];
    if($file['name']!= '')
    {
      $img_url= mt_rand().$file['name'];
      copy($file['tmp_name'],"../img/cate/{$img_url}");

        $sql_edit= update_de_img($vi_theloai,$en_theloai,$thutu,$trangthai,$img_url,$source,$id);
        
        mysqli_query($link,$sql_edit);
    }
    else{
        $sql_edit=update_de_noimg($vi_theloai,$en_theloai,$thutu,$trangthai,$source,$id);
        mysqli_query($link,$sql_edit);
    }
    $_SESSION['sua'] = 'suathanhcong';
header('Location:danh-sach-chung-loai.html');
}


if(isset($_GET['del']))
{

	$sql="select `img_url` from `of_department` where `id`='{$_GET['del']}'";
	$rs=mysqli_query($link,$sql);
	$r=mysqli_fetch_assoc($rs);
	
	//Xóa hình 
	if(is_file("../img/cate/{$r['img_url']}"))
	{
		unlink("../img/cate/{$r['img_url']}");	
	}
	
    $sql_del=sql_delete_de('of_department');;
    if(mysqli_query($link,$sql_del))
    {
        header('Location:danh-sach-chung-loai.html');
    }
    else {
        echo $sql_del;
    }

}
if(isset($_GET['actives']))
{
    $sql = active_show_de('of_department');
    mysqli_query($link,$sql);
    header("location:danh-sach-chung-loai.html");
}
if(isset($_GET['activeh']))
{
    $sql = active_hide_de('of_department');
    mysqli_query($link,$sql);
    header("location:danh-sach-chung-loai.html");
}
