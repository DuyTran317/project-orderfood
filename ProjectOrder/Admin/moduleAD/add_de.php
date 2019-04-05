<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               <?=_ADD?>
                <small><?=_DEPARTMENT?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
                <li><a href="danh-sach-chung-loai.html"><?=_DEPARTMENT?></a></li>
                <li class="active"><?=_ADD?></li>
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
                                    <label for="exampleInputEmail1"><?=_NAME?> VN: <span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="vi_theloai" placeholder="<?=_ENTERDEPNAME?> (VN)">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_NAME?> EN: <span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                         required  name="en_theloai" placeholder="<?=_ENTERDEPNAME?> (EN)">
                                </div>
                            </div>
                            
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_ORDER?>: <span style="color:#F00" >(*)</span></label>
                                    <input type="number" class="form-control"
                                          required name="thutu" placeholder="<?=_ORDER?>" min="1">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputFile"><?=_PIC?>:<span style="color:#F00" >(*)</span></label>
                                    <input type="file" id="exampleInputFile" name="image">
                                </div>
                            </div>
                            <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><?=_RESPONSIBLE?> <span style="color:#F00" >(*)</span></label>
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
                                    <label for="exampleInputEmail1"><?=_STATUS?>:</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="trangthai" id="optionsRadios1" value="1" checked><?=_VISIBLE?>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="trangthai" id="optionsRadios2" value="0">
                                            <?=_HIDE?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary"><?=_ADD?></button>
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