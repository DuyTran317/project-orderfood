<?php

if(isset($_GET['mahd']))
{
    $sql_del=sql_delete('of_bill');
    if(mysqli_query($link,$sql_del))
    {
    	 
        header('Location:danh-sach-hoa-don.html');
    }
    else {
        echo $sql_del;
    }

}
?>