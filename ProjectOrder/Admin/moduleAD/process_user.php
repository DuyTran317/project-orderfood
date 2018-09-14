<?php
if(isset($_POST['ten']))
{
    $account=$_POST['ten'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $name = $_POST['so'];
    $active = $_POST['trangthai'];
    $pass = hash('sha512',$_POST['pass']);
        $sql_user = "insert into `of_user` VALUES (NULL ,'{$account}','{$pass}','{$name}','{$active}')";
       if(mysqli_query($link,$sql_user))
        {
            header("location:?mod=user_list&mes=1");
        }
        else echo $sql_user;

}
if(isset($_POST['suaten']))
{
    $account=$_POST['suaten'];
    $pass = $_POST['suapass'];
    $repass = $_POST['suarepass'];
    $name = $_POST['suaso'];
    $active = $_POST['suatrangthai'];

        if($pass != '')
        {
            if($_POST['changePassword']="on"){
                
                    $pass = hash('sha512',$_POST['suapass']);
                    $sql_edit="update `of_user` set `account`='$account',`password`='$pass',`name`='$name',`active`='$active' WHERE id={$_POST['suaid']}";
                    mysqli_query($link,$sql_edit);
                    header("location:?mod=user_list&mes2=2");
               
            }
        }
        else {

            $sql_edit = "update `of_user` set `account`='$account',`name`='$name',`active`='$active' WHERE id={$_POST['suaid']}";
            mysqli_query($link,$sql_edit);
            header("location:?mod=user_list&mes2=2");
        }

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