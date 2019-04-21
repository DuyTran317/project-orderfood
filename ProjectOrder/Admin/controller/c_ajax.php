<?php
session_start();
if(isset($_POST['act'])) {
    $act = $_POST['act'];
} else $act = 0;
// thêm phần tử vào mảng SESSION
    if($act == 1)
    {
        if(isset($_POST['name_array']))
        {
            $_SESSION[$_POST['name_array']][$_POST['id_tag']] = $_POST['name_tag'];
        }

    }
// xóa phần tử vào mảng SESSION
    if($act == 2)
    {
        if(isset($_POST['name_array']))
        {
            unset($_SESSION[$_POST['name_array']][$_POST['id_tag']]);
        }

    }
?>