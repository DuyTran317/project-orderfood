﻿<?php

if(isset($_POST['user']))
{
	$user=$_POST['user'];
	
	//Kiem tra bang cach truy van vao DB
	$sql="select * from `of_user` where `name`='{$user}' and `active`=1";
	$rs=mysqli_query($link,$sql);
	
	if(mysqli_num_rows($rs)>0)
	{
		$r=mysqli_fetch_assoc($rs);
		$_SESSION['user_idban']=$r['id'];
		$_SESSION['user_nameban']=$r['name'];
		$id = $r['id'];
		$name = $r['name'];
		$country= $_SESSION['lang'];
		$sql="update `of_user` set `active`= 2 where `id`={$id}";
		$rs=mysqli_query($link,$sql);
		
		//Cookies
		setcookie("username_login", $r['name'], time() + (86400 * 30), "/");
		setcookie("userid_login", $r['id'], time() + (86400 * 30), "/");
		
		// gui tin sang nhan vien
		require('Pusher.php');
		$options = array(
		'cluster' => 'ap1',
		'encrypted' => true
		);
		$pusher = new Pusher(
		'51e37eb7c055b1a5ea68',
		'42f05b8854b00b014f5b',
		 '643830',
		 $options
		);
		$pusher->trigger('Reload', 'login', @$data);
	
		header("location:?mod=home&id=$id&name=$name");
	}
	else
	{
		//Tạo Session lưu tạm (hiện lại) email sau khi nhập sai
		$_SESSION['email']=$user;
		$sql="update `of_user` set `active`= 2 where `id`={$id}";
$rs=mysqli_query($link,$sql);

?>		
		<script> 
			alert('<?=_WRONGTABLENO?>');
			window.location="?mod=dangnhap";
		</script>
			
<?php		
	}
}
?>