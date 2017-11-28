<?php
//include "db.php";
//session_start();

if (isset($_COOKIE['auto'])) {
    parse_str($_COOKIE['auto']);
    $sql = "select * from account where email='$mail'";
    $result = $connection->query($sql);
    if ($users = $result->fetch_assoc()) {
        $_SESSION['first_name'] = $users['first_name'];
        $_SESSION['id'] = $users['id'];
        $_SESSION['last_name'] = $users['last_name'];
        $_SESSION['email'] = $users['email'];
        $_SESSION['active'] = $users['active'];
        $_SESSION['logged_in'] = true;
        header('location:timeline.php');
    }

}
?>