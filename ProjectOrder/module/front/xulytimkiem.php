<?php
session_start();
$lang = $_SESSION['lang'].'_name';
if(isset($_SESSION['user_idban']))
{
	$id_ban=$_SESSION['user_idban'];
}
if(isset($_SESSION['user_nameban']))
{
	$id_name=$_SESSION['user_nameban'];
}
if(isset($_POST['find']))
	{
	$name=$_POST['find'];
	$sql="select * from `of_food` where `$lang`='$name'";
	$rs=mysqli_query($link,$sql);
	if(mysqli_num_rows($rs)>0)
		{
		while($r=mysqli_fetch_assoc($rs))
			{
			
			$id=$r['id'];
			$id_cate=$r['category_id'];
			header("location:?mod=detail&id={$id}&id_ban={$id_ban}&name_ban={$id_name}&cate={$id_cate}&back");
			}
		}
	else
		{
		
		header("location:?mod=home&id={$id_ban}&name={$id_name}&tim");
		}
	}
?>