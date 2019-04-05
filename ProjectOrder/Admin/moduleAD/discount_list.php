<script type="text/javascript">
    function hoi(id){
        swal({
            title: '<?=_DELCONFIRM?>',
            text: "<?=_DELWARNING?> <?=_PROMOTION?>",
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
                    window.location.href="process_dis-del-"+id+".html";});
            }
        })

    }
</script>     
<div class="wrapper"> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=_LIST?>
            <small><?=_PROMOTION?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-khuyen-mai.html"><?=_PROMOTION?></a></li>
            <li class="active"><?=_LIST?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?=_PROMOTION?> (%)</th>
                                <th><?=_FROM?></th>
                                <th><?=_TO?></th>
                                <th><?=_STATUS?></th>
                                <th><a href="them-khuyen-mai.html"><?=_ADD?></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_dis = "select * from of_discount order by id DESC";
                            $i=1;
                            $kq_dis = mysqli_query($link,$sql_dis);
                            while($d_dis=mysqli_fetch_assoc($kq_dis))
                            {
                               
                                
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $d_dis['discount'] ?></td>
                                <td><?php  
                                        $datefrom = $d_dis['create_at'];
                                        $date = new DateTime($datefrom);
                                        echo $date->format('d/m/Y'); ?></td>
                                <td><?php 
                                     $dateto = $d_dis['end_at'];
                                        $date1 = new DateTime($dateto);
                                        echo $date1->format('d/m/Y'); ?>
                                </td>
                                <td><?php if($d_dis['active']==0) {echo "<a href=\"process-dis-s{$d_dis['id']}.html\" data-toggle=\"tooltip\" title=\"Ẩn\">X</a>";}
                                    else
                                    {
                                        echo "<a href=\"process-dis-h{$d_dis['id']}.html\"><i class=\"fa fa-eye\" data-toggle=\"tooltip\" title=\"Hiện\"></i></a>";
                                    }
                                    ?></td>
                                <td><a href="edit_discount-<?= $d_dis['id'] ?>.html"><?=_EDIT?></a>/<a id="test_xoa" onclick="hoi(<?=$d_dis['id'] ?>)" style="cursor: pointer"><?=_DELETE?></a></td>
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
</div>
<!-- /.content-wrapper -->
<?php unset($_SESSION['sua']); 
unset($_SESSION['them']); 
?>