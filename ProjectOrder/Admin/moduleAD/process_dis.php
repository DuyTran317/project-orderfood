
<?php
include("controller/c_sql_insert.php");
include("controller/c_sql_update.php");
include("controller/c_sql_del.php");
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

     $sql_add = insert_dis($datefrom,$dateto,$discount,$trangthai);
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

    if($dateto < $datefrom)
        {
            $_SESSION['suakhuyenmai'] = $_POST['suakhuyenmai'];
            $_SESSION['suadatefrom'] = $_POST['suadatefrom'];
            $_SESSION['suadateto'] = $_POST['suadateto'];
            $_SESSION['chuy'] = 'chuy';
            header('Location:edit_discount-'.$id.'.html');
        }
        else{
            $sql_edit=update_dis($datefrom,$dateto,$discount,$trangthai,$id);
        }
        
       if(mysqli_query($link,$sql_edit)) 
       {
         $_SESSION['sua'] = 'suathanhcong';
         header('Location:danh-sach-khuyen-mai.html');
       }
       else echo $sql_edit;
    
   
}


if(isset($_GET['del']))
{

	
    $sql_del=sql_delete('of_discount');
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
    $sql = active_show('of_discount');;
    mysqli_query($link,$sql);
    header("location:danh-sach-khuyen-mai.html");
}
if(isset($_GET['activeh']))
{
    $sql = active_hide('of_discount');;
    mysqli_query($link,$sql);
    header("location:danh-sach-khuyen-mai.html");
}
