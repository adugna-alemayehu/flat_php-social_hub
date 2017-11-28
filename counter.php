<?php
require "db.php";
$sql = "select count(*) from account";
$result = $connection->query($sql);
printf(implode("%5d", $result->fetch_assoc()));
?>