<?php

if(isset($_POST['user']))
{
	$user=$_POST['user'];
	
	//Mã hóa MK
	$pass=hash('sha512',$_POST['pass']);
		
	$rs = queryLogin_Back($link, 'of_manage', $user, $pass);
	
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
		elseif ($r['cate']==3)
		{
			header("location:?mod=home_nhanvien");
		}
		elseif ($r['cate']==4)
		{
			header("location:?mod=home");
		}
	}
	else
	{
		//Tạo Session lưu tạm (hiện lại) email sau khi nhập sai
		$_SESSION['email']=$user;
		$_SESSION['chuy'] = "khongthanhcong";
?>		
		<script> 
				window.location="?mod=dangnhap";
        </script>
		
<?php		
	}
}
?>