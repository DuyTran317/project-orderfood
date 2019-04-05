<script type="text/javascript">
    function hoi(id){
        swal({
            title: '<?=_DELCONFIRM?>',
            text: "<?=_DELWARNING?> <?=_CATEGORY?> ?",
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
                    window.location.href="process_cat-del-"+id+".html";});
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
            <small><?=_CATEGORY?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-the-loai.html"><?=_CATEGORY?></a></li>
            <li class="active"><?=_LIST?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><?=_CATEGORY?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form  name="form1" id="form1" method="post" >
                        <!-- select -->
                        <div class="form-group">
                            <select class="form-control" name="change" onchange="form1.submit();" style="border-radius: 5px 5px 5px 5px;">
                                <?php
                                if(isset($_POST['change'])) {
                                    $id = $_POST['change'];
                                }
                                elseif(isset($_SESSION['chungloai']))
                                {
                                    $id = $_SESSION['chungloai'];
                                }
                                else
                                {
                                    $id=1;
                                }

                                $sql_de = "select * from of_department";
                                $kq_de = mysqli_query($link,$sql_de);
                                while($d_de=mysqli_fetch_assoc($kq_de))
                                {?>
                                <option value="<?= $d_de['id'] ?>" <?php if($d_de['id']== $id) echo "selected"; ?>><?= $d_de[$_SESSION['ad_lang'].'_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?=_NAME?> (VN)</th>
                                <th><?=_NAME?> (EN)</th>
                                <th><?=_STATUS?></th>
                                <th><a href="them-the-loai.html"><?=_ADD?></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql_cat = "select * from of_category where department_id=$id";
                            $i=1;
                            $kq_cat = mysqli_query($link,$sql_cat);
                            while($d_cat=mysqli_fetch_assoc($kq_cat))
                            {
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $d_cat['vi_name'] ?></td>
                                <td><?= $d_cat['en_name'] ?></td>
                                <td><?php if($d_cat['active']==0) {echo "<a href=\"process-cat-s{$d_cat['id']}.html\" data-toggle=\"tooltip\" title=\"Ẩn\">X</a>";}
                                    else
                                    {
                                        echo "<a href=\"process-cat-h{$d_cat['id']}.html\"><i class=\"fa fa-eye\" data-toggle=\"tooltip\" title=\"Hiện\"></i></a>";
                                    }
                                    ?></td>
                                <td><a href="edit_cat-<?= $d_cat['id'] ?>.html"><?=_EDIT?></a>/<a id="test_xoa" onclick="hoi(<?=$d_cat['id'] ?>)" style="cursor: pointer"><?=_DELETE?></a></td>
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