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
            Sửa
            <small>Sản phẩm</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="?mod=pro_list">Sản phẩm</a></li>
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
                    <form role="form" action="?mod=process_pro" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                        <?php
                        $sql_pro = "select * from of_food where id=$id";
                        $kq_pro = mysqli_query($link,$sql_pro);
                        $d_pro = mysqli_fetch_assoc($kq_pro);
                        ?>

                            <div class="form-group">
                                <label>Thể Loại <span style="color:#F00" >(*)</span></label>
                                <select class="form-control"tyle="border-radius: 5px 5px 5px 5px;" name="suatheloai">
                                    <?php

                                        $sql_cat = "select * from of_category";
                                        $kq_cat = mysqli_query($link,$sql_cat);
                                        while($d_cat=mysqli_fetch_assoc($kq_cat))
                                        {?>
                                            <option value="<?= $d_cat['id'] ?>" <?php if($d_cat['id']==$d_pro['category_id']) echo "selected"; ?> ><?= $d_cat['vi_name'] ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm VN <span style="color:#F00" >(*)</span></label>
                                <input type="text" class="form-control" id="vi_tensp" name="vi_suatensp" placeholder="Nhập tên sản phẩm" value="<?php echo $d_pro['vi_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm EN <span style="color:#F00" >(*)</span></label>
                                <input type="text" class="form-control" id="en_tensp" name="en_suatensp" placeholder="Nhập tên sản phẩm" value="<?php echo $d_pro['en_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá <span style="color:#F00" >(*)</span></label>
                                <input type="text" class="form-control" id="gia" name="suagia" placeholder="Nhập giá sản phẩm" value="<?php echo $d_pro['price']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Khuyến mãi <span style="color:#F00" >(*)</span></label>
                                <input type="text" class="form-control" id="khuyenmai" name="suakhuyenmai" placeholder="Nhập khuyến mãi sản phẩm" value="<?php echo $d_pro['discount']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thứ tự <span style="color:#F00" >(*)</span></label>
                                <input type="text" class="form-control" id="thutu" name="suathutu" placeholder="Nhập thứ tự sản phẩm" value="<?php echo $d_pro['order']; ?>" >
                            </div>
                            <label for="exampleInputPassword1">Nội Dung VN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="vi_noidung" name="vi_suanoidung" rows="10" cols="50"><?php echo $d_pro['vi_desc']; ?>
                                </textarea>
                            </div>
                            <label for="exampleInputPassword1">Nội Dung EN </label>
                            <div class="form-group">
                                <textarea class="ckeditor" id="en_noidung" name="en_suanoidung" rows="10" cols="50"><?php echo $d_pro['en_desc']; ?>
                                </textarea>
                            </div>
                            <div class="form-group">

                                <label for="exampleInputFile">Hình 1</label><br>
                                <img src="../img/sp/<?php echo $d_pro['img_url']; ?>" alt="đay là hình" width="50" height="50">
                                <input type="file" id="exampleInputFile" name="suaimage">
                            </div>
                            <div class="form-group">

                                <label for="exampleInputFile">Hình 2</label><br>
                                <img src="../img/sp/<?php echo $d_pro['img_url2']; ?>" alt="đay là hình" width="50" height="50">
                                <input type="file" id="exampleInputFile" name="suaimage2">
                            </div>
                            <div class="form-group">

                                <label for="exampleInputFile">Hình 3</label><br>
                                <img src="../img/sp/<?php echo $d_pro['img_url3']; ?>" alt="đay là hình" width="50" height="50">
                                <input type="file" id="exampleInputFile" name="suaimage3">
                            </div>
                            <div class="form-group">

                                <label for="exampleInputFile">Hình 4</label><br>
                                <img src="../img/sp/<?php echo $d_pro['img_url4']; ?>" alt="đay là hình" width="50" height="50">
                                <input type="file" id="exampleInputFile" name="suaimage4">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng Thái: <span style="color:#F00" >(*)</span></label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input name="suatrangthai" value="1" <?php if($d_pro['active'] == 1) {echo "checked";}  else echo ""; ?> type="radio">Hiện
                                    </label>
                                    <label class="radio-inline">
                                        <input name="suatrangthai" value="0" type="radio" <?php if($d_pro['active'] == 0) {echo "checked";}  else echo ""; ?> >Ẩn
                                    </label>
                                    <label class="radio-inline">
                                        <input name="suatrangthai" value="2" type="radio" <?php if($d_pro['active'] == 2) {echo "checked";}  else echo ""; ?> >Hết Hàng
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $d_pro['id']; ?>">
                            <button type="submit" class="btn btn-primary">Sửa</button>
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
</div>
<script>
    //Chi tiết
    var noidung = CKEDITOR.replace( 'noidung', {
        uiColor: '#ccffff',
        language:'vi',

    });

    CKFinder.setupCKEditor( noidung, 'brower_components/ckfinder/' ) ;

</script>