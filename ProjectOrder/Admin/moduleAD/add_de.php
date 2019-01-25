<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Thêm
                <small>Chủng Loại</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li><a href="danh-sach-chung-loai.html">Chủng Loại</a></li>
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
                        <form role="form" method="post" enctype="multipart/form-data" action="process-de.html">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Chủng Loại VN: <span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="vi_theloai" placeholder="Nhập tên chủng loại">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Chủng Loại EN: <span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="en_theloai" placeholder="Nhập tên chủng loại bằng tiếng anh">
                                </div>
                            </div>
                            
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thứ Tự: <span style="color:#F00" >(*)</span></label>
                                    <input type="number" class="form-control"
                                          required name="thutu" placeholder="Nhập thứ tự" min="1">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình:<span style="color:#F00" >(*)</span></label>
                                    <input type="file" id="exampleInputFile" name="image">
                                </div>
                            </div>
                            <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Bộ phận giải quyết <span style="color:#F00" >(*)</span></label>
                                <select class="form-control" name="manage"  style="border-radius: 5px 5px 5px 5px;">
                                    <?php 
                                        $sql = "select * from of_manage where `id`=1 or `id`=4";
                                        $kq = mysqli_query($link,$sql);
                                        while ($d=mysqli_fetch_assoc($kq)) {
                                            ?>
            
                                          <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>

                                    <?php   
                                     }
                                    ?>
                                   
                                </select>
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
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <button type="reset" class="btn btn-defaul">Đặt Lại</button>
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