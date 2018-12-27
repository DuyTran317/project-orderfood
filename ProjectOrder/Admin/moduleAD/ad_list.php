<?php if(isset($_SESSION['sua'] )== 'suathanhcong') {
            echo "<script type='text/javascript'>";
            echo "setTimeout(function () { swal('Sửa Thành Công',
                          'Bạn sửa thành công',
                          'success');";
            echo "},1);</script>";
        }?>
<!-- Content Wrapper. Contains page content -->
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách
            <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="danh-sach-admin.html">Admin</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Account</th>
                                <th>Tên</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_user = "select * from of_admin";
                            $i=1;
                            $kq_user = mysqli_query($link,$sql_user);
                            while($d_user=mysqli_fetch_assoc($kq_user))
                            {
                                $a = $d_user['id'];
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d_user['account'] ?></td>
                                    <td><?= $d_user['name'] ?></td>
                                    <td ><a href="edit_ad-<?=$d_user['id']?>.html" style="<?php if($cate != 1 && $d_user['cate'] ==1 ){ echo "display: none; "; } ?>" >Sửa</a></td>
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
<?php unset($_SESSION['sua']); 
unset($_SESSION['them']); ?>