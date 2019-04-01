<?php if(isset($_GET['tim'])){?>

	<script>
		// 
        setTimeout(function () { swal("Chú ý",
          "<?=_UNFOUND?>",
          "warning");
        }, 1);
    </script>
        <?php } ?>
<script type="text/javascript">

		$(document).ready(function()
		{
			$('#find').autocomplete(
			{
				source: "search.php",
			});
		});
		
</script>



<body style="font-family: 'Anton', sans-serif; background:url(img/front/pexels-photo-326333.jpeg); background-size: cover; ">

<div class="container" style="margin-top:2%;">
    <div class="row">
        <div class=" col-sm-6 " style="margin-bottom: 20px;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 350px;">
                <!-- Indicators -->
                <!--<ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>-->

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <?php
                    $count=0;
                    $select = selectWithoutConditionArray($link, 'of_slider');
					foreach($select as $show_slide){
					$count++;
                        ?>

                        <div <?php if($count==1) echo"class='item active'"; else echo"class='item'";?>>
                            <div data-toggle="modal" data-target="#<?=$show_slide['id']?>"  style="background-image: url('img/slider/<?=$show_slide['img_url']?>') ;width:100%; height: 350px; cursor: pointer;background-position: center center; background-size: cover;"></div>
                        </div>
                        <?php if($show_slide['vi_content']!='')
                    { ?>
                        <div class="modal fade" id="<?=$show_slide['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?=$show_slide[$_SESSION['lang'].'_name']?></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <?=$show_slide[$_SESSION['lang'].'_content']?>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php } } ?>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            </div>
        <div class="col-sm-6" style="  color: white;">
            <div style="background-image:url(img/front/pexels-photo-1020317.jpeg); min-height: 350px; padding: 30px; position: relative">
                <form  method="post" action="?mod=xulytimkiem" style="margin-bottom: 10px">
                    <div class="input-group">
                        <input type="text" class="form-control input-lg " placeholder="<?= _FIND ?>" id="find" name="find" style="font-style:normal">
                        <span class="input-group-addon btn"  style="background: #c6c6c6; color: white">
                          <button class="btn btn-xs find" type="submit" style="background-color: transparent;" disabled>
                          <?= _SEARCH ?>
                          </button>
                        </span>
                    </div>
                </form>
                 <div class="col-md-3 hidden-sm hidden-xs" style="background-color: #fe4a49; padding: 6px; font-size: 20px; ">
                    Bán Chạy
                </div>
                <div class="hidden-md hidden-lg" style="background-color: #fe4a49; padding: 6px; font-size: 20px; " data-toggle="collapse" data-target="#hotsaler">
                    Bán Chạy
                </div>

                <ul class="nav nav-pills hidden-xs hidden-sm" style="background-color: #fed766;">
                  <?php 
                  $flag=0;
                  $sql="select * from `of_department`where `active`=1";
                  $r=mysqli_query($link,$sql);
                  while($show=mysqli_fetch_assoc($r)){
                ?>
                    <li class <?php if ($flag==0) { echo '="active"';$flag=1;}?>> <a data-toggle="pill" href="#menu<?=$show['id']?>" style="color: white"><?=$show['vi_name'] ?> </a></li>
                    <?php } ?>
                </ul>
                <div id="hotsaler" class="collapse">
                    <ul class="nav nav-pills nav-stacked hidden-md hidden-lg " style="background-color: #fed766;">
                      <?php
                       $r1=mysqli_query($link,$sql);
                       while($show_mobile=mysqli_fetch_assoc($r1)){
                    ?>
                        <li><a data-toggle="pill" href="#menu<?=$show_mobile['id']?>" style="color: white"><?=$show_mobile['vi_name']?></a></li>
                        <?php } ?>
                    </ul>
                </div>
               <div class="tab-content">
                <?php
				$flag1=0;
                $r2=mysqli_query($link,$sql);
                while($getid=mysqli_fetch_assoc($r2)){
                  $id_depart=$getid['id'];
				  
                ?>
                   <div id="menu<?=$id_depart?>" class="tab-pane fade <?php if($flag1==0){ echo 'in active';$flag1=1; }?>">
                       <div class="scrolling-wrapper" style="overflow-x: hidden">
                         <div class="mixedContent">
                        <?php
                         $sql3="select c.vi_name as ten, c.img_url as hinh, c.id as id,b.id as cate from `of_department` as a, `of_category`  as b ,`of_food` as c where a.id=b.department_id and b.id=c.category_id and a.id={$id_depart} and c.active=1 ORDER BY c.solve DESC LIMIT 9";
                          $r3=mysqli_query($link,$sql3);
                          while($show_food=mysqli_fetch_assoc($r3)){ 
                            ?>
                               <div class="contentBox">
                                <a href="dtail-watch_detailwolg-i9102dfood<?=$show_food['id']?>-c9102ate<?=$show_food['cate']?>.html"> <img style="" src="img/sp/<?=$show_food['hinh']?>"></a>
                                   			
                                   <p><?=$show_food['ten']?></p>
                               </div>
                             <?php } ?>
                           </div>
                       </div>
                   </div>
                <?php } ?>
                   </div>
               </div>
            </div>
        </div>

    
   <br>
    <div class="row">
     <?php
		$take = selectWithConditionArray_AcOrByOrAsc($link, 'of_department');
		foreach($take as $r){
	?>

    	<a href="wnl-watch_menuwolg-c9102ate<?=$r['id']?>.html">
        <div class=" col-md-4 col-sm-6" style="margin-bottom: 20px;">
            <div style="height: 300px; background-image:url(img/cate/<?=$r['img_url']?>); background-size: cover; padding: 30px; color: white">
                <p style="font-size: 60px; "><?=$r[$_SESSION['lang'].'_name']?></p>
                <button class="btn " style="background: orange; border-radius: 10px;font-family: 'Open Sans Condensed', sans-serif; font-size: 15px; font-weight: bold"><?=_DETAIL?></button>
            </div>
        </div>        
    	</a>
    <?php } ?>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        // Init Smooth Div Scroll
        $(".mixedContent").smoothDivScroll({
            hotSpotScrollingStep: 1,
            easingAfterHotSpotScrollingDuration: 450,
            mousewheelScrolling: "allDirections",
            manualContinuousScrolling: true,
            autoScrollingMode: "onStart",
            touchScrolling: true,
        });
    });
</script>
</html>