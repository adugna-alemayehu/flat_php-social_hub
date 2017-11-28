<?php
require("tempheading.php");
?>
    <div class="col-lg-7 ">

        <div class="media">
            <a class="pull-left" href="#">
                <img width="35" height="30" class="img media-object" alt="user profile" src="resource/profile_b48.png">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a href="<?php htmlentities($_SERVER['PHP_SELF']); ?>"><?php
                        echo $_SESSION['first_name'] . " " . $_SESSION['last_name'];
                        ?>
                    </a></h4>

                <?php
                echo "<div class='panel'> " . $_SESSION['email'] . "</div>";
                ?>
            </div>
        </div>

    </div>
    <div class="col-lg-3 col-lg-offset-2">
        <h4>friends</h4>
        <ul class="list-group">
            <?php
            $sql = "select * from friend_relation where (user_one='" . $_SESSION['id'] . "' OR user_two='" . $_SESSION['id'] . "') AND state=1";
            $x = $result = $connection->query($sql);
            $y = $x->fetch_assoc();
            if ($result = $connection->query($sql)) {

                while ($fr_row = $result->fetch_assoc()) {
                    if ($fr_row['user_one'] != $_SESSION['id']) {
                        $stat = "select * from account where id=" . $fr_row['user_one'];
                        $res = $connection->query($stat);
                        while ($balance = $res->fetch_assoc()) {
                            ?>
                            <li class="list-group-item"><a
                                        href="user_result.php?row=<?php echo urlencode(serialize($balance)) ?>"><?php echo $balance['first_name'] ?></a>
                            </li>
                            <?php
                        }
                    } else {
                        $stat = "select id,first_name,last_name,email from account where id=" . $fr_row['user_two'];
                        $res = $connection->query($stat);
                        while ($balance = $res->fetch_assoc()) {
                            ?>
                            <li class="list-group-item"><a
                                        href="user_result.php?row=<?php echo urlencode(serialize($balance)) ?>"><?php echo $balance['first_name'] ?></a>
                            </li>
                            <?php
                        }
                    }
                }
            }
            ?>
        </ul>
    </div>
    <div class="col-md-6 col-md-push-3 well">
        <form role="form" name="form1">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="message" autocomplete="off" name="mess"
                       id="message">
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
<?php
require("tempfooter.php");
?>