<?php
require('tempheading.php');
$resultid = "";
?>
    <h3>your seacrh result for " <?php if (isset($_GET['query'])) echo $_GET['query']; ?> "</h3>
    <div class="col-lg-7 col-md-push-1 ">
        <?php
        if (isset($_GET['query']) and !empty($_GET['query'])) {
            $key = $connection->escape_string($_GET['query']);
            $sql = "SELECT * FROM `account` WHERE first_name like '%$key%' or MATCH(first_name,last_name,email) against ('%$key%') ORDER BY MATCH(first_name,last_name,email) against ('%$key%')";
            if ($query = $connection->query($sql)) {
                echo "<p><span class='badge'>$query->num_rows</span> Result found</P>";
                while ($row = $query->fetch_assoc()) {
                    $resultid = $row['id'];
                    ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img width="35" height="30" class="img media-object" alt="user profile"
                                 src="resource/profile_b48.png">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a
                                        href="user_result.php?row=<?php echo urlencode(serialize($row)); ?>"><?php
                                    echo $row['first_name'];
                                    ?>
                                </a>
                                <?php
                                if ($row['id'] == $_SESSION['id']){
                                    echo "<h5>your self</h5>";
                                    echo "<div class='panel'>" . " " . $row['last_name'] . " " . $row['email'] . "</div>";
                                }else{
                                $sql = "select * from friend_relation where (user_one='" . $_SESSION['id'] . "' AND user_two='" . $row['id'] . "' or user_one='" . $row['id'] . "' AND user_two='" . $_SESSION['id'] . "')";
                                $fr = $connection->query($sql);
                                $arr = $fr->fetch_assoc();
                                if ($arr) {
                                    switch ($arr['state']) {
                                        case 0:
                                            if ($arr['trig_er'] == $row['id']) {
                                                ?>
                                                <button type="button" class="btn btn-primary pull-right">Accept</button>
                                                <button type="button" class="btn btn-danger pull-right">Decline</button>
                                                <?php
                                            } else {
                                                ?>
                                                <button type="button" class="btn btn-danger pull-right"><i
                                                            class="fa fa-user-times"></i> Cancel Request
                                                </button>
                                                <?php
                                            }
                                            break;
                                        case 1:
                                            ?>
                                            <button type="button" class="btn btn-warning pull-right">Unfriend</button>
                                            <?php
                                            break;
                                        case 2:
                                            break;
                                        default:
                                    }
                                } else {
                                    ?>
                                    <button id="<?php echo $resultid; ?>" type="button"
                                            class="btn btn-primary pull-right addfriend"
                                            value="<?php echo $resultid ?>"><i class="fa fa-user-plus"></i> Add Friend
                                    </button>
                                    <?php
                                }
                                ?>
                            </h4>
                            <?php
                            echo "<div class='panel'>" . " " . $row['last_name'] . " " . $row['email'] . "</div>";
                            }
                            ?>

                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>0 result found</p>";
            }
        }
        ?>
    </div>
    <script>
        var searched;

        function passid(result) {
            searched = result;
        }

        $(document).ready(function () {
            $('.addfriend').click(function () {
                var searched = $(this).attr('id');
                $("#" + searched).load("addfriend.php", {searched: searched}, function (data) {
                    this.text(data);
                });
            });
        });
    </script>
<div class="clearfix"></div>
<?php
require('tempfooter.php');
?>
