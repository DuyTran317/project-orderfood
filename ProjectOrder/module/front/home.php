<?php 
checkLoginCookie($_COOKIE['username_login']);
$id = takeGet('id');
$name = takeGet('name');
?>

<?php if(isset($_GET['tim'])){?>
	<script>
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
				
			$(".modal-body p img").removeAttr("style");
			$(".modal-body p img").css("max-width","80%");
			$(".modal-body p img").css("margin-left","auto");
			$(".modal-body p img").css("margin-right","auto");			
			$(".modal-body p img").css("display","block");
		});
		
</script>



<body style=" font-family: 'Anton', sans-serif; background:url(img/front/pexels-photo-326333.jpeg); height: 100%; background-size: cover; ">

<div class="container" style="margin-top:2%;">
    <div class="row">
        <div class=" col-sm-6 " style="margin-bottom: 20px;">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 350px;">
                    
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
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                        
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">HOT <?=$show_slide[$_SESSION['lang'].'_name']?></h4>
                              </div>
                        
                              <!-- Modal body -->
                              <div class="modal-body">
                                <?=$show_slide[$_SESSION['lang'].'_content']?>
                              </div>
                        
                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?= _CLOSE ?></button>
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
                    <li class="active"><a data-toggle="pill" href="#home" style="color: white">Đồ Ăn</a></li>
                    <li><a data-toggle="pill" href="#menu1" style="color: white">Thức Uống</a></li>
                    <li><a data-toggle="pill" href="#menu2" style="color: white">Món Khác</a></li>
                </ul>
                <div id="hotsaler" class="collapse">
                    <ul class="nav nav-pills nav-stacked hidden-md hidden-lg " style="background-color: #fed766;">
                        <li class="active"><a data-toggle="pill" href="#home" style="color: white">Đồ Ăn</a></li>
                        <li><a data-toggle="pill" href="#menu1" style="color: white">Thức Uống</a></li>
                        <li><a data-toggle="pill" href="#menu2" style="color: white">Món Khác</a></li>
                    </ul>
                </div>
               <div class="tab-content">
                   <div id="home" class="tab-pane fade in active">
                       <div class="scrolling-wrapper" style="overflow-x: hidden">
                           <div class="mixedContent">
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                           </div>
                       </div>
                   </div>

                   <div id="menu1" class="tab-pane fade">
                       <div class="scrolling-wrapper" style="overflow-x: hidden">
                           <div class="mixedContent">
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div id="menu2" class="tab-pane fade">
                       <div class="scrolling-wrapper" style="overflow-x: hidden">
                           <div class="mixedContent">
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                               <div class="contentBox">
                                   <img style="" src="img/sp/cchs.jpg" onclick="window.location.href = 'http://www.google.com';">
                                   <p>Ốc Rang Me</p>
                               </div>
                           </div>
                       </div>
                   </div>
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
		
    	<a href="cmn-thuc_don-i9102d<?=$id?>-n9102ame<?=$name?>-c9102ate<?=$r['id']?><?php if(isset($_GET['thanhtoan'])){echo "-tt9102oan1";}?>.html">
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
            mousewheelScrolling: "allDirections",
            manualContinuousScrolling: true,
            autoScrollingMode: "onStart",
            touchScrolling: true,
        });
    });
</script>
</html>
