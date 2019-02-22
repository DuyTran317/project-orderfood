
<script src="lib/notice.js"></script>
<?php
	if(! isset($_SESSION['admin_id']))
	{
		header("location:?mod=dangnhap");	
	}
	$sobanmontrung=5;
?>
<!--Reload Page-->
<meta http-equiv="refresh" content="number;url=http://localhost/project-orderfood/ProjectOrder/admin.php?mod=home">
<script src="lib/pusher.min.js"></script>
  <script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('161363aaa8197830a033', {
      cluster: 'ap1',
      encrypted: true
    });
    var channel = pusher.subscribe('Reload');
    // chanel trùng voi chanel trong send.php
    channel.bind('reloadbep', function () {
		
        //code xử lý khi có dữ liệu từ pusher
		 window.location.reload();
        // kết thúc code xử lý thông báo
    });
</script>
<style>
 table.dataTable{
	 border-collapse:collapse;
 }
 .sidenav {
     height: 100%;
     width: 0;
     position: fixed;
     z-index: -99!important;
     top: 0;
     right: 0;
     background-color: white;
     overflow-x: hidden;
     transition: 0.5s;
     padding-top: 4.8%;
     border-right:  lightgrey thin solid;
 }
.active {
     width: 280px;
 }
.main-active{
    margin-left: 280px;
}
 .sidenav a {
     padding: 8px 8px 8px 32px;
     text-decoration: none;
     font-size: 25px;
     color: #818181;
     display: block;
     transition: 0.3s;
 }

 .sidenav a:hover {
     color: #f1f1f1;
 }
 .toggle-bars:before{
     content: "\2630";
 }
 .toggle-X:before{
     content: "\2613";
 }

 @media screen and (max-height: 450px) {
     .sidenav {padding-top: 15px;}
     .sidenav a {font-size: 18px;}
 }
 #main {
     transition: margin-left .5s;
     z-index: 1;
 }
 .expand {
     bottom: 125px;
     margin-left: -32px;
     margin-right: 16px;
     pointer-events: none;
     position: relative;
 }

