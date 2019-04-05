<?php
if(isset($_GET['edit']))
{
    $id = $_GET['edit'];}
?>
<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=_EDIT?>
            <small><?=_PRODUCT?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-san-pham.html"><?=_PRODUCT?></a></li>
            <li class="active"><?=_EDIT?></li>
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
                    <form role="form" action="process-pro.html" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                        <?php
                        $sql_pro = "select * from of_food where id=$id";
                        $kq_pro = mysqli_query($link,$sql_pro);
                        $d_pro = mysqli_fetch_assoc($kq_pro);
                        ?>

                            <div class="form-group">
                                <label><?=_CATEGORY?> <span style="color:#F00" >(*)</span></label>
                                <select class="form-control"tyle="border-radius: 5px 5px 5px 5px;" name="suatheloai">
                                    <?php

                                        $sql_cat = "select * from of_category";
                                        $kq_cat = mysqli_query($link,$sql_cat);
                                        while($d_cat=mysqli_fetch_assoc($kq_cat))
                                        {?>
                                            <option value="<?= $d_cat['id'] ?>" <?php if($d_cat['id']==$d_pro['category_id']) echo "selected"; ?> ><?= $d_cat[$_SESSION['ad_lang'].'_name'] ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?=_NAME?> VN <span style="color:#F00" >(*)</span></label>
                                <input type="text" class="form-control" id="vi_tensp" name="vi_suatensp" placeholder="<?=_ENTERPRONAME?>" value="<?php echo $d_pro['vi_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?=_NAME?> EN <span style="color:#F00" >(*)</span></label>
                                <input type="text" class="form-control" id="en_tensp" name="en_suatensp" placeholder="<?=_ENTERPRONAME?>" value="<?php echo $d_pro['en_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><?=_PRICE?> <span style="color:#F00" >(*)</span></label>
                                <input type="number" class="form-control" id="gia" name="suagia" placeholder="<?=_NAME?>" value="<?php echo $d_pro['price']; ?>" min="1">
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputPassword1">Khuyến mãi <span style="color:#F00" >(*)</span></label>
                                <input type="number" class="form-control" id="khuyenmai" name="suakhuyenmai" placeholder="Nhập khuyến mãi sản phẩm" value="<?php echo $d_pro['discount']; ?>" min="1" max="100">
                            </div> -->
                            <div class="form-group">
                                <label for="exampleInputPassword1"><?=_ORDER?> <span style="color:#F00" >(*)</span></label>
                                <input type="number" class="form-control" id="thutu" name="suathutu" placeholder="<?=_ORDER?>" value="<?php echo $d_pro['order']; ?>" min="1">
                            </div>
                            <label for="exampleInputPassword1"><?=_DESC?> VN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="vi_noidung" name="vi_suanoidung" rows="10" cols="50"><?php echo $d_pro['vi_desc']; ?>
                                </textarea>
                            </div>
                            <label for="exampleInputPassword1"><?=_DESC?> EN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="en_noidung" name="en_suanoidung" rows="10" cols="50"><?php echo $d_pro['en_desc']; ?>
                                </textarea>
                            </div>
                            <div class="form-group">

                                <label for="exampleInputFile"><?=_PIC?> 1</label><br>
                                <img src="../img/sp/<?php echo $d_pro['img_url']; ?>" alt="<?=_PIC?>" width="50" height="50">
                                <input type="file" id="exampleInputFile" name="suaimage">
                            </div>
                            <div class="form-group">

                                <label for="exampleInputFile"><?=_PIC?> 2</label><br>
                                <img src="../img/sp/<?php echo $d_pro['img_url2']; ?>" alt="<?=_PIC?>" width="50" height="50">
                                <input type="file" id="exampleInputFile" name="suaimage2">
                            </div>
                            <div class="form-group">

                                <label for="exampleInputFile"><?=_PIC?> 3</label><br>
                               <img src="../img/sp/<?php echo $d_pro['img_url3']; ?>" alt="<?=_PIC?>" width="50" height="50">
                                <input type="file" id="exampleInputFile" name="suaimage3">
                            </div>
                            <div class="form-group">

                                <label for="exampleInputFile"><?=_PIC?> 4</label><br>
                                <img src="../img/sp/<?php echo $d_pro['img_url4']; ?>" alt="<?=_PIC?>" width="50" height="50">
                                <input type="file" id="exampleInputFile" name="suaimage4">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"><?=_STATUS?>: <span style="color:#F00" >(*)</span></label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input name="suatrangthai" value="1" <?php if($d_pro['active'] == 1) {echo "checked";}  else echo ""; ?> type="radio"><?=_VISIBLE?>
                                    </label>
                                    <label class="radio-inline">
                                        <input name="suatrangthai" value="0" type="radio" <?php if($d_pro['active'] == 0) {echo "checked";}  else echo ""; ?> ><?=_HIDE?>
                                    </label>
                                    <label class="radio-inline">
                                        <input name="suatrangthai" value="2" type="radio" <?php if($d_pro['active'] == 2) {echo "checked";}  else echo ""; ?> ><?=_OUTOFSTOCK?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $d_pro['id']; ?>">
                            <button type="submit" class="btn btn-primary"><?=_EDIT?></button>
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
<script>
    //Chi tiết
    var noidung = CKEDITOR.replace( 'noidung', {
        uiColor: '#ccffff',
        language:'vi',

    });

    CKFinder.setupCKEditor( noidung, 'brower_components/ckfinder/' ) ;

</script>