<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <?php if(isset($_GET['key2'] )==5) {
            echo "<script type='text/javascript'>";
            echo "setTimeout(function () { swal('Sửa Thành Công',
                          'Bạn sửa thành công',
                          'success');";
            echo "},1);</script>";
        }?>
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
                                <input type="text" class="form-control" id="ten" name="suaten" placeholder="Nhập tên bàn" value="<?= $d_edit['account'] ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên</label>
                                <input type="text" class="form-control" id="so" name="suaso" placeholder="Nhập số bàn" value="<?= $d_edit['name'] ?>" disabled="">
                            </div>

                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label for="exampleInputPassword1">Nhấn vào đây nếu bạn muốn thay đổi mật khẩu!</label>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu</label>
                                <input type="password" class="form-control password" id="pass" name="suapass" placeholder="Nhập mật khẩu" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" id="repass" name="suarepass" placeholder="Nhập lại mật khẩu" disabled="">
                            </div>
                            <input type="hidden" value="<?= $d_edit['id'] ?>" name="suaid">
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">

                            <button type="submit" id="pass" class="btn btn-primary password" disabled="">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
    </section>

</div>