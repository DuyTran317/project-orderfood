<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?=_ADD?>
                <small>Slide</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
                <li><a href="danh-sach-slide.html">Slide</a></li>
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
                        <form role="form" method="post" enctype="multipart/form-data" action="process-slide.html">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_NAME?> VN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="vi_tenslide" placeholder="<?=_NAME?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_NAME?> EN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="en_tenslide" placeholder="<?=_NAME?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputFile"><?=_PIC?>:<span style="color:#F00" >(*)</span></label>
                                    <input type="file" id="exampleInputFile" name="image">
                                </div>
                            </div>
                            <label for="exampleInputPassword1"><?=_DESC?> VN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="vi_noidung" name="vi_noidung" rows="10" cols="50">
                                </textarea>
                            </div>
                            <label for="exampleInputPassword1"><?=_DESC?> EN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="en_noidung" name="en_noidung" rows="10" cols="50">
                                </textarea>
                            </div>
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