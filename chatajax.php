<?php
?>
<fw!DOCTYPE htmdl>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script>
        function submitchat() {
            if (form1.user.value == '' || form1.mess.value == '') {
                alert("both field required");
                return;
            }
            var user = form1.user.value;
            var message = form1.mess.value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("display").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET', 'chat.php?user=' + user + '&message=' + message, true);
            xmlhttp.send();
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
<div class="container">
    <div class="col-md-6 col-md-push-3 well">
        <form role="form" name="form1">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="insert Name" autocomplete="off" name="user">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="message" autocomplete="off" name="mess">
            </div>
            <div class="form-group">
                <button type="button" onclick="submitchat()" class="btn btn-info">Send</button>
            </div>
        </form>
        <div class="wels" id="display">

            LOADING MESSAGE... <img src="resource/gif/1008_loading.gif" width="100" height="100">
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>