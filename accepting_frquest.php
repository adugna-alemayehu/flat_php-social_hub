<?php
session_start();
include("db.php");
$target = $_POST['fr_id'];
$sql = "UPDATE `friend_relation` SET `state`=1,`trig_er`='" . $_SESSION['id'] . "' WHERE ((user_one='" . $_SESSION['id'] . "' or user_two='" . $_SESSION['id'] . "') AND (user_one='$target' OR user_two='$target'))";
$connection->query($sql);
?>