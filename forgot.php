<?php
require 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $connection->escape_string($_POST['email']);
    echo $email;
    $result = $connection->query("select *from account where email='$email'") or die($connection->error);
    if ($result->num_rows == 0) {
        $_SESSION['message'] = "$email the email that you enterd doesnot exist please sign up first";
        header('location:error');
    } else {
        $user = $result->fetch_assoc();
        $email = $user['email'];
        $first_name = $user['first_name'];
        $hash = $user['hash'];
        $_SESSION['message'] = "<p>please <span class='bg-muted text-danger'>$first_name</span> check your email we will send a reset link to <span class='bg-muted text-danger'>$email</span> to allow you to regain your account</p>";
        $to = $email;
        $subject = "password reset";
        $body = "hello $first_name please click the link to reset your password" .
            "http://localhost/Q_A/reset.php?email='$email'" . "hash='$hash'";

        mail($to, $subject, $body);
        //sending to mail.php
        $_SESSION['mail'] = "hello $first_name please click the link to reset your password" . "<a href='http://localhost/Q_A/reset.php?email='$email'" . "hash='$hash''>reset password</a>";
        header('location:success.php');

    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="img/jpg" href="resource/headericon.png">
    <script src="js/jquery-1.4.1.js"></script>
    <script src="js/bootstrap_new.min.js"></script>
</head>
<body class="container">
<div class="container-fluid row">
    <div class="col-md-3"></div>
    <div class="col-md-6 alter alter-info">
        <form role="form" method="post" action="forgot.php">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="email*" name="email">
            </div>
            <div class="form-group">
                <button class="form-control btn btn-info">Enter</button>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
</body>
</html>