<?php

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