<?php
$connection = new mysqli('localhost', 'root', 'packer', 'users');
$query = 'select * from account';
$result = $connection->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The PicassoPack</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styler.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="icon" type="img/jpg" href="resource/headericon.png">
    <title>dynamic mysql table fetching</title>
</head>
<body class="container-fluid">

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
                        <li><a href="fr_table.php">Product</a></li>
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

<div style="background:transparent !important" class="container-fluid jumbotron">
    <h1 class="text-center">Picasso_Pack.com</h1>
</div>
<div class="containerfluid">
    <form role="form">
        <div class="form-group">
            <div class="page-header text-center text-info text-caps">
                <button type="button" class="btn btn-info">User of picassopack <span class="badge" id="counter"></span>
                </button>
            </div>
        </div>
    </form>
</div>
<div class="container table-responsive">
    <table class="table table-striped table-condensed table-bordered">
        <tr>
            <th width="70%">Name</th>
            <th width="30%">View</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><input type='button' name="view" value="View" class="btn btn-info viewdata"
                           id="<?php echo $row['id'];
                           ?>"></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<div class="w3-modal" id="mod">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
        <span onclick="document.getElementById('mod').style.display='none'"
              class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright w3-large">&times;</span>

        <div class="w3-center">
            <img src="resource/image/img_avatar3.png" alt="employee" style="width:30%" class="w3-circle w3-margin-top">
        </div>
        <div class="w3-container">
            <div class="w3-section">
                <div id="emp"></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn w3-display-bottomright w3-padding-12 w3-hover-red w3-container" id="close">
                Close
            </button>
        </div>
    </div>
</div>
<ul class="pagination">
    <li><a href="#">1</a></li>
    <li class="active"><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
</ul>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        setInterval(function () {
            $('#counter').load("counter.php")
        }, 100);
        $('.viewdata').click(function () {
            var emp_id = $(this).attr('id');
            /* $.ajax({
         URL:"ajax_info.txt",
         //method:"post",
         //data:{emp_id:emp_id},
         success:function(result){
             confirm(result);
             $('#emp').html(result);
             $('#mod').css('display','block');
                 }
         });*/
            $('#emp').load("show.php", {emp_id: emp_id}, function (data) {
                $('#mod').css('display', 'block');
                $('#emp').html(data);
            });

            /*$.post(
             "show.php",
             {emp_id:emp_id},
            function(data){
                $('#emp').html(data);
                $('#mod').css('display','block');
                    }
            );*/
            // var emp_name=$(this)
            //$('#mod').css('display','block');
            //$('#emp').text("emplyee id -> "+emp_id);
            // alert('hellow');
        });
        $('#close').click(function () {
            $('#mod').css('display', 'none');
        });
    });
</script>
</body>
</html>