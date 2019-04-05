<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <h1>
                <?=_ADD?>
                <small><?=_PRODUCT?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
                <li><a href="danh-sach-san-pham.html"><?=_PRODUCT?></a></li>
                <li class="active"><?=_ADD?></li>
            </ol>
        </section>
        <!-- Main content -->
            
            <div class="row">
        <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="process-pro.html" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label><?=_CATEGORY?> <span style="color:#F00" >(*)</span> </label>
                        <select class="form-control"tyle="border-radius: 5px 5px 5px 5px;" name="theloai">
                            <?php
                            $sql_cat = "select * from of_category";
                            $kq_cat = mysqli_query($link,$sql_cat);
                            while($d_cat=mysqli_fetch_assoc($kq_cat))
                            {?>
                                <option value="<?= $d_cat['id'] ?>" ><?= $d_cat[$_SESSION['ad_lang'].'_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?=_NAME?> VN <span style="color:#F00" >(*)</span> </label>
                        <input type="text" class="form-control" id="vi_tensp" required name="vi_tensp" placeholder="<?=_ENTERPRONAME?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?=_NAME?> EN <span style="color:#F00" >(*)</span></label>
                        <input type="text" class="form-control" id="en_tensp" required name="en_tensp" placeholder="<?=_ENTERPRONAME?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><?=_PRICE?> <span style="color:#F00" >(*)</span> </label>
                        <input type="number" class="form-control" id="gia" required name="gia" placeholder="<?=_PRICE?>" min="1">
                    </div>
<!--                     <div class="form-group">
    <label for="exampleInputPassword1">Khuyến mãi <span style="color:#F00" >(*)</span> </label>
    <input type="number" class="form-control" id="khuyenmai" required name="khuyenmai" placeholder="Nhập khuyến mãi sản phẩm" min="1" max="100">
</div> -->
                    <div class="form-group">
                        <label for="exampleInputPassword1"><?=_ORDER?> <span style="color:#F00" >(*)</span> </label>
                        <input type="number" class="form-control" id="thutu" required name="thutu" placeholder="<?=_ORDER?>" min="1">
                    </div>
                    <label for="exampleInputPassword1"><?=_DESC?> VN</label>
                    <div class="form-group">

                    <textarea class="ckeditor" id="vi_noidung" name="vi_noidung" rows="10" cols="50">
                    </textarea>
                    </div>

                    <label for="exampleInputPassword1"><?=_DESC?> EN</label>
                    <div class="form-group">

                    <textarea class="ckeditor" id="en_noidung" name="en_noidung" rows="10" cols="50">
                    </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile"><?=_PIC?> 1</label>
                        <input type="file" id="exampleInputFile" name="image">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputFile"><?=_PIC?> 2</label>
                        <input type="file" id="exampleInputFile" name="image2">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputFile"><?=_PIC?> 3</label>
                        <input type="file" id="exampleInputFile" name="image3">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputFile"><?=_PIC?> 4</label>
                        <input type="file" id="exampleInputFile" name="image4">
                    </div>

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
                        <div class="radio">
                            <label>
                                <input type="radio" name="trangthai" id="optionsRadios3" value="2">
                                <?=_OUTOFSTOCK?>
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
    </section>
</div>
</div>
