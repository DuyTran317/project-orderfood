<?php

if(isset($_POST['vi_tensp']))
{
    $theloai = $_POST['theloai'];
    $vi_tensp = $_POST['vi_tensp'];
    $en_tensp = $_POST['en_tensp'];
    $gia = $_POST['gia'];
    //$khuyenmai = $_POST['khuyenmai'];
    $thutu = $_POST['thutu'];
    $vi_noidung = $_POST['vi_noidung'];
    $en_noidung = $_POST['en_noidung'];
    $trangthai = $_POST['trangthai'];
    $file= $_FILES['image'];
    if($file['name'] != '')
    {
        $img_url = mt_rand().$file['name'];
        copy($file['tmp_name'],"../img/sp/{$img_url}");
    }
    $file2= $_FILES['image2'];
    if($file2['name'] != '')
    {
        $img_url2 = mt_rand().$file2['name'];
        copy($file2['tmp_name'],"../img/sp/{$img_url2}");
    }
    $file3= $_FILES['image3'];
    if($file3['name'] != '')
    {
        $img_url3 = mt_rand().$file3['name'];
        copy($file3['tmp_name'],"../img/sp/{$img_url3}");
    }
    $file4= $_FILES['image4'];
    if($file4['name'] != '')
    {
        $img_url4 = mt_rand().$file4['name'];
        copy($file4['tmp_name'],"../img/sp/{$img_url4}");
    }
	//Khuyến mãi
	/*if($khuyenmai != 0)
	{ 
		$new_price = $gia-(($khuyenmai*$gia)/100);
	}
	else
	{
		$new_price = $gia;
	}*/
	
    $sql_img = insert_pro($theloai,$vi_tensp,$en_tensp,$gia,$vi_noidung,$en_noidung,$img_url,$img_url2,$img_url3,$img_url4,$thutu,$trangthai);
    if(mysqli_query($link,$sql_img))
    {
        $_SESSION['theloai'] = $theloai;
        $_SESSION['them'] = 'themthanhcong';
        header("location:danh-sach-san-pham.html");
    }
}
if(isset($_POST['suatheloai']))
{
    $edit=$_POST['id'];
    $theloai = $_POST['suatheloai'];
    $vi_tensp = $_POST['vi_suatensp'];
    $en_tensp = $_POST['en_suatensp'];
    $gia = $_POST['suagia'];
    $khuyenmai = $_POST['suakhuyenmai'];
    $thutu = $_POST['suathutu'];
    $vi_noidung = $_POST['vi_suanoidung'];
    $en_noidung = $_POST['en_suanoidung'];
    $trangthai = $_POST['suatrangthai'];

    $file= $_FILES['suaimage'];
    $file2= $_FILES['suaimage2'];
    $file3= $_FILES['suaimage3'];
    $file4= $_FILES['suaimage4'];

	//Khuyến mãi
	if($khuyenmai != 0)
	{ 
		$new_price = $gia-(($khuyenmai*$gia)/100);
	}
	else
	{
		$new_price = $gia;
	}
	
    $sql = "select * from `of_food` where `id`={$edit}";
    $kq = mysqli_query($link,$sql);
    $d=mysqli_fetch_assoc($kq);

    $sql_edit = up_pro_img($theloai,$vi_tensp,$en_tensp,$gia,$vi_noidung,$en_noidung,$thutu,$trangthai);

    if($file['name']!= '')
    {
        $img_url= mt_rand().$file['name'];
        $sql_img1 = ",`img_url`='{$img_url}'";
        copy($file['tmp_name'],"../img/sp/{$img_url}");

        $sql_edit .= $sql_img1;
        $hinhcu = "../img/sp/{$d['img_url']}";
        @unlink($hinhcu);
    }

      if($file2['name']!= '')
    {
        $img_url2= mt_rand().$file2['name'];
        $sql_img2= ",`img_url2`='{$img_url2}'";
        copy($file2['tmp_name'],"../img/sp/{$img_url2}");

        $sql_edit .= $sql_img2;
        $hinhcu = "../img/sp/{$d['img_url2']}";
        @unlink($hinhcu);
    }

     if($file3['name']!= '')
    {
        $img_url3= mt_rand().$file3['name'];
        $sql_img3= ",`img_url3`='{$img_url3}'";
        copy($file3['tmp_name'],"../img/sp/{$img_url3}");

        $sql_edit .= $sql_img3;
        $hinhcu = "../img/sp/{$d['img_url3']}";
        @unlink($hinhcu);
    }

    if($file4['name']!= '')
    {
        $img_url4= mt_rand().$file4['name'];
        $sql_img4= ",`img_url4`='{$img_url4}'";
        copy($file4['tmp_name'],"../img/sp/{$img_url4}");

        $sql_edit .= $sql_img4;
        $hinhcu = "../img/sp/{$d['img_url4']}";
        @unlink($hinhcu);
    }


    $sql_edit .= "where id=$edit";
    mysqli_query($link,$sql_edit);
    $_SESSION['theloai'] = $theloai;
     $_SESSION['sua'] = 'suathanhcong';
    header("location:danh-sach-san-pham.html");
}

if(isset($_GET['del']))
{
	$sql="select `img_url`,`img_url2`,`img_url3`,`img_url4`,`category_id` from `of_food` where `id`='{$_GET['del']}'";
	$rs=mysqli_query($link,$sql);
	$r=mysqli_fetch_assoc($rs);
	$idtheloai = $r['category_id'];
    $_SESSION['theloai'] = $idtheloai;
	//Xóa hình 
	if(is_file("../img/sp/{$r['img_url']}"))
	{
		unlink("../img/sp/{$r['img_url']}");	
	}
	if(is_file("../img/sp/{$r['img_url2']}"))
	{
		unlink("../img/sp/{$r['img_url2']}");	
	}
	if(is_file("../img/sp/{$r['img_url3']}"))
	{
		unlink("../img/sp/{$r['img_url3']}");	
	}
	if(is_file("../img/sp/{$r['img_url4']}"))
	{
		unlink("../img/sp/{$r['img_url4']}");	
	}
	

    $sql_del = sql_delete_pro('of_food');
    if(mysqli_query($link,$sql_del))
    {
        
        header("location:danh-sach-san-pham.html");
    }
    else echo $sql_del;
}
if(isset($_GET['actives']))
{
    $sql = active_show_pro('of_food');
    mysqli_query($link,$sql);
    header("location:danh-sach-san-pham.html");
}
if(isset($_GET['activeh']))
{
    $sql = active_hide_pro('of_food');
    mysqli_query($link,$sql);
    header("location:danh-sach-san-pham.html");
}