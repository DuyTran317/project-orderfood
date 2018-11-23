<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Thêm
                <small>Slide</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li><a href="danh-sach-slide.html">Slide</a></li>
                <li class="active">Thêm</li>
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
                                    <label for="exampleInputEmail1">Tên Slide VN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="vi_tenslide" placeholder="Nhập tên thể loại">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Slide EN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="en_tenslide" placeholder="Nhập tên thể loại">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình slide:<span style="color:#F00" >(*)</span></label>
                                    <input type="file" id="exampleInputFile" name="image">
                                </div>
                            </div>
                            <label for="exampleInputPassword1">Nội Dung VN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="vi_noidung" name="vi_noidung" rows="10" cols="50">
                                </textarea>
                            </div>
                            <label for="exampleInputPassword1">Nội Dung EN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="en_noidung" name="en_noidung" rows="10" cols="50">
                                </textarea>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <button type="reset" class="btn btn-defaul">Xóa</button>
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