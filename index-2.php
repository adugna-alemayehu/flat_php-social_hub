<?php
require 'db.php';
session_start();
$_SESSION['message'] = "";
if (isset($_SESSION['email'])) {
    header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The PicassoPack</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styler.css">
    <link rel="icon" type="img/jpg" href="resource/headericon.png">
</head>
<?php
if (isset($_COOKIE['auto'])) {
    require 'auto_login.php';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {//user login
        session_unset($_SESSION['message']);
        require 'login.php';
    } elseif (isset($_POST['signup'])) {//user sign up
        require 'register.php';
    }
}
?>
<body>
<div class="jumbotron">
    <h3 class="heading text-center">
        <strong class="text-primary">Welcome to the AastuHub.com</strong>
        <small>please login or create an account to interact with aastu community for more info press the
            <kbd>Help</kbd> button
        </small>
    </h3>
    <p class="text-center">
        <button class="center btn btn-info">Help</button>
    </p>
</div>
<div class="container col-md-5 col-md-push-3">
    <ul id="mytab" class="nav nav-tabs">
        <li class="active"><a data-toggle='tab' href="#login">Log-In</a></li>
        <li><a data-toggle='tab' href="#signup">Sign-Up</a></li>
    </ul>
    <div class="tab-content">
        <div id="login" class="tab-pane fade in active well">
            <form role="form" method="post" action="index.php" autocomplete="off">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="email" id="l_email" name="l_mail" required
                           autocomplete="off">
                    <p id="err_email"></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="l_pass" name="l_password"
                           required autocomplete="off">
                    <p id="err_pass"></p>
                </div>
                <div class="checkbox checkbox-primary checkbox-circle">
                    <label class="">
                        <input type="checkbox" name="autolog" class="">Remember me
                    </label>
                </div>
                <div class="form-group form-inline">
                    <input type="submit" class="btn btn-primary" value="Login" id="submit" name="login">
                </div>
                <div class="text-right">
                    <a href="forgot.php" class="text-danger">forgot password?</a>
                </div>
                <div class="clear-fix"></div>

            </form>
        </div>

        <div id="signup" class="tab-pane fade in well">
            <form role="form" id="reg_form" autocomplete="off" action="index.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="f_name" placeholder="first name" name="first_name"
                           required pattern="[a-zA-Z]{4,10}" title="number is not allowed">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="l_name" placeholder="last name" name="last_name"
                           required pattern="[a-zA-Z]{2,10}" title="number is not allowed">
                </div>
                <div class="form-group">
                    <input type="file" id="image" value="Image" class="form-control-file" aria-describedby="filehelp">
                    <small class="form-text text-muted">insert picture</small>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pass" placeholder="Password" name="password"
                           required pattern="[a-z*nA-Z*0-9]{4,8}"
                           title="password must contain combination of letters and numbers minimum of 4">
                    <p id="err" class="text-danger" style="display:none"></p>

                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="conf" placeholder="Confirm" required>
                </div>
                <div class="form-group form-inline btn-group">
                    <input type="submit" class="form-control btn btn-primary" id="submit" value="Sign_up" name='signup'>
                    <input type="reset" class="form-control btn btn-danger" id="reset" value="reset">
                </div>
            </form>
        </div>
    </div>
    <h1 class="heading well">Welcome to the AastuHub.com
        <small>please login or create an account to interact with aastu communit</small>
    </h1>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#pass').change(function () {
            $('#err').css('display', 'none');
            $('#conf').val("");
        });

        function password_defence(password, confirm, id) {
            if (password != confirm) {
                var display = $("#" + id);
                display.css('display', 'block');
                display.text("password doesn't much please make sure your passwoord is unforgetable");
                return false;
            }
            display.css('display', 'none');
            return true;
        }

        $('#reg_form').on('submit', function () {
            var pass = $('#pass').val();
            var conf = $('#conf').val();
            var idd = $('#err').attr('id');
            //alert(idd);
            return password_defence(pass, conf, idd);
        });
    });
</script>
</body>
</html>