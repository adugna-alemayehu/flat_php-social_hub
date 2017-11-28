<?php
//the verification email redirect the user to this page
if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $connection->escape_string($_GET['email']);
    $hash = $connection->escape_string($_GET['hash']);
    $result = $connection->query("select *from account where email='$email' and hash='$hash' and active='0'");
    if ($result->num_row == 0) {
        $_SESSION['message'] = "account has already activated or the link is inccorrect";
        header('location:error.php');
    } else {
        $_SESSION['message'] = "your account has been successufully activated enjoy PicassoPack";
        //set the user activation status on
        $connection->query("update account set active='1' where email='$email'")
        or die($connection->error);
        $_SESSION['active'] = 1;
        header('location:profile.php');
    }
} else {
    $_SESSION['message'] = "invalid parametr please be sure and have fun!";
    header('location:error');
}
?>