<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_POST['vi_tenslide']))
{
    $tenslidevi = $_POST['vi_tenslide'];
    $tenslideen = $_POST['en_tenslide'];
    $noidungvi = $_POST['vi_noidung'];
    $noidungen = $_POST['en_noidung'];


    $file = $_FILES['image'];
    if($file['name'] != '')
    {
        $img_url = mt_rand().$file['name'];
        copy($file['tmp_name'],"../img/slider/{$img_url}");
    }
     $sql_add = "insert into `of_slider`(`id`,`vi_name`,`en_name`,`vi_content`,`en_content`,`img_url`,`create_at`) VALUES(NULL,'{$tenslidevi}','{$tenslideen}','{$noidungvi}','{$noidungen}','{$img_url}',now())";
     if(mysqli_query($link,$sql_add))
     {
        $_SESSION['them'] = 'themthanhcong';
         header('Location:danh-sach-slide.html');
     }
        else {
         echo $sql_add;
        }
}
if(isset($_POST['vi_suatenslide']))
{
    $suatenslidevi = $_POST['vi_suatenslide'];
    $suatenslideen = $_POST['en_suatenslide'];
    $suanoidungvi = $_POST['vi_suanoidung'];
    $suanoidungen = $_POST['en_suanoidung'];
    $file = $_FILES['suaimage'];
    if($file['name']!= '')
    {
		$sql="select `img_url` from `of_slider` where `id`={$_POST['id']}";
		$rs=mysqli_query($link,$sql);
		$r=mysqli_fetch_assoc($rs);
		
      $img_url= mt_rand().$file['name'];
      copy($file['tmp_name'],"../img/slider/{$img_url}");

        $sql_edit="update `of_slider` set `vi_name`='{$suatenslidevi}',`en_name`='{$suatenslideen}',`vi_content`='{$suanoidungvi}',`en_content`='{$suanoidungen}',`img_url`='{$img_url}'where `id`={$_POST['id']}";
        
        mysqli_query($link,$sql_edit);
		
		unlink("../img/slider/{$r['img_url']}");	
    }
    else{
        $sql_edit="update `of_slider` set `vi_name`='{$suatenslidevi}',`en_name`='{$suatenslideen}',`vi_content`='{$suanoidungvi}',`en_content`='{$suanoidungen}' where `id`={$_POST['id']}";
        mysqli_query($link,$sql_edit);
    }
  
    $_SESSION['sua'] = 'suathanhcong';
header('Location:danh-sach-slide.html');
}


if(isset($_GET['del']))
{
	$sql="select `img_url` from `of_slider` where `id`='{$_GET['del']}'";
	$rs=mysqli_query($link,$sql);
	$r=mysqli_fetch_assoc($rs);
	
	//Xóa hình 
	if(is_file("../img/slider/{$r['img_url']}"))
	{
		unlink("../img/slider/{$r['img_url']}");	
	}
	
    $sql_del="delete from `of_slider` where `id`='{$_GET['del']}'";
    if(mysqli_query($link,$sql_del))
    {
        header('Location:danh-sach-slide.html');
    }
    else {
        echo $sql_del;
    }

}