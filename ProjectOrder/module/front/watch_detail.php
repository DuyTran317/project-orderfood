<style>
    html,
    body{
        height: 100%;
    }
</style>
<?php
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}	
	if(isset($_GET['cate']))
	{
		$cate=$_GET['cate'];
	}

	$sql="select * from `of_food` where `id`={$id}";
	$res = mysqli_query($link,$sql);
	$kq = mysqli_fetch_assoc($res);
?>	

<body style="background:url(img/front/pexels-photo-1020317.jpeg); background-size:cover ;font-family: 'Anton', sans-serif;">

<div class="container" style="margin-top:2%" >
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 10%; background-color: white">
                <!-- Indicators -->
                <!--<ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>-->
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/sp/<?=$kq['img_url']?>"  style="width:100%;">
                    </div>
					
                    <?php if($kq['img_url2'] !="") {?>
                    
                    <div class="item">
                        <img src="img/sp/<?=$kq['img_url2']?>" style="width:100%; ">
                    </div>
                    
                    <?php } ?>

                    <?php if($kq['img_url3'] !="") {?>
                    
                    <div class="item">
                        <img src="img/sp/<?=$kq['img_url3']?>" style="width:100%; ">
                    </div>
                    
                    <?php } ?>
                    
                    <?php if($kq['img_url4'] !="") {?>
                    
                    <div class="item">
                        <img src="img/sp/<?=$kq['img_url4']?>" style="width:100%; ">
                    </div>
                    
                    <?php } ?>
                    
                </div>
				
                <?php if($kq['img_url4'] !="" || $kq['img_url4'] !="" || $kq['img_url4'] !="") {?>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>

        <div class="col-md-10 col-md-offset-1" style="background-color:#FFF; padding:10px;">
            <h1 style="color:#F90; font-weight:bold"><?php echo $kq[$_SESSION['lang'].'_name'] ?></h1>
            <div class="row">
                <div class="col-sm-6">
                    <?php if($kq['discount']>0){
                        $new_price = $kq['price']-(($kq['discount']*$kq['price'])/100);
                        ?>
                        <h2 style="color: red"><?=number_format($new_price) ?> VND (-<?=$kq['discount']?>%)<br><span style=" text-decoration: line-through; color:#333 ;font-size: 20px; font-weight: normal;"><?=number_format($kq['price']) ?> VND </span> </h2>
                    <?php }
                    else{
                        ?>
                        <h1 style="color: red"><?=number_format($kq['price']) ?> VND</h1>
                        <?php
                    }
                    ?>
                </div>
                
            </div>
            <br>
            <div><i><?php echo $kq[$_SESSION['lang'].'_desc'] ?></i></div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12">
                        <a href="<?php if(isset($_GET['back'])) {echo "?mod=watch_home";}else{echo "?mod=watch_menu&cate=$cate"; }?>"><button class="btn btn-lg col-xs-12" style="color: grey"><?=_BACK?></button></a>
                    </div>
        </div>
    </div>
</div>
</body>

</html>