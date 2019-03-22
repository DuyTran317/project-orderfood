<?php

if(isset($_POST['username']))
{
    
    $name = $_POST['username'];
    $active = $_POST['trangthai'];
    $sql = "select * from `of_user` where name='".$_POST['username']."'";
    $sql_user = insert_user($name,$active);
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
    $sql_del= sql_delete_user('of_user');
    if(mysqli_query($link,$sql_del))
    {
        header("location:danh-sach-ban.html");
    }
    else echo $sql_del;
}
if(isset($_GET['actives']))
{
    $sql = active_show_user('of_user');
    mysqli_query($link,$sql);
    header("location:danh-sach-ban.html");
}
if(isset($_GET['activeh']))
{
    $sql = active_hide_user('of_user');
    mysqli_query($link,$sql);
    header("location:danh-sach-ban.html");
}
