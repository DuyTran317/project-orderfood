<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Thêm
                <small>Thể Loại</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li><a href="?mod=cat_list">Thể Loại</a></li>
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
                        <form role="form" method="post" enctype="multipart/form-data" action="?mod=process_cat">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thể Loại:</label>
                                    <input type="text" class="form-control"
                                           name="theloai" placeholder="Nhập tên thể loại">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thứ Tự:</label>
                                    <input type="text" class="form-control"
                                           name="thutu" placeholder="Nhập thứ tự">
                                </div>
                            </div>

                            <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng Thái:</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="trangthai" id="optionsRadios1" value="1" checked>Hiện
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="trangthai" id="optionsRadios2" value="0">
                                        Ẩn
                                    </label>
                                </div>
                            </div></div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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