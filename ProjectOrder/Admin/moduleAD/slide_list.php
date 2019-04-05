<script type="text/javascript">
    function hoi(id){
        swal({
            title: '<?=_DELCONFIRM?>',
            text: "<?=_DELWARNING?> slide ?",
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
                    window.location.href="process_slide-del-"+id+".html";});
            }
        })

    }
</script>
     
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=_LIST?>
            <small>Slide</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i> <?=_HOME?></a></li>
            <li><a href="danh-sach-slide.html">slide</a></li>
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
                                <th><?=_NAME?> VN</th>
                                <th><?=_NAME?> EN</th>
                                <th><?=_PIC?></th>
                                <th><a href="them-slide.html"><?=_ADD?></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $d = getFectch($link,'of_slider');
                            $i=1;
                            foreach($d as  $d_user)
                            {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d_user['vi_name'] ?></td>
                                    <td><?= $d_user['en_name'] ?></td>
                                    <td><img src="../img/slider/<?= $d_user['img_url'] ?>" width="50" height="50"></td>
                                    <td><a href="edit_slide-<?= $d_user['id'] ?>.html"><?=_EDIT?></a>/<a id="test_xoa" onclick="hoi(<?=$d_user['id'] ?>)" style="cursor: pointer"><?=_DELETE?></a></td>
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
<?php unset($_SESSION['sua']); 
unset($_SESSION['them']); ?>