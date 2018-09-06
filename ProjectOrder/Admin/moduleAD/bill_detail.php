<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách
            <small>Hóa Đơn</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="">Thể Loại</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
               <?php 
			   $id=$_GET['id'];
			   $mahd=$_GET['mahd'];
			    ?>
	
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Hóa Đơn</th>
                                <th>Tên Món Ăn</th>
                                <th>Giá Tiền</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_bill = "select * from `of_order_detail` as A , `of_food` as B Where A.`food_id`=B.`id` and A.`order_id`={$id}";
                            $i=1;
                            $kq_bill = mysqli_query($link,$sql_bill);
                            while($d_bill=mysqli_fetch_assoc($kq_bill))
                            {
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $mahd ?></td>
                               	<td><?= $d_bill['name'] ?></td>
                               	<td><?= number_format($d_bill['price']) ?></td>
                                <td><?= $d_bill['qty'] ?></td>
                                <td><?= number_format($d_bill['price']*$d_bill['qty']) ?></td>
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->