<script type="text/javascript">
    function hoi(id){
        swal({
            title: '<?=_DELCONFIRM?>',
            text: "<?=_DELWARNING?> <?=_PRODUCT?>",
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
                    window.location.href="process_pro-del-"+id+".html";});
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
            <small><?=_PRODUCT?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
            <li><a href="danh-sach-san-pham.html"><?=_PRODUCT?></a></li>
            <li class="active"><?=_LIST?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <!-- general form elements disabled -->
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
                                
                                elseif(isset($_SESSION['theloai']))
                                {
                                    $id = $_SESSION['theloai'];
                                }
                                $d = getFectch($link,'of_category');
                                foreach($d  as $d_cat)
                                {?>
                                <option value="<?= $d_cat['id'] ?>" <?php if($d_cat['id']== $id ) echo "selected"; ?>><?= $d_cat[$_SESSION['ad_lang'].'_name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?=_PIC?></th>
                                <th><?=_NAME?> VN</th>
                                <th><?=_NAME?> EN</th>
                                <th><?=_PRICE?></th>
                                <th><?=_STATUS?></th>
                                <th><a href="them-san-pham.html"><?=_ADD?></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
							if(!isset($_POST['change'])) 
							{
								$sql="select * from `of_category` where `active`=1 limit 1";
								$r=mysqli_query($link,$sql);
								$rs=mysqli_fetch_assoc($r);
								$id=$rs['id'];
							}
							
                            $i=1;
                            $d = sql_select_pro($link,'of_food',$id);
                            foreach ($d as $d_pro) 
                            {?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td> <img src="../img/sp/<?php echo $d_pro['img_url']; ?>" alt="Chưa có Hình" width="120" height="100"></td>
                                <td><?php echo $d_pro['vi_name'] ?></td>
                                <td><?php echo $d_pro['en_name'] ?></td>
                                <td> <?php echo number_format($d_pro['price']) ?> VNĐ</td>
                                <td><?php if($d_pro['active']==0) {echo "<a href=\"process-pro-s{$d_pro['id']}.html\" data-toggle=\"tooltip\" title=\"Ẩn\">X</a>";}
                                    elseif($d_pro['active']==1)
                                    {
                                        echo "<a href=\"process-pro-h{$d_pro['id']}.html\"><i class=\"fa fa-eye\" data-toggle=\"tooltip\" title=\"Hiện\"></i></a>";
                                    }else
                                    {
                                        echo "<span style='color:red;'>"; echo _OUTOFSTOCK ; echo "</span>";
                                    }
                                    ?></td>
                                <td><a href="edit_pro-<?php echo $d_pro['id'] ?>.html"><?=_EDIT?></a>/<a id="test_xoa" onclick="hoi(<?=$d_pro['id'] ?>)" style="cursor: pointer"><?=_DELETE?></a></td>
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
<!-- /.content-wrapper --><?php unset($_SESSION['sua']);

unset($_SESSION['them']); 
unset($_SESSION['idxoa']); ?>