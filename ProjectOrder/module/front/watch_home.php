<?php if(isset($_GET['tim'])){?>

	<script>
		alert("<?=_UNFOUND?>");
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
                    $sql = "select * from `of_slider`";
                    $slide=mysqli_query($link,$sql);
                    $count=0;
                    while($show_slide = mysqli_fetch_assoc($slide)):
                        $count++;
                        ?>

                        <div <?php if($count==1) echo"class='item active'"; else echo"class='item'";?>>
                            <img src="img/slider/<?=$show_slide['img_url']?>" data-toggle="modal" data-target="#<?=$show_slide['id']?>"  style="width:100%; height: 350px; cursor: pointer">
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

                    <?php } endwhile ?>

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
            <div style="background-image:url(img/front/pexels-photo-1020317.jpeg); height: 350px; padding: 30px;">
                <p  style="font-size: 40px; font-weight: bolder"><i class="fas fa-search"></i> <?= _SEARCH ?></p>
               <form  method="post" action="?mod=xulytimkiem">
                <div class="input-group">
                    <input type="text" class="form-control input-lg " placeholder="<?= _FIND ?>" id="find" name="find" style="font-style:normal">
                    <span class="input-group-addon btn"  style="background: #c6c6c6; color: white">
                      <button class="btn btn-xs find" type="submit" style="background-color: transparent;" disabled>
                      <?= _SEARCH ?>
                      </button>
                    </span>
                </div><hr><br><br>
            
                <p style="font-size: 60px;" align="center"><?= _CATE ?></p>
            </div>
            </form>
        </div>
    </div>
   <br>
    <div class="row">
     <?php
		$sql="select * from `of_department` where `active`=1 order by `order` asc";
		$rs=mysqli_query($link,$sql);
		while($r=mysqli_fetch_assoc($rs)):
	?>

    	<a href="wnl-watch_menuwolg-c9102ate<?=$r['id']?>.html">
        <div class=" col-md-4 col-sm-6" style="margin-bottom: 20px;">
            <div style="height: 300px; background-image:url(img/cate/<?=$r['img_url']?>); background-size: cover; padding: 30px; color: white">
                <p style="font-size: 60px; "><?=$r[$_SESSION['lang'].'_name']?></p>
                <button class="btn " style="background: orange; border-radius: 10px;font-family: 'Open Sans Condensed', sans-serif; font-size: 15px; font-weight: bold"><?=_DETAIL?></button>
            </div>
        </div>        
    	</a>
    <?php endwhile ?>     
        
    </div>
    
    </div>

</body>
</html>