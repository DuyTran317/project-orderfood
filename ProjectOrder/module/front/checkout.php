<style>
	th{
		text-align:center;
	}

</style>
<?php
	checkLoginCookie($_COOKIE['username_login']);
	$id_ban = takeGet('id_ban');
	$name_ban = takeGet('name_ban');
	$cate = takeGet('cate');
	
	$country = $_SESSION['lang'];
	//Lấy thông tin người dùng
	$userID=$_COOKIE['userid_login'];
	$cart=@$_SESSION['cart'];
	
	$sql_check = "select `id` from `of_user` where `active` = 2 and `id` = {$userID}";
	$r_check = mysqli_query($link,$sql_check);
	if(mysqli_num_rows($r_check))
	{
		if(@count($cart)<=0){ ?>
			<div style="font-size:20px; color:red; font-weight:bold; text-align:center; margin-top:200px"><?=_CARTZERO?></div>
		<?php }
		 else
		{			
			if(isset($_POST['goimon']))
			{			
				$sql="select * from `of_department` where `active`=1 order by `order` asc";
				$rs=mysqli_query($link,$sql);
				
				while($r=mysqli_fetch_assoc($rs)):
				$_SESSION['theloai'][$r['id']] = 0;
				endwhile;
				$_SESSION['remind'] = 0;
				
				$sql = "select * from `of_order` where `num_table`={$name_ban} and `active` !=1";
				$sosanh = mysqli_query($link,$sql);
				if(mysqli_num_rows($sosanh) > 0)
				{
					echo '<script type="text/javascript">';
					echo 'setTimeout(function () { swal("Không thể đặt món",
							  "Bàn đã được sử dụng!",
							  "warning");';
					echo '}, 1);</script>';
				}
				else
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
										$sql = 'select `price`,`discount` from `of_food` where`id`='.$k;
										$rs = mysqli_query($link,$sql);
										$r = mysqli_fetch_assoc($rs);
										$price = $r['price'];
										$km = $r['discount'];
										//Insert
										$sql = "select `id` from `of_order_detail` where `order_id`={$take_id} and `food_id`={$k} and `active`=0";
										$r_search = mysqli_query($link,$sql);
										$rs_search = mysqli_num_rows($r_search);
										if($rs_search == 0)
										{
											$sql = "insert into `of_order_detail` values(NULL,'$take_id','$k','$price','$v','$km',0,'$country')";
											mysqli_query($link,$sql);
										}
										else 
										{
											$sql = "update `of_order_detail` set `qty` = `qty` + {$v} where `order_id`={$take_id} and `food_id`={$k} and `active`=0";
											mysqli_query($link,$sql);
										}
									}
										//Insert note vao DB									
										$sql="insert into `of_note_order` values(NULL,'$take_id','$note',0)";
										mysqli_query($link,$sql);
										$temp++;
										break;
								}
							}
							if($temp==0)
							{
								//Insert don hang (order)
								$date = date("Y-m-d G:i:s");
								$sql="insert into `of_order` values(NULL,'$num_table','0','$date')";
								mysqli_query($link,$sql);
								
								//Insert don hang chi tiet (order_detail)
								//Lay id (Auto Increment) cua lenh insert truoc
								
								@$orderID=mysqli_insert_id($link);					
								
								foreach($carts as $k => $v)
								{
									//Lay gia san pham
									$sql = 'select `price`,`discount` from `of_food` where`id`='.$k;
									$rs = mysqli_query($link,$sql);
									$r = mysqli_fetch_assoc($rs);
									$price = $r['price'];
									$km = $r['discount'];
									
									//Insert
									$sql = "select `id` from `of_order_detail` where `order_id`={$orderID} and `food_id`={$k} and `active`=0";
										$r_search = mysqli_query($link,$sql);
										$rs_search = mysqli_num_rows($r_search);
										if($rs_search == 0)
										{
											$sql = "insert into `of_order_detail` values(NULL,'$orderID','$k','$price','$v','$km',0,'$country')";
											mysqli_query($link,$sql);
										}
										else 
										{
											$sql = "update `of_order_detail` set `qty` = `qty` + {$v} where `order_id`={$orderID} and `food_id`={$k} and `active`=0";
											mysqli_query($link,$sql);
										}
								}
								
								//Insert note vao DB
								$sql="insert into `of_note_order` values(NULL,'$orderID','$note',0)";
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
							$sql = 'select `price`,`discount` from `of_food` where`id`='.$k;
							$rs = mysqli_query($link,$sql);
							$r = mysqli_fetch_assoc($rs);
							$price = $r['price'];
							$km = $r['discount'];
							
							//Insert
							$sql = "insert into `of_order_detail` values(NULL,'$orderID','$k','$price','$v','$km',0,'$country')";
							mysqli_query($link,$sql);
						}
						//Insert note vao DB
							$sql="insert into `of_note_order` values(NULL,'$orderID','$note',0)";
							mysqli_query($link,$sql);
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
					$pusher->trigger('Reload', 'notices', @$data);
					
					if(@$orderID != NULL)
					{
						//Cookies
						setcookie("order_wait", $orderID, time() + (86400 * 30), "/");
					}
					if($_SESSION['lang']=='vi'){
							echo '<script type="text/javascript">';
							echo 'swal({
							title: "Thành công!",
							text: "Gọi món thành công",
							type: "success"
							}).then(function() {
								window.location = "cmn-thuc_don-i9102d'.$id_ban.'-n9102ame'.$name_ban.'-c9102ate'.$cate.'-tt9102oan1.html";
							});';
							echo '</script>';
					}
					else if ($_SESSION['lang']=='en')
					{
						echo '<script type="text/javascript">';
						echo 'swal({
							title: "Success!",
							text: "Your dishes have been successfully ordered",
							type: "success"
						}).then(function() {
								window.location = "cmn-thuc_don-i9102d'.$id_ban.'-n9102ame'.$name_ban.'-c9102ate'.$cate.'-tt9102oan1.html";
						});';
						echo '</script>';
					}
	
				}
			}
	}
	
	
