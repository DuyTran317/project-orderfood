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
               <?=_ADD?>
                <small><?=_PROMOTION?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
                <li><a href="danh-sach-khuyen-mai.html"><?=_PROMOTION?></a></li>
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
                        <form role="form" method="post" enctype="multipart/form-data" action="process-dis.html">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_PROMOTION?>:<span style="color:#F00" >(*)</span></label>
                                    <input type="number" class="form-control"
                                         required  name="khuyenmai" value="<?php if(isset($_SESSION['khuyenmai'])){echo $_SESSION['khuyenmai'];}  ?>"  placeholder="<?=_PROMOTION?>" max="100" min="0" >
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
                                  <input type="text" class="form-control pull-right" id="datepicker" readonly="" 
                                  value="<?php if(isset($_SESSION['dateto']))
                                          {
                                                $dateto = $_SESSION['dateto'];
                                                $date = new DateTime($dateto);
                                                echo $date->format('d/m/Y');
                                           }
                                         ?>" name="datefrom" style="background-color:#FFF" >
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
                                  <input type="text" class="form-control pull-right" id="datepicker1" readonly="" value="<?php if(isset($_SESSION['datefrom']))
                                          {
                                                $datefrom = $_SESSION['datefrom'];
                                                $date = new DateTime($datefrom);
                                                echo $date->format('d/m/Y');
                                           }
                                         ?>" name="dateto" style="background-color:#FFF"  >
                                </div>
                                <!-- /.input group -->
                              </div>
                              <!-- /.form group -->
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
<?php unset($_SESSION['chuy']); 
unset($_SESSION['khuyenmai']); 
unset($_SESSION['dateto']); 
unset($_SESSION['datefrom']); 
?>