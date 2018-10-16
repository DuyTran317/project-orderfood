<?php 
    if(isset($_GET['edit']))
    {
        $id=$_GET['edit'];
    }
    
?>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Sửa
                <small>Slide</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li><a href="danh-sach-slide.html">Slide</a></li>
                <li class="active">Sửa</li>
            </ol>
        </section>
            <?php 
                $sql="select * from of_slider where id={$id}";
                $kq=mysqli_query($link,$sql);
                $d=mysqli_fetch_assoc($kq);
            ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="?mod=process_slide">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Slide:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="suatenslide" value="<?php echo $d['name']; ?>" placeholder="Nhập tên thể loại">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình slide:<span style="color:#F00" >(*)</span></label><br/>
                                    <img src="../img/slide/<?php echo $d['img_url']; ?>" width="100" height="100"><br/>
                                    <input type="file" id="exampleInputFile" name="suaimage">
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="sualink" value="<?php echo $d['link']; ?>" placeholder="Nhập link">
                                </div>
                            </div>
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