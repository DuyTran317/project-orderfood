<?php
	$cate = takeGet('cate');
	$id_ban = takeGet('id_ban');
	$name_ban = takeGet('name_ban');
?>
<script type="text/javascript">
    function hoi(id){
        swal({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: "Bạn có muốn xóa món ăn này",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa!',
            cancelButtonText: 'Hủy!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swal(
                    'Xóa!',
                    'Bạn đã xóa thành công!',
                    'success'
                ).then(function(){
                    window.location.href="?mod=process_pro&del="+id;});
            } else if (
                // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Hủy',
                    'Bạn đã hủy thành công :)',
                    'error'
                )
            }
        })

    }
</script>
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
    <div class="row" style="background-color: #FFF; margin-top: 2%; border-radius: 20px; padding: 20px; " >
        <a href="cmn-thuc_don-i9102d<?=$id_ban?>-n9102ame<?=$name_ban?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html" style="font-size: 36px; color: black"><i class="fas fa-arrow-left"></i></a>
        <h2 style=" text-align: center"><?=_CHOSEN?></h2>
        <form action="index.php?mod=cart_process&act=2&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" method="post">
        <div class="table-responsive" style="max-height: 450px; overflow-y: auto ;" id="style-2">

            <table class="col-md-12 table table-striped" >
                <thead>
              <tr style="background-color: #f9d093; font-size: 18px;">
                <th class="text-left"><?=_DISH?></th>
                <th><?=_PRICE?></th>
                <!--<th><?=_DISCOUNT?></th>-->
                <th><?=_QTY?></th>
                <th><?=_AMOUNT?></th>
                <th></th>
              </tr>
                </thead>
              <?php
                $cart=@$_SESSION['cart'];
                $s=0;
                $i=0;
                if(@count($cart)>0) foreach($cart as $k=>$v)
                {
					$r = selectIdWithCondition($link, 'of_food', $k);
					
					//Tính giá có Khuyến Mãi
					if($r['discount']>0)
					{
                    	$gia_temp = $r['price_discount']*$v;
					}
					else
					{
						$gia_temp = $r['price']*$v;
					}
					$s += $gia_temp;
              ?>

              <tr style=" height:50px">
                <td>                  
                    <?=$r[$_SESSION['lang'].'_name']?>
                  </a>
                </td>
                <td align="center"><?=number_format($r['price'])?><u>đ</u></td>
                <!--<td align="center" <?php if($r['discount']>0) echo "style='color:#F00'";?>><?=number_format($r['discount'])?>%</td>
                -->
                  <td class="hidden-md hidden-lg hidden-sm">
                      <input type="text" class="form-control text-center quantity" id="<?=$k?>" min="1" name="<?=$k?>" value="<?=$v?>" onChange="updateFood(<?=$k?>)">
                  </td>
                <td class="col-sm-3 hidden-xs">
                    <div class="input-group " >
                        <span class="input-group-addon" name="qty" style="background-color: #F60; border-color: #F60;" ><input type='button' value='-' class='qtyminus ' field='<?=$k?>' style="border: none; background-color: transparent; color:white"/></span>
                        <input type="text" class="form-control text-center" id="<?=$k?>" min="1" name="<?=$k?>" value="<?=$v?>" onChange="updateFood(<?=$k?>)" disabled style="border-color: #F60; color: #F60;">
                        <span class="input-group-addon" name="qty"  style="background-color: #F60; border-color: #F60;"><input type='button' value='+' class='qtyplus' field='<?=$k?>' style="border: none; background-color: transparent; color: white"/></span>

                    </div>
                </td>
                <?php if($r['discount']>0) { ?>
                
                <td align="center"><?=number_format($r['price_discount']*$v)?><u>đ</u></td>
                  <td><a style="color: red" href="index.php?mod=cart_process&id=<?=$k?>&act=3&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" onClick="return confirm('<?=_DELFOOD?>')" id="test_xoa" onclick="hoi(<?=$d_pro['id'] ?>)">X</a></td>
               
                <?php }
					  else
					  { 
				?>               
                <td align="center"><?=number_format($r['price']*$v)?><u>đ</u></td>
                  <td><a style="color: red" href="index.php?mod=cart_process&id=<?=$k?>&act=3&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" onClick="return confirm('<?=_DELFOOD?>')">X</a></td>
				
                <?php } ?>
                
              </tr>

            <?php } ?>
            </table>
        </div>
            <div class="row">
                <div class="col-xs-4" style="font-weight:bold; font-size:20px;  "><?=_TOTALPRICE?>: <span style="color: red; font-size: 26px;text-decoration:underline;"> <?=number_format($s)?>đ</span></div>


                <div align="right" class="col-xs-8">
                    <?php if(@count($cart)>0){ ?>
                        
                      <button type="submit" class="btn btn-warning btn-lg" disabled id="refreshbtn"><?=_UPDATE?></button>
                    

                    <a class="btn btn-success btn-lg " id="btnorder" href="index.php?mod=cart_process&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&act=4<?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>">Xác nhận</a>

					<?php }
						  else
						  {
					?>		  
                    <script>
						window.location="cmn-thuc_don-i9102d<?=$id_ban?>-n9102ame<?=$name_ban?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html";
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
    $( ".qtyminus , .qtyplus" ).click(function() {
        $("#btnorder").attr("disabled", true);
        $("#refreshbtn").attr("disabled", false);
        $("#btnorder").removeAttr("href");
    });
    $( ".quantity").click(function() {
        $("#btnorder").attr("disabled", true);
        $("#refreshbtn").attr("disabled", false);
        $("#btnorder").removeAttr("href");
    });
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
	function remind(id_ban, name_ban){
		$.ajax({
			url:'module/front/ajax_order.php',
			type:'POST',
			data:{act: 3, id_ban: id_ban, name_ban: name_ban}
			}).done(function(data){
				
				});
	}
</script>