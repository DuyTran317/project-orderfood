<div class="wrapper">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <h1>
                Thêm
                <small>Sản phẩm</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="?mod=home"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li><a href="?mod=pro_list">Sản phẩm</a></li>
                <li class="active">Thêm</li>
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
                    <div class="form-group">
                        <label>Thể Loại <span style="color:#F00" >(*)</span> </label>
                        <select class="form-control"tyle="border-radius: 5px 5px 5px 5px;" name="theloai">
                            <?php
                            $sql_cat = "select * from of_category";
                            $kq_cat = mysqli_query($link,$sql_cat);
                            while($d_cat=mysqli_fetch_assoc($kq_cat))
                            {?>
                                <option value="<?= $d_cat['id'] ?>" ><?= $d_cat['vi_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Sản Phẩm VN <span style="color:#F00" >(*)</span> </label>
                        <input type="text" class="form-control" id="vi_tensp" required name="vi_tensp" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Sản Phẩm EN <span style="color:#F00" >(*)</span></label>
                        <input type="text" class="form-control" id="en_tensp" required name="en_tensp" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Giá <span style="color:#F00" >(*)</span> </label>
                        <input type="number" class="form-control" id="gia" required name="gia" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Khuyến mãi <span style="color:#F00" >(*)</span> </label>
                        <input type="number" class="form-control" id="khuyenmai" required name="khuyenmai" placeholder="Nhập khuyến mãi sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thứ tự <span style="color:#F00" >(*)</span> </label>
                        <input type="number" class="form-control" id="thutu" required name="thutu" placeholder="Nhập thứ tự sản phẩm">
                    </div>
                    <label for="exampleInputPassword1">Nội Dung VN</label>
                    <div class="form-group">

                    <textarea class="ckeditor" id="vi_noidung" name="vi_noidung" rows="10" cols="50">
                    </textarea>
                    </div>

                    <label for="exampleInputPassword1">Nội Dung EN</label>
                    <div class="form-group">

                    <textarea class="ckeditor" id="en_noidung" name="en_noidung" rows="10" cols="50">
                    </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Hình 1</label>
                        <input type="file" id="exampleInputFile" name="image">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputFile">Hình 2</label>
                        <input type="file" id="exampleInputFile" name="image2">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputFile">Hình 3</label>
                        <input type="file" id="exampleInputFile" name="image3">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputFile">Hình 4</label>
                        <input type="file" id="exampleInputFile" name="image4">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Trạng Thái:</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="trangthai" id="optionsRadios1" value="1" checked>Hiện
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="trangthai" id="optionsRadios2" value="0">
                                Ẩn
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="trangthai" id="optionsRadios3" value="2">
                                Hết Hàng
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
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