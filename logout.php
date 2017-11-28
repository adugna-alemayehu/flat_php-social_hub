<?php
setcookie("auto", 0, time() - (60 * 60 * 24 * 7));
session_start();
session_unset();
session_destroy();
header('location:index.php');
?>
