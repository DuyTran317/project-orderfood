<style>
	th{
		text-align:center;
	}
</style>

<?php
	if(! isset($_SESSION['user_idban']))
	{
		header("location:?mod=dangnhap");
	}
	if(isset($_GET['id_ban']))
	{
		$id_ban=$_GET['id_ban'];
	}
	if(isset($_GET['name_ban']))
	{
		$name_ban=$_GET['name_ban'];
	}
	$id = $_GET['id'];
if(isset($_GET['cate']))
{
    $cate=$_GET['cate'];
}
?>

<body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg); background-size: cover;  font-family: 'Anton', sans-serif;">
<div class="container">
    <div class="row" style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <a href="?mod=menu&id=<?=$id_ban?>&name=<?=$name_ban?>&cate=<?=$cate ?>& thanhtoan=1" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
        <h2 style=" text-align: center"><?=_CHOSEN?></h2>
<form action="" method="post">
    <div class="table-responsive">
<table  class="col-md-12 table table-striped" cellspacing="0" >
  <tr>
    <th ><?=_STT?></th>
    <th ><?=_DISH?></th>
    <th><?=_PRICE?></th>
    <th>Khuyến Mãi</th>
    <th ><?=_QTY?></th>
    <th><?=_TOTALPRICE?></th>
  </tr>
  
  <?php
  $multi = $_SESSION['lang'].'_name';
  	$sql="select b.{$multi} as ten,a.`price`, a.`qty`, b.`discount` as km, b.`price_discount` as gia_km
		  from `of_order_detail` as a, `of_food` as b
		  where a.`food_id`= b.`id` and a.`order_id`={$id}";
	$rs=mysqli_query($link,$sql);
	
	$s=0;
	$i=0;
	while($r=mysqli_fetch_assoc($rs)) {
		//Tính giá có Khuyến Mãi
		if($r['km']>0)
		{
			$gia_temp = $r['gia_km']*$r['qty'];
		}
		else
		{
			$gia_temp = $r['price']*$r['qty'];
		}
		$s += $gia_temp;	
  ?>
  
  <tr style="text-align:center; height:50px">
    <td><?=++$i?></td>    
    <td><?=$r['ten']?></td>
    <td><?=number_format($r['price'])?><u>đ</u></td>
    <?php if($r['km']>0) 
		{ 
	?>            
    <td align="center" style='color:#F00'><?=number_format($r['km'])?>%</td>
    <?php 
		}
		else
		{
    ?>
    <td align="center"><?=number_format($r['km'])?>%</td>
    <?php
		}
	?>
		
    <td><input type="number" min="1" value="<?=$r['qty']?>" style="width:50%; text-align:center" disabled></td>
    <?php if($r['km']>0) { ?>
    	<td><?=number_format($r['gia_km']*$r['qty'])?><u>đ</u></td>
    <?php
		}
		else
		{
	?>		
    	<td><?=number_format($r['price']*$r['qty'])?><u>đ</u></td>
    <?php } ?>    
  </tr>

<?php } ?>
</table>
    </div>
    <div class="row" style="margin-top:30px">
        <div class="col-xs-4" style="font-weight:bold; font-size:20px;  "><?=_TOTALPRICE?>: <span style="color: red; font-size: 26px;text-decoration:underline;"> <?=number_format($s)?>đ</span></div>
    </div>
</div>



</form>

</div>
</body>