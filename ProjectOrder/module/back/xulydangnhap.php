<?php

if(isset($_POST['user']))
{
	$user=$_POST['user'];
	
	//Mã hóa MK
	$pass=hash('sha512',$_POST['pass']);
	
	//Kiem tra bang cach truy van vao DB
	$sql="select * from `of_admin` where `account`='{$user}' and `password`='{$pass}'";
	$rs=mysqli_query($link,$sql);
	
	if(mysqli_num_rows($rs)>0)
	{
		$r=mysqli_fetch_assoc($rs);
		$_SESSION['admin_id']=$r['id'];
		$_SESSION['admin_name']=$r['name'];
		
		if($r['cate']==1)
		{
			header("location:?mod=home");
		}
		elseif ($r['cate']==2)
		{
			header("location:?mod=home_thanhtoan");
		}
		else
		{
			header("location:?mod=admin");
		}
	}
	else
	{
		//Tạo Session lưu tạm (hiện lại) email sau khi nhập sai
		$_SESSION['email']=$user;
?>		
		<script> 
			alert('Sai tài khoản hoặc mật khẩu!'); 
			window.location="?mod=dangnhap";
        </script>
		
<?php		
	}
}
?>