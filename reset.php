<?php
require 'db.php';
session_start();
if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $connection->escape_string($_GET['email']);
    $hash = $connection->escape_string($_GET['hash']);
    $result = $connection->query("select *from account where email='$email' and hash='$hash'");
    if ($result->num_rows == 0) {
        $_SESSION['message'] = "the link that you used is not valid for password reset";
        header('location:error.php');
    } else {
        $_SESSION['message'] = "Sorry, verification failed, try again!";
        header("location: error.php");
    }
}
?>
<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="img/jpg" href="resource/headericon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap_new.min.js"></script>
</head>
<body class='container-fluid'>
<div class="container row">
    <div class="col-md-3"></div>
    <div class="col-md-6 alert-success">
        <form role="form" id="reset_form" action="password_reset.php" method="post">
            <div class="header text-center text-info">
                <h2>choose new password</h2>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="New password*" name="n_pass" id="n_pass"
                       required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="confirm password*" name="n_conf" required
                       id="n_conf">
            </div>
            <div>
                <p id="err" class="text-danger" style="display:none"></p>
            </div>
            <div class="from-group text-center">
                <input type="submit" class="btn btn-success text-center" value="APPLY">
            </div>
            <!--we need to keep the email and the hash from the reset link-->
            <input type="email" value="<?php $email ?>" hidden name="email">
            <input type="text" value="<?php $hash ?>" hidden name="email">

        </form>
    </div>
    <div class="col-md-3"></div>
</div>


<script>
    $(document).ready(function () {
        function password_defence(password, confirm, id) {
            if (password != confirm) {
                var display = $("#" + id);
                display.css('display', 'block');
                display.text("password doesn't match please make sure your passwoord is unforgetable");
                return false;
            }
            display.css('display', 'none');
            return true;
        }

        $('#reset_form').on('submit', function () {

            var pass = $('#n_pass').val();
            var conf = $('#n_conf').val();
            var idd = $('#err').attr('id');
            return password_defence(pass, conf, idd);
        });
    });
</script>
</body>
</html>