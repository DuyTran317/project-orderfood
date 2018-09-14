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
            header("location:?mod=kit_list&mes=1");
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
                if(strlen($pass)<6)
                {
                    header("location:?mod=edit_kit&edit={$_POST['suaid']}&war=1");
                }
                else if($pass != $repass)
                {
                    header("location:?mod=edit_kit&edit={$_POST['suaid']}&warm=2");
                }else {
                    $pass = hash('sha512',$_POST['suapass']);
                    $sql_edit="update `of_manage` set `account`='$account',`password`='$pass',`name`='$name',`active`='$active' WHERE id={$_POST['suaid']}";
                    mysqli_query($link,$sql_edit);
                    header("location:?mod=kit_list&mes2=2");
                }
            }
        }
        else {

            $sql_edit = "update `of_manage` set `account`='$account',`name`='$name',`active`='$active' WHERE id={$_POST['suaid']}";
            mysqli_query($link,$sql_edit);
            header("location:?mod=kit_list");
        }

}

if(isset($_GET['actives']))
{
    $sql = "update `of_manage` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=kit_list");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_manage` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=kit_list");
}
if(isset($_GET['del']))
{
    $sql_del= "delete from of_manage WHERE id={$_GET['del']}";
    if(mysqli_query($link,$sql_del))
    {
        header("location:?mod=kit_list&mes3=3");
    }
    else echo $sql_del;
}