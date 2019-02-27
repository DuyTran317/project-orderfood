
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
    if(isset($_GET['country']))
    {
        $country=$_GET['country'];
    }
	$SoHoaDonLamTruoc = 5;
	if(isset($_POST['update']))
	{
		$sql ="select id from `of_order_detail` where `order_id` = {$_POST['order_id']} and `active`=0";
		$r=mysqli_query($link,$sql);
		while($kq=mysqli_fetch_assoc($r))
		{
			$temp=$_POST['qty'.$kq['id']];
			$sql1="update `of_order_detail` set qty = {$temp} where id = {$kq['id']} and `active`=0";
			$r1=mysqli_query($link,$sql1);
		}
		
	}
?>

<body style="background-image: -webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container" style="margin-bottom:50px">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <?php
        $sql="select a.*,b.`vi_name`,a.`country`,b.`img_url` as hinh,a.`id` as id_food,b.`en_name` from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id` and a.`active`=0";
        $rs=mysqli_query($link,$sql);

        @$dem = mysqli_num_rows($rs);
        $total=0;

        $sql_timtrung="select a.*, b.`vi_name`, c.`num_table` from `of_order_detail` as a, `of_food` as b, `of_order` as c where a.`food_id`=b.`id` and a.`order_id`=c.`id` and a.`active`=0 and ( a.`food_id`=0";

        ?>

        <a href="?mod=home_nhanvien" style="font-size: 36px; color: black" > <i class="fas fa-arrow-left"></i> </a>
            <h2 style=" text-align: center">Danh Sách Món Bàn: <span style="color: red; font-size: 50px;"><?=$num_table?></span></h2>
            <?php
            
            ?>
            
            <div class="table-responsive" style="height: 450px; overflow-y: auto ;" id="style-2">
            <table class="col-md-12 col-sm-12 col-xs-12 table" >
<form action="" method="post" >
<?php
				if($dem > 0 )
				{


                echo '<tr>
                    <th class="col-xs-3 ">Hình Ảnh</th>
                    <th>Tên</th>
                    <th class="text-center">Số Lượng</th>
                    <th></th>
                </tr>';
                while($r=mysqli_fetch_assoc($rs)):
					$sql_timtrung.=" or a.`food_id`={$r['food_id']}";
					$orderId = $r['order_id'];
                    ?>
                   
                    <tr>
                    
                        <td>
                            <img src="img/sp/<?=$r['hinh']?>" alt="" style="width:149px; height:145px; margin-bottom:20px;" >
                        </td>
                        <td>
                            <div style=""><?=$r[$r['country'].'_name']?></div>
                        </td>
                        
                        <td align="center">
                            <input type="number" value="<?=$r['qty']?>" name="qty<?= $r['id_food'] ?>"  id="quantity" min="1">
                            
                        </td>
                        <td >
                            <span style="float:right; ">
                                
                                <a href="?mod=del_food&id=<?=$id?>&num_table=<?=$num_table?>&id_food=<?=$r['id_food']?>" onClick="return confirm('Chắc chắn xóa?')"><i class="fas fa-trash-alt" style="color: darkred"></i></a>
                            </span>
                        </td>
                       
                    </tr>

                <?php
                    $total += $r['price']*$r['qty'];
                endwhile
                ?>
                <input type="hidden" name="order_id" value="<?=$orderId?>">
                <?php
				if($dem>0){
            echo "
                 <button type=\"submit\" class=\"btn btn-warning btn-lg\" name=\"update\"><i class=\"fas fa-sync\"></i> </button><div style='float: right'><a href='?mod=add_food_nhanvien&id={$id}&num_table={$num_table}' class='btn btn-success'>Thêm Món</a>
                </div><br>
";
            }
				?>
                 </form>
                <?php
				$sql="select `note` from `of_note_order` where `order_id` = {$id} and `active`= 0";
				$rs2 = mysqli_query($link,$sql);
				?>
            </div>
            </table>
            <div> Ghi chú:<?php
                while($r2=mysqli_fetch_assoc($rs2))
                {
                    echo $r2['note'];
                    echo "<br>";
                }

                ?>
            </div>
        </div>
        <a href="?mod=del_order&orderID=<?=$id?>&num_table=<?=$num_table?>" 
        onClick="return confirm('Bạn chắc chắn xóa đơn hàng?')"> <button type="submit"class="btn btn-danger btn-lg col-xs-6" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;
        ">Hủy</button></a>
        <a href="?mod=solve_confirm&orderID=<?=$id?>&num_table=<?=$num_table?>&total=<?=$total?>"><button class="col-xs-6 btn btn-primary btn-lg"style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;" >Xác Nhận</button></a><hr>
    </div>
    <?php
    }
    else
    {
        echo"Không còn sản phẩm nào của bàn này!";
    }
    ?>
    </div>
    
    <?php
		//Nhan vien dat them khi bep chua hoan thanh
		$sql ="select `id` from `of_order` where `id` = {$id} and `active`=2";
		$wait=mysqli_query($link,$sql);
		if(mysqli_num_rows($wait)>0)
		{	
	?>
	<div style='float: right'><a href='?mod=add_food_nhanvien&id=<?=$id?>&num_table=<?=$num_table?>' class="btn btn-success">Thêm Món</a>
    </div><br>
    <?php } ?>

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
