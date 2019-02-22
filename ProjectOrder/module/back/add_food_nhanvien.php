<?php
if(isset($_POST['language']) && !empty($_POST['language'])){
    $_SESSION['servantlang'] = $_POST['language'];

    if(isset($_SESSION['servantlang']) && $_SESSION['servantlang'] != $_POST['language']){
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}
if(empty($_SESSION['servantlang'])){
    $_SESSION['servantlang'] ='vi';
}
?>

<?php
    $servantlang = $_SESSION['servantlang'];
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
		
		//Nhan vien dat them khi bep chua hoan thanh
		$sql ="select `id` from `of_order` where `id` = {$id} and `active`=2";
		$wait=mysqli_query($link,$sql);
		if(mysqli_num_rows($wait)>0)
		{
			$note = " | ".$_POST['note'];
			$sql = "select * from `of_order_detail` where `food_id` ={$id_sp} and `active` = 2";
			$run = mysqli_query($link,$sql);
			if(mysqli_num_rows($run)>0)
			{		
				$soluong=$_POST['qty'];
				$sql="update `of_order_detail` set `qty` = `qty` + {$soluong} where `food_id` = {$id_sp} and `active`=2";
				mysqli_query($link,$sql);
				
				$sql="update `of_note_order` set `note` = concat(`note`,'$note') where `order_id`={$id}";
				mysqli_query($link,$sql);
				
				echo "
				<script>
					alert('Đã thêm thành công!');
					window.location='?mod=confirm_order&id={$id}&num_table=$num_table';	
				</script>		
				";
			}
			else
			{			
				$sql = "insert into `of_order_detail` values (NULL, '$id', '$id_sp', '$price', '$qty', '$discount', '2', '$servantlang')";
				mysqli_query($link,$sql);
				
				$sql="update `of_note_order` set `note` = concat(`note`,'$note') where `order_id`={$id}";
				mysqli_query($link,$sql);
				
				echo "
				<script>
					alert('Đã thêm thành công!');
					window.location='?mod=confirm_order&id={$id}&num_table=$num_table';	
				</script>		
				";
			}
		}
		
		
		$sql = "select `id` from `of_order` where `id` = {$id} and `active`=0";
		$kiemtra = mysqli_query($link,$sql);
		if(mysqli_num_rows($kiemtra)>0)
		{
		$sql = "select * from `of_order_detail` where `order_id` ={$id} and `active` = 0 and `food_id` = {$id_sp}";
		$check = mysqli_query($link,$sql);
		
			if(mysqli_num_rows($check) > 0)
			{
				echo "<script>alert('Đã tồn tại món này trong danh sách!')</script>";
			}
			else
			{
				$sql = "insert into `of_order_detail` values (NULL, '$id', '$id_sp', '$price', '$qty', '$discount', '0', '$servantlang')";
				mysqli_query($link,$sql);
		
				header("location:?mod=confirm_order&id={$id}&num_table=$num_table");
			}
		}
	}
?>
<body style="background-image: -webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container" style="margin-bottom:50px">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
<a href="?mod=confirm_order&id=<?=$id?>&num_table=<?=$num_table?>" style="font-size: 36px; color: black" ><i class="fas fa-arrow-left"></i></a>

<form action="#" method="post" id="servantlang">
    <table class="table">
        <tr>
            <td class="col-sm-3" >
                Chọn ngôn ngữ
            </td>
            <td >
                <select name="language"  onchange='changeLang();' class="form-control">
                    <option value="vi" <?php if(isset($_SESSION['servantlang']) && $_SESSION['servantlang'] == 'vi'){ echo "selected"; } ?>>Tiếng Việt</option>
                    <option value="en" <?php if(isset($_SESSION['servantlang']) && $_SESSION['servantlang'] == 'en'){ echo "selected"; } ?>>English</option>
                </select>
            </td>
        </tr>
    </table>

</form>
<script>
    function changeLang(){
        document.getElementById('servantlang').submit();
    }
</script>
<form action="" method="post">
<table class="table">


                	<tr>
                    	<td class="col-sm-3">Loại Hàng</td>
                        <td>
                        	 <select id="category_id" onChange="window.location='?mod=add_food_nhanvien&id=<?=$id?>&num_table=<?=$num_table?>&cid='+this.value" class="form-control">
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
                                    value="<?=$r['id']?>"><?=$r[$_SESSION['servantlang'].'_name']?>
                                </option>                           
                            
                            <?php } ?>
                    		</select>
                        </td>
                    </tr>
                    <tr>
                    	<td class="col-sm-3">Sản Phẩm</td>
                        <td>
                        	<select id="id_sp" name="id_sp" class="form-control">
							<?php
                                $sql="select * from `of_food` where `active`=1 and `category_id`={$cid}";
                                $rs_pro=mysqli_query($link,$sql);
                                while($r_pro=mysqli_fetch_assoc($rs_pro)){
                          ?>
                                                    
                                <option <?php if($r_pro['id']==$cid) echo'selected'?>
                                    value="<?=$r_pro['id']?>"><?=$r_pro[$_SESSION['servantlang'].'_name']?>
                                </option>                           
                            
                            <?php } ?>
                    		</select>
                        </td>
                    </tr>
                    <tr>
                    	<td class="col-sm-3">Số Lượng</td>
                        <td>
                        	<input type="number" min="1" name="qty" required class="form-control" value="1" id="quantity">
                        </td>
                    </tr>
                    <?php
					//Nhan vien dat them khi bep chua hoan thanh
					$sql ="select `id` from `of_order` where `id` = {$id} and `active`=2";
					$show=mysqli_query($link,$sql);
					if(mysqli_num_rows($show)>0)
					{
					?>
                    <tr>
                    	<td class="col-sm-3">Chú thích món (nếu có)</td>
                        <td>
                        	<textarea name="note" rows="4" class="form-control" style="resize: none;" placeholder="..."></textarea>
                        </td>
                    </tr>
                    <?php }?>

</table>
        <input type="submit" value="Thêm" class="btn btn-success col-xs-12 btn-lg">
        </form>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $("#quantity").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl/cmd+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+C
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+X
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });
</script>