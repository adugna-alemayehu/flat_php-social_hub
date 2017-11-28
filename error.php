<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>error page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="img/jpg" href="resource/headericon.png">
    <script src="js/jquery-1.4.1.js"></script>
    <script src="js/bootstrap_new.min.js"></script>
</head>
<body>
<div class="container-fluid">

    <div class="row" style="margin-top:120px">
        <div class="col-md-4"></div>
        <div class="col-md-4  text-center alert alert-success" style="height:400px">
            <h1 class="text-center">error</h1>
            <?php
            if (isset($_SESSION['message']) and !empty($_SESSION['message'])) {
                echo "<h4 class=' text-danger'>" . $_SESSION['message'] . "</h4>";
            } else {
                header('location:index.php');
            }
            ?>
            <br><br> <br><br> <br><br>
            <div class="btn-group">
                <br><a href="index.php" style="width:250px" class="btn btn-info">HOME</a>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="btn-group">

    </div>
</div>
</body>
</html>