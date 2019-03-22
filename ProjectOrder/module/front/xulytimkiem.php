<?php
session_start();
$lang = $_SESSION['lang'].'_name';
$id_ban = takeValueCookie('userid_login');
$id_name = takeValueCookie('username_login');

if(isset($_POST['find'])){
	
	$name= takePost('find');
	
	$rs = selectWithCondition_Lang($link, 'of_food', $lang, $name);
	if(mysqli_num_rows($rs)>0)
		{
		while($r=mysqli_fetch_assoc($rs))
			{			
				$id=$r['id'];
				$id_cate=$r['category_id'];
				if(isset($_COOKIE['userid_login']))
				{
					header("location:xdt-chi_tiet-i9102dfood{$id}-i9102d{$id_ban}-n9102ame{$id_name}-c9102ate{$id_cate}-back.html");
				}
				else
				{
					header("location:dtail-watch_detailwolg-i9102dfood{$id}-c9102ate{$id_cate}-back.html");
				}
			}
		}
	else
		{
			if(!isset($_COOKIE['userid_login']))
			{
				header("location:watch_homewolg.html");
			}
			else
			{
				header("location:tlc-trang_chu-i9102d{$id_ban}-n9102ame{$id_name}-search.html");
			}
		}
	}
?>