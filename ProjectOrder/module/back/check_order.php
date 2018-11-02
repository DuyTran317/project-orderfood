
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

                <?php
                $sql="select a.*,b.`vi_name` as ten, a.`food_id` as id_food from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id` and a.`active`=2";
                $rs=mysqli_query($link,$sql);
				
				$sql1="select a.*,b.`vi_name` as ten, a.`food_id` as id_food from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id`";
                $rs1=mysqli_query($link,$sql1);
				
				$dem = mysqli_num_rows($rs);				
                $total=0;

				$sql_timtrung="select a.*, b.`vi_name`, c.`num_table` from `of_order_detail` as a, `of_food` as b, `of_order` as c where a.`food_id`=b.`id` and a.`order_id`=c.`id` and a.`active`=2 and (a.`food_id`=0";

				if($dem > 0 )
				{

                echo '
                <tr>
                    <th class="col-xs-1 text-center " style="font-size:22px; color:#1c5a1e">STT</th>
                    <th style="font-size:22px; color:#1c5a1e">Tên</th>
                    <th class="text-center" style="font-size:22px; color:#1c5a1e">Số Lượng</th>
                    <th class="text-right" style="font-size:22px; color:#1c5a1e">Xử lý</th>
                </tr>';
				$stt=0;
				while($r1=mysqli_fetch_assoc($rs1)):
				$sql_timtrung.=" or a.`food_id`={$r1['food_id']}";
				endwhile;
                while($r=mysqli_fetch_assoc($rs)):
				++$stt;
					
					$orderId = $r['order_id'];
                    ?>
                    <tr>
                        <td align="center">
                            <?=$stt?>
                        </td>
                        <td>
                            <div style=""><?=$r['ten']?></div>
                        </td>
                        <td align="center" style="color:#900">
                            <p style=""> <?=$r['qty']?></p>
                        </td>  
                        <td align="right">
                        	<a href="?mod=solve_order_finish&id=<?=$r['id_food']?>&idorder=<?=$id?>&num_table=<?=$num_table?>" class="btn btn-success"><i class="fas fa-check-double"></i></a>
                        </td>                      
                    </tr>

                <?php
                    $total += $r['price']*$r['qty'];
                endwhile
                ?>
                <?php 
				$sql="SELECT `note` FROM `of_note_order` as a , `of_order` as b WHERE  a.`order_id`=b.`id` and b.`num_table`={$num_table} and a.`active`=2";
				$rs2 = mysqli_query($link,$sql);
				$xacnhan = mysqli_num_rows($rs2);
				 
				?>

            </table>
                <div style="margin:15px 0 15px 0"> <span style="color:#F00; font-size:18px; font-weight:bold">Ghi chú: <br> </span>
					<?php
					if($xacnhan > 0 )
				{
                    while($r2=mysqli_fetch_assoc($rs2))
                    {
                        echo $r2['note'];
                        echo "<br>";
                    }
    
                    ?>
                </div>
            <?php } ?>
        </div>
        <div style="text-align: center"><a href="?mod=solve_order&orderID=<?=$id?>&num_table=<?=$num_table?>&total=<?=$total?>"><button class="col-xs-12 btn btn-success btn-lg">Hoàn Tất</button></a></div><hr>

        <div class="row" style="margin-top: 40px;">
            <h1 style="text-align:center; font-weight:bold">Danh Sách Các Món Trùng</h1>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th class="text-center col-xs-1">Bàn</th>
                        <th>Món</th>
                        <th class="text-center">Số Lượng</th>
                        <th>Chú Thích</th>
                        <th class="text-right">Xử Lý</th>
                    </tr>

            <?php $sql_timtrung.=" ) and a.`order_id`<>{$orderId} and a.`order_id`-{$orderId}<=$SoHoaDonLamTruoc order by c.`num_table` ASC";
            $r_timtrung=mysqli_query($link,$sql_timtrung);
            $orderId1=0;$note="";

            while(@$rs_timtrung=mysqli_fetch_assoc($r_timtrung))
			
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
				}
				    ?>
                    <tr>
                        <td align="center"><?=$rs_timtrung['num_table']?></td>
                        <td><?=$rs_timtrung['vi_name']?></td>
                        <td align="center"><?=$rs_timtrung['qty']?></td>
                        <td><?php echo "<span style='font-size:24px; color:#F09'>".$note."</span>"; ?></td>
                        <td align="right"><a href="?mod=solve_order_finish&id=<?=$rs_timtrung['food_id']?>&idorder=<?=$rs_timtrung['order_id']?>&num_table=<?=$rs_timtrung['num_table']?>&id2=<?=$r['id_food']?>&idorder2=<?=$id?>&num_table2=<?=$num_table?>" class="btn btn-success"><i class="fas fa-check-double"></i></a>
                        </td>
                    </tr>

                    <?php
               
              /*  else
                {
                    echo "{$rs_timtrung['vi_name']} : {$rs_timtrung['qty']} <br>";
                }*/
            }
            /*echo "<span style='font-size:22px'>".$note."</span>";*/
            ?>
                </table>
            </div>
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

