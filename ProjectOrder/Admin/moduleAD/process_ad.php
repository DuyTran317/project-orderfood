<?php
if(isset($_POST['account']))
{
    $account=$_POST['account'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $name = $_POST['ten'];
    $active = $_POST['trangthai'];
    $cate = $_POST['quyen'];
       $pass = hash('sha512',$_POST['pass']);
        $sql_user = insert_ad($account,$pass,$name,$cate,$active);
       if(mysqli_query($link,$sql_user))
        {
            $_SESSION['them'] = 'themthanhcong';
            header("location:danh-sach-admin.html");
        }
        else echo $sql_user;

}
if(isset($_POST['xacnhan']) )
{
    $ten = $_POST['suaso'];
    $pass = $_POST['suapass'];
    $level = $_POST['suaquyen'];
    if(isset($_POST['suaquyen']))
    {
        if($pass != '')
        {
            if($_POST['changePassword']="on"){
                
                    $pass = hash('sha512',$_POST['suapass']);
                    $sql_edit=up_ad_pass($pass,$ten,$level); 
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
                    $sql_edit=up_ad_nopass($ten,$level);
                    
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
                            $sql_edit= up_ad_on($ten,$pass); 
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
                            $sql_edit=up_ad_noon($ten);
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
                            $sql_edit=up_ad_null($ten,$pass); 
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
                                 
                                 $sql_edit=up_ad_null2($ten); 
                                  mysqli_query($link,$sql_edit);
                                header("location:edit_ad-{$_POST['suaid']}.html");
                            }
                    }
               } 
            }
           

 }
