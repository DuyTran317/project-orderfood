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
                <?=_EDIT?>
                <small>Slide</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
                <li><a href="danh-sach-slide.html">Slide</a></li>
                <li class="active"><?=_EDIT?></li>
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
                        <form role="form" method="post" enctype="multipart/form-data" action="process-slide.html">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_NAME?> VN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="vi_suatenslide" value="<?php echo $d['vi_name']; ?>" placeholder="<?=_NAME?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_NAME?> EN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="en_suatenslide" value="<?php echo $d['en_name']; ?>" placeholder="<?=_NAME?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputFile"><?=_PIC?>:<span style="color:#F00" >(*)</span></label><br/>
                                    <img src="../img/slider/<?php echo $d['img_url']; ?>" width="100" height="100"><br/>
                                    <input type="file" id="exampleInputFile" name="suaimage">
                                </div>
                            </div>
                            <label for="exampleInputPassword1"><?=_DESC?> VN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="vi_noidung" name="vi_suanoidung" rows="10" cols="50"><?php echo $d['vi_content']; ?>
                                </textarea>
                            </div>
                            <label for="exampleInputPassword1"><?=_DESC?> EN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="en_noidung" name="en_suanoidung" rows="10" cols="50"><?php echo $d['en_content']; ?>
                                </textarea>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary"><?=_EDIT?></button>
                                <button type="reset" class="btn btn-defaul"><?=_RESET?></button>
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