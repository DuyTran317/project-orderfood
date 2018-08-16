<?php
  	if(isset($_GET['id_ban']))
	{
		$id_ban=$_GET['id_ban'];
	}
	if(isset($_GET['name_ban']))
	{
		$name_ban=$_GET['name_ban'];
	}
	if(isset($_GET['cate']))
	{
		$cate=$_GET['cate'];
	}
?>
<style>
	th{
		text-align:center;
	}
</style>
<body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg); background-size: cover; font-family: 'Pacifico', cursive;">
<div class="container">
    <div class="row" style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <a href="?mod=menu&id=<?=$id_ban?>&name=<?=$name_ban?>&cate=<?=$cate?>" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
        <h2 style=" text-align: center">Danh Sách Đã Chọn</h2>
        <form action="?mod=cart_process&act=2&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?>" method="post">
        <div class="table-responsive">

            <table class="col-md-12 table table-striped">
              <tr>

                <th>Món Ăn</th>
                <th>Giá</td>
                <th>Số Lượng</th>
                <th>Tổng Tiền</th>
                <th></th>
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
                <td>
                  <a href="?mod=detail&id=<?=$k?>" style="text-decoration:none;">
                    <?=$r['name']?>
                  </a>
                </td>
                <td><?=number_format($r['price'])?><u>đ</u></td>
                <td><input type="number" min="1" name="<?=$k?>" value="<?=$v?>" style="width:50%; text-align:center"></td>
                <td><?=number_format($r['price']*$v)?><u>đ</u></td>
                <td><a style="color: red" href="?mod=cart_process&id=<?=$k?>&act=3&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?>" onclick="return confirm('Bạn muốn xóa khỏi giỏ hàng?')">X</a></td>

              </tr>

            <?php } ?>
            </table>
    </div>
            <div class="row">
                <div class="col-xs-4">
                    <span style="font-weight:bold; font-size:26px; text-decoration:underline; color: red">Tổng tiền: <?=number_format($s)?>đ</span>
                </div>

                <div align="right" class="col-xs-8">
                    <?php if(@count($cart)>0){ ?>
                        <button type="submit" class="btn btn-warning btn-lg"><i class="fas fa-sync"></i></button>
                    <?php } ?>
                    <a href="?mod=checkout&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?>"><button type="button" class="btn btn-success btn-lg "><i class="fas fa-check"></i></button></a>

                </div>
            </div>
</div>

</form>

</div>

</div>
</body>