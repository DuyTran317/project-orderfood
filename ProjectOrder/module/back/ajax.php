<?php 
session_start();
require_once("../../lib/connect.php");
if(isset($_POST['ChangeActiveFood']))
{
	$id = 0;
	$id = $_POST['id'];
	$active = $_POST['active'];
	
	$sql="update `of_food` set `active`={$active} where `id`={$id}";
	$r= mysqli_query($link,$sql);
}
// check session i
if(isset($_POST['act']) && $_POST['act'] == 1 && isset($_POST['status']))
{
    if($_POST['status'] == "turn on") {
        if(isset($_POST['value']) && $_POST['value']) $_SESSION['i'] = $_POST['value'];
    }
    else
        if($_POST['status'] == "turn off")
        {
            $_SESSION['i'] = -1;
        }
}

if(isset($_POST['role']))
{
	if($_POST['role']==1)
	$_SESSION['nut_montrung']=1;
	if($_POST['role']==0)
	$_SESSION['nut_montrung']=0;
}
?>