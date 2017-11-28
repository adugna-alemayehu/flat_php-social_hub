<?php
header('Last-Modified: ' . gmdate("D,d M Y H:i:s") . 'GMT');
echo "hellow";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['remind']) {
        setcookie('email', $_POST['email'], time() * (60 * 60 * 24 * 7));
        setcookie('password', $_POST['password'], time() * (60 * 60 * 24 * 7));
    }
    if (isset($_COOKIE['email']) and isset($_COOKIE['passowrd']) && !empty($_COOKIE['passowrd']) and !empty($_COOKIE['email'])) {
        echo($_COOKIE['email']);
        echo('<br>');
        echo($_COOKIE['password']);
    }
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>loggin with cookie</title>
        <style>
            fieldset {
                -moz-border-radius: 7px;
                border: 1px #dddddd solid;
                padding: 10px;
                width: 300px;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
    <fieldset>
        <legend>authentication</legend>
        <form method="post" accept-charset="diprived.php">
            <input type="email" placeholder="email" name="email"><br>
            <input type="password" placeholder="password" name="password"><br>
            <label for="remind">keep me logged in</label>
            <input type="checkbox" name="remind"><br>
            <input type="submit" value="login">
        </form>
    </fieldset>
    <table>
        <tr>
            <th>name</th>
            <td>pilatos</td>
        </tr>
        <tr>
            <th>sex</th>
            <td>dicre</td>
        </tr>
    </table>
    </body>
    </html>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
           aria-expanded="false">Brodcast <span class="caret"></span></a>
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


    if($fr->num_rows==0){
    ?>
    <button type="button" class="btn btn-success pull-right">Add Friend</button>
<?php

?>