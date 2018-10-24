<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	if(isset($_GET['num_table']))
	{
		$num_table=$_GET['num_table'];
	}
		
	if(isset($_POST['id_sp']))
	{
		$id_sp = $_POST['id_sp'];
		$qty = $_POST['qty'];
		
		$sql = "select `price`, `discount` from `of_food` where `id` = {$id_sp}";
		$kq = mysqli_query($link,$sql);
		$k = mysqli_fetch_assoc($kq);
		
		$price = $k['price'];
		$discount = $k['discount'];
		
		$sql = "select * from `of_order_detail` where `order_id` ={$id} and `active` = 0 and `food_id` = {$id_sp}";
		$check = mysqli_query($link,$sql);
		
			if(mysqli_num_rows($check) > 0)
			{
				echo "<script>alert('Đã tồn tại món này trong danh sách!')</script>";
			}
			else
			{
				$sql = "insert into `of_order_detail` values (NULL, '$id', '$id_sp', '$price', '$qty', '$discount', '0', 'vi')";
				mysqli_query($link,$sql);
		
				header("location:?mod=confirm_order&id={$id}&num_table=$num_table");
			}
	}
?>

<a href="?mod=confirm_order&id=<?=$id?>&num_table=<?=$num_table?>"><button class="btn btn-success">Quay lại</button></a>
&nbsp;&nbsp;&nbsp;Chọn ngôn ngữ:
<select>
	<option>Tiếng Việt</option>
    <option>English</option>
</select>

<table>
                <form action="" method="post">
                	<tr>
                    	<td><label style="margin-top:20px">Loại Hàng</label></td>
                        <td>
                        	 <select id="category_id" onchange="window.location='?mod=add_food_nhanvien&id=<?=$id?>&num_table=<?=$num_table?>&cid='+this.value" style="margin-top:10px; margin-left:20px; width:200px;; font-size:17px">
							<?php
								$sql="select `id` from `of_category` where `active`=1 order by `order` asc";
								$rs_s=mysqli_query($link,$sql);
								$r_s=mysqli_fetch_assoc($rs_s);
								
                                $cid = @$_GET['cid'];
                                if($cid == '') $cid = $r_s['id'];
                                
                                
                                $sql="select * from `of_category` where `active`=1 order by `order` asc";
                                $rs=mysqli_query($link,$sql);
                                while($r=mysqli_fetch_assoc($rs)){
                            ?>
                                                    
                                <option <?php if($r['id']==$cid) echo'selected'?>
                                    value="<?=$r['id']?>"><?=$r['vi_name']?>
                                </option>                           
                            
                            <?php } ?>
                    		</select>
                        </td>
                    </tr>
                    <tr>
                    	<td><label style="margin-top:20px">Sản Phẩm</label></td>
                        <td>
                        	<select id="id_sp" name="id_sp" style="margin-top:10px; margin-left:20px; width:300px;; font-size:17px">
							<?php
                                $sql="select * from `of_food` where `active`=1 and `category_id`={$cid}";
                                $rs_pro=mysqli_query($link,$sql);
                                while($r_pro=mysqli_fetch_assoc($rs_pro)){
                          ?>
                                                    
                                <option <?php if($r_pro['id']==$cid) echo'selected'?>
                                    value="<?=$r_pro['id']?>"><?=$r_pro['vi_name']?>
                                </option>                           
                            
                            <?php } ?>
                    		</select>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                    	<td><label style="margin-top:20px">Số Lượng</label></td>
                        <td>
                        	<input type="number" min="1" name="qty" required="required" style="margin-top:10px; margin-left:20px; width:70px;; font-size:17px">
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="submit" value="Thêm"></td>
                    </tr>    
                 </form>
</table>                 