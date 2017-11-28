<?php
require('db.php');
session_start();
if (isset($_POST['idea']) and !empty($_POST['idea'])) {
    $sql = "INSERT INTO `post` (`user_id`,`body`) VALUES ('" . $_SESSION['id'] . "','" . $_POST['idea'] . "')";
    $connection->query($sql);
}
?>

