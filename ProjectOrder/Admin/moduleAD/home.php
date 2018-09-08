
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
</div>
<!-- /.content-wrapper -->


   
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->