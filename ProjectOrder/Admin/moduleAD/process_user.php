<?php
if(isset($_POST['username']))
{
    
    $name = $_POST['username'];
    $active = $_POST['trangthai'];
    $sql = "select * from `of_user` where name='".$_POST['username']."'";
    $sql_user = "insert into `of_user` VALUES (NULL ,'{$name}','{$active}')";
    $kq = mysqli_query($link,$sql);
    if(mysqli_num_rows($kq)>0)
    {
         $_SESSION['fail'] = 'thatbai';
        header("location:them-ban.html");
    }
    elseif(mysqli_query($link,$sql_user))
    {
        $_SESSION['them'] = 'themthanhcong';
        header("location:danh-sach-ban.html");
    }
    else echo $sql_user;

}

if(isset($_GET['del']))
{
    $sql_del= "delete from of_user WHERE id={$_GET['del']}";
    if(mysqli_query($link,$sql_del))
    {
        header("location:danh-sach-ban.html");
    }
    else echo $sql_del;
}
if(isset($_GET['actives']))
{
    $sql = "update `of_user` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-ban.html");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_user` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-ban.html");
}
