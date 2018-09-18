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
        $_SESSION['them'] = 'themthanhcong';
        header("Location:?mod=pro_list");
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

    $sql = "select * from `of_food` where id=$edit";
    $kq = mysqli_query($link,$sql);
    $d=mysqli_fetch_assoc($kq);

    $sql_edit = "update `of_food` set `category_id`= '{$theloai}',`name`='{$tensp}',
`price`='{$gia}',`discount`='{$khuyenmai}',`desc`='{$noidung}',`order`='{$thutu}',
`active`='{$trangthai}'";

    if($file['name']!= '')
    {
        $img_url= mt_rand().$file['name'];
        $sql_img1 = ",`img_url`='{$img_url}'";
        copy($file['tmp_name'],"../img/sp/{$img_url}");

        $sql_edit .= $sql_img1;
        $hinhcu = "../img/sp/{$d['img_url']}";
        unlink($hinhcu);
    }

    if($file2['name']!= '')
    {
        $img_url2= mt_rand().$file2['name'];
        $sql_img2 = ",`img_url2`='{$img_url2}'";
        copy($file2['tmp_name'],"../img/sp/{$img_url2}");

        $sql_edit .= $sql_img2;
        $hinhcu = "../img/sp/{$d['img_url2']}";
        unlink($hinhcu);
    }

    if($file3['name']!= '')
    {
        $img_url3= mt_rand().$file3['name'];
        $sql_img3 = ",`img_url3`='{$img_url3}'";
        copy($file3['tmp_name'],"../img/sp/{$img_url3}");

        $sql_edit .= $sql_img3;
        $hinhcu = "../img/sp/{$d['img_url3']}";
        unlink($hinhcu);
    }

    if($file4['name']!= '')
    {
        $img_url4= mt_rand().$file4['name'];
        $sql_img4= ",`img_url4`='{$img_url4}'";
        copy($file4['tmp_name'],"../img/sp/{$img_url4}");

        $sql_edit .= $sql_img4;
        $hinhcu = "../img/sp/{$d['img_url4']}";
        unlink($hinhcu);
    }


    $sql_edit .= "where id=$edit";
    mysqli_query($link,$sql_edit);
     $_SESSION['sua'] = 'suathanhcong';
    header("location:?mod=pro_list");
}

if(isset($_GET['del']))
{
    $sql_del = "delete from `of_food` where `id`='{$_GET['del']}'";
    if(mysqli_query($link,$sql_del))
    {
        header("location:?mod=pro_list");
    }
    else echo $sql_del;
}
if(isset($_GET['actives']))
{
    $sql = "update `of_food` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=pro_list");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_food` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=pro_list");
}