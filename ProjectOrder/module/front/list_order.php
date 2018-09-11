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
        <h2 style=" text-align: center">Danh Sách Đã Chọn</h2>
<form action="" method="post">
    <div class="table-responsive">
<table  class="col-md-12 table table-striped" cellspacing="0" >
  <tr>
    <th >STT</th>
    <th >Tên Sản Phẩm</th>
    <th>Giá Sản Phẩm</td>
    <th >Số Lượng</th>
    <th>Tổng Tiền</th>
  </tr>
  
  <?php
  	$sql="select b.`name`,a.`price`, a.`qty`
		  from `of_order_detail` as a, `of_food` as b
		  where a.`food_id`= b.`id` and a.`order_id`={$id}";
	$rs=mysqli_query($link,$sql);
	
	$s=0;
	$i=0;
	while($r=mysqli_fetch_assoc($rs)) {
		$s+= $r['price']*$r['qty'];	
  ?>
  
  <tr style="text-align:center; height:50px">
    <td><?=++$i?></td>    
    <td><?=$r['name']?></td>
    <td><?=number_format($r['price'])?><u>đ</u></td>
    <td><input type="number" min="1" value="<?=$r['qty']?>" style="width:50%; text-align:center" disabled></td>
    <td><?=number_format($r['price']*$r['qty'])?><u>đ</u></td>
  </tr>

<?php } ?>
</table>
    </div>
    <div class="row" style="margin-top:30px">
        <div class="col-xs-4" style="font-weight:bold; font-size:26px; text-decoration:underline; color: red"><span style="font-weight:bold; font-size:20px; text-decoration:underline">Tổng thành tiền: <?=number_format($s)?>đ</span></div>
    </div>
</div>



</form>

</div>
</body>