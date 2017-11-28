<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>success page</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="img/jpg" href="resource/headericon.png">
    <script src="js/jquery-1.4.1.js"></script>
    <script src="js/bootstrap_new.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 alert alert-info">
            <h1 class="text-center text-success alert alert-danger"></h1>
            <div class="text-center panel">
                <?php
                if (isset($_SESSION['message']) and !empty($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                } else {
                    header('location:index.php');
                }
                ?>
            </div>
            <div class="btn-group">
                <a href="index.php" class="btn btn-success text-center">HOME</a>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>