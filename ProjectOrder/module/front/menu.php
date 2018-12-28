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
	if(!isset($_SESSION['user_nameban']))
	{
		header("location:?mod=dangnhap");
	}
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	if(isset($_GET['name']))
	{
		$name=$_GET['name'];
	}
	if(isset($_GET['cate']))
	{
		$cate=$_GET['cate'];
	}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body style="background:url(img/front/pexels-photo-326333.jpeg);  background-position:center; background-size:cover  ;font-family: 'Anton', sans-serif; ">
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
	<div class="row" style=" padding: 20px;  font-family: 'Anton', sans-serif; background: url(img/front/pexels-photo-189451.jpeg)">
        <div class="col-lg-3 hidden-xs col-md-4" style="color: white; font-size: 25px; background-color: grey; margin-bottom: 50px; border: solid thick #ff9d00; background: url(img/front/pexels-photo-958168.jpeg); padding: 2px 20px;  background-size: cover"> <!--desktop-->
            <h1 align="center"> <?=_TABLE?> <?=$name?></h1>

            <p  style="background-image:url(img/front/pexels-photo-1020317.jpeg); padding: 5px; text-align:center" ><a href="?mod=home&id=<?=$id?>&name=<?=$name?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>" style="color: black;  text-decoration: none;"><i class="fas fa-home"></i> <?=_HOME?></a></p><br>
            <div style="height: 250px; overflow-y: auto; " id="style-2">
                        
            <?php
				// Phần revise 
				//Chủng Loại
            $counter=0;
				$sql="select * from `of_department` where `active`=1";
				$d=mysqli_query($link,$sql);
				while($r_dep=mysqli_fetch_assoc($d)):
                    $counter++;
			?>

                <div style=" "><a data-toggle="collapse" data-target="#<?=$r_dep['id']?>" style="color: white; text-decoration: none; cursor: pointer; font-size: 30px" onClick="setCookie('<?=$r_dep['id']?>')"><?=$r_dep[$_SESSION['lang'].'_name']?></a>
                <div id="<?=$r_dep['id']?>" class="collapse" style="background-color: rgba(0,0,0,0.5); padding: 5px; border-radius: 5px;" >

                	<?php				
						//Thể Loại
						$sql="select * from `of_category` where `active`=1 and `department_id` = {$r_dep['id']}";
						$c=mysqli_query($link,$sql);
						while($r_cate=mysqli_fetch_assoc($c)):
					?>
                    <ul>
                        <a style="color: white; text-decoration: none" href="?mod=menu&id=<?=$id?>&name=<?=$name?>&cate=<?=$r_cate['id']?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>"><li><?=$r_cate[$_SESSION['lang'].'_name']?></li></a>
                    </ul>

                    <?php endwhile ?>
                </div>
                </div><hr>
            <?php endwhile ?>


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
            @$sql="select * from `of_order` where `id` = {$_SESSION['order_wait']}";
            $rs_t=mysqli_query($link,$sql);
            @$r_t=mysqli_fetch_assoc($rs_t);
            $buttoncol="col-xs-12";
			$sql="select a.`id` as id_donhang  
				from `of_order` as a, `of_order_detail` as b
				where a.`id`=b.`order_id` and `num_table`={$name}				
				group by a.`id`
				order by a.`id` desc limit 0,1";
			$rs=mysqli_query($link,$sql);

			$r=mysqli_fetch_assoc($rs);
            ?>
                    <!--Kiểm Tra Hóa Đơn -->
                    <?php						
						@$sql = "select * from `of_order` where `num_table` = {$name} and `id` ={$_SESSION['order_wait']}";
						@$kt = mysqli_query($link,$sql);
						if(@mysqli_num_rows($kt) > 0) {
						    $buttoncol="col-xs-6";
					?>
					<a href="?mod=list_order&id=<?=$r['id_donhang']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?>&thanhtoan=1" style="color:black; "><button class="col-xs-6 btn btn-lg" style="background-color:#FF0; border-radius: 0px; font-size: 15px;"><?=_CHECK?></button></a>
                    <?php } ?>
            <a class="hidden-xs" href="?mod=cart&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" ><button class="btn btn-lg <?=$buttoncol?>" id="btn_GoiMon" style="background-color: orange; color: black;border-radius: 0px; font-size: 15px; display:<?php if(isset($_SESSION['cart'])){if(count($_SESSION['cart'])) echo "block"; else echo "none";} else echo "none"; ?>"><?=_CHOSEN?></button> </a>
            <?php
            if(isset($_GET['thanhtoan']) && $r_t['active']==1)
            {
                @$sql ="select `active` from `of_bill` where `order_id` = {$_SESSION['order_wait']} and `active`=0";
                @$tt = mysqli_query($link,$sql);
                if(@mysqli_num_rows($tt) > 0)
                {
                    ?>
                    <!--Thanh toán-->
                    <a href="?mod=xulythanhtoan&id=<?=$id?>&name=<?=$name?>&order_id=<?=$r_t['id'] ?>" onClick="return confirm('<?=_PAYCONFIRM?>')"  style=" color:black; "><button class="col-xs-12 btn btn-lg" style="background-color:#F60; border-radius: 0px; font-size: 15px;"><?=_PAY?></button></a>
                <?php }
                else {unset($_SESSION['order_wait']);}
            }
            ?>
        </div>

        <div class="col-xs-12 hidden-md hidden-lg hidden-sm " style="padding: 5px; color: white; font-size: 15px;  margin-bottom: 50px; border: solid medium #ff9d00; background: url(img/front/pexels-photo-958168.jpeg);  "> <!--Mobile-->
            <a data-toggle="collapse" data-target="#demo"  aria-expanded="false" align="center" style="color: white; text-decoration: none;">
                <h3 > <?=_TABLE?> <?=$name?>  </h3> <div class="expand_caret fas fa-caret-up" align="right"></div>
            </a>
            <div id="demo" class="collapse">
                <p style="background-image:url(img/front/pexels-photo-1020317.jpeg); padding: 5px; text-align:center" ><a href="?mod=home&id=<?=$id?>&name=<?=$name?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>" style="color: black;  text-decoration: none;"><i class="fas fa-home"></i> <?=_HOME?></a></p>
                <?php
                // Phần revise
                //Chủng Loại
                $mobile_counter=0;
                $sql="select * from `of_department` where `active`=1";
                $d=mysqli_query($link,$sql);
                while($r_dep=mysqli_fetch_assoc($d)):
                   $mobile_counter++;
                    ?>
                    <hr>
                    <div><a data-toggle="collapse" data-target="#mobile_<?=$r_dep['id']?>" style="color: white; text-decoration: none;" onClick="setCookie('mobile_<?=$r_dep['id']?>')"><?=$r_dep[$_SESSION['lang'].'_name']?></a></div>
                    <div id="mobile_<?=$r_dep['id']?>" class="collapse" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 5px; padding: 5px;" >
                        <?php
                        //Thể Loại
                        $sql="select * from `of_category` where `active`=1 and `department_id` = {$r_dep['id']}";
                        $c=mysqli_query($link,$sql);
                        while($r_cate=mysqli_fetch_assoc($c)):
                            ?>
                            <ul>
                                <a style="color: white; text-decoration: none" href="?mod=menu&id=<?=$id?>&name=<?=$name?>&cate=<?=$r_cate['id']?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>"><li><?=$r_cate[$_SESSION['lang'].'_name']?></li></a>
                            </ul>

                        <?php endwhile ?>

                    </div>

                <?php endwhile ?>


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
            @$sql="select * from `of_order` where `id` = {$_SESSION['order_wait']}";
            $rs_t=mysqli_query($link,$sql);
            @$r_t=mysqli_fetch_assoc($rs_t);

            $sql="select a.`id` as id_donhang  
				from `of_order` as a, `of_order_detail` as b
				where a.`id`=b.`order_id` and `num_table`={$name}				
				group by a.`id`
				order by a.`id` desc limit 0,1";
            $rs=mysqli_query($link,$sql);

            $r=mysqli_fetch_assoc($rs);

            if(isset($_GET['thanhtoan']) && $r_t['active']==1)
            {
                @$sql ="select `active` from `of_bill` where `order_id` = {$_SESSION['order_wait']} and `active`=0";
                @$tt = mysqli_query($link,$sql);
                if(@mysqli_num_rows($tt) > 0)
                {
                    ?>
                    <!--Thanh toán-->
                    <a href="?mod=xulythanhtoan&id=<?=$id?>&name=<?=$name?>&order_id=<?=$r_t['id'] ?>" onClick="return confirm('<?=_PAYCONFIRM?>')"  style=" color:black; "><button class="col-xs-6 btn btn-lg" style="background-color:#F60; border-radius: 0px; font-size: 15px;"><?=_PAY?></button></a>
                <?php }
                else {unset($_SESSION['order_wait']);}
            } ?>

            <!--Kiểm Tra Hóa Đơn -->
            <?php
            @$sql = "select * from `of_order` where `num_table` = {$name} and `id` ={$_SESSION['order_wait']}";
            @$kt = mysqli_query($link,$sql);
            if(@mysqli_num_rows($kt) > 0) {
                ?>
                <a href="?mod=list_order&id=<?=$r['id_donhang']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?>&thanhtoan=1" style="color:black; "><button class="col-xs-6 btn btn-lg" style="background-color:#FF0; border-radius: 0px; font-size: 15px;"><?=_CHECK?></button></a>
            <?php } ?>
            <a class="hidden-sm hidden-lg hidden-md" href="?mod=cart&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" ><button class="btn btn-lg col-xs-12" id="btn_GoiMonMobile" style="background-color: orange; color: black;border-radius: 0px; font-size: 15px; display:<?php if(isset($_SESSION['cart'])){if(count($_SESSION['cart'])) echo "block"; else echo "none";} else echo "none"; ?>"><?=_CHOSEN?></button> </a>

        </div>


        <div class="col-lg-9 col-md-8 hidden-xs" > <!--desktop-->
            <div class="scrolling-wrapper" id="style-2">
                
            <?php
			$commsql="select * from `of_food` where `category_id`={$cate} and `active`<>0 order by `discount` desc";
			$res= mysqli_query($link,$commsql);
            $number1=0;
            $number2=0;
			$dem = mysqli_num_rows($res);
			if($dem==0)
			{
			?>
				<h1 style="text-align:center; color:#F00; background-color:#FF6; padding:10px; margin-top:100px">Chưa có món ăn cho thể loại này!</h1>
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
                <div class="card"  style="  width: 300px; background:white; ">

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
                            <a href="?mod=detail&id=<?=$kq['id']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>"><button  class="btn col-xs-12" style="border-radius: 0px;background-color: #ff9d00; color: black;"><?= _DETAIL ?></button></a>

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
                $(".scrolling-wrapper").scrollLeft(actualScroll-250)
                ;
            })
            $(".arrow-right").mousedown(function(){
                var actualScroll = $(".scrolling-wrapper").scrollLeft();
                $(".scrolling-wrapper").scrollLeft(actualScroll+250)
            })
        </script>
    <div class="col-xs-12 hidden-md hidden-lg hidden-sm card2"  style="height: 500px; overflow-y: scroll" > <!--mobile-->
        <?php
        $commsql="select * from `of_food` where `category_id`={$cate} and `active`<>0 order by `discount` desc";
        $res= mysqli_query($link,$commsql);
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
                <h5><?php /*echonumber_format($new_price)*/?> <!--VND (---><?php /*echo$kq['discount']*/?><!--%)<br> <span style=" text-decoration: line-through; font-size: 10px; font-weight: normal;"><?php /*echonumber_format($kq['price'])*/ ?> VND</span> </h5>-->
                </label>
                <?php /*}
					else
					{*/
			    ?>
                	<h5><?=number_format($kq['price']) ?> VND</h5>
				<?php
					/*}*/
				?>
                <a href="?mod=detail&id=<?=$kq['id']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" style=" position: absolute; bottom: 5px; right: 5px;"><button class="btn" style="background-color: #ff9d00; color: black;"><?= _DETAIL ?></button></a>
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
			data:{id_food: id, act: 1}
			}).done(function(data){
				var btn = document.getElementById("btn_GoiMon");

				if(data > 0){
						btn.style.display = "block";

					}
					else {btn.style.display = "none";}

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

</script>
</html>