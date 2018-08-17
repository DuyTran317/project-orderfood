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
?>

<body style="background-image: url(img/back/adult-ancient-artisan-1062269.jpg); background-size: cover; font-family: 'Pacifico', cursive;">
<div class="container" style="margin-bottom:50px">
    <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <div class="table-responsive">
            <table class="col-md-12 col-sm-12 col-xs-12 table table-striped" >
                    <h2 style=" text-align: center">Danh Sách Bàn Số <span style="color: red; font-size: 50px;"><?=$num_table?></span></h2>
                <?php
                $sql="select a.*,b.`name` as ten,b.`img_url` as hinh from `of_order_detail` as a,`of_food` as b where `order_id`={$id} and a.`food_id` = b.`id`";
                $rs=mysqli_query($link,$sql);
                $total=0;
                while($r=mysqli_fetch_assoc($rs)):
                    ?>
                    <tr>
                        <td align="center" class="col-xs-3">
                            <img src="" alt="" style="width:149px; height:145px; margin-bottom:20px;" >
                        </td>
                        <td class="col-xs-9">
                            <div style="font-size:30px; font-weight: bold;"><?=$r['ten']?></div>
                            <p style="color: grey"><strong>Số Lượng</strong>: <?=$r['qty']?></p>

                        </td>
                    </tr>
                    <?php
                    $total += $r['price']*$r['qty'];
                endwhile

                ?>

            </table>
        </div>
        <div style="text-align: center"><a href="?mod=solve_order&orderID=<?=$id?>&num_table=<?=$num_table?>&total=<?=$total?>"><input type="button" value="Hoàn Tất" class="btn btn-success btn-lg"></a></div>
    </div>
</div>
</body>

