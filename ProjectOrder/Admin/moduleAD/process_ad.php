<?php

if(isset($_POST['suapass']))
{
    $account=$_POST['suaten'];
    $pass = $_POST['suapass'];
    $repass = $_POST['suarepass'];
    $name = $_POST['suaso'];
    $active = $_POST['suatrangthai'];
    $cate = $_SESSION['catead'];
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
                    $sql_edit="update `of_admin` set `password`='$pass' WHERE id={$_POST['suaid']}";
                    mysqli_query($link,$sql_edit);
                    
                    if($cate ==1)
                    {
                        header("location:?mod=ad_list&mes2=2");
                    }else
                    {
                        header("location:?mod=edit_ad&edit={$_POST['suaid']}&key=5");
                    }
                    
                }
            }
        }

}
