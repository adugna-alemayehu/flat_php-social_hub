<?php
require('tempheading.php');
?>
<div class="container-fluid well">
    <div class="row">
        <div class="col-lg-3">
            <p id="back">ደህረገጻችንን ከወደዱት ለጓደኞቾ ይጋብዙ！！</p>
            <select>
                <option>email<i class="fa fa-mail"></i></option>
                <option>facebook<i class="fa fa-facebook"></i></option>
                <option>twitter<i class="fa fa-twitter"></i></option>
                <option>instagram<i class="fa fa-instagram"></i></option>
            </select>
        </div>
        <div class="col-lg-5 panel">
            <form role="article" method="post">
                <div class="form-top">Post, write something <?php echo $_SESSION['first_name']; ?></div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <img src="resource/profile_b48.png" width="30px" height="30px">
                        </div>
                        <textarea class="form-control" rows="2" name="idea" required id="status"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <a href="<?php echo $_SERVER['SCRIPT_NAME'] ?>" class="btn btn-primary pull-right"
                       id="poster">POST</a>

                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-xs-0">
            <ul class="list-group">
                <li class="list-group-itme">Favorites
                    <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-connectdevelop"></i>developers</li>
                        <li class="list-group-item"><i class="fa fa-file-photo-o"></i> Photos</li>
                        <li class="list-group-item"><i class="fa fa-file-pdf-o"></i> Documents</li>
                        <li class="list-group-item"><i class="fa fa-file-audio-o"></i> audio</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="col-md-8 col-xs-12" id="show_stat">
            <a class="text-primary" href="<?php echo $_SERVER['SCRIPT_NAME'] ?>"><h4>see new story>></h4></a>
            <?php
            $arr = array();
            $str_of = "-1";
            $sql2 = "select * from friend_relation where (user_one='" . $_SESSION['id'] . "' OR user_two='" . $_SESSION['id'] . "') AND state=1";
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
            $result0=$connection->query("SELECT count(*) FROM `post` WHERE user_id='" . $_SESSION['id'] . "' or user_id in($str_of) ORDER BY uploaded DESC limit $offset,$limit");
            $count=$result0->fetch_array();
            $count_num=$count[0];
            $result = $connection->query("SELECT * FROM `post` WHERE user_id='" . $_SESSION['id'] . "' or user_id in($str_of) ORDER BY uploaded DESC limit $offset,$limit");
            if($result->num_rows>0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="media panel">
                        <div class="input-group" style="padding: 10px">
                            <div class="input-group-addon">
                                <a class="pull-lefts" href="#">
                                    <img src="resource/profile_b48.png" width="20px" height="20px" class="media-object">
                                </a>
                            </div>
                            <h4 class="medai-heading"><a href="#"><?php
                                    $user_id = $row['user_id'];
                                    $sql = "select first_name,last_name,email from account where id='$user_id'";
                                    $ress = $connection->query($sql);
                                    $ro = $ress->fetch_assoc();
                                    echo $ro['first_name'] . " " . $ro['last_name'];
                                    ?></a></h4>

                        </div>
                        <div class="media-body">

                            <p class="commons"><?php echo $row['body']; ?></p>
                            <hr>
                            <p id='<?php echo $row['post_id']; ?>'>as</p>
                            <script type="text/javascript">
                                changeit('<?php echo $row['uploaded']?>', '<?php echo $row['post_id']?>');
                            </script>
                            <div class="row list-inline">
                                <li class="col-xs-3"><a href="#" class="btn btn-md"><span class="badge">0 </span> likes
                                        <i
                                                class="fa fa-thumbs-up"></i></a></li>
                                <li class="col-xs-4"><a href="post_view.php?post_ids=<?php echo $row['post_id'] ?>"
                                                        class="btn btn-md"><span class="badge">0 </span> comment <i
                                                class="fa fa-comment"></i></a></li>
                                <li class="col-xs-4"><a href="#" class="btn btn-md"><span class="badge">0 </span> share
                                        <i
                                                class="fa fa-share"></i></a></li>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                $next = $offset + 10;
                echo $count_num;
                if($count_num>10) {
                    ?>
                    <p class="text-center"><a href="<?php echo $_SERVER['SCRIPT_NAME'] . "?next=$next" ?>"
                                              class="btn btn-info">See
                            more stories</a></p>
                    <?php
                }
            }else{
                echo "<h4>no post yet!</h4>";
            }
            ?>
        </div>
    </div>
</div>
<?php
require('tempfooter.php');
?>
