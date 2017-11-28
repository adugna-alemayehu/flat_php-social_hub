<?php
session_start();
include('db.php');
$target = $_POST['searched'];
if ($target > $_SESSION['id']) {
    $sql = "INSERT INTO `friend_relation` (`user_one`, `user_two`, `state`, `trig_er`) VALUES ('" . $_SESSION['id'] . "', '" . $target . "', '0', '" . $_SESSION['id'] . "')";
} else {
    $sql = "INSERT INTO `friend_relation` (`user_one`, `user_two`, `state`, `trig_er`) VALUES ('" . $target . "', '" . $_SESSION['id'] . "', '0','" . $_SESSION['id'] . "')";
}
$connection->query($sql);
echo "friend request sent";
?>