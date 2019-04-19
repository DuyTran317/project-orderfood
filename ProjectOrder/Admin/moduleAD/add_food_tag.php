<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?=_ADD?>
                <small>Tag đồ ăn</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
                <li><a href="danh-sach-chung-loai.html"><?=_DEPARTMENT?></a></li>
                <li class="active"><?=_ADD?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="process-de.html">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên món ăn</span></label>
                                    <div class="form-group">
                                        <select class="form-control" name="change"  style="border-radius: 5px 5px 5px 5px;">
                                                <option value="">Tên mòn ăn</option>
                                                <option value="">Tên mòn ăn</option>
                                                <option value="">Tên mòn ăn</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group" >
                                    <label for="exampleInputEmail1">Tag ID</span></label>
                                    <div style=" max-height: 200px; overflow-y: auto;">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 2</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 2</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary"><?=_ADD?></button>
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