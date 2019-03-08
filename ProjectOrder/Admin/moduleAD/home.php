<script src="../jqueryUI/jquery-ui-admin.js"></script>

<?php
	if(isset($_POST['datefrom']))
	{
		$datefrom=$_POST['datefrom'];
		
		//Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
		$d= substr($datefrom,0,2);
		$m= substr($datefrom,3,2);
		$y= substr($datefrom,6,4);
		
		$datefrom="{$y}-{$m}-{$d} 00:00:00";		
	}
	if(isset($_POST['dateto']))
	{
		$dateto=$_POST['dateto'];
		
		//Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
		$d= substr($dateto,0,2);
		$m= substr($dateto,3,2);
		$y= substr($dateto,6,4);
		
		$dateto="{$y}-{$m}-{$d} 23:59:59";
	}
	if(isset($_GET['id_mon']))
	{
		$id_mon=$_GET['id_mon'];		
	}		
?>

<div class="wrapper" style="top: -20px;">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Tổng Quan
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li class="active">Tổng quan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <?php 

                        $sqluser = "select * from of_user";
                        $kquser = mysqli_query($link,$sqluser);
                        $duser = mysqli_num_rows($kquser);
                        ?>
                        <h3 id="value" style="color: white"><?php echo $duser; ?></h3>
                        
                        <p>Số bàn hiện có</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="danh-sach-ban.html" class="small-box-footer">Xem chi tiết  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <?php 
                        $sqlbill = "select * from of_bill where active = 1";
                        $kqbill= mysqli_query($link,$sqlbill);
                        $dbill = mysqli_num_rows($kqbill);
                        ?>
                        <h3 id="value1" style="color: white"><?php echo $dbill; ?></h3>

                        <p>Số hóa đơn theo tháng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-compose"></i>
                    </div>
                    <a href="danh-sach-hoa-don.html" class="small-box-footer">Xem chi tiết  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                    	<?php 
                        $sqlrate = "select * from of_rate where active = 1";
                        $kqrate= mysqli_query($link,$sqlrate);
                        $drate = mysqli_num_rows($kqrate);
                        ?>
                        <h3 id="value2" style="color: white"><?php echo $drate; ?></h3>

                        <p>Đánh giá</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-star"></i>
                    </div>
                    <a href="danh-sach-danh-gia.html" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <?php 
                        $sqlbill1 = "select * from `of_discount` where active = 1";
                        $kqbill1= mysqli_query($link,$sqlbill1);
                        $dbill1 = mysqli_num_rows($kqbill1);
                        ?>
                        <h3 id="value3" style="color: white"><?php echo $dbill1; ?></h3>

                        <p>Mục Khuyến Mãi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                    </div>
                    <a href="danh-sach-khuyen-mai.html" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->       

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <h1 style="font-size: 24px; font-weight: bold">Thống Kê Món Ăn</h1>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <span style="font-size:16px;margin-left: 15px; "><strong>Chọn Loại:</strong></span>
                            <select id="category_id" onchange="window.location='index.php?mod=home&cid='+this.value" style="margin-top:10px; font-size:14px; margin-left:10px;width: 300px; ">
                                <?php
                                $sql="select `id` from `of_category` where `active`=1 order by `id` asc";
                                $rs_s=mysqli_query($link,$sql);
                                $r_s=mysqli_fetch_assoc($rs_s);

                                $cid = @$_GET['cid'];
                                if($cid == '') $cid = $r_s['id'];


                                $sql="select * from `of_category` where `active`=1 order by `order` asc";
                                $rs=mysqli_query($link,$sql);
                                while($r=mysqli_fetch_assoc($rs)){
                                    ?>

                                    <option <?php if($r['id']==$cid) echo'selected'?>
                                            value="<?=$r['id']?>"><?=$r['vi_name']?>
                                    </option>

                                <?php } ?>
                            </select>
                            <br><br>
                            <span style="font-size:16px; margin-left: 15px; "><strong>Chọn Món:</strong></span>
                            <select style=" font-size:14px; margin-left:10px;width: 300px; "  onchange="window.location='index.php?mod=home&cid=<?=$cid?>&id_mon='+this.value" >
                                <?php
                                $sql="select `id` from `of_food` where `active` !=0 and `category_id`={$cid} order by `id` asc";
                                $lay_idmon=mysqli_query($link,$sql);
                                $lay_idmon_show=mysqli_fetch_assoc($lay_idmon);

                                $id_mon = @$_GET['id_mon'];
                                if($id_mon=='') $id_mon = $lay_idmon_show['id'];


                                $sql="select * from `of_food` where `active` !=0 and `category_id`={$cid}";
                                $rs_pro=mysqli_query($link,$sql);

                                if($cid == '') $cid = $r_s['id'];

                                while($r_pro=mysqli_fetch_assoc($rs_pro)){
                                    ?>

                                    <option <?php if($r_pro['id']==$id_mon) echo'selected'?>
                                            value="<?=$r_pro['id']?>"><?=$r_pro['vi_name']?>
                                    </option>

                                <?php } ?>
                            </select>
                            <br><br>
                            <div  STYLE="margin-left: 15px;">
                                <form action="index.php?mod=home&id_mon=<?=$id_mon?>&cid=<?=$cid?>" method="post">    
                                    <div class="box-body">
                                      <!-- Date -->
                                      <div class="form-group">
                                        <label>Từ Ngày:</label>

                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control pull-right datefrom" id="datepicker" readonly="" name="datefrom" style="background-color:#FFF">
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                      <!-- /.form group -->
                                    </div>
                                     <div class="box-body">
                                      <!-- Date -->
                                      <div class="form-group">
                                        <label>Đến ngày:</label>

                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control pull-right dateto" id="datepicker1" readonly="" name="dateto" style="background-color:#FFF">
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                      <!-- /.form group -->
                                    </div>
                                    <button type="submit" class="btn btn-success">Tìm Chi Tiết</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-7">
                    <h1 style="font-size: 24px; font-weight: bold">Chi Tiết</h1>
                    <div class="box box-primary">
                        <div class="box-body">

                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Thể Loại</th>
                                    <th>Số Lượng</th>
                                    <th>Ngày</th>
                                    <th>Giờ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                @$sql_cat = "select *,c.`vi_name` as ten_mon, b.`qty` as sl_mon, a.`date` as ngay from `of_bill` as a, `of_order_detail` as b, `of_food` as c where a.`order_id` = b.`order_id` and b.`food_id` = c.`id` and a.`date` <= '{$dateto}' and a.`date` >= '{$datefrom}' and c.`id` = {$id_mon}";
                                $i=1;
                                $kq_cat = mysqli_query($link,$sql_cat);
                                while($d_cat=mysqli_fetch_assoc($kq_cat))
                                {
                                    ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d_cat['ten_mon'] ?></td>
                                        <td><?= $d_cat['sl_mon'] ?></td>
                                        <td><?= date('d/m/Y',strtotime($d_cat['ngay']))?></td>
                                        <td><?= date('H:i:s',strtotime($d_cat['ngay']))?></td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h1 style="font-size: 24px; font-weight: bold">Tổng Quan</h1>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
 </div>
<!-- ./wrapper -->
 
<?php
    if(isset($_POST['datefrom']))
    {
        $datefrom=$_POST['datefrom'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($datefrom,0,2);
        $m= substr($datefrom,3,2);
        $y= substr($datefrom,6,4);
        
        $fdatefrom="{$d}/{$m}/{$y}";     
    }
    if(isset($_POST['dateto']))
    {
        $dateto=$_POST['dateto'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($dateto,0,2);
        $m= substr($dateto,3,2);
        $y= substr($dateto,6,4);
        
        $fdateto="{$d}/{$m}/{$y}";

    }   
?> 
 
<script src="../lib/chartJS/canvasjs.min.js"></script>  
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		fontSize: 22,
		fontFamily: "Verdana",		
		text: "Các Món Bán Chạy Nhất Của Mặt Hàng"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		
		indexLabel: "{label} {y}",
		dataPoints: [
		<?php
		  	$sql="select `vi_name`, `solve` from `of_food` where `category_id` = {$cid} order by `solve` desc limit 0,5";
			$kq=mysqli_query($link,$sql);
			while($k=mysqli_fetch_assoc($kq)){
		 ?>
			{y: <?=$k['solve']?>, label: "<?=$k['vi_name']?>, SL:"},
		<?php } ?>
		]
	}]
});
chart.render();

}
function animateValue(id, start, end, duration) {
        var range = end - start;
        var current = start;
        var increment = end > start? 1 : -1;
        var stepTime = Math.abs(Math.floor(duration / range));
        var obj = document.getElementById(id);
        var timer = setInterval(function() {
            current += increment;
            obj.innerHTML = current;
            if (current == end) {
                clearInterval(timer);
            }
        }, stepTime);
    }

    animateValue("value", -1,<?php echo $duser; ?> , 1000);
    animateValue("value1", -1,<?php echo $dbill; ?> , 1000);
    animateValue("value2", -1,<?php echo $drate; ?> , 1000);
    animateValue("value3", -1,<?php echo $dbill1; ?> , 1000);
</script>  