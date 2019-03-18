<style>
	th{
		text-align:center;
	}
	html,
    body{
        height: 100%;
    }
</style>

<?php
	$name_ban = takeGet('name_ban');
	$id = takeGet('id');
?>
<html>
<body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg); background-size: cover;  font-family: 'Anton', sans-serif;">
<div class="container">
    <div class="row" style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <a href="?mod=home_nhanvien" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
        <h2 style=" text-align: center">DANH SÁCH MÓN ĂN BÀN <?=$name_ban?></h2>
<form action="" method="post">
    <div class="table-responsive" style="max-height: 450px; overflow-y: auto ;" id="style-2">
<table  class="col-md-12 table table-striped" cellspacing="0" >
  <tr>
    <th >STT</th>
    <th >Tên món</th>
    <th>Giá</th>
    <!--<th>Khuyến mãi</th>-->
    <th >Số lượng</th>
    <th>Tổng tiền</th>
  </tr>
  
  <?php
	$s=0;
	$i=0;
	$select = selectWithConditionArray_ListOrderEmploy($link, $id);
	foreach($select as $r){

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
    <td><?=$r[$r['country'].'_name']?></td>
    <td><?=number_format($r['price'])?><u>đ</u></td>
    <?php if($r['km']>0) 
		{ 
	?>            
    <!--<td align="center" style='color:#F00'><?=number_format($r['km'])?>%</td>-->
    <?php 
		}
		else
		{
    ?>
    <!--<td align="center"><?=number_format($r['km'])?>%</td>-->
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
        <div class="col-xs-4" style="font-weight:bold; font-size:20px;  ">Tổng thành tiền: <span style="color: red; font-size: 26px;text-decoration:underline;"> <?=number_format($s)?>đ</span></div>
    </div>
</div>



</form>

</div>
</body>
</html>