?>
        <style>
            th{
                text-align:center;
            }
        </style>
        <html style="">
        <body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg); font-family: 'Anton', sans-serif;">
        <div class="container" style=" margin-top:30px;">
            <div class="row">

                <div class="col-md-8 col-sm-8 col-xs-12">


                    <div class="container">
                        <div class="row" style="background-color: #FFF; margin-top: 2%; border-radius: 20px; padding: 20px;">
                            <a href="kt-cart-i9102d<?=$id_ban?>-n9102ame<?=$name_ban?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
                            <h2 style=" text-align: center"><?=_CHECKOUT?></h2>
                            <div >
                            <form action="" method="post">
                                <div class="table-responsive"  style="max-height: 300px; overflow-y: auto ;" id="style-2">
                                    <table class="col-md-12 table table-striped" >
                                        <tr style="background-color: #f9d093; font-size: 18px;">
                                            <th class="text-left"><?=_DISH?></th>
                                            <th><?=_PRICE?></th>
                                            <!--<th><?=_DISCOUNT?></th>-->
                                            <th class="col-xs-2"><?=_QTY?></th>
                                            <th><?=_AMOUNT?></th>
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
                                            
											//Tính giá có Khuyến Mãi
											if($r['discount']>0)
											{
												$gia_temp = $r['price_discount']*$v;
											}
											else
											{
												$gia_temp = $r['price']*$v;
											}
											$s += $gia_temp;
											
                                            ?>
                                            <tr style="height:50px">
                                                <td>
                                                    <?=$r[$_SESSION['lang'].'_name']?>
                                                </td>
                                                <td align="center"><?=number_format($r['price'])?><u>đ</u></td>
                                                <!--<td align="center" <?php if($r['discount']>0) echo "style='color:#F00'";?>><?=number_format($r['discount'])?>%</td>-->
                                                <td align="center"><input type="number" min="1" name="<?=$k?>" value="<?=$v?>" style="width:50%; text-align:center" disabled></td>
                                                <?php
													if($r['discount']>0)
													{
												?>
                                                	<td align="center"><?=number_format($r['price_discount']*$v)?><u>đ</u></td>
                                                <?php
													}
													else
													{
												?>
                                                <td align="center"><?=number_format($r['price']*$v)?><u>đ</u></td>
                                                <?php } ?>
                                            </tr>
                                            <input name="country" value="<?=$_SESSION['lang']?>" style=" display: none">
                                        <?php } ?>
                                    </table>
                                </div>
                                <form action="" method="post">
                                    <div class="row" style="margin-top:30px">
                                        <div class="col-md-8">
                                            <p><?=_NOTE?>:</p>
                                            <textarea name="note" rows="4" class="form-control" style="resize: none;" placeholder="<?=_NOTEHERE?>"></textarea>
                                        </div>
                                        <div class="col-md-4" align="right">
                                            <br>
                                            <span style="font-weight:bold; font-size:20px;  "><?=_TOTALPRICE?>:</span> <span style="color: red; font-size: 26px;text-decoration:underline;"> <?=number_format($s)?>đ</span><br>
                                            <br>
                                            <div id="form_lienhe" style="margin-bottom: 0px;">
                                                <input  class="btn btn-success btn-lg col-xs-12" type="submit" name="goimon" value="<?=_ORDER?>">
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </form>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
                </div>
                </body>
        </html>
<?php } 
	else {
		?>
        <script>
        	alert('Bạn vui lòng đăng nhập lại!');
			window.location="?mod=dangnhap";
        </script>
        <?php
	}?>