<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa
            <small>Bàn</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="?mod=user_list">Bàn</a></li>
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
                    $sql_edit = "select * from of_user where id = {$_GET['edit']}";
                    $kq_edit = mysqli_query($link,$sql_edit);
                    $d_edit = mysqli_fetch_assoc($kq_edit);
                    ?>
                    <form role="form" action="?mod=process_user" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Bàn</label>
                                <input type="text" class="form-control" id="ten" name="suaten" placeholder="Nhập tên bàn" readonly="readonly" value="<?= $d_edit['account'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số</label>
                                <input type="text" class="form-control" id="so" readonly="readonly" name="suaso" placeholder="Nhập số bàn" value="<?= $d_edit['name'] ?>">
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

                            <button type="submit" class="btn btn-primary password" disabled="">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
    </section>
</div>
</div>
