<?php
/**
 * Created by PhpStorm.
 * User: ADEX-DOM
 * Date: 11/26/2017
 * Time: 11:56 PM
 */
require('tempheading.php');
$post=$_GET['post_ids'];
$sql="select * from post where post_id='$post'";
$result=$connection->query($sql);
?>
<div class="well row">
    <?php
while ($row = $result->fetch_assoc()) {
    ?>
    <div class="media panel col-md-8 col-lg-8 col-xs-12 col-md-push-2">
        <div class="input-group">
            <div class="input-group-addon">
                <a class="pull-lefts" href="#">
                    <img src="resource/profile_b48.png" width="48" height="48" class="media-object">
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
            <p id='<?php echo $row['post_id'];?>'>as</p>
            <script type="text/javascript">
                changeit('<?php echo $row['uploaded']?>','<?php echo $row['post_id']?>');
            </script>
            <div class="row list-inline">
                <li class="col-xs-3"><a href="#" class="btn btn-md"><span class="badge">0 </span> likes <i
                            class="fa fa-thumbs-up"></i></a></li>
                <li class="col-xs-4"><a href="post_view.php" class="btn btn-md"><span class="badge">0 </span> comment <i
                            class="fa fa-comment"></i></a></li>
                <li class="col-xs-4"><a href="#" class="btn btn-md"><span class="badge">0 </span> share <i
                            class="fa fa-share"></i></a></li>
            </div>
            <div class="panel">
                <form>
                    <div class="form-top">Comment <?php echo $_SESSION['first_name']; ?></div>
                    <div class="form-block">
                        <textarea class="form-control"></textarea>

                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <?php
}
require ('tempfooter.php');
?>