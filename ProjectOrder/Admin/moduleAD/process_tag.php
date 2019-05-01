<?php

    if(isset($_POST['add_tag']))
    {
        if (!addTag($link, $_POST['vi_tag'], $_POST['en_tag'])) {
            echo "<script> alert('thêm tag thất bại!'); </script>";
        }
        echo "<script> window.location = 'danh-sach-tag.html';</script>";
    }
    if(isset($_POST['save_tags_food']))
    {
        if(isset($_POST['food_id']))
        {
            saveTagsFood($link,$_POST['food_id']);
        }
        echo "<script> window.location = '?mod=add_food_tag';</script>";
    }



    if(isset($_POST['edit_tag']))
    {
        if (!editTag($link, $_POST['edit_vi_tag'], $_POST['edit_en_tag'])) {
            echo "<script> alert('thêm tag thất bại!'); </script>";
        }
        echo "<script> window.location = 'danh-sach-tag.html';</script>";
    }
    

    if(isset($_GET['del']))
    {
        $sql_del = sql_delete_de('of_tag');;
        if(mysqli_query($link,$sql_del))
        {
            header("location:danh-sach-tag.html");
        }else echo $sql_del;
    }
?>