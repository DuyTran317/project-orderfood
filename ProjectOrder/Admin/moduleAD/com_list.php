<script type="text/javascript">
    function hoi(id){
        swal({
            title: '<?=_DELCONFIRM?>?',
            text: "<?=_DELWARNING?> <?=_RATE?> ?",
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
                    window.location.href="process_com-del-"+id+".html";});
            }
        })

    }
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=_LIST?>
            <small><?=_RATE?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-danh-gia.html"><?=_RATE?></a></li>
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
                                <th><?=_COMMENT?></th>
                                <th><?=_RATE?></th>
                                <th><?=_DATE?></th>
                                <th><?=_HOUR?></th>
                                <th><?=_DELETE?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i =  1;
                            $d = getFectch($link,'of_rate');
                            foreach($d as $d_com)
                            {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d_com['desc'] ?></td>
                                    <td><?php for($j=1;$j<= $d_com['star'];$j++) {?><i class="icon ion-ios-star"></i> <?php } ?></td>                                   
                                    <td><?= date("d/m/Y", strtotime( $d_com['date']))?></td>
                                    <td><?= date("H:i:s", strtotime( $d_com['date']))?></td>
                                    <td><a id="test_xoa" onclick="hoi(<?= $d_com['id'] ?>)" style="cursor: pointer"><?=_DELETE?></a></td>
                               
                               </tr>
                            <?php } 
							$sql="select AVG(star) as tb, SUM(star) as tong from `of_rate`";
							$r=mysqli_query($link,$sql);
							$rs=mysqli_fetch_assoc($r);
							$sql1="select * from `of_rate`";
							$r1=mysqli_query($link,$sql1);
							$dem=mysqli_num_rows($r1);
							if($dem!=0)
							{
							?>
                             
								<tr >
                                	<h3 class="text-info" style="text-align:center;"> <?=_TOTALSTAR?>  <?= $rs['tong']?> <i class="icon ion-ios-star" style="color:#FC0"></i> / <a style="color:#C63"><?=$dem?></a> <?=_RATE?> </h3>
                                </tr>
                                <tr >
                               		<h3 class="text-info" style="text-align:center;"><?=_AVGSTAR?> <?= number_format($rs['tb'],2	)?> <i class="icon ion-ios-star" style="color:#FC0"></i> </h3>
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