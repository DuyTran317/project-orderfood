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
    $ds_tags_food = selectAllTagsFood($link,$id);
    $ds_food_like = selectIdFoodLike($link,$id,$ds_tags_food);
	$kq = selectIdWithCondition($link, 'of_food', $id);
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
            <h1 style="color:#F90; font-weight:bold">
                <span <?php if($kq['active'] == 2) { ?> style="text-decoration: line-through red" <?php } ?>><?php echo $kq[$_SESSION['lang'].'_name'] ?></span>
                <?php if($kq['active'] == 2) { ?>
                    <span style="color: red">(<?=_OUTOFSTOCK?>)</span>
                <?php } ?>

            </h1>            <div class="row">
                <div class="col-sm-6">
                    <?php /*if($kq['discount']>0){
                        $new_price = $kq['price']-(($kq['discount']*$kq['price'])/100);*/
                        ?>
                        <!--<h2 style="color: red"><?number_format($new_price) ?> VND (-<?$kq['discount']?>%)<br><span style=" text-decoration: line-through; color:#333 ;font-size: 20px; font-weight: normal;"><?number_format($kq['price']) ?> VND </span> </h2>-->
                    <?php /*}
                    else{*/
                        ?>
                        <h1 style="color: red"><?=number_format($kq['price']) ?> VND</h1>
                        <?php
                    /*}*/
                    ?>
                </div>
                
            </div>
            <br>
            <div><i><?php echo $kq[$_SESSION['lang'].'_desc'] ?></i></div>
            <div class="row" style="margin-top:10px;">
                <div class="col-xs-12">
                    <a href="<?php if(isset($_GET['back'])) {echo "watch_homewolg.html";}else{echo "wnl-watch_menuwolg-c9102ate{$cate}.html"; }?>"><button class="btn btn-lg col-xs-12" style="color: grey"><?=_BACK?></button></a>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 20px;">
                <h5><i class="fas fa-tag"></i> Tags: <?php foreach ($ds_tags_food as $i){ $tag = selectTag($link,$i['id_tag']) ?><span id="tag"><?=$tag[$_SESSION['lang'].'_name']?></span><?php } ?></h5>
                <h3>Các sản phẩm liên quan</h3>
                <div class="scrolling-wrapper" style="overflow-x: hidden">
                    <div class="mixedContent">
                        <?php foreach ($ds_food_like as $i) { ?>
                            <div class="contentBox">
                                <a href="?mod=watch_detail&id=<?=$i['id']?>&cate=<?=$cate?>"> <img style="" src="img/sp/<?=$i['img_url']?>"></a>
                                <p><?=$i[$_SESSION['lang'].'_name']?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function () {
        // Init Smooth Div Scroll
        $(".mixedContent").smoothDivScroll({
            hotSpotScrollingStep: 1,
            easingAfterHotSpotScrollingDuration: 450,
            manualContinuousScrolling: false,
            touchScrolling: true,
        });
    });
</script>
</html>