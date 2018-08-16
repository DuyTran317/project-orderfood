<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách
            <small>Đánh Giá</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="?mod=com_list">Đánh giá</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
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
                                <th>Tên Khách Hàng</th>
                                <th>Bình Luận</th>
                                <th>Đánh Giá</th>
                                <th>Trạng Thái</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_cat = "select * from of_rate";
                            $i=1;
                            $kq_cat = mysqli_query($link,$sql_cat);
                            while($d_com=mysqli_fetch_assoc($kq_cat))
                            {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d_com['customer_name'] ?></td>
                                    <td><?= $d_com['desc'] ?></td>
                                    <td><?= $d_com['star'] ?></td>
                                    <td><?php if($d_com['active']==1)
                                        {
                                            echo "Hiện";
                                        }else
                                        {
                                            echo "Ẩn";
                                        }
                                        ?></td>
                                    <td><a href="?mod=process_com&del=<?= $d_com['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa');">Xóa</a></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên Khách Hàng</th>
                                <th>Bình Luận</th>
                                <th>Đánh Giá</th>
                                <th>Trạng Thái</th>
                                <th>Xóa</th>
                            </tr>
                            </tfoot>
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