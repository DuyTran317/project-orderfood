<?php

if(isset($_POST['ten']))
{
    $account=$_POST['ten'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $name = $_POST['so'];
    $active = $_POST['trangthai'];
    $cate = $_POST['cate'];
       $pass = hash('sha512',$_POST['pass']);
        $sql_user = "insert into `of_manage` VALUES (NULL ,'{$account}','{$pass}','{$name}','{$cate}','{$active}')";
       if(mysqli_query($link,$sql_user))
        {
            $_SESSION['them'] = 'themthanhcong';
            header("location:danh-sach-bep-thanh-toan.html");
        }
        else echo $sql_user;

}
if(isset($_POST['suaten']))
{
    $account=$_POST['suaten'];
    $pass = $_POST['suapass'];
    $repass = $_POST['suarepass'];
    $name = $_POST['suaname'];

        if($pass != '')
        {
            if($_POST['changePassword']="on"){
              
                    $pass = hash('sha512',$_POST['suapass']);
                    $sql_edit="update `of_manage` set `account`='$account',`password`='$pass',`name`='$name' WHERE id={$_POST['suaid']}";
                    mysqli_query($link,$sql_edit);
                     $_SESSION['sua'] = 'suathanhcong';
                    header("location:danh-sach-bep-thanh-toan.html");
                
            }
        }
        else {

            $sql_edit = "update `of_manage` set `account`='$account',`name`='$name',`active`='$active' WHERE id={$_POST['suaid']}";
            mysqli_query($link,$sql_edit);
            header("location:danh-sach-bep-thanh-toan.html");
        }

}

if(isset($_GET['actives']))
{
    $sql = "update `of_manage` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-bep-thanh-toan.html");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_manage` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-bep-thanh-toan.html");
}
if(isset($_GET['del']))
{
    $sql_del= "delete from of_manage WHERE id={$_GET['del']}";
    if(mysqli_query($link,$sql_del))
    {
        header("location:danh-sach-bep-thanh-toan.html");
    }
    else echo $sql_del;
}