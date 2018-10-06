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
<body style="background:url(img/front/pexels-photo-326333.jpeg);  background-position:center; background-size:cover  ; " onload="startTime()">
<p style="text-align:right; ">
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('newbill', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
	
	Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('delorder', function () {
		
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
	
	Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('delfood', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
	Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('hihi');
    // chanel trùng voi chanel trong send.php
    channel.bind('loadmenu', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
	
</script>
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>

</p>
<div class="container-fluid" style="margin-top: 6%">

	<div class="row" style=" padding: 20px;  font-family: 'Anton', sans-serif; background: url(img/front/pexels-photo-189451.jpeg)">
        <div class="col-md-3 hidden-xs" style="color: white; font-size: 25px; background-color: grey; margin-bottom: 50px; border: solid thick #ff9d00; background: url(img/front/pexels-photo-958168.jpeg); padding: 2px 20px; height: 450px; overflow-y: scroll;">
            <h1 align="center"> <?=_TABLE?> <?=$name?></h1>
            <p style="background-image:url(img/front/pexels-photo-1020317.jpeg); padding: 5px;" ><a href="?mod=home&id=<?=$id?>&name=<?=$name?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>" style="color: black;  text-decoration: none;"><?=_HOME?></a></p>
           
            <?php 
				$sql="select * from `of_category` where `active`=1";
				$c=mysqli_query($link,$sql);
				while($r_cate=mysqli_fetch_assoc($c)):
			?>
             <hr><a style="color:#FFF; text-decoration:none" href="?mod=menu&id=<?=$id?>&name=<?=$name?>&cate=<?=$r_cate['id']?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>"><p style="margin-left:5px; text-transform: uppercase;"><?=$r_cate[$_SESSION['lang'].'_name']?></p></a>
            <?php endwhile ?>

            <?php
            @$sql="select * from `of_order` where `id` = {$_SESSION['order_wait']}";
            $rs_t=mysqli_query($link,$sql);
            @$r_t=mysqli_fetch_assoc($rs_t);

            if(isset($_GET['thanhtoan']) && $r_t['active']==1)
            {
                ?>
                <?php
                $sql="select a.`id` as id_donhang  
					from `of_order` as a, `of_order_detail` as b
					where a.`id`=b.`order_id` and `num_table`={$name}				
					group by a.`id`
					order by a.`id` desc limit 0,1";
                $rs=mysqli_query($link,$sql);

                $r=mysqli_fetch_assoc($rs);

                if(isset($_GET['thanhtoan']) && $r_t['active']==1)
                {
                    ?>
                    <a href="?mod=list_order&id=<?=$r['id_donhang']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?>&thanhtoan=1" style="color:black; "><button class="col-xs-6 btn btn-lg" style="background-color:#FF0; border-radius: 0px; font-size: 15px;"><?=_CHECK?></button></a>
                    <a href="?mod=xulythanhtoan&id=<?=$id?>&name=<?=$name?>" onclick="return confirm('<?=_PAYCONFIRM?>')"  style=" color:black; "><button class="col-xs-6 btn btn-lg" style="background-color:#F60; border-radius: 0px; font-size: 15px;"><?=_PAY?></button></a>
                <?php }} ?>

            <a href="?mod=cart&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" ><button class="btn col-xs-12 btn-lg" id="btn_GoiMon" style="border-radius: 0px;background-color: #ff9d00; color: black; font-size: 15px; display:<?php if(isset($_SESSION['cart'])){if(count($_SESSION['cart'])) echo "block"; else echo "none";} else echo "none"; ?>"><?=_CHOSEN?></button> </a>
        </div>

        <div class="col-xs-12 hidden-md hidden-lg hidden-sm" style="color: white; font-size: 15px;  margin-bottom: 50px; border: solid medium #ff9d00; background: url(img/front/pexels-photo-958168.jpeg);  ">
            <a href="#demo" data-toggle="collapse" align="center" style="color: white; text-decoration: none;"><h3 > <?=_TABLE?> <?=$name?></h3></a>
            <div id="demo" class="collapse">
                <p style="background-image:url(img/front/pexels-photo-1020317.jpeg); padding: 5px;" ><a href="?mod=home&id=<?=$id?>&name=<?=$name?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>" style="color: black;  text-decoration: none;"><?=_HOME?></a></p>

                <?php
                $sql="select * from `of_category` where `active`=1";
                $c=mysqli_query($link,$sql);
                while($r_cate=mysqli_fetch_assoc($c)):
                    ?>
                    <hr><a style="color:#FFF; text-decoration:none" href="?mod=menu&id=<?=$id?>&name=<?=$name?>&cate=<?=$r_cate['id']?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>"><p style="margin-left:5px; text-transform: uppercase;"><?=$r_cate[$_SESSION['lang'].'_name']?></p></a>
                <?php endwhile ?>
            </div>


            <?php
            @$sql="select * from `of_order` where `id` = {$_SESSION['order_wait']}";
            $rs_t=mysqli_query($link,$sql);
            @$r_t=mysqli_fetch_assoc($rs_t);

            if(isset($_GET['thanhtoan']) && $r_t['active']==1)
            {
                ?>
                <?php
                $sql="select a.`id` as id_donhang  
					from `of_order` as a, `of_order_detail` as b
					where a.`id`=b.`order_id` and `num_table`={$name}				
					group by a.`id`
					order by a.`id` desc limit 0,1";
                $rs=mysqli_query($link,$sql);

                $r=mysqli_fetch_assoc($rs);

                if(isset($_GET['thanhtoan']) && $r_t['active']==1)
                {
                    ?>
                    <a href="?mod=list_order&id=<?=$r['id_donhang']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?>&thanhtoan=1" style="color:black; "><button class="col-xs-6 btn btn-lg" style="background-color:#FF0; border-radius: 0px; font-size: 15px;"><?=_CHECK?></button></a>
                    <a href="?mod=xulythanhtoan&id=<?=$id?>&name=<?=$name?>" onclick="return confirm('Bạn chắc muốn thanh toán chứ?')"  style=" color:black; "><button class="col-xs-6 btn btn-lg" style="background-color:#F60; border-radius: 0px; font-size: 15px;"><?=_PAY?></button></a>
                <?php }} ?>

            <a href="?mod=cart&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>" ><button class="btn col-xs-12 btn-lg" id="btn_GoiMonMobile" style="border-radius: 0px;background-color: #ff9d00; color: black; font-size: 15px; display:<?php if(isset($_SESSION['cart'])){if(count($_SESSION['cart'])) echo "block"; else echo "none";} else echo "none"; ?>"><?=_CHOSEN?></button> </a>
        </div>

        <div class="col-md-9 hidden-xs" >
            <div class="scrolling-wrapper">
            <?php
			$commsql="select * from `of_food` where `category_id`={$cate} and `active`<>0";
			$res= mysqli_query($link,$commsql);
            $number1=0;
            $number2=0;
			while($kq= mysqli_fetch_assoc($res))
			{
			    $number1++;
			    $number2++;
                ?>
                <div class="card"  style="  width: 300px; background:white; ">
                    <label class="col-xs-12 status dark" style=" height: 350px;  background:url(img/front/1515456591895.jpg);background-position:center; background-size:cover; cursor: pointer;" for="foodchosen<?php  echo $number1;?>">
                        <?php if($kq['active'] == 1) { ?>
                            <div id="status<?=$kq['id'] ?>" class="status1" <?php if(isset($_SESSION['cart'][$kq['id']])) echo 'style="background-color: rgba(249, 150, 2, 0.5)"' ?>>
                                <h1 style=" font-size: 80px; color: #e8ebf2; " id="chose<?=$kq['id'] ?>"><?php if(isset($_SESSION['cart'][$kq['id']])) echo '<i class="fas fa-check"></i>';?></h1>
                            </div>
                            <input onchange="handleChange(this,<?=$kq['id']?>);checkFood(<?=$kq['id']?>);" type="checkbox" <?php if(isset($_SESSION['cart'][$kq['id']])) echo 'checked="checked"' ?>  style=" height: 40px; width: 40px; position: absolute; right: 0px; top: 0px; display:none;" id="foodchosen<?php  echo $number1;?>" />
                            <div style=" padding: 5px; position:absolute; bottom:0px; left:0px; background-color:#ff9d00; color:#000; font-size:30px;font-weight:bold"><?=number_format($kq['price']) ?> VND</div>
                        <?php } ?>
                        <?php if($kq['active'] == 2) { ?>
                            <div id="dark">
                                <h1 style="transform: rotate(-40deg); font-size: 50px; color: #ff9328"><?=_OUTOFSTOCK?></h1>
                            </div>
                        <?php } ?>
                    </label>

                    <div class="col-xs-12 " >
                        <h3 align="center" class="textover" style="color:#900;"><b><?= $kq[$_SESSION['lang'].'_name'] ?></b></h3>
                        <div class="row">
                            <a href="?mod=detail&id=<?=$kq['id']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>"><button  class="btn col-xs-12" style="border-radius: 0px;background-color: #ff9d00; color: black;"><?= _DETAIL ?></button></a>

                        </div>
                    </div>
                </div>
                <script>
                    /*$('#abc').click(function(){

                        if($('#abc').attr('checked') == true){
                            $('#dark').attr("style", "background-color: yellow;");
                        }
                        else{
                            $('#dark').attr("style", "background-color: transparent;");
                        }
                    });*/
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
    <div class="col-xs-12 hidden-md hidden-lg hidden-sm card2"  style="height: 500px; overflow-y: scroll" >
        <?php
        $commsql="select * from `of_food` where `category_id`={$cate} and `active`<>0";
        $res= mysqli_query($link,$commsql);
        $number1=0;
        $number2=0;
        while($kq= mysqli_fetch_assoc($res))
        {
        $number1++;
        $number2++;
        ?>
        <div class="row" style="margin-bottom: 10px; box-shadow: 5px 5px 10px; height: 110px;">
            <label class="col-xs-4 dark2 statusmobile" style=" border: solid medium #ff9d00; height: 110px; background:url(img/front/1515456591895.jpg);background-position:center; background-size:cover; cursor: pointer;  " for="foodchosenmobile<?php  echo $number1;?>">
                <?php if($kq['active'] == 1) { ?>
                    <div id="statusmobile<?=$kq['id'] ?>" class="statusmobile1" <?php if(isset($_SESSION['cart'][$kq['id']])) echo 'style="background-color: rgba(249, 150, 2, 0.5)"' ?>>
                        <h1 style=" font-size: 50px; color: #e8ebf2; " id="chosemobile<?=$kq['id'] ?>"><?php if(isset($_SESSION['cart'][$kq['id']])) echo '<i class="fas fa-check"></i>';?></h1>
                    </div>
                    <input onchange="handleChange(this,<?=$kq['id']?>);checkFoodMobile(<?=$kq['id']?>);" type="checkbox" <?php if(isset($_SESSION['cart'][$kq['id']])) echo 'checked="checked"' ?>  style=" height: 40px; width: 40px; position: absolute; right: 0px; top: 0px; display: none" id="foodchosenmobile<?php  echo $number1;?>" />
                <?php } ?>
                <?php if($kq['active'] == 2) { ?>
                    <div id="dark2">
                        <h1 style=" font-size: 25px; color: #ff9328"><?=_OUTOFSTOCK?></h1>
                    </div>
                <?php } ?>
            </label>
            <div class="col-xs-8" style="background-color: white; height: 110px;  border: solid medium #ff9d00;">
                <h4 style="color:#900;" class="textover2"> <?= $kq[$_SESSION['lang'].'_name'] ?></h4>
                <h5><?=number_format($kq['price']) ?> VND</h5>
                <a href="?mod=detail&id=<?=$kq['id']?>&id_ban=<?=$id?>&name_ban=<?=$name?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1'?>"><button class="btn btn-xs" style="background-color: #ff9d00; color: black;"><?= _DETAIL ?></button></a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
<script>


    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
        var month = new Array();
        month[0] = "01";
        month[1] = "02";
        month[2] = "03";
        month[3] = "04";
        month[4] = "05";
        month[5] = "06";
        month[6] = "07";
        month[7] = "08";
        month[8] = "09";
        month[9] = "10";
        month[10] = "11";
        month[11] = "12";

        var d = new Date();
        var day = d.getDate()

        var mon = month[d.getMonth()];
        document.getElementById("day").innerHTML = day;
        document.getElementById("month").innerHTML = mon;

    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};
        return i;
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