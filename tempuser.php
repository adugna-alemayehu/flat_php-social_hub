<?php
session_start();
if ($_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "you must be logged in before you see your profile";
    header('location:error.php');
} else {
    //copy the user info from the session variable
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $first_name . ' ' . $last_name ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="img/jpg" href="resource/headericon.png">
    <script src="js/jquery.js"></script>

    <script>
        function submitchat() {

            if (form1.mess.value == '') {
                alert("nothing to send please insert your message");
                return;
            }
            var user = "<?php echo $first_name;?>";
            var message = form1.mess.value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("display").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET', 'chat.php?user=' + user + '&message=' + message, true);
            xmlhttp.send();
            $('#message').val("");
        }

        $(document).ready(function () {
            $.ajaxSetup({cache: false});
            setInterval(function () {
                $('#display').load('history.php');
            }, 1000);
        });
        a

    </script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle='collapse' data-target='#navbar' aria-expand="false"
                    aria-control="navbars">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">PicassoPack</a>
            <img src="resource/brand.png" class="img img-circle navbar-brand">
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="profile.php">Home</a></li>
                <li><a href="fr_table.php">Product</a></li>
                <li><a href="#">Timelines</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Friends <span class="caret"></span></a>
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
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" placeholder="find people" name="query" required class="form-control">
                    <button type="button" class="btn btn-default"><span class="glyphicon"><img
                                    src="resource/search.png"></span>Search
                    </button>

                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.php"><h5 class="text-default"><?php echo $first_name . " " . $last_name; ?></h5>
                    </a></li>
                <li><a href="logout.php">
                        <button class="btn btn-danger">Logout</button>
                    </a></li>
            </ul>
        </div>
    </div>
</nav>