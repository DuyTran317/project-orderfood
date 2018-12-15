
<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_POST['khuyenmai']))
{
    if(isset($_POST['datefrom']))
    {
        $datefrom=$_POST['datefrom'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($datefrom,0,2);
        $m= substr($datefrom,3,2);
        $y= substr($datefrom,6,4);
        
        $datefrom="{$y}-{$m}-{$d} 00:00:00";     
    }
    if(isset($_POST['dateto']))
    {
        $dateto=$_POST['dateto'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($dateto,0,2);
        $m= substr($dateto,3,2);
        $y= substr($dateto,6,4);
        
        $dateto="{$y}-{$m}-{$d} 23:59:59";

    }   
    
    $discount=$_POST['khuyenmai'];
    $trangthai = $_POST['trangthai'];
        if($dateto < $datefrom)
        {
            $_SESSION['khuyenmai'] = $_POST['khuyenmai'];
            $_SESSION['datefrom'] = $datefrom;
            $_SESSION['dateto'] = $dateto;
            $_SESSION['chuy'] = 'chuy';
            header('Location:them-khuyen-mai.html');
        }
        else{

     $sql_add = "insert into `of_discount` VALUES(NULL,'{$datefrom}','{$dateto}','{$discount}','{$trangthai}')";
        }
    
     if(mysqli_query($link,$sql_add))
     {
        $_SESSION['them'] = 'themthanhcong';
         header('Location:danh-sach-khuyen-mai.html');
     }
        else {
         echo $sql_add;
        }
}
if(isset($_POST['suakhuyenmai']))
{
    if(isset($_POST['suadatefrom']))
    {
        $datefrom=$_POST['suadatefrom'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($datefrom,0,2);
        $m= substr($datefrom,3,2);
        $y= substr($datefrom,6,4);
        
        $datefrom="{$y}-{$m}-{$d} 00:00:00";     
    }
    if(isset($_POST['suadateto']))
    {
        $dateto=$_POST['suadateto'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($dateto,0,2);
        $m= substr($dateto,3,2);
        $y= substr($dateto,6,4);
        
        $dateto="{$y}-{$m}-{$d} 23:59:59";

    }   
    $discount=$_POST['suakhuyenmai'];
    $trangthai = $_POST['suatrangthai'];
    $id= $_POST['id'];

    /*if($dateto < $datefrom)
        {
            $_SESSION['suakhuyenmai'] = $_POST['suakhuyenmai'];
            $_SESSION['suadatefrom'] = $datefrom;
            $_SESSION['suadateto'] = $dateto;
            $_SESSION['chuy'] = 'chuy';
            header('Location:sua-khuyen-mai.html');
        }
        else{*/
            $sql_edit="update `of_discount` set `create_at`='{$datefrom}' ,`end_at`='{$dateto}',`discount`='{$discount}',`active`='{$trangthai}' where `id`={$id}";
        /*}*/
        
       if(mysqli_query($link,$sql_edit)) 
       {
         $_SESSION['sua'] = 'suathanhcong';
         header('Location:danh-sach-khuyen-mai.html');
       }
       else echo $sql_edit;
    
   
}


if(isset($_GET['del']))
{

	
    $sql_del="delete from `of_discount` where `id`='{$_GET['del']}'";
    if(mysqli_query($link,$sql_del))
    {
        header('Location:danh-sach-khuyen-mai.html');
    }
    else {
        echo $sql_del;
    }

}
if(isset($_GET['actives']))
{
    $sql = "update `of_discount` set `active`=1 where id='{$_GET['actives']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-khuyen-mai.html");
}
if(isset($_GET['activeh']))
{
    $sql = "update `of_discount` set `active`=0 where id='{$_GET['activeh']}' ";
    mysqli_query($link,$sql);
    header("location:danh-sach-khuyen-mai.html");
}
