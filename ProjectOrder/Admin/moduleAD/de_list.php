<script type="text/javascript">
    function hoi(id){
        swal({
            title: '<?=_DELWARNING?>',
            text: "<?=_DELCATEWARNING?>",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?=_DELETE?>',
            cancelButtonText: '<?=_CANCEL?>',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swal(
                    'Xóa!',
                    'Bạn đã xóa thành công!',
                    'success'
                ).then(function(){
                    window.location.href="process_de-del-"+id+".html";});
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
            <small><?=_DEPARTMENT?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-chung-loai.html"><?=_DEPARTMENT?></a></li>
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
                                <th><?=_PIC?></th>
                                <th><?=_NAME?> (VN)</th>
                                <th><?=_NAME?> (EN)</th>
                                <th><?=_STATUS?></th>
                                <th><a href="them-chung-loai.html"><?=_ADD?></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $d = getFectch($link,'of_department');
                            foreach($d as $d_de)
                            {
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                 <td> <img src="../img/cate/<?php echo $d_de['img_url']; ?>" alt="Chưa có Hình" width="120" height="100"></td>
                                <td><?= $d_de['vi_name'] ?></td>
                                <td><?= $d_de['en_name'] ?></td>
                                <td><?php if($d_de['active']==0) {echo "<a href=\"process-de-s{$d_de['id']}.html\" data-toggle=\"tooltip\" title=\"Ẩn\">X</a>";}
                                    else
                                    {
                                        echo "<a href=\"process-de-h{$d_de['id']}.html\"><i class=\"fa fa-eye\" data-toggle=\"tooltip\" title=\"Hiện\"></i></a>";
                                    }
                                    ?></td>
                                <td><a href="edit_de-<?= $d_de['id'] ?>.html"><?=_EDIT?></a>/<a id="test_xoa" onclick="hoi(<?=$d_de['id'] ?>)" style="cursor: pointer"><?=_DELETE?></a></td>
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