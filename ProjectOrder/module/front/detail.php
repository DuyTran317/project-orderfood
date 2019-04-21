<style>
    html,
    body{
        height: 100%;
    }
</style>
<?php if(!isset($_COOKIE['username_login']))
{
	header("location:login.html");
}
	$id = takeGet('id');
	$id_ban = takeGet('id_ban');
	$name_ban = takeGet('name_ban');
	$cate = takeGet('cate');
    $ds_tags_food = selectAllTagsFood($link,$id);
    $ds_food_like = selectIdFoodLike($link,$id,$ds_tags_food);
	$kq = selectIdWithCondition($link, 'of_food', $id);
	getPusher('161363aaa8197830a033', 'Reload', 'loadchitiet');


?>
<body style="background:url(img/front/pexels-photo-1020317.jpeg); background-size:cover ;font-family: 'Anton', sans-serif;">

<div class="container" style="margin-top:2%" >
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 10%; background-color: white">

                <?php /*?><!-- Wrapper for slides --><?php */?>
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="img/sp/<?=$kq['img_url']?>" alt="wrong"  style="width:100%; max-height:500px">
                    </div>
                    
                    <?php
						if($kq['img_url2']){
					?>
                    <div class="item">
                        <img src="img/sp/<?=$kq['img_url2']?>" alt="wrong"  style="width:100%; max-height:500px">
                    </div>
                    <?php } ?>
                    
                    <?php
						if($kq['img_url3']){
					?>
                    <div class="item">
                        <img src="img/sp/<?=$kq['img_url3']?>" alt="wrong"  style="width:100%; max-height:500px">
                    </div>
                    <?php } ?>
                    
                    <?php
						if($kq['img_url4']){
					?>
                    <div class="item">
                        <img src="img/sp/<?=$kq['img_url4']?>" alt="wrong"  style="width:100%; max-height:500px">
                    </div>
                    <?php } ?>

                </div>

               <?php /*?> <!-- Left and right controls --><?php */?>
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
    </div>

        <div class="col-md-10 col-md-offset-1" style="background-color:#FFF; padding:10px;">
            <h1 style="color:#F90; font-weight:bold">
                <span <?php if($kq['active'] == 2) { ?> style="text-decoration: line-through red" <?php } ?>><?php echo $kq[$_SESSION['lang'].'_name'] ?></span>
                <?php if($kq['active'] == 2) { ?>
                        <span style="color: red">(<?=_OUTOFSTOCK?>)</span>
                <?php } ?>
            </h1>
            <div class="row">
                <div class="col-sm-6">
                    <?php /*if($kq['discount']>0){
                        $new_price = $kq['price']-(($kq['discount']*$kq['price'])/100);*/
                        ?>
                       <?php /*?> <!--<h2 style="color: red">--><?php */?><?php /*echonumber_format($new_price)*/ ?><?php /*?><!-- VND (---><?php */?><?php /*$kq['discount']*/?><?php /*?><!--%)<br><span style=" text-decoration: line-through; color:#333 ;font-size: 20px; font-weight: normal;">--><?php */?><?php /*echonumber_format($kq['price'])*/ ?><?php /*?><!-- VND </span> </h2>--><?php */?>
                    <?php /*}
                    else{*/
                        ?>
                        <h1 style="color: red"><?=number_format($kq['price']) ?> VND</h1>
                        <?php
                 /*   }*/
                    ?>
                </div>
                <div class="col-sm-6" align="right">
                    <?php if($kq['active'] == 1) { ?>
                    <div class="input-group col-sm-10 col-md-6 col-xs-12">
                        <span class="input-group-addon" name="qty" style="background-color: #F60; border-color: #F60;" ><input type='button' value='-' class='qtyminus ' field='quantity' style="border: none; background-color: transparent; color:white"/></span>
                        <input type="text" class="form-control text-center" id="qty" min="1" value="1"  name='quantity' disabled style="border-color: #F60; color: #F60;">
                        <span class="input-group-addon" name="qty"  style="background-color: #F60; border-color: #F60;"><input type='button' value='+' class='qtyplus' field='quantity' style="border: none; background-color: transparent; color: white"/></span>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <br>
            <div><i><?php echo $kq[$_SESSION['lang'].'_desc'] ?></i></div>
            <div class="row" style="margin-top:10px;">
                <div class="col-xs-6">
                    <a href="<?php if(isset($_GET['back'])) {echo "tlc-trang_chu-i9102d{$id_ban}-n9102ame{$name_ban}";}else{echo "cmn-thuc_don-i9102d{$id_ban}-n9102ame{$name_ban}-c9102ate{$cate}"; }?><?php if(isset($_GET['thanhtoan'])) echo'-tt9102oan1'?>.html"><button class="btn btn-lg col-xs-12" style="color: grey"><?=_BACK?></button></a>
                </div>
                <div class="col-xs-6">
                <?php
                    if($kq['active']==1){
                ?>
                <a href="javascript:window.location='index.php?mod=cart_process&act=1&id=<?=$kq['id']?>&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?><?php if(isset($_GET['thanhtoan'])) echo'&thanhtoan=1';?>&qty='+document.getElementById('qty').value"><button class="btn col-xs-12 btn-lg" style="background-color:#F60; color:#FFF"><?=_ORDER?></button></a>
                <?php } ?>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 20px;">

                <h5><i class="fas fa-tag"></i> Tags: <?php foreach ($ds_tags_food as $i){ $tag = selectTag($link,$i['id_tag']) ?> <span id="tag"><?=$tag[$_SESSION['lang'].'_name']?></span><?php } ?></h5>
                <h3>Các sản phẩm liên quan</h3>
                <div class="scrolling-wrapper" style="overflow-x: hidden">
                    <div class="mixedContent">
                        <?php foreach ($ds_food_like as $i) { ?>
                            <div class="contentBox">
                                <a href="?mod=detail&id=<?=$i['id']?>&id_ban=<?=$id_ban?>&name_ban=<?=$name_ban?>&cate=<?=$cate?>"> <img style="" src="img/sp/<?=$i['img_url']?>"></a>
                                <p><?=$i[$_SESSION['lang'].'_name']?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
  <script>
  $(document).ready(function() {
    $("#quantity").keydown(function (e) {
       <?php // Allow: backspace, delete, tab, escape, enter and . ?>
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
       <?php // Ensure that it is a number and stop the keypress ?>
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
  jQuery(document).ready(function(){
      // This button will increment the value
      $('.qtyplus').click(function(e){
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          fieldName = $(this).attr('field');
          // Get its current value
          var currentVal = parseInt($('input[name='+fieldName+']').val());
          // If is not undefined
          if (!isNaN(currentVal)) {
              // Increment
              $('input[name='+fieldName+']').val(currentVal + 1);
          } else {
              // Otherwise put a 0 there
              $('input[name='+fieldName+']').val(0);
          }
      });
      // This button will decrement the value till 0
      $(".qtyminus").click(function(e) {
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          fieldName = $(this).attr('field');
          // Get its current value
          var currentVal = parseInt($('input[name='+fieldName+']').val());
          // If it isn't undefined or its greater than 0
          if (!isNaN(currentVal) && currentVal > 0) {
              // Decrement one
              $('input[name='+fieldName+']').val(currentVal - 1);
          } else {
              // Otherwise put a 0 there
              $('input[name='+fieldName+']').val(0);
          }
      });
  });
  $(document).ready(function () {
      // Init Smooth Div Scroll
      $(".mixedContent").smoothDivScroll({
          hotSpotScrollingStep: 1,
          easingAfterHotSpotScrollingDuration: 450,
          mousewheelScrolling: "allDirections",
          manualContinuousScrolling: true,
          touchScrolling: true,
      });
  });
  </script>
</html>