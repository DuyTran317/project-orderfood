<!-- Content Wrapper. Contains page content -->
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=_LIST?>
            <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i> <?=_HOME?></a></li>
            <li><a href="danh-sach-admin.html">Admin</a></li>
            <li class="active"><?=_LIST?></li>
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
                                <th>#</th>
                                <th><?=_ACCOUNT?></th>
                                <th><?=_NAME?></th>
                                <th><?php if($_SESSION['catead'] == 1){ echo '<a href="them-quan-tri-vien.html">'; echo _ADD ; echo '</a>';}else echo _EDIT; ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $d = getFectch($link,'of_admin');
                            foreach($d as $d_user){
                                $a = $d_user['id'];
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d_user['account'] ?></td>
                                    <td><?= $d_user['name'] ?></td>
                                    <td ><a href="edit_ad-<?=$d_user['id']?>.html" style="<?php if($cate != 1 && $d_user['cate'] ==1 ){ echo "display: none; "; } ?>" ><?=_EDIT?></a></td>
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