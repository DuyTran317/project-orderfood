<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa
            <small><?php
            $sql = "select `name` from of_admin where id = {$_GET['edit']}";
                    $kq = mysqli_query($link,$sql);
                    $d = mysqli_fetch_assoc($kq);
             echo $d['name'] ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
          <?php
            $cate = $_SESSION['catead'];
          if($cate  ==1) {  ?> 
            <li><a href="danh-sach-admin.html"><?php echo $d['name'] ?></a></li>      <?php }?>
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
                    <?php
                    $sql_edit = "select * from of_admin where id = {$_GET['edit']}";
                    $kq_edit = mysqli_query($link,$sql_edit);
                    $d_edit = mysqli_fetch_assoc($kq_edit);
                    $cate_edit = $d_edit['cate'];
                    ?>
                    <form role="form" action="process-ad.html" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?=_ACCOUNT?></label>
                                <input type="text" class="form-control" id="ten" name="suaten" placeholder="<?=_ACCOUNT?>" value="<?= $d_edit['account'] ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><?=_NAME?></label>
                                <input type="text" class="form-control" id="so" name="suaso" placeholder="<?=_NAME?>" value="<?= $d_edit['name'] ?>" >
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label for="exampleInputPassword1"><?=_CHANGEPASS?></label>
                            </div>
                           <label for="exampleInputPassword1"><?=_PASS?></label>
                            <div class="form-group">
                                    <input type="password" id="pass" class="form-control password" name="suapass" onkeyup='check();'  required placeholder="<?=_PASS?> " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" disabled="" />
                                    
                                    <div class="requirements">
                                        <?=_PASSWARNING?>
                                    </div>
                            </div>
                            <label for="exampleInputPassword1"><?=_PASSCONFIRM?></label>
                            <div class="form-group">
                                <span>
                                 <input type="password" id="repass" class="form-control password" onkeyup='check();' name="repass" required placeholder="<?=_PASSCONFIRM?> " disabled="" />

                                <span id='message' class="requirements" style="padding: 0 30px 0 20px;"></span> </span>
                            </div>
                            <input type="hidden" value="<?= $d_edit['id'] ?>" name="suaid">
                             <?php if($cate_edit != 1){ ?>
                            <div class="form-group">
                            <label for="exampleInputPassword1"><?=_ROLE?></label>

                            <select class="form-control " name="suaquyen" style="border-radius: 5px 5px 5px 5px;" <?php if($cate_edit == 1 || $cate  !=1) { echo 'disabled=""'; } ?>>
                                 <option value="1" <?php if(1== $cate_edit) echo "selected"; ?> 
                                 disabled="disabled" >Admin</option>
                                 <option value="2" <?php if(2== $cate_edit) echo "selected"; ?>><?=_ACCOUNTANT?></option>
                                 <option value="3" <?php if(3== $cate_edit) echo "selected"; ?>><?=_DEPCATEMANAGER?></option>
                                 <option value="4" <?php if(4== $cate_edit) echo "selected"; ?>><?=_MANAGER?></option>
                                 <option value="5" <?php if(5== $cate_edit) echo "selected"; ?>><?=_TABLEMANAGER?></option>
                                 <option value="6" <?php if(6== $cate_edit) echo "selected"; ?>><?=_ADROLE?></option>
                            </select>
                        </div>
                         <?php } ?>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">

                            <button type="submit" id="pass" class="btn btn-primary" name="xacnhan" ><?=_EDIT?></button>
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
