<?php
setcookie('auto', 'mail=' . "adexdealex@gmail.com", time() + (3600));
//setcookie('auto','mail='.$email,time()+(60*60*24*7));
?>

<div class="jumbotron">
    <img src="resource/image/img_avatar3.png" class="img-circle" width='240' heigh='60'>
    <h3 class="text-right text-info"><?php echo $first_name . " " . $last_name; ?></h3>
</div>
<div class="container">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        // echo $_SESSION['cookie'];
        unset($_SESSION['message']);
    }
    ?>
    <?php
    if ($active != 1) {
        echo "the account is not activated click the email to activate your page";
    }
    ?>
    <p><?php echo "<a href='http://$email'>$email</a>"; ?></p>

</div>