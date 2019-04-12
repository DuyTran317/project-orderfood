<script src="lib/notice.js"></script>
<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	if( isset($_GET['cid']))
	{
		$cid= $_GET['cid'];
	}
	else
	{
		$r_s = selectWithCondition_AcOrByOrAsc($link, 'of_category');								
		$cid = $r_s['id'];
	}
?>
<style>
 table.dataTable{
	 border-collapse:collapse;
 }
</style>
<body style="background-image:url(img/front/pexels-photo-1323712.jpeg); background-size: cover; font-family: 'Anton', sans-serif;">
    <div class="container">
        <div class="row"  style="background-color: #FFF; margin-top: 5%; border-radius: 15px; padding: 20px;">
        	<a href="?mod=home" style="font-size:36px; color: black"><i class="fas fa-arrow-left"></i></a>
            
            <div style="clear:right"></div>
            
            <div style="padding-bottom:25px; padding-top:25px" class="col-md-12 col-sm-12 col-xs-12">
                <!--<p style="text-align:center"><a href="?mod=home"><button class="btn btn-success">Làm Mới</button></a></p>-->
                <h2 style=" text-align:center;">Quản Lý Món Ăn</h2>
                <div style="text-align:center; color:#066"><span style="color:#000; font-size:24px; color:#333">Chọn Loại:&nbsp;</span>
                <select id="category_id" onChange="window.location='?mod=ds_food&cid='+this.value" style="width:200px;; font-size:20px; margin-top:10px">
  							<?php
  								$r_s = selectWithCondition_AcOrByOrAsc($link, 'of_category');
  								$cid = @$_GET['cid'];
                  if($cid == '') $cid = $r_s['id'];                                              
  								$select = selectWithConditionArray_AcOrByOrAsc($link, 'of_category');
  								foreach($select as $r){
                      ?>
                      <option <?php if($r['id']==$cid) echo'selected'?>
                         value="<?=$r['id']?>"><?=$r['vi_name']?>
                      </option>                           
                              
                  <?php } ?>
              	</select>
                </div>
                
            </div>
            <div class="table-responsive"></div>
            <table class="col-md-12 col-sm-12 col-xs-12 table-bordered" id="datatable" style=" margin-top:15px; overflow-x: scroll">
              <thead>
              <tr style="font-size:20px">
                <td align="center">STT</td>
                <td>Tên Món</td>
                <td align="center">Trạng Thái</td>
              </tr>
              </thead>
              <?php
                $i=1;
				$take = selectWithCondition_CateID($link, 'of_food', $cid);
				foreach($take as $re){
              ?>
              <tr>
                <td align="center" style="color:#906">
                  <?=$i++?>
                </td>
                <td align="left">&nbsp;&nbsp;
                  <span style=" font-size: 18px;"><?=$re['vi_name']?></span>
                </td>
                <td align="center"><h5>
				  <!--act == 0 ngừng kinh doanh  == 1 đang kinh doanh, còn món  == 2 đang kinh doanh, hết món-->
                    <select id="<?=$re['id'] ?>" name='status' onChange="ChangeStatus(<?=$re['id'] ?>);" <?php if($re['active']==2) echo "style='color:#F00'";
                    if($re['active']==0) echo "style='color:#000'"; if($re['active']==1) echo "style='color:#096'";?>>
							<option id="option1" style="color:#000" value='0' <?php if($re['active']==0) echo "selected"; ?>>ngừng kinh doanh</option>
							<option id="option2" style="color:#096" value='1' <?php if($re['active']==1) echo "selected"; ?>>còn món</option>
							<option id="option3" style="color:#F00" value='2' <?php if($re['active']==2) echo "selected"; ?>>hết món</option>
						</select>
                </h5></td>
              </tr>
              <?php } ?>
            </table><br>
           <a href="?mod=reload_menu&cid=<?=$cid?>" style="color:black; "> <button class="col-xs-12 btn btn-lg btn-info"  >Cập Nhật Menu</button></a>
            <button id="cc">CC</button>
        </div>
        
    </div>
</body>
<script>

	$(document).ready(function(){    	
		$('#datatable').DataTable( {
   			 language: {
        		url: 'lib/datatable/Vietnamese.json'
    		}
		});	
    	});
	
	function ChangeStatus(id){
		var active = document.getElementById(id).value;
		$.ajax({
			url:'module/back/ajax.php',
			type:'POST',
			data:{id: id, active: active, ChangeActiveFood: 1}
			}).done(function(data){

				});
		if(active == 0){
            $( "#"+id ).css("color","black");
        }
        if(active == 1){
            $( "#"+id ).css("color","#096");
        }
        if(active == 2){
            $( "#"+id ).css("color","#F00");
        }
	};
</script>