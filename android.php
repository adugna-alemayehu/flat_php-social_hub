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
    <title>polariss morera</title>

</head>
<body>
<div class="container">
    <a href="whatsapp://send/+251925267236#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;END">whatsapp</a>
    <br>
    <a href="https://api.whatsapp.com/send?phone=+251925267236">whatsapp2</a>
    <br>
    <a href="intent://send/0925267236#Intent;scheme=smsto;package=com.viber;action=android.intent.action.SENDTO;end">viber</a>
    <?php setcookie('adugna', 45, time() + (60 * 60 * 24 * 7)); ?>
    <?php echo($_COOKIE['adugna']); ?>
</div>


<div class="container-fluid">
    <button type="button" class="btn btn-info" id="btn">Pressme</button>
    <blockquote id="blc"></blockquote>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#btn').click(function () {
            /* $.ajax({
                URL:"ajax_info.txt",
                success:function(data){
                    $('#blc').text(data);
                }
             });*/
            var id = 1;
            $('#blc').load("show.php", {id: id});
        });
    });
</script>
</body>

</html>