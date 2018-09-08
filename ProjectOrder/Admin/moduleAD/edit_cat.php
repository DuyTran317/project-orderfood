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
                <li class="active">Sửa</li>
            </ol>
        </section>
    <?php
    if(isset($_GET['edit'])) {
        $edit = $_GET['edit'];
    }
    $sql_edit = "select * from of_category where id=$edit";
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
                        <form role="form" method="post" enctype="multipart/form-data" action="?mod=process_cat">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thể Loại:</label>
                                    <input type="text" class="form-control"
                                           name="suatheloai" placeholder="Nhập tên thể loại" value="<?= $d_edit['name']?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thứ Tự:</label>
                                    <input type="text" class="form-control"
                                           name="suathutu" placeholder="Nhập thứ tự" value="<?= $d_edit['order']?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">

                                    <label for="exampleInputFile">Hình</label><br>
                                    <img src="../img/sp/<?php echo $d_edit['img_url']; ?>" alt="đay là hình" width="50" height="50">
                                    <input type="file" id="exampleInputFile" name="suaimage">
                                </div>
                             </div>
                            <div class="box-body">
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
                            <input type="hidden" value="<?= $d_edit['id']?>" name="id">
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