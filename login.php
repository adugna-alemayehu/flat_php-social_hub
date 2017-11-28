<?php
require('db.php');
session_start();

$email = $connection->escape_string($_POST['l_mail']);
$result = $connection->query("select *from account where email='$email'");
if ($result->num_rows == 0) {
    //$_SESSION['message']="user with the email u entered doesn't exist";
    //header('location:error');
    echo "invalid email";
    die;
} else {
    $user = $result->fetch_assoc();
    //echo "the check box value".$_POST['autolog'];
    //die;
    // print_r($user);
    if (password_verify($_POST['l_password'], $user['password'])) {
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['logged_in'] = true;
    
        if ($_POST['l_auto']=='on') {
            $passhash = password_hash($_POST['l_password'], PASSWORD_BCRYPT);
            setcookie('auto', 'mail=' . $email . '&hasher=' . $passhash, time() + (60 * 60 * 24 * 7));
        }
        header('location:timeline.php');
        die;
    } else {
        //$_SESSION['message']="the password that you entered is inccorect";
        //header('location:error.php');
        echo "Incorrect Password";
        die;
    }
}
?>


