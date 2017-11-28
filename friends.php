<?php
include('tempheading.php');
?>
    <ul id="mytab" class="nav nav-tabs">
        <li class="active"><a data-toggle='tab' href="#friends">Friends</a></li>
        <li><a data-toggle='tab' href="#fr_quest">Friend requests</a></li>
    </ul>
    <div class="row tab-content">
        <div id="friends" class="col-lg-12 col-md-12 col-xs-12 tab-pane fade in active">
            <h4>friends</h4>
            <ul class="list-group">
                <?php
                $sql = "select * from friend_relation where (user_one='" . $_SESSION['id'] . "' OR user_two='" . $_SESSION['id'] . "') AND state=1";
                if ($result = $connection->query($sql) and $result->num_rows > 0) {
                    echo $result->num_rows;
                    while ($fr_row = $result->fetch_assoc()) {
                        if ($fr_row['user_one'] != $_SESSION['id']) {
                            $stat = "select * from account where id=" . $fr_row['user_one'];
                            $res = $connection->query($stat);
                            while ($balance = $res->fetch_assoc()) {
                                ?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img width="35" height="30" class="img media-object" alt="user profile"
                                                 src="resource/profile_b48.png">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a
                                                        href="user_result.php?row=<?php echo urlencode(serialize($balance)) ?>"><?php echo $balance['first_name']; ?></a>
                                            </h4>
                                            <?php
                                            echo "<div> " . $balance['email'] . "</div>";
                                            ?>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                        } else {
                            $stat = "select * from account where id=" . $fr_row['user_two'];
                            $res = $connection->query($stat);
                            while ($balance = $res->fetch_assoc()) {
                                ?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img width="35" height="30" class="img media-object" alt="user profile"
                                                 src="resource/profile_b48.png">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a
                                                        href="user_result.php?row=<?php echo urlencode(serialize($balance)) ?>"><?php echo $balance['first_name']; ?></a>
                                            </h4>
                                            <?php
                                            echo "<div> " . $balance['email'] . "</div>";
                                            ?>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                    }
                } else {
                    echo "you have no friends";
                }
                ?>
            </ul>
        </div>
        <div id="fr_quest" class="col-lg-12 col-md-12 col-xs-12 tab-pane fade in">
            <h4>Friends request</h4>
            <ul class="list-group">
                <?php
                $sql2 = "select * from friend_relation where (user_one='" . $_SESSION['id'] . "' OR user_two='" . $_SESSION['id'] . "') AND state=0 and trig_er!='" . $_SESSION['id'] . "'";
                if ($result = $connection->query($sql2) and $result->num_rows > 0) {
                    while ($fr_quest = $result->fetch_assoc()) {
                        if ($fr_quest['user_one'] != $_SESSION['id']) {
                            $quest = $connection->query("select id,first_name,last_name,email from account where id='" . $fr_quest['user_one'] . "'");
                            $req_fr = $quest->fetch_assoc();
                            ?>
                            <li class="list-group-item">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img width="35" height="30" class="img media-object" alt="user profile"
                                             src="resource/profile_b48.png">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a
                                                    href="user_result.php?row=<?php echo urlencode(serialize($req_fr)) ?>"><?php echo $req_fr['first_name'] ?></a>
                                            <button type="button" class="btn btn-primary pull-right request"
                                                    id="<?php echo $fr_quest['user_two'] ?>acc">Accept
                                            </button>
                                            <button type="button" class="btn btn-danger pull-right request"
                                                    id="<?php echo $fr_quest['user_two'] ?>dec">Decline
                                            </button>
                                        </h4>
                                        <?php
                                        echo "<div> " . $req_fr['email'] . "</div>";
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <?php
                        } else {
                            $quest = $connection->query("select id,first_name,last_name,email from account where id='" . $fr_quest['user_two'] . "'");
                            $req_fr2 = $quest->fetch_assoc();
                            ?>
                            <li class="list-group-item">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img width="35" height="30" class="img media-object" alt="user profile"
                                             src="resource/profile_b48.png">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a
                                                    href="user_result.php?row=<?php echo urlencode(serialize($req_fr2)) ?>"><?php echo $req_fr2['first_name'] ?></a>
                                            <button type="button" class="btn btn-primary pull-right request"
                                                    id="<?php echo $fr_quest['user_two'] ?>acc">Accept
                                            </button>
                                            <button type="button" class="btn btn-danger pull-right request"
                                                    id="<?php echo $fr_quest['user_two'] ?>dec">Decline
                                            </button>
                                        </h4>
                                        <?php
                                        echo "<div> " . $req_fr2['email'] . "</div>";
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <?php

                        }
                    }
                } else {
                    echo "you have no friend request yet!";
                }
                ?>
            </ul>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".request").click(function () {
                var us_id = $(this).attr('id');
                var nit = us_id.replace('acc', "");
                if (us_id.lastIndexOf('acc') > 0) {
                    $("#" + us_id).load("accepting_frquest.php", {fr_id: nit}, function (data) {
                        window.location.reload();
                    });
                } else {
                    alert("declined");
                }
            });
        });
    </script>

<?php
include('tempfooter.php');
?>