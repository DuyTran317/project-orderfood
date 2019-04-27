<?php
    if(isset($_SESSION['tag'])) unset($_SESSION['tag']);
    $_SESSION['tag'] = array();

    if(isset($_GET['cate']))
    {
        $_SESSION['id_cate'] = $_GET['cate'];
    }else if(!isset($_SESSION['id_cate'])) $_SESSION['id_cate'] = 1;

    if(isset($_GET['food']))
    {
        $id_food = $_GET['food'];
        $ds_tags_food = selectAllTagsFood($link,$id_food);
        foreach ($ds_tags_food as $i)
        {
            $temp = selectTag($link,$i['id_tag']);
            $_SESSION['tag'][$temp['id']] = $temp['vi_name'];
        }
    }

    $ds_tag= selectAllTag($link);
    $ds_cate = selectAllCate($link);
    $ds_food = selectFoodCate($link,$_SESSION['id_cate']);


?>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?=_ADD?>
                <small>Tag</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="trang-chu.html"><i class="fa fa-dashboard"></i><?=_HOME?></a></li>
                <li><a href="danh-sach-chung-loai.html"><?=_DEPARTMENT?></a></li>
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
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?=_CATEGORY?></span></label>
                                <div class="form-group">
                                    <select class="form-control" onchange="loadFoodCate(this.value)"  style="border-radius: 5px 5px 5px 5px;">
                                        <?php
                                            foreach ($ds_cate as $i)
                                            {
                                        ?>
                                        <option value="<?=$i['id']?>" <?php if($_SESSION['id_cate'] == $i['id']) echo "selected"; ?>><?=$i[$_SESSION['ad_lang'].'_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data" action="?mod=process_tag">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?=_DISH?></span></label>
                                    <div class="form-group">
                                        <select class="form-control" onchange="loadFoods(<?=$_SESSION['id_cate']?>,this.value)" name="food_id"  style="border-radius: 5px 5px 5px 5px;">
                                            <option style="display: none"></option>
                                            <?php
                                                foreach ($ds_food as $i)
                                                {
                                            ?>
                                                <option value="<?=$i['id'] ?>" <?php if(isset($id_food) && $id_food == $i['id']) echo "selected"; ?>><?=$i[$_SESSION['ad_lang'].'_name'] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group" >
                                    <label for="exampleInputEmail1"><?=_TAGLIST?></span></label>
                                    <div style=" max-height: 200px; overflow-y: auto;">
                                        <?php
                                            foreach ($ds_tag as $i)
                                            {
                                        ?>
                                        <div class="checkbox">
                                            <label>
                                                <input id="checkbox<?=$i['id']?>" type="checkbox" onchange="setArrayTag('checkbox<?=$i['id'] ?>','<?=$i['vi_name']?>')" value="<?=$i['id'] ?>"
                                                        <?php if(isset($ds_tags_food)) { foreach ($ds_tags_food as $tag){if($tag['id_tag'] == $i['id']) {echo "checked";break;}}} ?>>
                                                <?=$i[$_SESSION['ad_lang'].'_name'] ?>
                                            </label>
                                        </div>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <?php
                                    $message=_PLZCHOOSEFOOD;

                                ?>
                                <button <?php if(!isset($id_food)) echo "onclick=\"alert('$message')\""; else echo 'type="submit"' ?>  name="save_tags_food" class="btn btn-primary"><?=_ADD?></button>
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
<script>
    function  loadFoodCate(id) {
        window.location = "index.php?mod=add_food_tag&cate="+id;
    }
    function  loadFoods(id_cate,id) {
        window.location = "index.php?mod=add_food_tag&cate="+id_cate+"&food="+id;
    }
    function setArrayTag(id,name) {
        var id_tag = $('#'+id).val();

        if($('#'+id).is(":checked")) {
            $.ajax({
                url:'controller/c_ajax.php',
                type:'POST',
                data:{id_tag: id_tag, name_tag: name, name_array:"tag", act: 1}
            }).done(function(data){

            });
        }
        else
        {
            $.ajax({
                url:'controller/c_ajax.php',
                type:'POST',
                data:{id_tag: id_tag, name_tag: name, name_array:"tag", act: 2}
            }).done(function(data){

            });
        }
    }

</script>
<!-- ./wrapper -->