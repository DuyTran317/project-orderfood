<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sửa
                <small>Thể Loại</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="?mod=home"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li><a href="?mod=cat_list">Thể loại</a></li>
                <li class="active">Sửa</li> <?php echo $_GET['edit']; ?>
            </ol>
        </section>
    <?php
    if(isset($_GET['edit'])) {
        $edit = $_GET['edit'];

    }
    $sql_edit = "select * from of_department where id=$edit";
    $kq_edit = mysqli_query($link,$sql_edit);
    $d_edit=mysqli_fetch_assoc($kq_edit);
    ?>
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
                                    <label for="exampleInputEmail1">Tên Thể Loại VN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                           name="vi_suatheloai" required placeholder="Nhập tên thể loại" value="<?= $d_edit['vi_name']?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thể Loại EN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                           name="en_suatheloai" required placeholder="Nhập tên thể loại" value="<?= $d_edit['en_name']?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thứ Tự:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                           name="suathutu" required placeholder="Nhập thứ tự" value="<?= $d_edit['order']?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">

                                    <label for="exampleInputFile">Hình <span style="color:#F00" >(*)</span></label><br>
                                    <img src="../img/cate/<?php echo $d_edit['img_url']; ?>" alt="đay là hình" width="50" height="50">
                                    <input type="file" id="exampleInputFile" name="suaimage">
                                </div>
                             </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng Thái: <span style="color:#F00" >(*)</span></label>
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
                            <input type="hidden" value="<?= $d_edit['id']?>" name="id">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Sửa</button>
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