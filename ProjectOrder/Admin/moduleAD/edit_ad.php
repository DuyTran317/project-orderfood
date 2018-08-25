<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa
            <small><?php
            $sql = "select `name` from of_admin where id = {$_GET['edit']}";
                    $kq = mysqli_query($link,$sql);
                    $d = mysqli_fetch_assoc($kq);
             echo $d['name'] ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="?mod=user_list"><?php echo $d['name'] ?></a></li>
            <li class="active">Sửa</li>
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
                    <?php
                    $sql_edit = "select * from of_admin where id = {$_GET['edit']}";
                    $kq_edit = mysqli_query($link,$sql_edit);
                    $d_edit = mysqli_fetch_assoc($kq_edit);
                    ?>
                    <form role="form" action="?mod=process_ad" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Account</label>
                                <input type="text" class="form-control" id="ten" name="suaten" placeholder="Nhập tên bàn" value="<?= $d_edit['account'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên</label>
                                <input type="text" class="form-control" id="so" name="suaso" placeholder="Nhập số bàn" value="<?= $d_edit['name'] ?>">
                            </div>

                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label for="exampleInputPassword1">Thay đổi</label>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu</label>
                                <input type="password" class="form-control password" id="pass" name="suapass" placeholder="Nhập mật khẩu" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" id="repass" name="suarepass" placeholder="Nhập lại mật khẩu" disabled="">
                            </div>
                            <input type="hidden" value="<?= $d_edit['id'] ?>" name="suaid">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng Thái:</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input name="suatrangthai" value="1" <?php if($d_edit['active'] == 1) {echo "checked";}  else echo ""; ?> type="radio">Hiện
                                    </label>
                                    <label class="radio-inline">
                                        <input name="suatrangthai" value="0" type="radio" <?php if($d_edit['active'] == 0) {echo "checked";}  else echo ""; ?> >Ẩn
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
