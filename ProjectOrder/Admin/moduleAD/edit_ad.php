<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <?php if(isset($_SESSION['sua'] )== 'suathanhcong') {
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
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
          <?php
            $cate = $_SESSION['catead'];
          if($cate  ==1) {  ?> 
            <li><a href="danh-sach-admin.html"><?php echo $d['name'] ?></a></li>      <?php }?>
            <li class="active">Sửa</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    $sql_edit = "select * from of_admin where id = {$_GET['edit']}";
                    $kq_edit = mysqli_query($link,$sql_edit);
                    $d_edit = mysqli_fetch_assoc($kq_edit);
                    ?>
                    <form role="form" action="process-ad.html" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Account</label>
                                <input type="text" class="form-control" id="ten" name="suaten" placeholder="Nhập tên bàn" value="<?= $d_edit['account'] ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên</label>
                                <input type="text" class="form-control" id="so" name="suaso" placeholder="Nhập số bàn" value="<?= $d_edit['name'] ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label for="exampleInputPassword1">Nhấn vào đây nếu bạn muốn thay đổi mật khẩu!</label>
                            </div>
                           <label for="exampleInputPassword1">Mật khẩu</label>
                            <div class="form-group">
                                    <input type="password" id="pass" class="form-control password" name="suapass" onkeyup='check();'  required placeholder="Nhập mật khẩu " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" disabled="" />
                                    
                                    <div class="requirements">
                                        Bạn phải nhập ít nhất 6 ký tự, phải có 1 ký tự hoa, 1 ký tự số, 1 ký thường.
                                    </div>
                            </div>
                            <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                            <div class="form-group">
                                <span>
                                 <input type="password" id="repass" class="form-control password" onkeyup='check();' name="repass" required placeholder="Nhập lại mật khẩu " disabled="" />

                                <span id='message' class="requirements" style="padding: 0 30px 0 20px;"></span> </span>
                            </div>
                            <input type="hidden" value="<?= $d_edit['id'] ?>" name="suaid">
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">

                            <button type="submit" id="pass" class="btn btn-primary password" disabled="">Sửa</button>
                            <button type="reset" class="btn btn-defaul">Xóa</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
    </section>

</div>
