<?php

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
<body class="container">
<button class="btn btn-info" id="btn1">pop up menu</button>
<div class="wel" id="dv"></div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {

        $('#btn1').click(function () {
            var id = 1;
            /*$.ajax({
                URL:"show.php",
                method:"post",
                data:{id:id},
                success:function(data){
                    alert(data);
                    //$('#dv').html("<h1>hellow</h1>");
                }
            }) ;*/
            $('#dv').load("show.php", id, function (data) {
                $('#dv').html(data);
            })
        });
    });
</script>
</body>
</html>