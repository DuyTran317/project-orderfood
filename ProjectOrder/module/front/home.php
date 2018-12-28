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
?>

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
				
			$(".modal-body p img").removeAttr("style");
			$(".modal-body p img").css("max-width","80%");
			$(".modal-body p img").css("margin-left","auto");
			$(".modal-body p img").css("margin-right","auto");			
			$(".modal-body p img").css("display","block");
		});
		
</script>



<body style="background-color: #fff289; font-family: 'Anton', sans-serif; background-image:url(img/front/pexels-photo-326333.jpeg); height: 100% ">

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
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?= _CLOSE ?></button>
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
		$sql="select * from `of_department` where `active`=1";
		$rs=mysqli_query($link,$sql);
		while($r=mysqli_fetch_assoc($rs)):
	?>

    	<a href="?mod=menu&id=<?=$id?>&name=<?=$name?>&cate=<?=$r['id']?><?php if(isset($_GET['thanhtoan'])){echo "&thanhtoan=1";}?>">
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
