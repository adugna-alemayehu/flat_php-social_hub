<?php
//set session variable to be dsiplayed on the profile page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['last_name'] = $_POST['last_name'];

//escape all post variable agains sql injection
$first_name = $connection->escape_string($_POST['first_name']);
$last_name = $connection->escape_string($_POST['last_name']);
$email = $connection->escape_string($_POST['email']);
$password = $connection->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $connection->escape_string(md5(rand(0, 1000)));

// check if the user with the newly given email existed
$result = $connection->query("select *from account where email='$email'") or die($connection->error());

//check if there is a row returned
if ($result->num_rows > 0) {
    $_SESSION['message'] = 'user with this email already exists';
    header('location:error.php');
} else {
    $sql = "insert into account (first_name,last_name,email,password,hash) values" .
        "('$first_name','$last_name','$email','$password','$hash')";
    if ($connection->query($sql)) {
        $query = "select *from account where email='$email'";
        $res = $connection->query($query);
        $pack = $res->fetch_assoc();
        $_SESSION['id'] = $pack['id'];
        $_SESSION['active'] = 0;
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] = "confirmation link has been sent to $email"
            . "please cofirm the account thanks from PicassoPack.com";

        $to = $email;
        $subject = "email verification";
        $body = "hello $firs_name"
            . "thanks for signing up to picasso pack" .
            "please verify your account by clicking this link: " .
            "http://localhost/Q_A/verify.php?email='$email' hash='$hash'";
        mail($to, $subject, $body);
        header('location:timeline.php');
    } else {
        $_SESSION['message'] = "registration faild!" . $connection->error;
        header('location:error.php');
    }
}
?>