<?php

if(isset($_POST['user'])&&isset($_SESSION['inside']))
{
	$select = selectWithConditionArray_AcOrByOrAsc($link, 'of_department');
	foreach($select as $r){
		$_SESSION['theloai'][$r['id']] = 0;
	}
	$user=$_POST['user'];
	
	//Kiem tra bang cach truy van vao DB
	$rs = selectWithCondition_NameAct($link, 'of_user', $user, 1);
	if(mysqli_num_rows($rs)>0)
	{
		$r=mysqli_fetch_assoc($rs);

		$id = $r['id'];
		$name = $r['name'];
		$country= $_SESSION['lang'];

		$rs = Upd_OderAct($link, 'of_user', 2, $id);
		
		//Cookies
		setcookie("username_login", $r['name'], time() + (86400 * 30), "/");
		setcookie("userid_login", $r['id'], time() + (86400 * 30), "/");
		
		// gui tin sang nhan vien
		sendPusher('51e37eb7c055b1a5ea68', '42f05b8854b00b014f5b', '643830', 'Reload', 'login');
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
else{
    //Tạo Session lưu tạm (hiện lại) email sau khi nhập sai
    $_SESSION['email']=$user;
    ?>
    <script>
        alert('bạn hãy nhập đúng số bàn và cho phép orderfood xác định vị trí hiện tại của bạn');
        window.location="login.html";
    </script>

    <?php
}
?>