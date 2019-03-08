<style>
    .active{
         background-color: rgba(247, 139, 7,0.8);
         border-radius: 5px;
         transition: 0.3s;
     }
    .expand_caret {
        transform: scale(1.6);
        position: absolute;
        top: 30px;
        right: 10px;
        transition: 0.5s;
    }
    a[aria-expanded='false'] > .expand_caret {
        transform: scale(1.6) rotate(180deg);
    }

</style>
	<?php
	checkLoginCookie($_COOKIE['username_login']);
	$id = takeGet('id');
	$name = takeGet('name');
	if(isset($_GET['cate']))
	{
		$cate=$_GET['cate'];
		$_SESSION['theloai'][$cate] = 1;
	}
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body style="background:url(img/front/pexels-photo-326333.jpeg);  background-position:center; background-size:cover  ;font-family: 'Anton', sans-serif; " >
<p style="text-align:right; ">
<script src="lib/pusher.min.js"></script>
<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('770fa0ac91f2e68d3ae7', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('newbill', function(data) {
		
		if(data.name == <?= $name?>){
		window.location.reload();
		}
    });

	Pusher.logToConsole = true;
    var pusher = new Pusher('a8fd52cd1e38d4a2bcf1', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('delorder', function (data) {

		if(data.name == <?= $name?>){
		window.location.reload();
		}
        // kết thúc code xử lý thông báo
    });

	Pusher.logToConsole = true;
    var pusher = new Pusher('0d68e38f87eb0271863b', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('delfood', function (data) {

        //code xử lý khi có dữ liệu từ pusher

		if(data.name == <?= $name?>){
		window.location.reload();
		}
        // kết thúc code xử lý thông báo
    });
	Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('loadmenu', function () {

        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
Pusher.logToConsole = true;
    var pusher = new Pusher('05d67b2777b04b8a83db', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('loadmenu2', function (data) {

        //code xử lý khi có dữ liệu từ pusher
		if(data.name == <?= $name?>){
		window.location.reload();
		}
        // kết thúc code xử lý thông báo
    });
Pusher.logToConsole = true;
    var pusher = new Pusher('aaee585e94d28c3959f4', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('loadmenu_nhanvien', function (data) {
		
        //code xử lý khi có dữ liệu từ pusher
		if(data.name == <?= $name?>){
		window.location="?mod=xulydangxuat";
		}
        // kết thúc code xử lý thông báo
    });
</script>
<script src="lib/pusher.min.js"></script>

</p>
<div class="container-fluid" style="margin-top: 3%">
    <div class="row">
        <?php
        if(isset($_SESSION['remind']) && $_SESSION['remind']==1 && count($_SESSION['cart'])>0)
        {
            ?>
            <a style="font-size: 25px; text-decoration: none; color: black; padding:5px; background-color: orange; font-style: italic; font-weight: bold; position: absolute; top: 10px; right: 0px;"  href="index.php?mod=cart_process&id_ban=<?=$id?>&name_ban=<?=$name?>&act=4<?php if(isset($_GET['thanhtoan'])) echo '&thanhtoan=1'?>">skip >></a>
            <script>
                <?php
                $catename = "select * from `of_department` where `id`={$cate}";
                $get = mysqli_query($link, $catename);
                $result = mysqli_fetch_assoc($get);
                ?>
                var duyoccho = confirm("Bạn có muốn chọn <?=$result['vi_name']?> không?");
                if (duyoccho == false) {
                    window.location.href = "index.php?mod=cart_process&id_ban=<?=$id?>&name_ban=<?=$name?>&act=4<?php if (isset($_GET['thanhtoan'])) echo '&thanhtoan=1'?>";
                }
                <?php ?>
            </script>
            <?php
        }
        ?>
    </div>

	<div class="row" style=" padding: 20px;  font-family: 'Anton', sans-serif; background: url(img/front/pexels-photo-189451.jpeg)">
        <div class="col-lg-3 hidden-xs col-md-4 hidden-sm" style="color: white; font-size: 25px; background-color: grey; margin-bottom: 50px; border: solid thick #ff9d00; background: url(img/front/pexels-photo-958168.jpeg); padding: 2px 20px;  background-size: cover"> <!--desktop-->
            <h1 align="center"> <?=_TABLE?> <?=$name?></h1>

            <p  style="background-image:url(img/front/pexels-photo-1020317.jpeg); padding: 5px; text-align:center" >
            <a href="tlc-trang_chu-i9102d<?=$id?>-n9102ame<?=$name?><?php if(isset($_GET['thanhtoan'])){echo "-tt9102oan1";}?>.html" style="color: black;  text-decoration: none;"><i class="fas fa-home"></i> <?=_HOME?></a></p><br>
            <div style="height: 250px; overflow-y: auto; " id="style-2" data-spy="scroll" data-offset="50">
                        
            <?php
				// Phần revise 
				//Chủng Loại
            	$counter=0;
				$select = selectWithConditionArray_AcOrByOrAsc($link, 'of_department');
				$scroll=0;
				foreach($select as $r_dep){
				$counter++;
				$scroll++;
			?>

                <div id="menu<?=$scroll?>"><a href="cmn-thuc_don-i9102d<?=$id?>-n9102ame<?=$name?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])){echo "-tt9102oan1";}?>.html#menu<?=$scroll?>" data-toggle="collapse" data-target="#<?=$r_dep['id']?>" style="color: white; text-decoration: none; cursor: pointer; font-size: 30px" onClick="setCookie('<?=$r_dep['id']?>')"><?=$r_dep[$_SESSION['lang'].'_name']?></a>
                <div id="<?=$r_dep['id']?>" class="collapse" style="background-color: rgba(0,0,0,0.5); padding: 5px; border-radius: 5px;" >

                	<?php				
						//Thể Loại
						$take = selectWithConditionArray_AcDeOrByOrAsc($link, 'of_category', $r_dep['id']);
						foreach($take as $r_cate){
					?>

                    <ul>
                        <a style="color: white; text-decoration: none" href="cmn-thuc_don-i9102d<?=$id?>-n9102ame<?=$name?>-c9102ate<?=$r_cate['id']?><?php if(isset($_GET['thanhtoan'])){echo "-tt9102oan1";}?>.html"><li><?=$r_cate[$_SESSION['lang'].'_name']?></li></a>
                    </ul>

                    <?php } ?>
                </div>
                </div><hr>
            <?php } ?>


            </div>

            <script>

                var url = window.location;
                $('ul a[href="' + url + '"]').parent().addClass('active');
                $('ul a').filter(function () {
                    return this.href == url;
                }).parent().addClass('active');
                console.log(123);
                var current_url = window.location;
                $('ul li a').filter(function () {
                    return this.href == current_url;

                }).last().parents('li').addClass('active');
            </script>
            <br>
            <?php
			@$r_t = selectIdWithCondition($link, 'of_order', $_COOKIE['order_wait']);            
            $buttoncol="col-xs-12";
			$r = selectIdOrderInMenu($link, $name);			
            ?>
                    <!--Kiểm Tra Hóa Đơn -->
                    <?php		
						@$kt = selectIdNum($link, 'of_order', $_COOKIE['order_wait'], $name);						
                    	$col_button="col-xs-12";
						if(@mysqli_num_rows($kt) > 0) {
						$col_button="col-xs-6";
					?>
					<a href="check-dsdat_mon-i9102dod<?=$r['id_donhang']?>-i9102d<?=$id?>-n9102ame<?=$name?>-c9102ate<?=$cate?>-tt9102oan1.html" style="color:black; "><button <?php
                        if(!isset($_SESSION['cart'])){
                            echo 'class="btn col-xs-12 btn-lg"';
                        }
                        else {
                            if (count($_SESSION['cart']) > 0) {
                                echo 'class="btn col-xs-6 btn-lg"';
                            } else {
                                echo 'class="btn col-xs-12 btn-lg"';
                            }
                        }
                            ?> style="background-color:#FF0; border-radius: 0px; font-size: 15px;" id="col_toggle"><?=_CHECK?></button></a>
                    <?php } ?>
            <a class="hidden-xs" href="kt-cart-i9102d<?=$id?>-n9102ame<?=$name?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html" ><button class="btn <?=$col_button?> btn-lg" id="btn_GoiMon" style="background-color: orange; color: black;border-radius: 0px; font-size: 15px; display:<?php if(isset($_SESSION['cart'])){if(count($_SESSION['cart'])) echo "block"; else echo "none";} else echo "none"; ?>"><?=_CHOSEN?></button> </a>
            <?php
            if(isset($_GET['thanhtoan']) && $r_t['active']==1)
            {
				@$tt = selectActiveBill_OrAc($link, 'of_bill', $_COOKIE['order_wait']);
                if(@mysqli_num_rows($tt) > 0)
                {
                    ?>
                    <!--Thanh toán-->
                    <a href="dg-rating-i9102d<?=$id?>-n9102ame<?=$name?>-o9102rder<?=$r_t['id'] ?>.html" onClick="return confirm('<?=_PAYCONFIRM?>')"  style=" color:black; "><button class="col-xs-12 btn btn-lg" style="background-color:#F60; border-radius: 0px; font-size: 15px"><?=_PAY?></button></a>
                <?php }
                else {setcookie("order_wait", $r_t['id'], time() - 3600, "/");}
            }
            ?>
        </div>

        <div class="col-xs-12 hidden-md hidden-lg col-sm-12 " style="padding: 5px; color: white; font-size: 15px;  margin-bottom: 50px; border: solid medium #ff9d00; background: url(img/front/pexels-photo-958168.jpeg);  "> <!--Mobile-->
            <a data-toggle="collapse" data-target="#demo"  aria-expanded="false" align="center" style="color: white; text-decoration: none;" href="javascript:void()">
                <h3 > <?=_TABLE?> <?=$name?></h3> <div style="position: absolute; top: 25px; right: 25px">Menu</div><div class="expand_caret fas fa-caret-up"></div>
            </a>
            <div id="demo" class="collapse">
                <p style="background-image:url(img/front/pexels-photo-1020317.jpeg); padding: 5px; text-align:center" >
                <a href="tlc-trang_chu-i9102d<?=$id?>-n9102ame<?=$name?><?php if(isset($_GET['thanhtoan'])){echo "-tt9102oan1";}?>.html" style="color: black;  text-decoration: none;"><i class="fas fa-home"></i> <?=_HOME?></a></p>
                <?php
                // Phần revise
                //Chủng Loại
                $mobile_counter=0;
				$get = selectWithConditionArray_Act($link, 'of_department');
				foreach($get as $r_dep){
                   $mobile_counter++;
                    ?>
                    <hr>
                    <div><a data-toggle="collapse" data-target="#mobile_<?=$r_dep['id']?>" style="color: white; text-decoration: none;" onClick="setCookie('mobile_<?=$r_dep['id']?>')"><?=$r_dep[$_SESSION['lang'].'_name']?></a></div>
                    <div id="mobile_<?=$r_dep['id']?>" class="collapse" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 5px; padding: 5px;" >
                        <?php
                        //Thể Loại
						$took = selectWithConditionArray_AcDep($link, 'of_category', $r_dep['id']);
						foreach($took as $r_cate){
                            ?>
                            <ul>
                                <a style="color: white; text-decoration: none" href="cmn-thuc_don-i9102d<?=$id?>-n9102ame<?=$name?>-c9102ate<?=$r_cate['id']?><?php if(isset($_GET['thanhtoan'])){echo "-tt9102oan1";}?>.html"><li><?=$r_cate[$_SESSION['lang'].'_name']?></li></a>
                            </ul>

                        <?php } ?>

                    </div>

                <?php } ?>


                    <script>
                        var url = window.location;
                        $('ul a[href="' + url + '"]').parent().addClass('active');
                        $('ul a').filter(function () {
                            return this.href == url;
                        }).parent().addClass('active');
                        console.log(123);
                        var current_url = window.location;
                        $('ul li a').filter(function () {
                            return this.href == current_url;

                        }).last().parents('li').addClass('active');
                    </script>

            </div>
            <?php
            $r_t = selectIdWithCondition($link, 'of_order', $_COOKIE['order_wait']);
            $r = selectIdOrderInMenu($link, $name);

            if(isset($_GET['thanhtoan']) && $r_t['active']==1)
            {
                @$tt = selectActiveBill_OrAc($link, 'of_bill', $_COOKIE['order_wait']);
                if(@mysqli_num_rows($tt) > 0)
                {
                    ?>
                    <!--Thanh toán-->
                    <a href="dg-rating-i9102d<?=$id?>-n9102ame<?=$name?>-o9102rder<?=$r_t['id'] ?>.html" onClick="return confirm('<?=_PAYCONFIRM?>')"  style=" color:black; "><button class="col-xs-6 btn btn-lg" style="background-color:#F60; border-radius: 0px; font-size: 15px;"><?=_PAY?></button></a>
                <?php }
                else {setcookie("order_wait", $r_t['id'], time() - 3600, "/");}
            } ?>

            <!--Kiểm Tra Hóa Đơn -->
            <?php
			$kt = selectIdNum($link, 'of_order', $_COOKIE['order_wait'], $name);
            
            if(@mysqli_num_rows($kt) > 0) {
                ?>
                <a href="?mod=list_order&id=<?=$r['id_donhang']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?>&thanhtoan=1" style="color:black; "><button class="col-xs-6 btn btn-lg" style="background-color:#FF0; border-radius: 0px; font-size: 15px;"><?=_CHECK?></button></a>
            <?php } ?>
            <a class="hidden-lg hidden-md" href="kt-cart-i9102d<?=$id?>-n9102ame<?=$name?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html" ><button class="btn btn-lg col-xs-12" id="btn_GoiMonMobile" style="background-color: orange; color: black;border-radius: 0px; font-size: 15px; display:<?php if(isset($_SESSION['cart'])){if(count($_SESSION['cart'])) echo "block"; else echo "none";} else echo "none"; ?>"><?=_CHOSEN?></button> </a>

        </div>

        <div class="col-lg-9 col-md-8 hidden-xs hidden-sm" > <!--desktop-->

            <div class="scrolling-wrapper" id="style-2">
                
            <?php			
			$res= selectFood($link, 'of_food', $cate);
            $number1=0;
            $number2=0;
			$dem = mysqli_num_rows($res);
			if($dem==0)
			{
			?>
				<h1 style="text-align:center; color:#F00; background-color:#FF6; padding:10px; margin-top:100px"><?=_NODISHES?></h1>
			<?php
			}
			else
			{
			?> 
            <a class="arrow-left" style="font-size: 35px; position: absolute; left: 30px; z-index: 99;color: black; top: 40%"><button style="background-color: orange;" class="btn btn-lg"><i class="fas fa-chevron-left"></i></button></a>
                <a class="arrow-right"  style="font-size: 35px; position: absolute; right: 30px; z-index: 99; top: 40%; color: black;"><button style="background-color: orange;" class="btn btn-lg"><i class="fas fa-chevron-right"></button></i></a>
            
			<?php
			}

			while($kq= mysqli_fetch_assoc($res))
			{
			    $number1++;
			    $number2++;
                ?>

                <div class="card"  style="  width: 300px; background:white; " id="col_trigger<?php  echo $number1;?>">

                    <label class="col-xs-12 status dark" style=" height: 350px;  background:url(img/sp/<?=$kq['img_url']?>);background-position:center; background-size:cover; cursor: pointer;" for="foodchosen<?php  echo $number1;?>">

                        <?php if($kq['active'] == 1) { ?>
                        	<?php /*if($kq['discount']>0){*/ ?>
                           <!-- <div id="burst-8" style="position: absolute; top: 20px; left: 20px;"> </div><span style="position: absolute; top: 30px; left: 30px; font-size: 25px; color: red;">--> <?php /*echo$kq['discount']*/?><!--%</span>-->
                            <?php /*}*/ ?>
                            <div id="status<?=$kq['id'] ?>" class="status1" <?php if(isset($_SESSION['cart'][$kq['id']])) echo 'style="background-color: rgba(249, 150, 2,0.5)"' ?>>
                                <h1 style=" font-size: 80px; color: #e8ebf2; " id="chose<?=$kq['id'] ?>"><?php if(isset($_SESSION['cart'][$kq['id']])) echo '<i class="fas fa-check"></i>';?></h1>
                            </div>
                            <input onChange="handleChange(this,<?=$kq['id']?>);checkFood(<?=$kq['id']?>);" type="checkbox" <?php if(isset($_SESSION['cart'][$kq['id']])) echo 'checked="checked"' ?>  style=" height: 40px; width: 40px; position: absolute; right: 0px; top: 0px; display:none;" id="foodchosen<?php  echo $number1;?>" />

							<?php /*if($kq['discount']>0){
									$new_price = $kq['price']-(($kq['discount']*$kq['price'])/100);*/
							?>
                            <!--<div style=" padding: 5px; position:absolute; bottom:0px; left:0px; background-color:#ff9d00; color:#000; font-size:30px;font-weight:bold">--><?php /*number_format($new_price)*/ ?><!-- VND <br><span style=" text-decoration: line-through; color:#333 ;font-size: 20px; font-weight: normal;">--><?php /*echonumber_format($kq['price'])*/ ?><!-- VND</span></div>-->
                            <?php /*}
								  else{*/
							?>
                            <div style=" padding: 5px; position:absolute; bottom:0px; left:0px; background-color:#ff9d00; color:#000; font-size:30px;font-weight:bold"><?=number_format($kq['price']) ?> VND</div>
                            <?php
								  /*}*/
							?>
                            <script>
                                /*$("#foodchosen").change(function(e) {
                                    e.preventDefault();
                                    $("#col_toggle").toggleClass("col-xs-12 col-xs-6");
                                });*/
                            </script>
                        <?php } ?>
                        <?php if($kq['active'] == 2) { ?>
                            <div id="dark">
                                <h1 style="transform: rotate(-40deg); font-size: 50px; color: #ff9328"><?=_OUTOFSTOCK?></h1>
                            </div>
                        <?php } ?>
                    </label>

                    <div class="col-xs-12 " >
                    <?php 
						$info="";
						if($kq[$_SESSION['lang'].'_name']== ""){
							$info = "-No Information-";
							}
					?>
                        <h3 align="center" class="textover" style="color:#900;"><b><?=$info?><?= $kq[$_SESSION['lang'].'_name'] ?></b></h3>
                        <div class="row">
                            <a href="xdt-chi_tiet-i9102dfood<?=$kq['id']?>-i9102d<?=$id?>-n9102ame<?=$name?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html"><button  class="btn col-xs-12" style="border-radius: 0px;background-color: #ff9d00; color: black;"><?= _DETAIL ?></button></a>

                        </div>
                    </div>
                </div>

                <script>

                    function handleChange(checkbox,id) {
                        if(checkbox.checked == true){
                            document.getElementById("status"+id).setAttribute("style", "background-color: rgba(249, 150, 2, 0.5);");
                            document.getElementById("statusmobile"+id).setAttribute("style", "background-color: rgba(249, 150, 2, 0.5);");
                            document.getElementById("chose"+id).innerHTML = "<i class=\"fas fa-check\"></i>";
                            document.getElementById("chosemobile"+id).innerHTML = "<i class=\"fas fa-check\"></i>";
                        }else{
                            document.getElementById("status"+id).setAttribute("style", "background-color: transparent;");
                            document.getElementById("statusmobile"+id).setAttribute("style", "background-color: transparent;");
                            document.getElementById("chosemobile"+id).innerHTML = " ";
                            document.getElementById("chose"+id).innerHTML = " ";
                        }
                    }
                </script>
            <?php } ?>

            </div>
        </div>

        <script>
            $(".arrow-left").mousedown(function(){
                var actualScroll = $(".scrolling-wrapper").scrollLeft();
                $(".scrolling-wrapper").animate( { scrollLeft: '-=450' }, 200);
                ;
            })
            $(".arrow-right").mousedown(function(){
                var actualScroll = $(".scrolling-wrapper").scrollLeft();
                $(".scrolling-wrapper").animate( { scrollLeft: '+=450' }, 200);
            })
        </script>
    <div class="col-xs-12 hidden-md hidden-lg col-sm-12 card2"  style="height: 100vw; overflow-y: scroll" > <!--mobile-->
        <?php
        $res= selectFood($link, 'of_food', $cate);
        $number1=0;
        $number2=0;
		
		if($dem==0)
		{
		?>
        
		<h3 style="text-align:center; color:#F00; background-color:#FF6; padding:10px; margin-top:100px">Chưa có món ăn cho thể loại này!</h3>
		
        <?php
		}
        while($kq= mysqli_fetch_assoc($res))
        {
        $number1++;
        $number2++;
        ?>
        <div class="row" style="margin-bottom: 10px; box-shadow: 5px 5px 10px; height: 110px;">
            <label class="col-xs-4 dark2 statusmobile" style=" border: solid medium #ff9d00; height: 110px; background:url(img/sp/<?=$kq['img_url']?>); background-position:center; background-size:cover; cursor: pointer;  " for="foodchosenmobile<?php  echo $number1;?>"> <!--mobile-->
                <?php if($kq['active'] == 1) { ?>
                    <div id="statusmobile<?=$kq['id'] ?>" class="statusmobile1" <?php if(isset($_SESSION['cart'][$kq['id']])) echo 'style="background-color: rgba(249, 150, 2, 0.5)"' ?>>
                        <h1 style=" font-size: 50px; color: #e8ebf2; " id="chosemobile<?=$kq['id'] ?>"><?php if(isset($_SESSION['cart'][$kq['id']])) echo '<i class="fas fa-check"></i>';?></h1>
                    </div>
                    <input onChange="handleChange(this,<?=$kq['id']?>);checkFoodMobile(<?=$kq['id']?>);" type="checkbox" <?php if(isset($_SESSION['cart'][$kq['id']])) echo 'checked="checked"' ?>  style=" height: 40px; width: 40px; position: absolute; right: 0px; top: 0px; display: none" id="foodchosenmobile<?php  echo $number1;?>" />
                <?php } ?>
                <?php if($kq['active'] == 2) { ?>
                    <div id="dark2">
                        <h1 style=" font-size: 25px; color: #ff9328"><?=_OUTOFSTOCK?></h1>
                    </div>
                <?php } ?>
            </label>
            <div class="col-xs-8" style="background-color: white; height: 110px;  border: solid medium #ff9d00;"> <!--mobile-->
                <?php
                $info="";
                if($kq[$_SESSION['lang'].'_name']== ""){
                    $info = "-No Information-";
                }
                ?>
                <label for="foodchosenmobile<?php  echo $number1;?>">
                <h4 style="color:#900;" class="textover2"> <?=$info?><?= $kq[$_SESSION['lang'].'_name'] ?> </h4>

                <?php /*if($kq['discount']>0){
					  $new_price = $kq['price']-(($kq['discount']*$kq['price'])/100);*/
				?>
                <!--<h5>--><?php /*echonumber_format($new_price)*/?> <!--VND (---><?php /*echo$kq['discount']*/?><!--%)<br> <span style=" text-decoration: line-through; font-size: 10px; font-weight: normal;"><?php /*echonumber_format($kq['price'])*/ ?> VND</span> </h5>-->
                </label>
                <?php /*}
					else
					{*/
			    ?>
                	<h5><?=number_format($kq['price']) ?> VND</h5>
				<?php
					/*}*/
				?>
                <a href="xdt-chi_tiet-i9102dfood<?=$kq['id']?>-i9102d<?=$id?>-n9102ame<?=$name?>-c9102ate<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html" style=" position: absolute; bottom: 5px; right: 5px;"><button class="btn" style="background-color: #ff9d00; color: black;"><?= _DETAIL ?></button></a>
            </div>
        </div>
        <?php } ?>
    </div>

</div>
</div>
</body>

<script>

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1);
            if (c.indexOf(name) != -1) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function setCookie(sectionName) {
        var lastState = getCookie(sectionName);
        if (lastState == "" || lastState == "off") {
            document.cookie = sectionName + "=on";
        }
        else {
            document.cookie = sectionName + "=off";
        }
    }

    function setState() {
        for (var i=1; i<= <?=$counter?>; i++){
            if (getCookie(i) == "" || getCookie(i) == "off") {
                document.getElementById(i).className = "collapse";
            }
            else {
                document.getElementById(i).className = "collapse in";
            }
        }
    }
    function mobile_setState() {
        for (var x=1; x<= <?=$counter?>; x++) {
            var string ="mobile_" + x;
            if (getCookie(string) == "" || getCookie(string) == "off") {
                document.getElementById(string).className = "collapse";
            }
            else {
                document.getElementById(string).className = "collapse in";
            }
        }
    }
	function checkFood(id){

		$.ajax({
			url:'module/front/ajax_order.php',
			type:'POST',
			data:{id_food: id, act: 1},

			}).done(function(data){
				var btn = document.getElementById("btn_GoiMon");

				if(data > 0){
						btn.style.display = "block";
                    $("#col_toggle").addClass("col-xs-6");
                       $("#col_toggle").removeClass("col-xs-12");

					}
					else {
					    btn.style.display = "none";
                    $("#col_toggle").addClass("col-xs-12");
                    $("#col_toggle").removeClass("col-xs-6");


					}

				});
	}

    function checkFoodMobile(id){

        $.ajax({
            url:'module/front/ajax_order.php',
            type:'POST',
            data:{id_food: id, act: 1}
        }).done(function(data){
            var btn = document.getElementById("btn_GoiMonMobile");

            if(data > 0){
                btn.style.display = "block";

            }
            else {btn.style.display = "none";}

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

</html>