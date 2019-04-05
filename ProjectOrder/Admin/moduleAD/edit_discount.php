<?php
if($_SESSION['ad_lang'] == 'vi')
{
    if(isset($_SESSION['chuy'] )== 'chuy')
    {
        echo "<script type='text/javascript'>";
        echo "setTimeout(function () { swal('Chú ý',
                      'Ngày đến phải lớn hơn ngày từ!',
                      'warning');";
        echo "},1);</script>";
    }
}
elseif ($_SESSION['ad_lang'] == 'en'){
    if(isset($_SESSION['chuy'] )== 'chuy')
    {
        echo "<script type='text/javascript'>";
        echo "setTimeout(function () { swal('Warning',
                      'To value must be greater than the from one!',
                      'warning');";
        echo "},1);</script>";
    }
}
?>
        <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               <?=_EDIT?>
                <small><?=_PROMOTION?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
                <li><a href="danh-sach-khuyen-mai.html"><?=_PROMOTION?></a></li>
                <li class="active"><?=_EDIT?></li>
            </ol>
        </section>
        <?php
        if(isset($_GET['edit'])) {
        $edit = $_GET['edit'];

            }
            $sql_edit = "select * from of_discount where id=$edit";
            $kq_edit = mysqli_query($link,$sql_edit);
            $d_edit=mysqli_fetch_assoc($kq_edit);
            $source = $d_edit['create_at'];
            $datefrom = new DateTime($source);

             $source1 = $d_edit['end_at'];
            $dateto = new DateTime($source1);
             // 31.07.2012
            /*if(isset($d_edit['create_at']))
            {
                $datefrom=$d_edit['create_at'];
                
                //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
                $y= substr($datefrom,0,3);
                $d= substr($datefrom,4,3);
                $m= substr($datefrom,6,5);
                
                $datefrom="{$m}/{$d}/{$y}";     
            }
            if(isset($d_edit['end_at']))
            {
                $dateto=$d_edit['end_at'];
                
                //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
                $m= substr($dateto,0,2);
                $d= substr($dateto,3,2);
                $y= substr($dateto,6,4);
                
                $dateto="{$m}/{$d}/{$y}";

            }   */
            ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="process-dis.html">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_PROMOTION?>:<span style="color:#F00" >(*)</span></label>
                                    <input type="number" class="form-control"
                                         required  name="suakhuyenmai" placeholder="<?=_PROMOTION?>" value="<?php echo $d_edit['discount']; ?>" min="0" max="100">
                                </div>
                            </div>
                            <div class="box-body">
                              <!-- Date -->
                              <div class="form-group">
                                <label><?=_FROM?>:</label>

                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="datepicker" readonly="" name="suadatefrom" value="<?php echo $datefrom->format('d/m/Y'); ?>" style="background-color:#FFF" >
                                </div>
                                <!-- /.input group -->
                              </div>
                              <!-- /.form group -->
                            </div>
                             <div class="box-body">
                              <!-- Date -->
                              <div class="form-group">
                                <label><?=_TO?>:</label>

                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="datepicker1" readonly="" name="suadateto" value="<?php echo $dateto->format('d/m/Y'); ?>" style="background-color:#FFF" >
                                </div>
                                <!-- /.input group -->
                              </div>
                              <!-- /.form group -->
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
<?php unset($_SESSION['chuy']); 
unset($_SESSION['suakhuyenmai']); 
unset($_SESSION['suadateto']); 
unset($_SESSION['suadatefrom']); 
?>