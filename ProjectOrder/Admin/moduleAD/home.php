<script src="../jqueryUI/jquery-ui-admin.js"></script>

<?php
	if(isset($_POST['datefrom']))
	{
		$datefrom=$_POST['datefrom'];
		
		//Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
		$d= substr($datefrom,0,2);
		$m= substr($datefrom,3,2);
		$y= substr($datefrom,6,4);
		
		$datefrom="{$y}-{$m}-{$d}";		
	}
	if(isset($_POST['dateto']))
	{
		$dateto=$_POST['dateto'];
		
		//Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
		$d= substr($dateto,0,2);
		$m= substr($dateto,3,2);
		$y= substr($dateto,6,4);
		
		$dateto="{$y}-{$m}-{$d}";
	}
	if(isset($_GET['id_mon']))
	{
		$id_mon=$_GET['id_mon'];		
	}		
?>

<div class="wrapper">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Tổng Quan
        </h1>
        <ol class="breadcrumb">
            <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
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
                        <h3><?php echo $duser; ?></h3>

                        <p>Số bàn hiện có</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="?mod=user_list" class="small-box-footer">Xem chi tiết  <i class="fa fa-arrow-circle-right"></i></a>
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
                        <h3><?php echo $dbill; ?></h3>

                        <p>Số hóa đơn theo tháng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-compose"></i>
                    </div>
                    <a href="?mod=bill_list" class="small-box-footer">Xem chi tiết  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>5</h3>

                        <p>Đánh giá</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-star"></i>
                    </div>
                    <a href="?mod=com_list" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>&nbsp;</h3>

                        <p>Thống kê</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <hr /><hr /><hr />
        <h1 style="font-size: 24px;">Thông Kê Món Ăn</h2>
        <hr />
        <div class="container">
          <div class="row">
           <div class="col-md-11">   
             <div class="box box-primary">
             <div class="box-header with-border">        		                                
                <div class="row">

                		<span style="font-size:16px;margin-left: 15px; "><strong>Chọn Loại:</strong></span>
                        <select id="category_id" onchange="window.location='?mod=home&cid='+this.value" style="margin-top:10px;  width:200px;; font-size:14px; width:300px; margin-left:30px">
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
                                        value="<?=$r['id']?>"><?=$r['name']?>
                                    </option>                           
                                
                                <?php } ?>
                     </select>
                    
                    <span style="font-size:16px; margin-left: 50px; "><strong>Chọn Món:</strong></span>
                    <select style="width:420px; height:30px; font-size:14px; margin-left:20px; "  onchange="window.location='?mod=home&cid=<?=$cid?>&id_mon='+this.value">
                        <?php
								$sql="select `id` from `of_food` where `active`=1 and `category_id`={$cid} order by `id` asc";
								$lay_idmon=mysqli_query($link,$sql);
								$lay_idmon_show=mysqli_fetch_assoc($lay_idmon);
								
								$id_mon = @$_GET['id_mon'];
								if($id_mon=='') $id_mon = $lay_idmon_show['id'];
						
						
                                $sql="select * from `of_food` where `active`=1 and `category_id`={$cid}";
                                $rs_pro=mysqli_query($link,$sql);
								
								if($cid == '') $cid = $r_s['id'];
								
                                while($r_pro=mysqli_fetch_assoc($rs_pro)){
                            ?>
                                                    
                                <option <?php if($r_pro['id']==$id_mon) echo'selected'?>
                                    value="<?=$r_pro['id']?>"><?=$r_pro['name']?>
                                </option>                           
                            
                        <?php } ?>
                    </select>
                </div>
                <hr><br />
                <div class="row center" style="text-align:left; margin-left: 50px; ">
                	<form action="?mod=home&id_mon=<?=$id_mon?>" method="post">
                        <strong>Từ:</strong>  <input type="text" style="margin-right:100px;margin-left:30px" class="datefrom" name="datefrom" id="datefrom" readonly />
                        <strong>Đến:</strong> <input type="text" style="margin-right:70px;margin-left:30px"" class="dateto" name="dateto" id="dateto" readonly />
                        <button type="submit" class="btn btn-success">Tìm Chi Tiết</button>
                    </form>    
                </div>
            </div></div></div></div></div>
                <hr>
                <div class="row">               
                    <div class="col-md-6 col-xs-6 col-sm-6">
                        <label style="font-size:20px; font-weight:bold; margin-top:18px">Tổng Quan</label>
                        <div id="piechart_3d" style="height: 500px;"></div>
                    </div>         
                    <div class="col-md-6 col-xs-6 col-sm-6">
                        <section class="content">
                        <label style="font-size:20px; font-weight:bold;">Chi Tiết</label>
                            <div class="row">
                                <div class="col-xs-12">
                    
                                    <div class="box">
                    
                                        <div class="box-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên Thể Loại</th>
                                                    <th>Số Lượng</th>
                                                    <th>Ngày</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                    
                                                @$sql_cat = "select *,c.`name` as ten_mon, b.`qty` as sl_mon, a.`date` as ngay from `of_bill` as a, `of_order_detail` as b, `of_food` as c where a.`order_id` = b.`order_id` and b.`food_id` = c.`id` and a.`date` <= '{$dateto}' and a.`date` >= '{$datefrom}' and c.`id` = {$id_mon}";
                                                $i=1;
                                                $kq_cat = mysqli_query($link,$sql_cat);
                                                while($d_cat=mysqli_fetch_assoc($kq_cat))
                                                {
                                                ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>                                
                                                    <td><?= $d_cat['ten_mon'] ?></td> 
                                                    <td><?= $d_cat['sl_mon'] ?></td>                                
                                                    <td><?= date('d/m/Y H:i:s',strtotime($d_cat['ngay']))?></td>                                                             
                                                </tr>
                                                <?php } ?>
                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                    	</section>
               		</div>
                    </div>     
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

