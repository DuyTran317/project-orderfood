<?php
if(isset($_POST['tensp']))
{
    $theloai = $_POST['theloai'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $khuyenmai = $_POST['khuyenmai'];
    $thutu = $_POST['thutu'];
    $noidung = $_POST['noidung'];
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

    $sql_img = "insert into of_food  VALUES(NULL ,'$theloai','$tensp','$gia','$khuyenmai','$noidung','$img_url','$img_url2','$img_url3','$img_url4','$thutu','$trangthai')";
    if( mysqli_query($link,$sql_img))
    {
        header("Location:?mod=pro_list&mes=1");
    }
    else echo $sql_img;
}
if(isset($_POST['suatheloai']))
{
    $edit=$_POST['id'];
    $theloai = $_POST['suatheloai'];
    $tensp = $_POST['suatensp'];
    $gia = $_POST['suagia'];
    $khuyenmai = $_POST['suakhuyenmai'];
    $thutu = $_POST['suathutu'];
    $noidung = $_POST['suanoidung'];
    $trangthai = $_POST['suatrangthai'];
    $file= $_FILES['suaimage'];
    $file2= $_FILES['suaimage2'];
    $file3= $_FILES['suaimage3'];
    $file4= $_FILES['suaimage4'];

    if($file['name']!= '' || $file2['name']!= '' || $file3['name']!= '' || $file4['name']!= '')
    {
        $img_url= mt_rand().$file['name'];
        copy($file['tmp_name'],"../img/sp/{$img_url}");

        $img_url2= mt_rand().$file2['name'];
        copy($file2['tmp_name'],"../img/sp/{$img_url2}");

        $img_url3= mt_rand().$file3['name'];
        copy($file3['tmp_name'],"../img/sp/{$img_url3}");

        $img_url4= mt_rand().$file4['name'];
        copy($file4['tmp_name'],"../img/sp/{$img_url4}");

        copy($file['tmp_name'],"../img/sp/{$img_url}");
        $sql_edit = "update `of_food` set `category_id`= '{$theloai}',`name`='{$tensp}',
`price`='{$gia}',`discount`='{$khuyenmai}',`desc`='{$noidung}',`img_url`='{$img_url}',`img_url2`='{$img_url2}',`img_url3`='{$img_url3}',`img_url4`='{$img_url4}',`order`='{$thutu}',
`active`='{$trangthai}' where id=$edit";
        mysqli_query($link,$sql_edit);
    }
    else
    {
        $sql_edit = "update `of_food` set `category_id`= '{$theloai}',`name`='{$tensp}',
`price`='{$gia}',`discount`='{$khuyenmai}',`desc`='{$noidung}',`order`='{$thutu}',
`active`='{$trangthai}' where id=$edit";
        mysqli_query($link,$sql_edit);
    }
    header("location:?mod=pro_list&mes2=2");
}

if(isset($_GET['del']))
{
    $sql_del = "delete from `of_food` where `id`='{$_GET['del']}'";
    if(mysqli_query($link,$sql_del))
    {
        header("location:?mod=pro_list&mes3=3");
    }
    else echo $sql_del;
}