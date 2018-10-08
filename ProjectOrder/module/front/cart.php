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
    html,
    body{
        height: 100%;
    }

</style>
<body style="background-image: url(img/front/close-up-cooking-cuisine-958545.jpg); background-size: cover;  font-family: 'Anton', sans-serif;">
<div class="container">
    <div class="row" style="background-color: #FFF; margin-top: 5%; border-radius: 20px; padding: 20px;">
        <a href="?mod=menu&id=<?=$id_ban?>&name=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
        <h2 style=" text-align: center"><?=_CHOSEN?></h2>
        <form action="?mod=cart_process&act=2&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" method="post">
        <div class="table-responsive">

            <table class="col-md-12 table table-striped">
              <tr style="background-color: #f9d093; font-size: 18px;">
                <th class="text-left"><?=_DISH?></th>
                <th><?=_PRICE?></td>
                <th><?=_QTY?></th>
                <th><?=_TOTALPRICE?></th>
                <th></th>
              </tr>

              <?php
                $cart=@$_SESSION['cart'];
                $s=0;
                $i=0;
                if(@count($cart)>0) foreach($cart as $k=>$v)
                {
                    $sql="select * from `of_food` where `id`={$k} ";
                    $rs=mysqli_query($link,$sql);
                    $r=mysqli_fetch_assoc($rs);
                    $s+=$r['price']*$v;
              ?>

              <tr style=" height:50px">
                <td>                  
                    <?=$r[$_SESSION['lang'].'_name']?>
                  </a>
                </td>
                <td align="center"><?=number_format($r['price'])?><u>đ</u></td>
                  <td class="hidden-md hidden-lg hidden-sm">
                      <input type="text" class="form-control text-center" id="<?=$k?>" min="1" name="<?=$k?>" value="<?=$v?>" onChange="updateFood(<?=$k?>)">
                  </td>
                <td class="col-sm-3 hidden-xs">
                    <div class="input-group " >
                        <span class="input-group-addon" name="qty" style="background-color: #F60; border-color: #F60;" ><input type='button' value='-' class='qtyminus ' field='<?=$k?>' style="border: none; background-color: transparent; color:white"/></span>
                        <input type="text" class="form-control text-center" id="<?=$k?>" min="1" name="<?=$k?>" value="<?=$v?>" onChange="updateFood(<?=$k?>)" disabled style="border-color: #F60; color: #F60;">
                        <span class="input-group-addon" name="qty"  style="background-color: #F60; border-color: #F60;"><input type='button' value='+' class='qtyplus' field='<?=$k?>' style="border: none; background-color: transparent; color: white"/></span>

                    </div>
                </td>
                <td align="center"><?=number_format($r['price']*$v)?><u>đ</u></td>
                  <td><a style="color: red" href="?mod=cart_process&id=<?=$k?>&act=3&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" onClick="return confirm('<?=_DELFOOD?>')">X</a></td>

              </tr>

            <?php } ?>
            </table>
        </div>
            <div class="row">
                <div class="col-xs-4" style="font-weight:bold; font-size:20px;  "><?=_TOTALPRICE?>: <span style="color: red; font-size: 26px;text-decoration:underline;"> <?=number_format($s)?>đ</span></div>


                <div align="right" class="col-xs-8">
                    <?php if(@count($cart)>0){ ?>
                        
                      <button type="submit" class="btn btn-warning btn-lg"><i class="fas fa-sync"></i></button>
                    
                    <a href="?mod=checkout&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>"><button type="button" class="btn btn-success btn-lg "><i class="fas fa-check"></i></button></a>
					<?php }
						  else
						  {
					?>		  
                    <script>
						window.location="?mod=menu&id=<?=$id_ban?>&name=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>";
					</script>			  
                    <?php          
						  }
					?>
                </div>
            </div>
</div>

</form>

</div>

</div>
</body>
<script>
    $(document).ready(function() {
        $("#<?=$k?>").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl/cmd+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+C
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+X
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });
    jQuery(document).ready(function(){
        // This button will increment the value
        $('.qtyplus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        // This button will decrement the value till 0
        $(".qtyminus").click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
    });
	function updateFood(id){
		var qty = document.getElementById(id).value;
		$.ajax({
			url:'module/front/ajax_order.php',
			type:'POST',
			data:{id_food: id, qty: qty, act: 2}
			}).done(function(data){
				document.getElementById("total").innerHTML = data;
				});
	}
</script>