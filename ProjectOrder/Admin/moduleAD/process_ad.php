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
                
                    $pass = hash('sha512',$_POST['suapass']);
                    $sql_edit="update `of_admin` set `password`='$pass' WHERE id={$_POST['suaid']}";
                    mysqli_query($link,$sql_edit);
                    
                    if($cate ==1)
                    {
                        $_SESSION['sua'] = 'suathanhcong';
                        header("location:?mod=ad_list");
                    }else
                    {
                        header("location:?mod=edit_ad&edit={$_POST['suaid']}&key2=5");
                    }
                    
                
            }
        }

}
