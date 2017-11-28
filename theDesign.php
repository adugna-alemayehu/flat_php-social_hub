<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styler.css">
    <link rel="icon" type="img/jpg" href="resource/image/img_avatar3.png">
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {//user login
        require 'login.php';
    } elseif (isset($_POST['signup'])) {//user sign up
        require 'register.php';
    }
}
?>
<body>
<div class="nav-wrapper" id="header">
    <div class="container">
        <div class="navbar navbar-inverse navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" data-toggle='collapse' data-target='#navbar'
                            aria-expand="false" aria-control="navbars">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">PicassoPack</a>
                    <img src="resource/image/Wallpapers%20(173).jpg" class="img img-circle navbar-brand icon-bar">
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="#">Product</a></li>
                        <li><a href="#">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Infos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">membership</a></li>
                                <li><a href="#">ordering</a></li>
                                <li><a href="#">schedules</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">communicate</li>
                                <li><a href="#">developer</a></li>
                                <li><a href="#">Podcast</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid col-md-5 col-md-push-3">
    <ul id="mytab" class="nav nav-tabs">
        <li class="active"><a data-toggle='tab' href="#login">Log-In</a></li>
        <li><a data-toggle='tab' href="#signup">Sign-Up</a></li>
    </ul>
    <div class="tab-content">
        <div id="login" class="tab-pane fade in active well">
            <form role="form" method="post" action="index.php" autocomplete="off">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="email" id="l_email" name="l_mail" required>
                    <p id="err_email"></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="l_pass" name="l_password"
                           required>
                    <p id="err_pass"></p>
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
                           required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="l_name" placeholder="last name" name="last_name"
                           required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pass" placeholder="Password" name="password"
                           required>
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


this is index.php the original
/////////////////////////////////////////////////
<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {//user login
        require 'login.php';
    } elseif (isset($_POST['signup'])) {//user sign up
        require 'register.php';
    }
}
?>
<body class="container-fluid">
<div class="navbar-wrapper ">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">PicassoPack.com</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="#">Product</a></li>
                        <li><a href="#">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">membership</a></li>
                                <li><a href="#">ordering</a></li>
                                <li><a href="#">schedules</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row text-cnter">
        <div class="col-md-6">
            <div class="header alert alert-success">
                <h2>Sign-up</h2>
            </div>
            <div class="body panel">
                <form role="form" id="reg_form" autocomplete="off" action="index.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="f_name" placeholder="first name" name="first_name"
                               required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="l_name" placeholder="last name" name="last_name"
                               required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="pass" placeholder="Password" name="password"
                               required>
                        <p id="err" class="text-danger" style="display:none"></p>

                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="conf" placeholder="Confirm" required>
                    </div>
                    <div class="form-group form-inline btn-group btn-group-justified">
                        <input type="submit" class="form-control btn btn-primary" id="submit" value="Sign_up"
                               name='signup'>
                        <input type="reset" class="form-control btn btn-danger" id="reset" value="reset">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="header alert alert-success">
                <h2> Login</h2>
            </div>
            <div class="panel body">
                <form role="form" method="post" action="index.php" autocomplete="off">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="email" id="l_email" name="l_mail"
                               required>
                        <p id="err_email"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="l_pass" name="l_password"
                               required>
                        <p id="err_pass"></p>
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
        </div>
    </div>
</div>
<footer class="container-fluid page-footer">
    <h1 id="p2">hello</h1>
</footer>
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
