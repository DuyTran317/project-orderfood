<?php
	if(isset($_GET['id_ban']))
	{
		$id_ban=$_GET['id_ban'];
	}
	if(isset($_GET['name_ban']))
	{
		$name_ban=$_GET['name_ban'];
	}
	
	//$_SESSION['cart']= array(1=>2,360=>5);
	
	$cart=$_SESSION['cart'];
	
	$act=$_GET['act'];//act=1:Thêm, act=2:Sửa, act=3:Xóa
	
	$id = $_GET['id'];
	
	//Tang san pham them ++, khi khach hàng chon them
	if($act==1)
	{
		//Qty này ở trang chi tiết (detail) khi thêm số lượng.
		$qty=max(1,intval($_GET['qty']));
		
		$cart[$id]+=$qty;
		$_SESSION['cart']=$cart;
		header("location:?mod=menu&id=$id_ban&name=$name_ban");
	}
	
	//Cập nhật
	if($act==2)
	{		
		//$cart = $_POST;
		foreach($cart as $k => $v)
		{
			$cart[$k]=max(1,intval($_POST[$k]));
		}
		$_SESSION['cart']=$cart;
		//Chuyen den trang cart
		header("location:?mod=cart&id_ban=$id_ban&name_ban=$name_ban");
	}
	
	//Xoa phan tu khoi mang: Xoa san pham khoi gio hang
	if($act==3)
	{
		unset($cart[$id]);
			
		$_SESSION['cart']=$cart;
		
		//Chuyen den trang cart
		header("location:?mod=cart&id_ban=$id_ban&name_ban=$name_ban");
	}
?>