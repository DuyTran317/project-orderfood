<style>
	th{
		text-align:center;
	}
</style>
<script>
 window.onload=function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
</script>

<?php
//khoanh vùng tọa độ
$temp= 0.0001;
$lat_res= 10.8088477+ $temp ;
$long_res= 106.6657913 + $temp;
$lat2_res= 10.8088477 - $temp ;
$long2_res= 106.6657913 - $temp;
//ràng buộc phải ở trong nhà hàng
if(isset($_SESSION['latitude']))
{
	$lat=$_SESSION['latitude'];
	if(isset($_SESSION['longitude']))
	{
		$long=$_SESSION['longitude'];
	  if($lat2_res>$lat||$lat>$lat_res ||$long2_res>$long||$long>$long_res)
	  {
	      switch( $_SESSION['lang']) {
              case "vi":
                  {
                      echo "<script> alert('Bạn Cần Ở Trong Nhà Hàng Để sử dụng' ); window.location='?mod=dangnhap' </script>";
                  }
              case "en":
                  {
                      echo "<script> alert('In order to use this website, you need to be in the restaurant area' ); window.location='?mod=dangnhap' </script>";
                  }
          }
	  }
	}
	else

        switch( $_SESSION['lang']) {
            case "vi":
                {
                    echo "<script> alert('Bạn Cần Cho Phép Truy Cập Vị Trí Để sử dụng' ); window.location='?mod=dangnhap' </script>";
                }
            case "en":
                {
                    echo "<script> alert('Please allow location permission' ); window.location='?mod=dangnhap' </script>";
                }
        }

}

//---------------------------------------------
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
			$note= $_POST['note'];		
			
			$sql="select `active` from `of_bill` where `num_table`=$num_table order by `id` DESC limit 0,1";
			$r=mysqli_query($link,$sql);
			$rs=mysqli_fetch_assoc($r);
			
			if($rs === null||$rs['active'] == 1){
				
				$sql="select `id`,`num_table` from `of_order` where `active`=0";
				$take=mysqli_query($link,$sql);
				
				
				$carts=@$_SESSION['cart'];
				$temp = 0;
				while($take_sth=mysqli_fetch_assoc($take))
				{
						if($name_ban == $take_sth['num_table'])
						{
							$take_id = $take_sth['id'];
							
							foreach($carts as $k => $v)
							{
								//Lay gia san pham
								$sql = 'select `price` from `of_food` where`id`='.$k;
								$rs = mysqli_query($link,$sql);
								$r = mysqli_fetch_assoc($rs);
								$price = $r['price'];
								
								//Insert
								$sql = "select `id` from `of_order_detail` where `order_id`={$take_id} and `food_id`={$k} and `active`=0";
								$r_search = mysqli_query($link,$sql);
								$rs_search = mysqli_num_rows($r_search);
								if($rs_search == 0)
								{
									$sql = "insert into `of_order_detail` values(NULL,'$take_id','$k','$price','$v',0)";
									mysqli_query($link,$sql);
								}
								else 
								{
									$sql = "update `of_order_detail` set `qty` = `qty` + {$v} where `order_id`={$take_id} and `food_id`={$k} and `active`=0";
									mysqli_query($link,$sql);
								}
							}
								//Insert note vao DB
								$sql="insert into `of_note_order` values('NULL','$take_id','$note',0)";
								mysqli_query($link,$sql);
								$temp++;
								break;
						}
					}
					if($temp==0)
					{
						//Insert don hang (order)
						$sql="insert into `of_order` values('NULL','$num_table','0')";
						mysqli_query($link,$sql);
						
						//Insert don hang chi tiet (order_detail)
						//Lay id (Auto Increment) cua lenh insert truoc
						
						@$orderID=mysqli_insert_id($link);					
						
						foreach($carts as $k => $v)
						{
							//Lay gia san pham
							$sql = 'select `price` from `of_food` where`id`='.$k;
							$rs = mysqli_query($link,$sql);
							$r = mysqli_fetch_assoc($rs);
							$price = $r['price'];
							
							//Insert
							$sql = "select `id` from `of_order_detail` where `order_id`={$orderID} and `food_id`={$k} and `active`=0";
								$r_search = mysqli_query($link,$sql);
								$rs_search = mysqli_num_rows($r_search);
								if($rs_search == 0)
								{
									$sql = "insert into `of_order_detail` values(NULL,'$orderID','$k','$price','$v',0)";
									mysqli_query($link,$sql);
								}
								else 
								{
									$sql = "update `of_order_detail` set `qty` = `qty` + {$v} where `order_id`={$orderID} and `food_id`={$k} and `active`=0";
									mysqli_query($link,$sql);
								}
						}
						
						//Insert note vao DB
						$sql="insert into `of_note_order` values('NULL','$orderID','$note',0)";
						mysqli_query($link,$sql);
					}
				
			}
			else{
				$sql="select `id` from `of_order` where `num_table`=$num_table order by `id` DESC limit 0,1";
				$r=mysqli_query($link,$sql);
				$rs=mysqli_fetch_assoc($r);
				$sql="update `of_order` set `active`=0 where `id`={$rs['id']}";
				mysqli_query($link,$sql);
				
				@$orderID = $rs['id'];
				$carts=@$_SESSION['cart'];
				foreach($carts as $k => $v)
				{
					//Lay gia san pham
					$sql = 'select `price` from `of_food` where`id`='.$k;
					$rs = mysqli_query($link,$sql);
					$r = mysqli_fetch_assoc($rs);
					$price = $r['price'];
					
					//Insert
					$sql = "insert into `of_order_detail` values(NULL,'$orderID','$k','$price','$v',0)";
					mysqli_query($link,$sql);
				}
				//Insert note vao DB
					$sql="insert into `of_note_order` values('NULL','$orderID','$note',0)";
					mysqli_query($link,$sql);
			}
			if($_SESSION['lang']=='vi'){
                echo '<script>alert(" Gọi món thành công ");</script>';
            }
			else if ($_SESSION['lang']=='en')
            {
                echo '<script>alert(" Your dishes have been successfully ordered ");</script>';
            }
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
			$pusher->trigger('hihi', 'notices', @$data);
			
			if(@$orderID != NULL)
			{
				@$_SESSION['order_wait']=$orderID;
			}
