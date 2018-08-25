<?php

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
                    header("location:?mod=edit_ad&edit={$_POST['suaid']}&war=1");
                }
                else if($pass != $repass)
                {
                    header("location:?mod=edit_ad&edit={$_POST['suaid']}&warm=2");
                }else {
                    $pass = hash('sha512',$_POST['suapass']);
                    $sql_edit="update `of_admin` set `account`='$account',`password`='$pass',`name`='$name',`active`='$active' WHERE id={$_POST['suaid']}";
                    mysqli_query($link,$sql_edit);
                    header("location:?mod=ad_list&mes2=2");
                }
            }
        }
        else {

            $sql_edit = "update `of_admin` set `account`='$account',`name`='$name',`active`='$active' WHERE id={$_POST['suaid']}";
            mysqli_query($link,$sql_edit);
            header("location:?mod=ad_list&mes2=2");
        }

}

if(isset($_GET['actives']))
{
    $sql = "update `of_admin` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=ad_list");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_admin` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:?mod=ad_list");
}