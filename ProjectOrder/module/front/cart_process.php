<?php
	if(isset($_GET['id_ban']))
	{
		$id_ban=$_GET['id_ban'];
	}
	if(isset($_GET['name_ban']))
	{
		$name_ban=$_GET['name_ban'];
	}
	if(isset($_GET['cate']))
	{
		$cate=$_GET['cate'];
	}
	
	//$_SESSION['cart']= array(1=>2,360=>5);
	
	@$cart=$_SESSION['cart'];
	
	$act=$_GET['act'];//act=1:Thêm, act=2:Sửa, act=3:Xóa
	
	@$id = $_GET['id'];
	
	//Tang san pham them ++, khi khach hàng chon them
	if($act==1)
	{
		//Qty này ở trang chi tiết (detail) khi thêm số lượng.
		@$qty=max(1,intval($_GET['qty']));		
		@$cart[$id]+=$qty;
		@$_SESSION['cart']=$cart;
?>
	<script>window.location=
	"cmn-thuc_don-i9102d<?=$id_ban?>-n9102ame<?=$name_ban?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html";
    </script>
<?php
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
?>
	<script>window.location=
	"kt-cart-i9102d<?=$id_ban?>-n9102ame<?=$name_ban?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html"
	</script>
<?php
	}
	
	//Xoa phan tu khoi mang: Xoa san pham khoi gio hang
	if($act==3)
	{
		unset($cart[$id]);
			
		$_SESSION['cart']=$cart;
		
		//Chuyen den trang cart
?>
	<script>window.location=
	"kt-cart-i9102d<?=$id_ban?>-n9102ame<?=$name_ban?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html";
	</script>
<?php
	}
	if($act == 4)
	{
		if(isset($_GET['id_ban'])&&isset($_GET['name_ban']))
		{
			$temp = 1;
			foreach($_SESSION['theloai'] as $k => $v)
			{
				$cate = $k;
				if($v == 0)
				{
					$temp=0;
					//$_SESSION['theloai'][$k] = 1;
					$_SESSION['remind'] = 1;
					if(isset($_GET['thanhtoan']))
						header("location:index.php?mod=menu&id={$_GET['id_ban']}&name={$_GET['name_ban']}&cate={$cate}");
						else
						header("location:index.php?mod=menu&id={$_GET['id_ban']}&name={$_GET['name_ban']}&cate={$cate}&thanhtoan=1");
					break;
				}
				
			}
			
                	if($temp==1) {
						if(isset($_GET['thanhtoan'])) 
						header("location:index.php?mod=checkout&id_ban={$_GET['id_ban']}&name_ban={$_GET['name_ban']}&cate={$cate}&thanhtoan=1");
						else
						header("location:index.php?mod=checkout&id_ban={$_GET['id_ban']}&name_ban={$_GET['name_ban']}&cate={$cate}");
					}
		}
	}
?>