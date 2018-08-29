 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm
            <small>Bếp - Thanh Toán</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="?mod=user_list">Bếp - Thanh Toán</a></li>
            <li class="active">Thêm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($_GET['war'])==1)
                {?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Lỗi!</strong> Mật Khẩu phải ít nhất 6 ký tự!
                    </div>
                <?php }
                ?>
                <?php
                if(isset($_GET['warm'])==2)
                {?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Lỗi!</strong> Mật Khẩu không trùng nhau!
                    </div>
                <?php }
                ?>
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="?mod=process_kit" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Account</label>
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên bàn">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên</label>
                                <input type="text" class="form-control" id="so" name="so" placeholder="Nhập số bàn">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu</label>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="repass" name="repass" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select class="form-control" name="cate"  style="border-radius: 5px 5px 5px 5px;">
                                    
                                    <option value="1">Quản Lý Danh Sách Món Ăn</option>
                                   <option value="2">Quản Lý Thanh Toán</option>
                                   
                                </select>
                            </div>
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
    </section>
</div>