<?php

if(isset($_POST['xacnhan']) )
{
   
    $pass = $_POST['suapass'];
        if($pass != '')
        {
            if($_POST['changePassword']="on"){
                
                    $pass = hash('sha512',$_POST['suapass']);
                    $sql_edit="update `of_admin` set `password`='{$pass}', `cate`= '1' WHERE id={$_POST['suaid']}"; 
                     mysqli_query($link,$sql_edit);
                   
                    if($cate ==1)
                    {
                        $_SESSION['sua'] = 'suathanhcong';
                        header("location:danh-sach-admin.html");
                    }else
                    {
                         $_SESSION['sua'] = 'suathanhcong';
                        header("location:edit_ad-{$_POST['suaid']}.html");
                    }
                    
                
            } 
            
        }
        else
        {
                    $sql_edit="update `of_admin` set `cate`= '1' WHERE id={$_POST['suaid']}";
                    mysqli_query($link,$sql_edit);
                    
                    if($cate ==1)
                    {
                        $_SESSION['sua'] = 'suathanhcong';
                        header("location:danh-sach-admin.html");
                    }else
                    {
                         $_SESSION['sua'] = 'suathanhcong';
                        header("location:edit_ad-{$_POST['suaid']}.html");
                    }
            }

}
