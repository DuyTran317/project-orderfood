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
?>