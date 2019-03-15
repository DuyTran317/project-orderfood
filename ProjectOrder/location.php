<?php
// đăng xuất người dùng
require_once("../../lib/connect.php");
ob_start();
    if(isset($_COOKIE['userid_login']))
    {
        $sql = "update `of_user` set `active`=1 where `id`={$_COOKIE['userid_login']} and `active`=2";
        if($r = mysqli_query($link,$sql))
        {
            unset($_COOKIE['userid_login']);
            setcookie('userid_login',0,time()-1);
            ?>
                <script>
                    alert("bạn đang ở ngoài khu vực nhà hàng");
                    window.location = "../../index.php?mod=dangnhap";
                </script>
            <?php
        }
    }
?>