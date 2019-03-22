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
        $sql_user = insert_kit($account,$pass,$name,$cate,$active);
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
                    $sql_edit=up_kit_on($account,$pass,$name);
                    mysqli_query($link,$sql_edit);
                     $_SESSION['sua'] = 'suathanhcong';
                    header("location:danh-sach-bep-thanh-toan.html");
                
            }
        }
        else {

            $sql_edit = up_kit_noon($account,$name);
            mysqli_query($link,$sql_edit);
            header("location:danh-sach-bep-thanh-toan.html");
        }

}

if(isset($_GET['actives']))
{
    $sql = active_show_kit('of_manage');
    mysqli_query($link,$sql);
    header("location:danh-sach-bep-thanh-toan.html");
}
if(isset($_GET['activeh']))
{
    $sql = active_hide_kit('of_manage');
    mysqli_query($link,$sql);
    header("location:danh-sach-bep-thanh-toan.html");
}
if(isset($_GET['del']))
{
    $sql_del= sql_delete_kit('of_manage');
    if(mysqli_query($link,$sql_del))
    {
        header("location:danh-sach-bep-thanh-toan.html");
    }
    else echo $sql_del;
}