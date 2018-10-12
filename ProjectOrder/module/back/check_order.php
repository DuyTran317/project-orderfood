<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('notices', function () {
		
        //code xử lý khi có dữ liệu từ pushe
		alert('Có thay đổi về đơn hàng vui lòng chỉnh lại!');
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
</script>
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
	$SoHoaDonLamTruoc = 5;
?>

<body style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container" style="margin-bottom:50px">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <div class="table-responsive">
        <a href="?mod=home" style="font-size: 36px; color: black" > <i class="fas fa-arrow-left"></i> </a>
            <table class="col-md-12 col-sm-12 col-xs-12 table table-striped" >
                    <h2 style=" text-align: center">Danh Sách Bàn Số: <span style="color: red; font-size: 50px;"><?=$num_table?></span></h2>
                <div style="text-align: right"><a href="?mod=del_order&orderID=<?=$id?>&num_table=<?=$num_table?>" onClick="return confirm('Bạn chắc chắn xóa hết?')">
                        <input type="submit" value="Xóa hết" class="btn btn-danger btn-lg"></a>
                </div><br>
                <?php
                $sql="select a.*,b.`vi_name` as ten,b.`img_url` as hinh,a.`id` as id_food from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id` and a.`active`=2";
                $rs=mysqli_query($link,$sql);
				
				$dem = mysqli_num_rows($rs);				
                $total=0;

				$sql_timtrung="select a.*, b.`vi_name`, c.`num_table` from `of_order_detail` as a, `of_food` as b, `of_order` as c where a.`food_id`=b.`id` and a.`order_id`=c.`id` and a.`active`=2 and a.`food_id`=0";

				if($dem > 0 )
				{

                while($r=mysqli_fetch_assoc($rs)):
					$sql_timtrung.=" or a.`food_id`={$r['food_id']}";
					$orderId = $r['order_id'];
                    ?>
                    <tr>
                        <td align="center" class="col-xs-3">
                            <img src="" alt="" style="width:149px; height:145px; margin-bottom:20px;" >
                        </td>
                        <td class="col-xs-9">
                            <div style=" font-weight: bold; font-size:25px;"><?=$r['ten']?>
                            	<span style="float:right; "><a href="?mod=del_food&id=<?=$id?>&num_table=<?=$num_table?>&id_food=<?=$r['id_food']?>" onClick="return confirm('Chắc chắn xóa?')"><i class="fas fa-trash-alt" style="color: darkred"></i></a></span>
                            </div>
                            <p style="color: grey; font-size:20px;"><strong>Số Lượng</strong>: <?=$r['qty']?></p>

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
        <div style="text-align: center"><a href="?mod=solve_order&orderID=<?=$id?>&num_table=<?=$num_table?>&total=<?=$total?>"><button class="col-xs-12 btn btn-success btn-lg">Hoàn Tất</button></a></div><hr>

        <div class="row" style="margin-top: 40px;">
            <h1 style="text-align:center; font-weight:bold">Danh Sách Các Món Trùng</h1>
            <?php $sql_timtrung.=" ) and a.`order_id`<>{$orderId} and a.`order_id`-{$orderId}<=$SoHoaDonLamTruoc order by c.`num_table` ASC";
            $r_timtrung=mysqli_query($link,$sql_timtrung);
            $orderId1=0;$note="";
            while($rs_timtrung=mysqli_fetch_assoc($r_timtrung))
            {
                if($orderId1 != $rs_timtrung['order_id'])
                {

                    $orderId1=$rs_timtrung['order_id'];

                    $sql_takenotes="select `note` from `of_note_order` where `order_id` = {$orderId1} and `active`= 0";
                    $r_takenotes = mysqli_query($link,$sql_takenotes);
                    $note="";
                    while($rs_takenotes=mysqli_fetch_assoc($r_takenotes))
                    {
                        $note.= $rs_takenotes['note'];
                    }
                    ?>
                    <div class="col-md-4 col-sm-4 col-xs-12" style="border-right:1px dotted #000; border-top:1px dashed #000; padding-bottom:10px; padding-top:10px">

                        <span style="font-size:22px">Bàn:</span> <span style="color:#C00; font-size:24px"><?=$rs_timtrung['num_table']?></span><br>
                        <span style="font-size:22px">Tên Món:</span> <span style="color:#006; font-size:24px"><?=$rs_timtrung['vi_name']?></span><br>
                        <span style="font-size:22px">Số Lượng:</span> <span style="color:#0C6; font-size:24px; text-decoration:underline">x<?=$rs_timtrung['qty']?></span><hr>

                        <span style="font-size:22px">Chú Thích:</span> <?php echo "<span style='font-size:24px; color:#F09'>".$note."</span>"; ?>
                    </div>
                    <?php
                }
                else
                {
                    echo "{$rs_timtrung['name']} : {$rs_timtrung['qty']} <br>";
                }
            }
            /*echo "<span style='font-size:22px'>".$note."</span>";*/
            ?>
        </div>
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

