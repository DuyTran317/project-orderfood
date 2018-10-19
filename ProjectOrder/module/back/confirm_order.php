<!--<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
     chanel trùng voi chanel trong send.php
    channel.bind('notices', function () {
		
        code xử lý khi có dữ liệu từ pushe
		alert('Có thay đổi về đơn hàng vui lòng chỉnh lại!');
		 window.location.reload();
         kết thúc code xử lý thông báo
    });
</script>-->
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
?>

<body style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container" style="margin-bottom:50px">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <div class="table-responsive">
        <a href="?mod=home_nhanvien" style="font-size: 36px; color: black" > <i class="fas fa-arrow-left"></i> </a>
            <table class="col-md-12 col-sm-12 col-xs-12 table" >
                <h2 style=" text-align: center">Danh Sách Bàn Số: <span style="color: red; font-size: 50px;"><?=$num_table?></span></h2>

                <?php
                $sql="select a.*,b.`vi_name`,a.`country`,b.`img_url` as hinh,a.`id` as id_food,b.`en_name` from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id` and a.`active`=0";
                $rs=mysqli_query($link,$sql);
				
				@$dem = mysqli_num_rows($rs);				
                $total=0;

				$sql_timtrung="select a.*, b.`vi_name`, c.`num_table` from `of_order_detail` as a, `of_food` as b, `of_order` as c where a.`food_id`=b.`id` and a.`order_id`=c.`id` and a.`active`=0 and ( a.`food_id`=0";

				if($dem > 0 )
				{


                echo "<div style='text-align: right'><a href='?mod=add_food_nhanvien&id={$id}&num_table={$num_table}'><input value='Thêm Món' class='btn btn-success'></a>
                </div><br>";
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
                            <img src="" alt="" style="width:149px; height:145px; margin-bottom:20px;" >
                        </td>
                        <td>
                            <div style=""><?=$r[$r['country'].'_name']?></div>
                        </td>
                        <td align="center">
                            <p style=""> <?=$r['qty']?></p>
                        </td>
                        <td >
                            <span style="float:right; ">
                                <i class="fas fa-edit"></i>
                                <a href="?mod=del_food&id=<?=$id?>&num_table=<?=$num_table?>&id_food=<?=$r['id_food']?>" onClick="return confirm('Chắc chắn xóa?')"><i class="fas fa-trash-alt" style="color: darkred"></i></a>
                            </span>
                        </td>
                    </tr>

                <?php
                    $total += $r['price']*$r['qty'];
                endwhile
                ?>
                <?php
				$sql="select `note` from `of_note_order` where `order_id` = {$id} and `active`= 0";
				$rs2 = mysqli_query($link,$sql);
				?>

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
        <a href="?mod=del_order&orderID=<?=$id?>&num_table=<?=$num_table?>" onClick="return confirm('Bạn chắc chắn xóa đơn hàng?')" <button type="submit"class="btn btn-danger btn-lg col-xs-6" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hủy Đơn Hàng</button></a>
        <a href="?mod=solve_confirm&orderID=<?=$id?>&num_table=<?=$num_table?>&total=<?=$total?>"><button class="col-xs-6 btn btn-success btn-lg"style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;" >Xác Nhận Đơn Hàng</button></a><hr>
    </div>
    <?php
    }
    else
    {
        echo"Không còn sản phẩm nào của bàn này!";
    }
    ?>
    </div>
	

</div>
</body>
