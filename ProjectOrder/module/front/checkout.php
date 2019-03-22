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
	foreach($_SESSION['theloai'] as $a => $b)
	{
		if($b==1)
		{
			$cate=$a;
		}	
	}
	$country = $_SESSION['lang'];
	//Lấy thông tin người dùng
	$userID=$_COOKIE['userid_login'];
	$cart=@$_SESSION['cart'];
	
	$r_check = selectWithCondition_ActId($link, 'of_user', 2, $userID);
	if(mysqli_num_rows($r_check))
	{
		if(@count($cart)<=0){ ?>
			<div style="font-size:20px; color:red; font-weight:bold; text-align:center; margin-top:200px"><?=_CARTZERO?></div>
		<?php }
		 else
		{			
			if(isset($_POST['goimon']))
			{							
				$select = selectWithConditionArray_AcOrByOrAsc($link, 'of_department');
				foreach($select as $r){
				$_SESSION['theloai'][$r['id']] = 0;
				}
				$_SESSION['remind'] = 0;
				
				$sosanh = selectWithCondition_ActNum($link, 'of_order', $name_ban);
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
				
					$rs = selectWithCondition_NumOrByIdDes($link, 'of_bill', $num_table);					
					if($rs === null||$rs['active'] == 1){
						
						$take = selectWithCondition_Act0($link, 'of_order', 0);
						
						$carts=@$_SESSION['cart'];
						$temp = 0;
						while($take_sth=mysqli_fetch_assoc($take))
						{
								if($name_ban == $take_sth['num_table'])
								{
									@$take_id = $take_sth['id'];
									
									foreach($carts as $k => $v)
									{
										//Lay gia san pham
										$r = selectIdWithCondition($link, 'of_food' ,$k);
										$price = $r['price'];
										$km = $r['discount'];
										//Insert
										$r_search = selectWithCondition_OrdActFoo($link, 'of_order_detail', $take_id, $k, 0);
										$rs_search = mysqli_num_rows($r_search);
										if($rs_search == 0)
										{
											Ins_OrderDetail($link, 'of_order_detail', $take_id, $k, $price, $v, $km, 0, $country);
										}
										else 
										{
											Upd_OrderDeital($link, 'of_order_detail', $v, $take_id, $k, 0);
										}
									}
										//Insert note vao DB									
										Ins_Note($link, 'of_note_order', $take_id, $note, 0);
										$temp++;
										break;
								}
							}
							if($temp==0)
							{
								//Insert don hang (order)
								$date = date("Y-m-d G:i:s");
								Ins_Order($link, 'of_order', $num_table, 0, $date);
								
								//Insert don hang chi tiet (order_detail)
								//Lay id (Auto Increment) cua lenh insert truoc
								
								@$orderID=mysqli_insert_id($link);					
								
								foreach($carts as $k => $v)
								{
									//Lay gia san pham
									$r = selectIdWithCondition($link, 'of_food' ,$k);
									$price = $r['price'];
									$km = $r['discount'];
									
									//Insert
										@$r_search = selectWithCondition_OrdActFoo($link, 'of_order_detail', $take_id, $k, 0);
										$rs_search = @mysqli_num_rows($r_search);
										if($rs_search == 0)
										{
											Ins_OrderDetail($link, 'of_order_detail', $orderID, $k, $price, $v, $km, 0, $country);
										}
										else 
										{
											Upd_OrderDeital($link, 'of_order_detail', $v, $orderID, $k, 0);
										}
								}
								
								//Insert note vao DB
								Ins_Note($link, 'of_note_order', $orderID, $note, 0);
							}
						
					}
					else{
						$rs = selectWithCondition_NumOrByIdDes($link, 'of_order', $num_table);
						Upd_OderAct($link, 'of_order', 0, $rs['id']);
						
						@$orderID = $rs['id'];
						$carts=@$_SESSION['cart'];
						foreach($carts as $k => $v)
						{
							//Lay gia san pham
							$r = selectIdWithCondition($link, 'of_food' ,$k);
							$price = $r['price'];
							$km = $r['discount'];
							
							//Insert
							Ins_OrderDetail($link, 'of_order_detail', $orderID, $k, $price, $v, $km, 0, $country);
						}
						//Insert note vao DB
						Ins_Note($link, 'of_note_order', $orderID, $note, 0);							
					}
	
					unset($_SESSION['cart']);
				
					//Gửi thông điêp để reload trang BẾP
					sendPusher('161363aaa8197830a033', '46f2ba3b258f514f6fc7', '577033', 'Reload', 'notices');
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
            html,
            body{
                height: 100%;
            }

        </style>
        <html style="">
        <body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg); background-size: cover;  font-family: 'Anton', sans-serif;">
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
                                            $r = selectIdWithCondition($link, 'of_food', $k);
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
		<script type="text/javascript">
			swal({
				title: "Chú ý!",
				text: "Bạn vui lòng đăng nhập lại!",
				type: "warning"
				}).then(function() {
				window.location = "?mod=dangnhap";
				});
		</script>
		<!-- <script type="text/javascript">
		setTimeout(function () 
			{ swal("Chú ý",
					"Bạn vui lòng đăng nhập lại!",
					"warning");
					 }, 1);
			window.location="?mod=dangnhap";
        </script> -->
        <?php
	}?>