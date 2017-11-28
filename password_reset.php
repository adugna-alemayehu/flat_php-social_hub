<?php
require 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = password_hash($_POST['n_pass'], PASSWORD_BCRYPT);
    $email = $connection->escape_string($_POST['email']);
    $hash = $connection->escape_string($_POST['hash']);
    $sql = "update account set password='$new_password',hash='$hash' where email='$email'";
    if ($connection->query($sql)) {
        $_SESSION['MESSAGE'] = "the password successfully reseted!";
        header('location:success.php');
    } else {
        die($connection->error);
    }
}
?>