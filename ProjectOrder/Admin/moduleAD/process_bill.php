<?php
if(isset($_GET['mahd']))
{
    $sql_del="delete from `of_bill` where `id`='{$_GET['mahd']}'";
    if(mysqli_query($link,$sql_del))
    {
    	 
        header('Location:danh-sach-hoa-don.html');
    }
    else {
        echo $sql_del;
    }

}
?>