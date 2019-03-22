
<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	$id = takeGet('id');
	$num_table = takeGet('num_table');	
	$SoHoaDonLamTruoc = 15;
?>

<body style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover; font-family: 'Anton', sans-serif;">
<div class="container" style="margin-bottom:50px">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <div class="table-responsive">
        <a href="?mod=home" style="font-size: 36px; color: black" > <i class="fas fa-arrow-left"></i> </a>
            <table class="col-md-12 col-sm-12 col-xs-12 table table-striped" >
                    <h2 style=" text-align: center">Danh Sách Bàn Số: <span style="color: red; font-size: 50px;"><?=$num_table?></span></h2>

                <?php
                $rs = selectSomething_CheckOrder($link, $id);
				
                $rs1 = selectSomething2_CheckOrder($link, $id);
				
				$dem = mysqli_num_rows($rs);				
                $total=0;

				$sql_timtrung = selectSomething3_CheckOrder();

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
					$rs2 = selectNote_HomeBack($link, $num_table);
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

            <?php $sql_timtrung.=" ) and a.`order_id`<>{$orderId} and a.`order_id`-{$orderId}<=$SoHoaDonLamTruoc order by c.`num_table` ASC";
            $r_timtrung=mysqli_query($link,$sql_timtrung);
            $orderId1=0;$note="";
            echo "<h1 style=\"text-align:center; font-weight:bold\">Danh Sách Các Món Trùng</h1>
            <div class=\"grid\">  
            ";
            while(@$rs_timtrung=mysqli_fetch_assoc($r_timtrung))
            {

                if($orderId1 != $rs_timtrung['order_id'])
                {
                    if($orderId1 != 0)
                    {
                        echo "<span style='font-size:22px'>Chú Thích:</span> <span style='font-size:24px; color:#F09'>{$note}</span></div>";
                    }
                    $orderId1=$rs_timtrung['order_id'];

                    $r_takenotes = selectActiveBill_OrActive($link, 'of_note_order', $orderId1, 2);
                    $note="";
                    while($rs_takenotes=mysqli_fetch_assoc($r_takenotes))
                    {
                        $note.= $rs_takenotes['note'];
                    }

                    echo "
					<div class='grid-item'>
                        <h1 align='center'>Bàn:<span style='color:#C00;'>{$rs_timtrung['num_table']}</span></h1><hr>";
                    echo "<span style='font-size:22px'>Tên Món:</span> <span style='color:#006; font-size:24px'>{$rs_timtrung['vi_name']}</span><br>
                        <span style='font-size:22px'>Số Lượng:</span> <span style='color:#0C6; font-size:24px; text-decoration:underline'>x{$rs_timtrung['qty']}</span> &nbsp; <a href='?mod=solve_order_finish&id={$rs_timtrung['food_id']}&idorder={$rs_timtrung['order_id']}&num_table={$rs_timtrung['num_table']}&id2={$r['id_food']}&idorder2={$id}&num_table2={$num_table}' class='btn btn-success'><i class='fas fa-check-double'></i></a><br>";

                }
                else
                {
                    echo "<span style='font-size:22px'>Tên Món:</span> <span style='color:#006; font-size:24px'>{$rs_timtrung['vi_name']}</span><br>
                        <span style='font-size:22px'>Số Lượng:</span> <span style='color:#0C6; font-size:24px; text-decoration:underline'>x{$rs_timtrung['qty']}</span>&nbsp; <a href='?mod=solve_order_finish&id={$rs_timtrung['food_id']}&idorder={$rs_timtrung['order_id']}&num_table={$rs_timtrung['num_table']}&id2={$r['id_food']}&idorder2={$id}&num_table2={$num_table}' class='btn btn-success'><i class='fas fa-check-double'></i></a><br>";
                }

            }
            echo "<span style='font-size:22px'>Chú Thích:</span> <span style='font-size:24px; color:#F09'>{$note}</span> </div>";
            ?>
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
    <style>

        .grid-item {
            width: 380px;
            margin-bottom: 10px;
            background-color: lightgrey;
            padding: 10px;
            border-radius: 10px;
            transition: 0.5s;
        }
        .grid-item:hover{
            transform: scale(1.1);
            -webkit-box-shadow: 7px 10px 14px -2px rgba(0,0,0,0.75);
            -moz-box-shadow: 7px 10px 14px -2px rgba(0,0,0,0.75);
            box-shadow: 7px 10px 14px -2px rgba(0,0,0,0.75);
            z-index: 99;
        }

    </style>
    <script>
        $('.grid').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: 380,
            gutter: 10
        });
    </script>
</div>
	

</div>
</body>

