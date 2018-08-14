<style>
	th{
		text-align:center;
	}
</style>

<?php
	if(! isset($_SESSION['user_idban']))
	{
		header("location:?mod=dangnhap");
	}
	if(isset($_GET['id_ban']))
	{
		$id_ban=$_GET['id_ban'];
	}
	if(isset($_GET['name_ban']))
	{
		$name_ban=$_GET['name_ban'];
	}
	
	//Lấy thông tin người dùng
	$userID=$_SESSION['user_idban'];
	$cart=@$_SESSION['cart'];
	if(@count($cart)<=0)
	{
		echo"<div style='font-size:20px; color:red; font-weight:bold; text-align:center; margin-top:200px'>Bạn phải chọn sản phẩm</div>";
		echo"<div style='margin-top:200px'></div>";
	}
	else
	{			
		if(isset($_POST['goimon']))
		{
			$num_table=$name_ban;			
			
			//Insert don hang (order)
			$sql="insert into `of_order` values('NULL','$num_table','0')";
			mysqli_query($link,$sql);
			
			//Insert don hang chi tiet (order_detail)
			//Lay id (Auto Increment) cua lenh insert truoc
			$orderID=mysqli_insert_id($link);
			
			$carts=@$_SESSION['cart'];
			foreach($carts as $k => $v)
			{
				//Lay gia san pham
				$sql = 'select `price` from `of_food` where`id`='.$k;
				$rs = mysqli_query($link,$sql);
				$r = mysqli_fetch_assoc($rs);
				$price = $r['price'];
				
				//Insert
				$sql = "insert into `of_order_detail` values('$orderID','$k','$price','$v')";
				mysqli_query($link,$sql);
			}
			echo '<script>alert("Gọi Món Thành Công");</script>';
			unset($_SESSION['cart']);

?>	
			<script>window.location="?mod=menu&id=<?=$id_ban?>&name=<?=$name_ban?>&thanhtoan='yes'"</script>			

			//Gửi thông điêp để reload trang BẾP
			require('Pusher.php');
			$options = array(
				'encrypted' => true
			);
			$pusher = new Pusher(
					'10d5ea7e7b632db09c72', 'a496a6f084ba9c65fffb', '234217', $options
			);
			$data['name']= $name_ban ;
			$data['message'] = 'đã gọi món mới!!!';
			$pusher->trigger('hihi', 'notices', $data);
?>

			
			<script>window.location="?mod=home&id=<?=$id_ban?>&name=<?=$name_ban?>&thanhtoan='yes'"</script>			




<?php
		}
?>		

<div class="container">
	<h2 style="color:#C06">Danh Sách Đã Chọn</h2>
<div class="row">


<form action="" method="post">
<table border="1" class="col-md-12 col-sm-12 col-xs-12" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <th width="42">STT</th>
    <th width="220">Tên Sản Phẩm</th>
    <th width="140">Giá Sản Phẩm</td>
    <th width="106">Số Lượng</th>
    <th width="198">Tổng Tiền</th>
  </tr>
  
  <?php
  	$cart=@$_SESSION['cart'];
	$s=0;
	$i=0;
	if(count($cart)>0)foreach($cart as $k => $v)
	{
		$sql="select `name`,`price` from `of_food` where `id`={$k} ";
		$rs=mysqli_query($link,$sql);
		$r=mysqli_fetch_assoc($rs);
		$s+=$r['price']*$v;
  ?>
  
  <tr style="text-align:center; height:50px">
    <td><?=++$i?></td>    
    <td><?=$r['name']?></td>
    <td><?=number_format($r['price'])?><u>đ</u></td>
    <td><input type="number" min="1" value="<?=$v?>" style="width:50%; text-align:center" disabled></td>
    <td><?=number_format($r['price']*$v)?><u>đ</u></td>
  </tr>

<?php } ?>
</table>

</div>

<div class="row" style="margin-top:30px">
	<div class="col-md-4 col-sm-4 col-xs-12"><span style="font-weight:bold; font-size:20px; text-decoration:underline">Tổng thành tiền: <?=number_format($s)?>đ</span></div>                 	
</div>

</form>

</div>



<div class="container" style="background:url(img/logo/bg.jpg); margin-top:30px;">
<div class="row">
	
    <div class="col-md-8 col-sm-8 col-xs-12">
    <div id="form_lienhe">
    	<form action="" method="post">
    <input  class="btn btn-primary" type="submit" name="goimon" value="Xác Nhận Gọi Món"> 
        </form>
    </div>
    </div>
    
    
</div>
</div>
<?php } ?>