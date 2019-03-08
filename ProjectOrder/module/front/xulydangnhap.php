<?php

if(isset($_POST['user']))
{
	$sql="select * from `of_department` where `active`=1 order by `order` asc";
		$rs=mysqli_query($link,$sql);
		while($r=mysqli_fetch_assoc($rs)):
		$_SESSION['theloai'][$r['id']] = 0;
		endwhile;
	$user=$_POST['user'];
	
	//Kiem tra bang cach truy van vao DB
	$sql="select * from `of_user` where `name`='{$user}' and `active`=1";
	$rs=mysqli_query($link,$sql);
	
	if(mysqli_num_rows($rs)>0)
	{
		$r=mysqli_fetch_assoc($rs);

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
	
		header("location:tlc-trang_chu-i9102d{$id}-n9102ame{$name}.html");
	}
	else
	{
		//Tạo Session lưu tạm (hiện lại) email sau khi nhập sai
		$_SESSION['email']=$user;
?>		
		<script> 
			alert('<?=_WRONGTABLENO?>');
			window.location="login.html";
		</script>
			
<?php		
	}
}
?>