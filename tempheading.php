<?php
session_start();
require('db.php');
//echo $_SESSION['logged_in'];
//die;
if ($_SESSION['logged_in'] == false) {
    //$_SESSION['message']="you must be logged in before you see your profile";
    header('location:index.php');
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
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
    <link rel="icon" type="img/jpg" href="resource/headericon.png">
    <script src="js/jquery.js"></script>
    <script>
        function changeit(e,ids){
            var uploaded=e;
            var us_id=ids;
            var http=new XMLHttpRequest();
            http.onreadystatechange=function(){
                if(http.readyState==4 && http.status==200){
                    document.getElementById(ids).innerHTML=http.responseText;
                    //alert(http.responseText);
                }
            }
            http.open('GET','time_ago.php?stamp='+e,true);
            http.send();
        }
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
    </script>
    <style>
        @media screen and (max-width: 480px) {
            #frr {
                display: none;
            }
        }
        .commons{
            padding-top: 20px;
            margin-left: 20px;
            font-family: curative;
            font-size: 17px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top opaque-navbar">
    <div class="container-fluid">
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
        <form class="navbar-form navbar-left" role="search" method="get" action="search.php">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <button type="submit"><i class="fa fa-search"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="find people" name="query" required class="form-control"
                           list="json_data" id="query">

                    <datalist id="json_data" style="padding:15px;font-family:cursive;">
                    </datalist>
                </div>
            </div>
        </form>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="profile.php"><i class="fa fa-user"></i> <?php echo $first_name . " " . $last_name; ?></a>
                </li>
                <li class="active"><a href="timeline.php"><i class="fa fa-home"></i>Timeline</a></li>
                <li><a href="friends.php"><i class="fa fa-users"></i> Friends</a></li>
                <li><a href="#"> <span class="badge">0</span> <i class="fa fa-envelope"></i>Message</a></li>
                <li><a href="#"> <span class="badge">0</span> <i class="fa fa-globe"></i>Notification</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-long-arrow-down"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php"><i class="fa fa-lock">Logout</i></a></li>
                        <li><a href="#"><i>Setting</i></a></li>
                        <li><a href="#"><i>Issues</i></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
            