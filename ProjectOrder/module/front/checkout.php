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
	if(isset($_GET['cate']))
	{
		$cate=$_GET['cate'];
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
			
			$sql="select `active` from `of_bill` where `num_table`=$num_table order by `id` DESC limit 0,1";
			$r=mysqli_query($link,$sql);
			$rs=mysqli_fetch_assoc($r);
			
			if($rs === null||$rs['active'] == 1){
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
			}
			else{
				$sql="select `id` from `of_order` where `num_table`=$num_table order by `id` DESC limit 0,1";
				$r=mysqli_query($link,$sql);
				$rs=mysqli_fetch_assoc($r);
				$sql="update `of_order` set `active`=0 where `id`={$rs['id']}";
				mysqli_query($link,$sql);
				
				$orderID = $rs['id'];
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
			}
			echo '<script>alert("Gọi Món Thành Công");</script>';
			unset($_SESSION['cart']);
		
			//Gửi thông điêp để reload trang BẾP
			require('Pusher.php');
			$options = array(
			'cluster' => 'ap1',
			'encrypted' => true
			);
			$pusher = new Pusher(
			'161363aaa8197830a033',
			'46f2ba3b258f514f6fc7',
			'577033',
			$options
			);
			$data['name']= $name_ban ;
			$data['message'] = 'đã gọi món mới!!!';
			$pusher->trigger('hihi', 'notices', $data);
?>

			
			<script>window.location="?mod=menu&id=<?=$id_ban?>&name=<?=$name_ban?>&thanhtoan=1&cate=<?=$cate?>"</script>			




<?php
		}

?>

        <div class="container" style="background:url(img/logo/bg.jpg); margin-top:30px;">
            <div class="row">

                <div class="col-md-8 col-sm-8 col-xs-12">

                    <body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg); background-size: cover; font-family: 'Pacifico', cursive;">
                    <div class="container">
                        <div class="row" style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
                            <a href="?mod=menu&id=<?=$id_ban?>&name=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
                            <h2 style=" text-align: center">Danh Sách Đã Chọn</h2>
                            <form action="" method="post">
                                <div class="table-responsive">
                                    <table class="col-md-12 table table-striped">
                                        <tr>
                                            <th>Món Ăn</th>
                                            <th>Giá</td>
                                            <th>Số Lượng</th>
                                            <th>Tổng Tiền</th>
                                        </tr>
                                        <?php
                                        $cart=@$_SESSION['cart'];
                                        $s=0;
                                        $i=0;
                                        if(@count($cart)>0) foreach($cart as $k=>$v)
                                        {
                                            $sql="select `name`,`price` from `of_food` where `id`={$k} ";
                                            $rs=mysqli_query($link,$sql);
                                            $r=mysqli_fetch_assoc($rs);
                                            $s+=$r['price']*$v;
                                            ?>
                                            <tr style="text-align:center; height:50px">
                                                <td>
                                                    <a href="?mod=detail&id=<?=$k?>" style="text-decoration:none;">
                                                        <?=$r['name']?>
                                                    </a>
                                                </td>
                                                <td><?=number_format($r['price'])?><u>đ</u></td>
                                                <td><input type="number" min="1" name="<?=$k?>" value="<?=$v?>" style="width:50%; text-align:center" disabled></td>
                                                <td><?=number_format($r['price']*$v)?><u>đ</u></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="row" style="margin-top:30px">
                                    <div class="col-xs-4" style="font-weight:bold; font-size:26px; text-decoration:underline; color: red"><span style="font-weight:bold; font-size:20px; text-decoration:underline">Tổng thành tiền: <?=number_format($s)?>đ</span></div>
                                    <div align="right" class="col-xs-8">
                                        <div id="form_lienhe">
                                            <form action="" method="post">
                                                <input  class="btn btn-success btn-lg" type="submit" name="goimon" value="Gọi Món">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>


                    </div>
                    </form>
                </div>
                </body>
<?php } ?>