<?php

    if(isset($_POST['add_tag']))
    {
        if (!addTag($link, $_POST['vi_tag'], $_POST['en_tag'])) {
            echo "<script> alert('thêm tag thất bại!'); </script>";
        }
        echo "<script> window.location = '?mod=add_tag';</script>";
    }
    if(isset($_POST['save_tags_food']))
    {
        if(isset($_POST['food_id']))
        {
            saveTagsFood($link,$_POST['food_id']);
        }
        echo "<script> window.location = '?mod=add_food_tag';</script>";
    }
?>