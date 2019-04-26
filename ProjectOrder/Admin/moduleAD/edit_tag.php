<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?=_EDIT?>
                <small>Tag</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
                <li><a href="danh-sach-tag.html">Tag</a></li>
                <li class="active"><?=_EDIT?></li>
            </ol>
        </section>
        <?php
        if(isset($_GET['edit'])) {
            $edit = $_GET['edit'];

        }
        $sql_edit = "select * from of_tag where id=$edit";
        $kq_edit = mysqli_query($link,$sql_edit);
        $d_edit=mysqli_fetch_assoc($kq_edit);
         
        ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="process-tag.html">
                            <input type="hidden" value="<?= $d_edit['id']?>" name="id">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_NAME?> VN: <span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                           required  name="edit_vi_tag" value = "<?= $d_edit['vi_name'] ?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_NAME?> EN: <span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                           required  name="edit_en_tag" value = "<?= $d_edit['en_name'] ?>">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="edit_tag" class="btn btn-primary"><?=_EDIT?></button>
                                <button type="reset" class="btn btn-defaul"><?=_RESET?></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- ./wrapper -->