</style>
<body style="font-family: 'Anton', sans-serif; " onLoad="startTime()">
    <div  id="background-toggle"></div>
    <div class="container-fluid " >
        <div class="row" style="background-color: #00adb5; padding: 5px;">
            <div class="col-xs-5">
                <span style="font-size:25px;cursor:pointer;  color: white ;"  id="menu-toggle"><span class="toggle-bars" id="toggle-bars" style="vertical-align: top; "></span> Món Trùng</span>
            </div>
            <div class="col-xs-2" align="center" style="background-color: #e3fdfd; border-radius: 5px">
                <span style="font-size:25px ;"  id="txt"></span>
            </div>
            <div class="col-xs-5" style="text-align: right">
                <div ><a href="?mod=order_history" class="btn" style="font-size:25px;text-decoration:none; background-color: #e3fdfd; border-radius: 5px; padding: 5px;"> <i class="fas fa-history"></i></a> <a href="?mod=ds_food" class="btn" style="font-size:25px;text-decoration:none; background-color: #e3fdfd; border-radius: 5px; padding: 5px;"> <i class="fas fa-cog"></i></a></div>
            </div>
        </div>
        <div class="row" id="main">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--<p style="text-align:center"><a href="?mod=home"><button class="btn btn-success">Làm Mới</button></a></p>-->
            </div>
            <div class="col-sm-12" style="margin-top: 2%">
                <div class="grid"  >
                    <div class="gutter-sizer"></div>

                     <?php 
					 $temp = 0;$idbandau=0;$idbancuoi=0;$sql_montrung="";$bandau = 0; $bancuoi = 0;
					 setcookie("idbancuoi",0,time()+86400);
					 
					$sql = "select *, a.`id` as idorder, a.`num_table` as numtable from `of_order` as a, `of_order_detail` as b, `of_food` as c, `of_category` as d, `of_department` as e where a.`id`=b.`order_id` and b.`food_id`=c.`id` and c.`category_id`=d.`id` and d.`department_id`=e.`id` and a.`active`=2 and b.`active`=2 and e.`solve_department`={$_SESSION['admin_id']} GROUP BY b.`order_id`";
				
					$rs=mysqli_query($link,$sql);

					/*Dynamic colours*/
                     $colour = array("#f6d55c", "#fe5f55", "#3caea3", "#20639b", "#2e4057" ,"#f29924", "#c99789", "#99641e" ,"#536878", "#aa96da","#4d648d");
                     $i=0;
                     while($r1=mysqli_fetch_assoc($rs))
					 {
                         if ($i<count($colour)-1) {
                             $i++;
                         }
                         else $i=0;
						$id = $r1['idorder'];
						if($temp == 0)
						{ 
							$sql_bancuoi = "select Max(a.`id`) as idmax from `of_order` as a, `of_order_detail` as b, `of_food` as c, `of_category` as d, `of_department` as e where a.`id`=b.`order_id` and b.`food_id`=c.`id` and c.`category_id`=d.`id` and d.`department_id`=e.`id` and a.`active`=2 and e.`solve_department`={$_SESSION['admin_id']}";
							$r_bancuoi = mysqli_query($link,$sql_bancuoi);
							$rs_bancuoi=mysqli_fetch_assoc($r_bancuoi);
							$idbandau = $r1['idorder'];$bandau=$r1['numtable'];
							
							if($rs_bancuoi['idmax']>$idbandau+$sobanmontrung) $idbancuoi=$idbandau+$sobanmontrung;
							else $idbancuoi=$rs_bancuoi['idmax'];
							
							if(!isset($_COOKIE['idbancuoi']) || $_COOKIE['idbancuoi']<$idbandau)
							{
							   setcookie("idbancuoi",$idbancuoi,time()+86400);
							   header("location:?mod=home");	
							}
						}
						if($r1['idorder'] == $_COOKIE['idbancuoi']) $bancuoi = $r1['numtable'];
						
					$num_table = $r1['numtable'];
			 		?>

                    <div class="grid-item panel"  style=" border-bottom: solid  <?=$colour[$i]?> 5px;" id="sample<?=$i?>">
                        <div class="panel-heading " style="background-color: <?=$colour[$i]?>" id="order-toggle<?=$i?>">
                            <h3 style="color: white">&nbsp;BÀN <?=$num_table?> <span style="float: right"><?=date('H:i',strtotime($r1['date']))?></span> </h3>
                        </div>
                        <div class="panel-body" style="border: solid lightgrey thin; max-height: 550px; overflow-y: auto;">
                        <table class="table no-border">

                             <?php 
					$sql2="select a.*,b.`vi_name` as ten, a.`food_id` as id_food from `of_order_detail` as a, `of_food` as b, `of_category` as c, `of_department` as d where a.`food_id`=b.`id` and b.`category_id`=c.`id` and c.`department_id`=d.`id` and a.`active`=2 and d.`solve_department`={$_SESSION['admin_id']} and a.`order_id`={$id} GROUP BY a.`id`";
	             	$rs1=mysqli_query($link,$sql2);
					if($temp==0) $sql_montrung = "select b.`vi_name`,SUM(qty) as qty_sum from `of_order_detail` as a, `of_food` as b where a.`food_id` = b.`id` and a.`active`=2 and a.`order_id`>={$idbandau} and a.`order_id`<={$_COOKIE['idbancuoi']} and (a.food_id=0";
					$total=0;
					while($r=mysqli_fetch_assoc($rs1))
					{

						if($temp==0) $sql_montrung.=" or a.food_id = {$r['food_id']}";
					?>
                            <tr style="border-bottom: dashed grey thin;">
                                <td><?=$r['qty']?> x <?=$r['ten']?></td>
                                <td><a href="?mod=solve_order_finish&id=<?=$r['id_food']?>&idorder=<?=$id?>&num_table=<?=$num_table?>&qty=<?=$r['qty']?>" class="btn btn-success"><i class="fas fa-check"></i></a></td>
                                
                            </tr>
                            <?php
							 $total += $r['price']*$r['qty'];
					} ?>
                        </table>
                         <?php 
					
				$sql="SELECT `note` FROM `of_note_order` as a , `of_order` as b WHERE  a.`order_id`=b.`id` and b.`num_table`={$num_table} and a.`active`=2";
				$rs2 = mysqli_query($link,$sql);
				$xacnhan = mysqli_num_rows($rs2);
				 
				?>
                        <p>Chú Thích:</p> <?php
					if($xacnhan > 0 )
					{
					    echo "<div style='background-color: #f9f9f9; padding: 5px; border-radius: 5px; color: red'>";
                        while($r2=mysqli_fetch_assoc($rs2))
                        {

                            echo $r2['note'];

                            echo "<br>";
                        }
                        echo "</div>";
					}
					if($temp==0) $sql_montrung.=") GROUP BY a.`food_id` ORDER BY a.`id` ASC";
					$temp=1;
                    ?>
                        <?php /*?><a href="?mod=solve_order&orderID=<?=$id?>&num_table=<?=$num_table?>&total=<?=$total?>"><button class="col-xs-12 btn btn-success btn-lg">Hoàn Tất</button></a><?php */?>
                    </div>
                    </div>
                         <script>

                             $("#order-toggle<?=$i?>").click(function(e) {
                                 e.preventDefault();
                                 /*
                                 var x = localStorage.getItem("hello");
                                 localStorage.setItem("hello", " ");
                                 if(x==" "){
                                     localStorage.setItem("hello", "grid-active");
                                 }*/

                                 $("#sample<?=$i?>").toggleClass("grid-active");
                                 $("#background-toggle").toggleClass("background-active");
                             });
                             $("#background-toggle").click(function(e) {
                                 e.preventDefault();

                                 $("#sample<?=$i?>").removeClass("grid-active");
                                 $("#background-toggle").removeClass("background-active");
                             });
                         </script>

                   <?php
				   } 
				   
				   ?>

              </div>
            </div>
            <div id="mySidenav" class="sidenav">
                <?php
                @$r_montrung = mysqli_query($link,$sql_montrung);
                if(!empty($r_montrung )){?>
                    <div class="grid-item2 panel">
                        <div class="panel-heading" style="background-color: #00adb5">
                            <h3 style=" text-align:center; color: white">Danh Sách Món Trùng</h3>
                        </div>

                        <?php if($temp==1){ ?>
                        <div class="panel-body" style="border: solid lightgrey thin;">
                            <table class="table no-border">
                                <?php
                                if($sql_montrung!="")
                                {
                                    $r_montrung = mysqli_query($link,$sql_montrung);
                                    while($rs_montrung=mysqli_fetch_assoc($r_montrung))
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $rs_montrung['qty_sum']?> x <?= $rs_montrung['vi_name']?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="table-responsive"></div>
            <?php /*?><table class="col-md-12 col-sm-12 col-xs-12 table-bordered" id="datatable" style="text-align:center; margin-top:15px; overflow-x: scroll">
              <thead>
              <tr align="center" bgcolor="#FFFFCC">
                <td><h4><strong>STT</strong></h4></td>
                <td><h4><strong>Số Bàn</strong></h4></td>
                <td><h4><strong>Trạng Thái</strong></h4></td>
                <td><h4><strong>Kiểm Tra</strong></h4></td>
              </tr>
              </thead>
              <?php
                $sql = "SELECT * from `of_order` where `active`=2";
                $rel = mysqli_query($link,$sql);
                $i=1;
                while($re = mysqli_fetch_assoc($rel))
                {
              ?>
              <tr>
                <td align="center"><h5>
                  <?=$i++?>
                </h5></td>
                <td align="center"><h5>&nbsp;&nbsp;
                  Bàn Số: <span style="color: red; font-size: 24px;"><?=$re['num_table']?></span>
                </h5></td>
                <td align="center"><h5>
                  <?php
                    echo"Đang chờ xử lý";
                  ?>
                </h5></td>
                <td align="center"><h5>
                  <a href="?mod=check_order&id=<?=$re['id']?>&num_table=<?=$re['num_table']?>">Xem</a>
                </h5></td>
              </tr>
              <?php } ?>
            </table><?php */?>
        </div>
    </div>
</body>
<?php
$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
?>
<style>

    .grid {
        max-width: 100%;

    }

    .grid-item {
        position: absolute;
        width: 24%;
        margin-bottom: 1%;
        transition: 0.5s;
        cursor: pointer;
    }
    .grid-item2 {
        width: 100%;
        max-height:90%;
        overflow-y: auto;
        background-color: white;
        border-radius: 5px;
        transition: 0.5s;
        border-bottom: solid #00adb5 5px;

    }
    .gutter-sizer { width: 1%; }
    .grid-item:hover{
        transform: scale(1.001);
        -webkit-box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        z-index: 90;
    }
    .grid-item2:hover{
        transform: scale(1.001);
        -webkit-box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        box-shadow: 3px 3px 22px -1px rgba(0,0,0,0.75);
        z-index: 90;
    }
    .grid-active{
        position: fixed !important;
        left: 35% !important;
        top: 8% !important;
        right: 35% !important;;
        z-index: 99 !important;
    }
    .background-active{
        background-color: rgba(0,0,0,0.7); position: fixed; width: 100%; height: 100%; z-index: 98;
    }
</style>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#mySidenav").toggleClass("active" , 1000);
        $("#main").toggleClass("main-active" , 1000);
        $("#toggle-bars").toggleClass("toggle-bars toggle-X" , 1000);
    });


    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    $('.grid').masonry({
        // options
        columnWidth: '.grid-item',
        gutter: '.gutter-sizer',
        itemSelector: '.grid-item',
        percentPosition: true,
    });
</script>

<script>
	$(document).ready(function(){    	
		$('#datatable').DataTable( {
   			 language: {
        		url: 'lib/datatable/Vietnamese.json'
    		}
		});
    });
	
	
    
</script>