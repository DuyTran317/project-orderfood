<?php
session_start();
ob_start();
session_destroy();
header("location:login.php");

setcookie("userad","",time()-1);
setcookie("idad","",time()-1);
setcookie("catead","",time()-1);

?>