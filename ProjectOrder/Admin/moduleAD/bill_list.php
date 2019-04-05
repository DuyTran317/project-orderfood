<script type="text/javascript">
    function hoi(id){
        swal({
            title: '<?=_DELCONFIRM?>?',
            text: "<?=_DELWARNING?> <?=_RECEIPT?> ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?=_DELETE?>!',
            cancelButtonText: '<?=_CANCEL?>!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swal(
                    '<?=_DELETE?>!',
                    '<?=_DELSUCCESS?>!',
                    'success'
                ).then(function(){
                    window.location.href="?mod=process_bill&mahd="+id;});
            }
        })

    }
</script>
<script src="../jqueryUI/jquery-ui-admin.js"></script>
<?php
    if(isset($_POST['datefrom']))
    {
        $datefrom=$_POST['datefrom'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($datefrom,0,2);
        $m= substr($datefrom,3,2);
        $y= substr($datefrom,6,4);
        
        $datefrom="{$y}-{$m}-{$d} 00:00:00";     
    }
    if(isset($_POST['dateto']))
    {
        $dateto=$_POST['dateto'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($dateto,0,2);
        $m= substr($dateto,3,2);
        $y= substr($dateto,6,4);
        
        $dateto="{$y}-{$m}-{$d} 23:59:59";

    }   
   
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=_LIST?>
            <small><?=_RECEIPT?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-hoa-don.html"><?=_RECEIPT?></a></li>
            <li class="active"><?=_LIST?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
             <div class="row center" style="text-align:left; margin-left: 15px; ">
                    <form action="danh-sach-hoa-don.html" method="post">
                        <div class="box-body">
                              <!-- Date -->
                              <div class="form-group">
                                <label><?=_FROM?>:</label>

                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="datepicker" readonly="" class="datefrom" name="datefrom">
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
                                  <input type="text" class="form-control pull-right" id="datepicker1" readonly="" class="dateto" name="dateto">
                                </div>
                                <!-- /.input group -->
                              </div>
                              <!-- /.form group -->
                        </div>
                        <div class="box-body">
                            <button type="submit" class="btn btn-success"><?=_SEARCH?></button>
                        </div>
                    </form>    
                </div>
            </div>
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?=_RECEIPT?> #</th>
                                <th><?=_TABLE?></th>
                                <th><?=_TOTAL?></th>
                                <th><?=_DATE?></th>
                                <th><?=_HOUR?></th>
                                <th><?=_ACTION?></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_POST['datefrom'])&&isset($_POST['dateto'])){
                                if($datefrom>$dateto)
                                    {
                                        echo "<script type='text/javascript'>";
                                            echo "setTimeout(function () { swal('Lỗi',
                                                          'Bạn hãy chọn đúng ngày!',
                                                          'error');";
                                            echo "},1);</script>";
                                        }
                            $sql_bill = "select * from `of_bill` where `date` <= '{$dateto}' and `date` >= '{$datefrom}' ";
                            $i=1;
                            $kq_bill = mysqli_query($link,$sql_bill);
                        }else{
							
                            $sql_bill = "select * from `of_bill` where DATE(`date`) =  CURDATE()";
                            $i=1;
                            $kq_bill = mysqli_query($link,$sql_bill); 
							echo "<span style='font-size:18px;  text-decoration: underline;'>"; echo _RECEIPTLIST; echo "</span><hr>";
							                        }
                            while($d_bill=mysqli_fetch_assoc($kq_bill))
                            {
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $d_bill['code_order'] ?></td>
                               	<td><?= $d_bill['num_table'] ?></td>
                               	<td><?= number_format($d_bill['total']) ?></td>
                               	<td><?= date("d/m/Y", strtotime( $d_bill['date']))?></td> 
                                <td><?= date("H:i:s", strtotime( $d_bill['date']))?></td> 
                                <td><a href="index.php?mod=bill_detail&id=<?= $d_bill['order_id'] ?>&mahd=<?= $d_bill['id'] ?>"><?=_DETAIL?></a></td>
                            </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
    if(isset($_POST['datefrom']))
    {
        $datefrom=$_POST['datefrom'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($datefrom,0,2);
        $m= substr($datefrom,3,2);
        $y= substr($datefrom,6,4);
        
        $fdatefrom="{$d}/{$m}/{$y}";     
    }
    if(isset($_POST['dateto']))
    {
        $dateto=$_POST['dateto'];
        
        //Chuyen format $dob tu dd/mm/yyyy -> yyyy-mm-dd
        $d= substr($dateto,0,2);
        $m= substr($dateto,3,2);
        $y= substr($dateto,6,4);
        
        $fdateto="{$d}/{$m}/{$y}";

    }   

?>