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

            //thông báo lỗi
            if(isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 1:
                        ?>
                        <script>
                            alert("bạn đang ở ngoài khu vực nhà hàng");
                        </script>
                    <?php
                        break;
                    case 2:
                        ?>
                        <script>
                            alert("User denied the request for Geolocation.");
                        </script>
                        <?php
                        break;
                    case 3:
                        ?>
                        <script>
                            alert("Location information is unavailable.");
                        </script>
                        <?php
                        break;
                    case 4:
                        ?>
                        <script>
                            alert("The request to get user location timed out.");
                        </script>
                        <?php
                        break;
                    case 5:
                        ?>
                        <script>
                            alert("An unknown error occurred.");
                        </script>
                        <?php
                        break;
                        } ?>


                <script>
                    window.location = "../../index.php?mod=dangnhap";
                </script>
                <?php
            }
        }
    }
?>