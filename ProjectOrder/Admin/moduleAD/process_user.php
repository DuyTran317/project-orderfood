<?php
if(isset($_POST['ten']))
{
    $account=$_POST['ten'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $name = $_POST['so'];
    $active = $_POST['trangthai'];
    if(strlen($pass)<6)
    {
        header("location:?mod=add_user&war=1");
    }
    else if($pass != $repass)
    {
        header("location:?mod=add_user&warm=2");
    }
    else
    {   $pass = hash('sha512',$_POST['pass']);
        $sql_user = "insert into `of_user` VALUES (NULL ,'{$account}','{$pass}','{$name}','{$active}')";
       if(mysqli_query($link,$sql_user))
        {
            header("location:?mod=user_list&mes=1");
        }
        else echo $sql_user;
    }
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

                if(strlen($pass)<6)
                {
                    header("location:?mod=edit_user&war=1");
                }
                else if($pass != $repass)
                {
                    header("location:?mod=edit_user&warm=2");
                }else {
                    $pass = hash('sha512',$_POST['pass']);
                    $sql_edit="update `of_user` set `name`='$account',`password`='$pass',`name`='$name',`active`='$active' WHERE id={$_POST['suaid']}";

                }
        }
        else
        {

            $sql_edit="update `of_user` set `name`='$account',`name`='$name',`active`='$active' WHERE id={$_POST['suaid']}";
        }
        mysqli_query($link,$sql_edit);
        header("location:?mod=user_list&mes2=2");

}

if(isset($_GET['del']))
{
    $sql_del= "delete from of_user WHERE id={$_GET['del']}";
    if(mysqli_query($link,$sql_del))
    {
        header("location:?mod=user_list&mes3=3");
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