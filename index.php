<?php
require 'db.php';
session_start();
$_SESSION['message'] = "";
if (isset($_SESSION['email'])) {
    header("location:profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The PicassoPack</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/form-elements.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="img/jpg" href="resource/headericon.png">
    <?php
    if (isset($_COOKIE['auto'])) {
        require 'auto_login.php';
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['signup'])) {//user sign up
            require 'register.php';
        }
    }
    ?>
</head>

<body>
<div class="container-fluid pull-right">
    <select id="select">
        <option value="1">Classic</option>
        <option value="2">Modern</option>
    </select>
</div>
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-1 text">
                    <h1><strong>WELCOME TO</strong> AASTU COMMUNITY HUB</h1>
                    <blockquote class="blockquote ">
                        Communication must be HOT, That's Honest,Open and Two-way
                        <small>Dan Oswald</small>
                    </blockquote>
                    <div class="description">
                        <p>
                            This is social hub for aastu students <strong> please Login or Sign up</strong> to get
                            connected.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-md-push-3">
                    <ul id="mytab" class="nav nav-tabs">
                        <li class="active"><a data-toggle='tab' href="#login">Log-In</a></li>
                        <li><a data-toggle='tab' href="#signup">Sign-Up</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="login" class="tab-pane fade in active">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login to your account</h3>
                                    <p>Enter username and password to log on:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" method="post" autocomplete="off" id="loger">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="email" id="l_email"
                                               name="l_mail" required autocomplete="off" autofocus>
                                        <span class="text-danger" id="email_h"></span>
                                        <p id="err_email"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" id="l_pass"
                                               name="l_password" required autocomplete="off">
                                        <span class="text-danger" id="pass_h"></span>
                                        <p id="err_pass"></p>
                                    </div>
                                    <div class="checkbox checkbox-primary checkbox-circle">
                                        <label class="">
                                            <input id="l_auto" type="checkbox" name="autolog" class="">Remember me
                                        </label>
                                    </div>
                                    <div class="form-group form-inline">
                                        <input type="button" class="btn btn-primary" value="Login" id="submit"
                                               name="login">
                                    </div>
                                    <div class="text-right">
                                        <a href="forgot.php" class="text-danger">forgot password?</a>
                                    </div>
                                    <div class="clear-fix"></div>

                                </form>
                            </div>
                            <div class="social-login">
                                <h3>...or login with:</h3>
                                <div class="social-login-buttons">
                                    <a class="btn btn-link-2" href="#">
                                        <i class="fa fa-facebook"></i> Facebook
                                    </a>
                                    <a class="btn btn-link-2" href="#">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>
                                    <a class="btn btn-link-2" href="#">
                                        <i class="fa fa-google-plus"></i> Google Plus
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div>
                        </div>
                        <div id="signup" class="tab-pane fade in">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Signup to our site</h3>
                                    <p>Fill the form bellow:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" id="reg_form" autocomplete="off" action="index.php" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="f_name" placeholder="first name"
                                               name="first_name" required pattern="[a-zA-Z]{4,50}"
                                               title="number is not allowed/atleast 4">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="l_name" placeholder="last name"
                                               name="last_name" required pattern="[a-zA-Z]{2,50}"
                                               title="number is not allowed/atleast 2">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" id="image" value="Image" class="form-control-file"
                                               aria-describedby="filehelp">
                                        <small class="form-text text-muted">inser picture</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail"
                                               name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="pass" placeholder="Password"
                                               name="password" required pattern="[a-z*nA-Z*0-9]{4,8}"
                                               title="password must contain combination of letters and numbers minimum of 4">
                                        <p id="err" class="text-danger" style="display:none"></p>

                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="conf" placeholder="Confirm"
                                               required>
                                    </div>
                                    <div class="form-group form-inline btn-group">
                                        <input type="submit" class="form-control btn btn-primary" id="submit"
                                               value="Sign_up" name='signup'>
                                        <input type="reset" class="form-control btn btn-danger" id="reset"
                                               value="reset">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 col-sm-offset-1">
                <div class="footer-border"></div>
                <p><i class="fa fa-copyright"></i><?php echo date('Y'); ?> PicassoPack Inc. <a
                            href="adexdealex@gmail.com" target="_blank"><strong>Adugna Alemayehu</strong></a>
                    Enjoy!! <i class="fa fa-smile-o"></i></p>

                <p>the source code to this project is available on <a href="www.github.com/adugna/repository//"><i
                                class="fa fa-github"> Github</i></a></p>
            </div>

        </div>
    </div>
</footer>
<!-- Javascript -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.backstretch.js"></script>
<script src="js/scripts.js"></script>


<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->
<script>
    $(document).ready(function () {
        //$(body).css("background-color:000000");
        //$.backstretch("");
        $.backstretch("resource/black.jpg");
        $("#submit").click(function (data) {
            var email = $('#l_email').val();
            var pass = $('#l_pass').val();
            var auto= $('#l_auto').val();
            $.post("login.php", {
                l_mail: email,
                l_password: pass,
                l_auto:auto
            }, function (data) {
                var em_rr = "user with the email u entered doesn't exist";
                var ps_rr = "the password that you entered is inccorect";
                var respnsed = data + "";
                if (data.localeCompare("invalid email") == 0) {
                    $('#email_h').text(data);
                }
                else if (data.localeCompare("Incorrect Password") == 0) {
                    $('#pass_h').text(data);
                }
                else {
                    window.location.reload();
                }
            });
        });
        $('#l_pass').keydown(function () {
            $('#pass_h').text("");
        });
        $('#l_email').keydown(function () {
            $('#email_h').text("");
        });
        /* var select=document.getElementById("select");
         $("#select").change(function(){
            if(this.value=="1"){
                 $.backstretch(null);
            }else{

            }
         });*/

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