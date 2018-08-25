<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách
            <small>Bếp - Thanh Toán</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?mod=home"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="?mod=kit_list">Bếp - Thanh Toán</a></li>
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
                                <th>Account</th>
                                <th>Tên</th>
                                <th>Trạng Thái</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_user = "select * from of_manage";
                            $i=1;
                            $kq_user = mysqli_query($link,$sql_user);
                            while($d_user=mysqli_fetch_assoc($kq_user))
                            {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d_user['account'] ?></td>
                                    <td><?= $d_user['name'] ?></td>
                                    <td><?php if($d_user['active']==0) {echo "<a href=\"?mod=process_kit&actives={$d_user['id']}\" data-toggle=\"tooltip\" title=\"Ẩn\">X</a>";}
                                        else
                                        {
                                            echo "<a href=\"?mod=process_kit&activeh={$d_user['id']}\"><i class=\"fa fa-eye\" data-toggle=\"tooltip\" title=\"Hiện\"></i></a>";
                                        }
                                        ?></td>
                                    <td><a href="?mod=edit_kit&edit=<?= $d_user['id'] ?>">Sửa</a></td>
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