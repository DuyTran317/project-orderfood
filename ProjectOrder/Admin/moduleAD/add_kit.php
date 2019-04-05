<div class="wrapper">
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=_ADD?>
            <small><?=_USERS?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-bep-thanh-toan.html"><?=_USERS?></a></li>
            <li class="active"><?=_ADD?></li>
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
                    <form role="form" action="process-kit.html" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?=_ACCNAME?> <span style="color:#F00" >(*)</span></label>
                                <input type="text" class="form-control" id="ten" required  name="ten" placeholder="<?=_ENTERACCNAME?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><?=_NAME?> <span style="color:#F00" >(*)</span></label>
                                <input type="text" class="form-control" id="so" required name="so" placeholder="<?=_ENTERNAME?>">
                            </div>
                            <label for="exampleInputPassword1"><?=_PASS?> <span style="color:#F00" >(*)</span></label>
                            <div class="form-group">
                                    <input type="password" id="pass" name="pass" onkeyup='check();'  required placeholder="<?=_PASS?> " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" />
                                    
                                    <div class="requirements">
                                        <?=_PASSWARNING?>
                                    </div>
                            </div>
                            <label for="exampleInputPassword1"><?=_PASSCONFIRM?> <span style="color:#F00" >(*)</span></label>
                            <div class="form-group">
                                <span>
                                 <input type="password" id="repass" onkeyup='check();' name="repass" required placeholder="<?=_PASSCONFIRM?> "  />

                                <span id='message' class="requirements" style="padding: 0 30px 0 20px;"></span> </span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><?=_ROLE?> <span style="color:#F00" >(*)</span></label>
                                <select class="form-control" name="cate"  style="border-radius: 5px 5px 5px 5px;">
                                    <?php 
                                        $sql = "select * from `of_manage` group by `cate`";
                                        $kq = mysqli_query($link,$sql);
                                        while ($d=mysqli_fetch_assoc($kq)) {?>

                                          <option value="<?php echo $d['id']; ?>">
										  	<?php
											if($d['cate']==1)
											{
												echo _COOKER;
											}
											if($d['cate']==2)
											{
												echo _CASHIER;
											}
											if($d['cate']==3)
											{
												echo _WAITER;
											}
											if($d['cate']==4)
											{
												echo _BARTENDER;
											}
										  	?>
                                           </option>

                                    <?php   
                                     }
                                    ?>
                                   
                                </select>
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