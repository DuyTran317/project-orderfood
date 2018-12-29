<?php

if(isset($_POST['xacnhan']) )
{
   
    $pass = $_POST['suapass'];
    $level = $_POST['suaquyen'];
    if(isset($_POST['suaquyen']))
    {
        if($pass != '')
        {
            if($_POST['changePassword']="on"){
                
                    $pass = hash('sha512',$_POST['suapass']);
                    $sql_edit="update `of_admin` set `password`='{$pass}', `cate`= '{$level}' WHERE id={$_POST['suaid']}"; 
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
                    $sql_edit="update `of_admin` set `cate`= '{$level}' WHERE id={$_POST['suaid']}";
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
            if($_SESSION['id'] == 1)
             {if($pass != '')
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
               else 
               {
                if($pass != '')
                {
                    if($_POST['changePassword']="on"){
                        
                            $pass = hash('sha512',$_POST['suapass']);
                            $sql_edit="update `of_admin` set `password`='{$pass}' WHERE id={$_POST['suaid']}"; 
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
                            
                            if($cate ==1)
                            {
                                
                                header("location:danh-sach-admin.html");
                            }else
                            {
                                 
                                header("location:edit_ad-{$_POST['suaid']}.html");
                            }
                    }
               } 
            }
           

 }
