<?php
require("tempheading.php");
?>
    <div class="container-fluid well">
        <div class="row">
            <div class="col-lg-7 col-md-push-1">
                <div class="row">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img width="35" height="30" class="img media-object" alt="user profile"
                                 src="resource/profile_b48.png">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <?php

                                $decoded = urldecode($_GET['row']);
                                $row = unserialize($decoded);
                                $url = $row;
                                echo $row['first_name'] . " " . $row['last_name'];
                                $check_state = "select * from friend_relation where (user_one='" . $_SESSION['id'] . "' OR user_two='" . $_SESSION['id'] . "' AND user_one='" . $row['id'] . "' OR user_two='" . $row['id'] . "') AND state=0";
                                ?>
                            </h4>
                            <?php
                            $mail = $row['email'];
                            echo "<div class='panel'><a href='$mail'>" . $mail . "</a></div>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="" id="show_stat">
                    <a class="text-primary"
                       href="<?php echo $_SERVER['SCRIPT_NAME'] . "?row=" . urlencode(serialize($url)) ?>"><h4>see new
                            story>></h4></a>
                    <?php
                    $arr = array();
                    $str_of = "-1";
                    $sql2 = "select * from friend_relation where (user_one='" . $row['id'] . "' OR user_two='" . $row['id'] . "') AND state=1";
                    if ($result = $connection->query($sql2) and $result->num_rows > 0) {
                        while ($fr_row = $result->fetch_assoc()) {
                            if ($fr_row['user_one'] != $_SESSION['id']) {
                                array_push($arr, $fr_row['user_one']);
                            } else {
                                array_push($arr, $fr_row['user_two']);
                            }
                        }
                        $str_of = implode(',', $arr);
                    }

                    $limit = 10;
                    $offset = 0;
                    if (isset($_GET['next'])) {
                        $offset = $_GET['next'];
                    }
                    $result0=$connection->query("SELECT count(*) FROM `post` WHERE user_id='" . $row['id'] . "' or user_id in($str_of) ORDER BY uploaded DESC limit $offset,$limit");
                    $count=$result0->fetch_array();
                    $count_num=$count[0];
                    $result = $connection->query("SELECT * FROM `post` WHERE user_id='" . $row['id'] . "' or user_id in($str_of) ORDER BY uploaded DESC limit $offset,$limit");
                    if($result->num_rows>0) {
                        while ($row2 = $result->fetch_assoc()) {
                            ?>
                            <div class="media panel">
                                <a class="pull-lefts" href="#">
                                    <img src="" class="media-object">
                                </a>
                                <div class="media-body">
                                    <h4 class="medai-heading"><a href="#"><?php
                                            $user_id = $row2['user_id'];
                                            $sql = "select first_name,last_name,email from account where id='$user_id'";
                                            $ress = $connection->query($sql);
                                            $ro = $ress->fetch_assoc();
                                            echo $ro['first_name'] . " " . $ro['last_name'];
                                            ?></a></h4>
                                    <p id='bady' class="commons"><?php echo $row2['body']; ?></p>
                                    <hr>
                                    <div class="row list-inline">
                                        <li class="col-xs-3"><a href="#" class="btn btn-md"><span
                                                        class="badge">0 </span>
                                                likes <i class="fa fa-thumbs-up"></i></a></li>
                                        <li class="col-xs-4"><a href="#" class="btn btn-md"><span
                                                        class="badge">0 </span>
                                                comment <i class="fa fa-comment"></i></a></li>
                                        <li class="col-xs-4"><a href="#" class="btn btn-md"><span
                                                        class="badge">0 </span>
                                                share <i class="fa fa-share"></i></a></li>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $next = $offset + 10;
                        }
                        if($count_num>10) {
                            ?>
                            <p class="text-center"><a
                                        href="<?php echo $_SERVER['SCRIPT_NAME'] . "?next=$next&row=" . urlencode(serialize($url)) ?>"
                                        class="btn btn-info">See more stories</a></p>
                            <?php
                        }
                    }else{
                        echo "no post yet!";
                    }
                    ?>

                </div>
            </div>
            <div class="col-lg-4 col-lg-offset-1" id="frr">
                <h4>friends</h4>
                <?php
                $sql = "select * from friend_relation where (user_one='" . $row['id'] . "' OR user_two='" . $row['id'] . "') AND state=1";
                if ($result = $connection->query($sql) and $result->num_rows != 0) {

                    while ($fr_row = $result->fetch_assoc()) {
                        if ($fr_row['user_one'] != $row['id']) {
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
                                                        href="user_result.php?row=<?php echo urlencode(serialize($balance)) ?>"><?php echo $balance['first_name'] ?></a>
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
                            $stat = "select id,first_name,last_name,email from account where id=" . $fr_row['user_two'];
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
                                                        href="user_result.php?row=<?php echo urlencode(serialize($balance)) ?>"><?php echo $balance['first_name'] ?></a>
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
                    echo "<small>" . $row['first_name'] . " has no friends yet!</small>";
                }
                ?>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
<?php
require("tempfooter.php");
?>