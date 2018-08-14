<?php
  	if(isset($_GET['id_ban']))
	{
		$id_ban=$_GET['id_ban'];
	}
	if(isset($_GET['name_ban']))
	{
		$name_ban=$_GET['name_ban'];
	}
?>
<style>
	th{
		text-align:center;
	}
</style>

<div class="container">
	<h2 style="color:#C06">Danh Sách Đã Chọn</h2>
<div class="row">


<form action="?mod=cart_process&act=2&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>" method="post">
<table border="1" class="col-md-12 col-sm-12 col-xs-12" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <th width="42">Xóa</th>
    <th width="220">Món Ăn</th>
    <th width="140">Giá</td>
    <th width="106">Số Lượng</th>
    <th width="198">Tổng Tiền</th>
  </tr>
  
  <?php
	$cart=@$_SESSION['cart'];
	$s=0;
	$i=0;
	if(@count($cart)>0) foreach($cart as $k=>$v)
	{
		$sql="select `name`,`price` from `of_food` where `id`={$k} ";
		$rs=mysqli_query($link,$sql);
		$r=mysqli_fetch_assoc($rs);
		$s+=$r['price']*$v;
  ?>
  
  <tr style="text-align:center; height:50px">
    <td><a href="?mod=cart_process&id=<?=$k?>&act=3&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>" onclick="return confirm('Bạn muốn xóa khỏi giỏ hàng?')">X</a></td>
    <td>
      <a href="?mod=detail&id=<?=$k?>" style="text-decoration:none;">
		<?=$r['name']?>
      </a>  
    </td>
    <td><?=number_format($r['price'])?><u>đ</u></td>
    <td><input type="number" min="1" name="<?=$k?>" value="<?=$v?>" style="width:50%; text-align:center"></td>
    <td><?=number_format($r['price']*$v)?><u>đ</u></td>
  </tr>

<?php } ?>
</table>

</div>

<div class="row" style="margin-top:30px">
    	<div class="col-md-2 col-sm-2 col-xs-12"><a href="?mod=menu&id=<?=$id_ban?>&name=<?=$name_ban?>"><button type="button" class="btn btn-info">
        	Tiếp tục chọn món</button></div></a>
            
    	<?php if(@count($cart)>0){ ?> 
        <div class="col-md-2 col-sm-2 col-xs-12"><button type="submit" class="btn btn-info">
        	Cập nhật danh sách</button></div>       
        <?php } ?>
            
    	<div class="col-md-2 col-sm-2 col-xs-12"><a href="?mod=checkout&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>"><button type="button" class="btn btn-info">
        	Kiểm tra danh sách</button></div></a>
        <div class="col-md-2 col-sm-2 col-xs-12">&nbsp;</div>
        <div class="col-md-4 col-sm-4 col-xs-12"><span style="font-weight:bold; font-size:18px; text-decoration:underline">
        	Tổng thành tiền: <?=number_format($s)?>đ</span></div>                 	
</div>

</form>

</div>

</div>