?>
		<script>window.location="?mod=menu&id=<?=$id_ban?>&name=<?=$name_ban?>&thanhtoan=1&cate=<?=$cate?>"</script>							
<?php
		}

?>

        <div class="container" style="background:url(img/logo/bg.jpg); margin-top:30px;">
            <div class="row">

                <div class="col-md-8 col-sm-8 col-xs-12">

                    <body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg); background-size: cover;  font-family: 'Anton', sans-serif;">
                    <div class="container">
                        <div class="row" style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
                            <a href="?mod=cart&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
                            <h2 style=" text-align: center"><?=_CHECKOUT?></h2>
                            <form action="" method="post">
                                <div class="table-responsive">
                                    <table class="col-md-12 table table-striped">
                                        <tr style="background-color: #f9d093; font-size: 18px;">
                                            <th class="text-left"><?=_DISH?></th>
                                            <th><?=_PRICE?></td>
                                            <th class="col-xs-2"><?=_QTY?></th>
                                            <th><?=_TOTALPRICE?></th>
                                        </tr>
                                        <?php
                                        $cart=@$_SESSION['cart'];
                                        $s=0;
                                        $i=0;
                                        if(@count($cart)>0) foreach($cart as $k=>$v)
                                        {
                                            $sql="select * from `of_food` where `id`={$k} ";
                                            $rs=mysqli_query($link,$sql);
                                            $r=mysqli_fetch_assoc($rs);
                                            $s+=$r['price']*$v;
                                            ?>
                                            <tr style="height:50px">
                                                <td>
                                                    <a href="?mod=detail&id=<?=$k?>" style="text-decoration:none;">
                                                        <?=$r[$_SESSION['lang'].'_name']?>
                                                    </a>
                                                </td>
                                                <td align="center"><?=number_format($r['price'])?><u>đ</u></td>
                                                <td align="center"><input type="number" min="1" name="<?=$k?>" value="<?=$v?>" style="width:50%; text-align:center" disabled></td>
                                                <td align="center"><?=number_format($r['price']*$v)?><u>đ</u></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                 <form action="" method="post">
                                <div class="row" style="margin-top:30px">
                                    <div style="width:100%">
                                        <p><?=_NOTE?>:</p>
                                        <textarea name="note" rows="4" class="form-control" placeholder="<?=_NOTEHERE?>"></textarea>
                                    </div>
                                    <div class="col-xs-4" style="font-weight:bold; font-size:20px;  "><?=_TOTALPRICE?>: <span style="color: red; font-size: 26px;text-decoration:underline;"> <?=number_format($s)?>đ</span></div>
                                    <div align="right" class="col-xs-8">
                                        <div id="form_lienhe">
                                                <input  class="btn btn-success btn-lg" type="submit" name="goimon" value="<?=_ORDER?>">
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