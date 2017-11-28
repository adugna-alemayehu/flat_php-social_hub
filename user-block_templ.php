<div class="media">
    <a class="pull-left" href="#">
        <img width="35" height="30" class="img media-object" alt="user profile" src="resource/profile_b48.png">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="user_result.php"><?php
                $
        if (isset($row['first_name'])) {
            echo $row['first_name'];
        } else {
            echo $_SESSION['first_name'] . " " . $_SESSION['last_name'];
        }
        ?>
            </a></h4>

        <?php
        if (isset($row['last_name']) and $row['email']) {
            echo "<div class='panel'>" . " " . $row['last_name'] . " " . $row['email'] . "</div>";
        } else {

            echo "<div class='panel'> " . $_SESSION['email'] . "</div>";
        }
        ?>
    </div>
</div>
<div class="media">
    <a class="pull-left" href="#">
        <img width="35" height="30" class="img media-object" alt="user profile" src="resource/profile_b48.png">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="user_result.php">
            </a></h4>
    </div>
</div>