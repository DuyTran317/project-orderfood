<?php
if(isset($_POST['ten']))
{
    $account=$_POST['ten'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $name = $_POST['so'];
    $active = $_POST['trangthai'];
    $pass = hash('sha512',$_POST['pass']);
        $sql_user = "insert into `of_user` VALUES (NULL ,'{$account}','{$name}','{$active}')";
       if(mysqli_query($link,$sql_user))
        {
            $_SESSION['them'] = 'themthanhcong';
            header("location:?mod=user_list");
        }
        else echo $sql_user;

}

if(isset($_GET['del']))
{
    $sql_del= "delete from of_user WHERE id={$_GET['del']}";
    if(mysqli_query($link,$sql_del))
    {
        header("location:?mod=user_list");
    }
    else echo $sql_del;
}
if(isset($_GET['actives']))
{
    $sql = "update `of_user` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=user_list");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_user` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=user_list");
}