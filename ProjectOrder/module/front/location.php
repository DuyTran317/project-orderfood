<?php
// đăng xuất người dùng
require_once("../../lib/connect.php");
ob_start();
    if(isset($_COOKIE['userid_login'])&&$_COOKIE['userid_login']!=0)
    {
        $sql = "update `of_user` set `active`=1 where `id`={$_COOKIE['userid_login']} and `active`=2";
        if($r = mysqli_query($link,$sql))
        {
            setcookie("username_login", 0, time() - 3600, "/");
            setcookie("userid_login", 0, time() - 3600, "/");
            ?>
                <script>
                    window.location = "../../index.php?mod=dangnhap";
                </script>
            <?php
        }
    }
?>