<script src="../jqueryUI/jquery-ui-admin.js"></script>

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
                    <a href="?mod=order_list" class="small-box-footer">Xem chi tiết  <i class="fa fa-arrow-circle-right"></i></a>
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

    </section>
    <!-- /.content -->
   
    <div class="container">
    	<div class="row" style="text-align:center">
            <select style="width:500px; height:30px; font-size:18px;">
            	<option>Số Hóa Đơn</option>
                <option>Số Món Ăn</option>
            </select>
        </div>
        <hr>
    	<div class="row" style="text-align:center">
        	Từ:  <input type="text" style="margin-right:25px" class="datefrom" readonly />
            Đến: <input type="text" style="margin-right:25px" class="dateto" readonly />
            <button class="btn btn-success">Tìm</button>
        </div>
        <hr>
        <div class="row">
       
        	<div class="col-md-6 col-xs-12 col-sm-6">
            	<label style="font-size:20px; font-weight:bold; color:#900">Tổng Quan</label>
            	<div id="piechart_3d" style="height: 500px;"></div>
            </div>
            
            <div class="col-md-6 col-xs-12 col-sm-6">
            	<a href="" class="btn btn-primary" style="font-size:16px;"> &gt;&gt; Xem Chi Tiết &lt;&lt;</a>
            	<div id="curve_chart" style="height: 500px"></div>
            </div>
        </div>
    </div>
    
</div>
<!-- /.content-wrapper -->
    
</div>
<!-- ./wrapper -->

<script>
	$( function() {
		<!--Config DatePicker Bootstrap-->
		$.fn.datepicker.dates['en'] = {
			days: ["Chủ Nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
			daysShort: ["Chủ Nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
			daysMin: ["CN", "T.2", "T.3", "T.4", "T.5", "T.6", "T.7"],
			months: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
			monthsShort: ["Th.1", "Th.2", "Th.3", "Th.4", "Th.5", "Th.6", "Th.7", "Th.8", "Th.9", "Th.10", "Th.11", "Th.12"],
			titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
			weekStart: 0
		};
		
		$( ".datefrom" ).datepicker({
			format:'dd/mm/yyyy',			
		});
		$( ".dateto" ).datepicker({
			format:'dd/mm/yyyy',
		});
  } );
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Task', 'Hours per Day'],
	  ['Work',     11],
	  ['Eat',      2],
	  ['Commute',  2],
	  ['Watch TV', 2],
	  ['Sleep',    7]
	]);

	var options = {
	  title: 'Aegona Company',
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
	chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Year', 'Sales', 'Expenses'],
	  ['2004',  1000,      400],
	  ['2005',  1170,      460],
	  ['2006',  660,       1120],
	  ['2007',  1030,      540]
	]);

	var options = {
	  title: 'Company Performance',
	  curveType: 'function',
	  legend: { position: 'bottom' }
	};

	var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

	chart.draw(data, options);
  }
</script>