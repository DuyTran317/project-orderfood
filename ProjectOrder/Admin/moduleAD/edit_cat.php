<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?=_EDIT?>
                <small><?=_CATEGORY?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="?mod=home"><i class="fa fa-dashboard"></i> <?=_HOME?></a></li>
                <li><a href="?mod=cat_list"><?=_CATEGORY?></a></li>
                <li class="active"><?=_EDIT?></li>
            </ol>
        </section>
    <?php
    if(isset($_GET['edit'])) {
        $edit = $_GET['edit'];

    }
    $sql_edit = "select * from of_category where id=$edit";
    $kq_edit = mysqli_query($link,$sql_edit);
    $d_edit=mysqli_fetch_assoc($kq_edit);
     $id = $d_edit['department_id'];
    ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="process-cat.html">
                            <div class="form-group">
                                <label><?=_CATEGORY?> <span style="color:#F00" >(*)</span> </label>
                                <select class="form-control"tyle="border-radius: 5px 5px 5px 5px;" name="suachungloai">
                                    <?php
                                    $sql_de = "select * from of_department";
                                    $kq_de = mysqli_query($link,$sql_de);
                                    while($d_de=mysqli_fetch_assoc($kq_de))
                                    {?>
                                        <option value="<?= $d_de['id'] ?>" <?php if($d_de['id']==$id) echo'selected';?>><?= $d_de[$_SESSION['ad_lang'].'_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_NAME?> VN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                           name="vi_suatheloai" required placeholder="<?=_ENTERCATNAME?> (vn)" value="<?= $d_edit['vi_name']?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_NAME?> EN:<span style="color:#F00" >(*)</span></label>
                                    <input type="text" class="form-control"
                                           name="en_suatheloai" required placeholder="<?=_ENTERCATNAME?>" value="<?= $d_edit['en_name']?>">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_ORDER?>:<span style="color:#F00" >(*)</span></label>
                                    <input type="number" class="form-control"
                                           name="suathutu" required placeholder="<?=_ORDER?>" value="<?= $d_edit['order']?>" min="1">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_STATUS?>: <span style="color:#F00" >(*)</span></label>
                                    <div class="radio">
                                        <label class="radio-inline">
                                            <input name="suatrangthai" value="1" <?php if($d_edit['active'] == 1) {echo "checked";}  else echo ""; ?> type="radio"><?=_VISIBLE?>
                                        </label>
                                        <label class="radio-inline">
                                            <input name="suatrangthai" value="0" type="radio" <?php if($d_edit['active'] == 0) {echo "checked";}  else echo ""; ?> ><?=_HIDE?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <input type="hidden" value="<?= $d_edit['id']?>" name="id">
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