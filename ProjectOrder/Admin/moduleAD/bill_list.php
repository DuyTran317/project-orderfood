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
                if(isset($_GET['mes'])==1)
                {?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Chúc mừng!</strong> Bạn đã thêm thành công
                    </div>
                <?php }
                ?>
                 <?php
                if(isset($_GET['mes2'])==2)
                {?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Chúc mừng!</strong> Bạn đã sửa thành công
                    </div>
                <?php }
                ?>

                <?php
                if(isset($_GET['mes3'])==3)
                {?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Chúc mừng!</strong> Bạn đã xóa thành công
                    </div>
                <?php }
                ?>

                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã  Hóa Đơn</th>
                                <th>Bàn</th>
                                <th>Tổng Tiền</th>
                                <th>Ngày Xuất</th>
                                <th>Giờ Xuất</th>
                                <th>Thao Tác</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_bill = "select * from of_bill";
                            $i=1;
                            $kq_bill = mysqli_query($link,$sql_bill);
                            while($d_bill=mysqli_fetch_assoc($kq_bill))
                            {
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $d_bill['id'] ?></td>
                               	<td><?= $d_bill['num_table'] ?></td>
                               	<td><?= number_format($d_bill['total']) ?></td>
                               	<td><?= date("d/m/Y", strtotime( $d_bill['date']))?></td> 
                                <td><?= date("H:i:s", strtotime( $d_bill['date']))?></td> 
                                <td><a href="?mod=bill_detail&id=<?= $d_bill['order_id'] ?>&mahd=<?= $d_bill['id'] ?>">Chi Tiết</a>/<a href="?mod=process_bill&mahd= <?= $d_bill['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này!')">Xóa</a></td>
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