<style>
    html,
    body{
        height: 100%;
    }
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
<div class="container-fluid" style="margin-top: 3%">
	<div class="row" style=" padding: 20px; font-family: 'Anton', sans-serif; background: url(img/front/pexels-photo-189451.jpeg)">
        <div class="col-lg-3 hidden-xs col-md-4" style="color: white; font-size: 25px; background-color: grey; margin-bottom: 50px; border: solid thick #ff9d00; background: url(img/front/pexels-photo-958168.jpeg); padding: 2px 20px;  background-size: cover">

            <p  style="padding: 5px; text-align:center" ><a href="?mod=watch_home" style="color: #FFF; text-decoration: none;"><i class="fas fa-home"></i> <?=_HOME?></a></p>
            <div style="height: 250px; overflow-y: auto;">
                <?php
                // Phần revise
                //Chủng Loại
                $counter=0;
                $sql="select * from `of_department` where `active`=1";
                $d=mysqli_query($link,$sql);
                while($r_dep=mysqli_fetch_assoc($d)):
                    $counter++;
                    ?>
                    <hr>
                    <div><a data-toggle="collapse" data-target="#<?=$r_dep['id']?>" style="color: white; text-decoration: none; " onClick="setCookie('<?=$r_dep['id']?>')"><?=$r_dep[$_SESSION['lang'].'_name']?></a></div>
                    <div id="<?=$r_dep['id']?>" class="collapse" style="background-color: rgba(0, 0, 0, 0.3)" >

                        <?php
                        //Thể Loại
                        $sql="select * from `of_category` where `active`=1 and `department_id` = {$r_dep['id']}";
                        $c=mysqli_query($link,$sql);
                        while($r_cate=mysqli_fetch_assoc($c)):
                            ?>
                            <ul>
                                <a style="color: white; text-decoration: none" href="?mod=watch_menu&cate=<?=$r_cate['id']?>"><li><?=$r_cate[$_SESSION['lang'].'_name']?></li></a>
                            </ul>

                        <?php endwhile ?>

                    </div>

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

        </div>

        <div class="col-xs-12 hidden-md hidden-lg hidden-sm " style="padding: 5px; color: white; font-size: 15px;  margin-bottom: 50px; border: solid medium #ff9d00; background: url(img/front/pexels-photo-958168.jpeg);  "> <!--Mobile-->

            <div  class="collapse in" style="cursor: pointer">
                <a data-toggle="collapse" data-target="#demo"  aria-expanded="false" align="center" style="color: white; text-decoration: none;">
                    <h3 > <?=_CATE?>  </h3> <div class="expand_caret fas fa-caret-up" align="right"></div>
                </a>
                
                <div class="collapse out" id="demo">
                <p style="background-image:url(img/front/pexels-photo-1020317.jpeg); padding: 5px; text-align:center" ><a href="?mod=watch_home" style="color: black;  text-decoration: none;"><i class="fas fa-home"></i> <?=_HOME?></a></p>
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
                        <div id="mobile_<?=$r_dep['id']?>" class="collapse" style="background-color: rgba(0, 0, 0, 0.3)" >
                            <?php
                            //Thể Loại
                            $sql="select * from `of_category` where `active`=1 and `department_id` = {$r_dep['id']}";
                            $c=mysqli_query($link,$sql);
                            while($r_cate=mysqli_fetch_assoc($c)):
                                ?>
                                <ul>
                                    <a style="color: white; text-decoration: none" href="?mod=watch_menu&cate=<?=$r_cate['id']?>"><li><?=$r_cate[$_SESSION['lang'].'_name']?></li></a>
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
            </div>
            
        </div>

        <div class="col-lg-9 col-md-8 hidden-xs" >
            <div class="scrolling-wrapper">
                
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
                        	<?php if($kq['discount']>0){ ?>
                            <div id="burst-8" style="position: absolute; top: 20px; left: 20px;"> </div><span style="position: absolute; top: 30px; left: 30px; font-size: 25px; color: red;"> <?=$kq['discount']?>%</span>
                            <?php } ?>                                                        

							<?php if($kq['discount']>0){
									$new_price = $kq['price']-(($kq['discount']*$kq['price'])/100);
							?>
                            <div style=" padding: 5px; position:absolute; bottom:0px; left:0px; background-color:#ff9d00; color:#000; font-size:30px;font-weight:bold"><?=number_format($new_price) ?> VND <br><span style=" text-decoration: line-through; color:#333 ;font-size: 20px; font-weight: normal;"><?=number_format($kq['price']) ?> VND</span></div>
                            <?php }
								  else{
							?>
                            <div style=" padding: 5px; position:absolute; bottom:0px; left:0px; background-color:#ff9d00; color:#000; font-size:30px;font-weight:bold"><?=number_format($kq['price']) ?> VND</div>
                            <?php
								  }
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
                            <a href="?mod=watch_detail&id=<?=$kq['id']?>&cate=<?=$cate?>"><button  class="btn col-xs-12" style="border-radius: 0px;background-color: #ff9d00; color: black;"><?= _DETAIL ?></button></a>

                        </div>
                    </div>
                </div>
                
            <?php } ?>

            </div>
        </div>

        <script>
            $(".arrow-left").click(function(){
                var actualScroll = $(".scrolling-wrapper").scrollLeft();
                $(".scrolling-wrapper").scrollLeft(actualScroll-250)
                ;
            })
            $(".arrow-right").click(function(){
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
            <label class="col-xs-4 dark2 statusmobile" style=" border: solid medium #ff9d00; height: 110px; background:url(img/sp/<?=$kq['img_url']?>);background-position:center; background-size:cover; cursor: pointer;  " for="foodchosenmobile<?php  echo $number1;?>">
       
                <?php if($kq['active'] == 2) { ?>
                    <div id="dark2">
                        <h1 style=" font-size: 25px; color: #ff9328"><?=_OUTOFSTOCK?></h1>
                    </div>
                <?php } ?>
            </label>
            <div class="col-xs-8" style="background-color: white; height: 110px;  border: solid medium #ff9d00;">
                <?php
                $info="";
                if($kq[$_SESSION['lang'].'_name']== ""){
                    $info = "-No Information-";
                }
                ?>
                <h4 style="color:#900;" class="textover2"> <?=$info?><?= $kq[$_SESSION['lang'].'_name'] ?> </h4>
                <?php if($kq['discount']>0){
					  $new_price = $kq['price']-(($kq['discount']*$kq['price'])/100);
				?>
                <h5><?=number_format($new_price)?> VND (-<?=$kq['discount']?>%)<br> <span style=" text-decoration: line-through; font-size: 10px; font-weight: normal;"><?=number_format($kq['price']) ?> VND</span> </h5>
                <?php }
					else
					{
			    ?>
                	<h5><?=number_format($kq['price']) ?> VND</h5>
				<?php
					}
				?>
                <a href="?mod=watch_detail&id=<?=$kq['id']?>&cate=<?=$cate?>"><button class="btn btn-xs" style="background-color: #ff9d00; color: black;"><?= _DETAIL ?></button></a>
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
    $('.collapse').on('shown.bs.collapse', function() {
        $(this).parent().find(".caret-down").removeClass("caret-down").addClass("caret-up");
    }).on('hidden.bs.collapse', function() {
        $(this).parent().find(".caret-up").removeClass("caret-up").addClass("caret-down");
    });
</script>
</html>