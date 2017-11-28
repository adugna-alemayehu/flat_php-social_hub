<?php
require('db.php');
if (isset($_POST['key'])) {
    $key = $_POST['key'];
    $array = array();
    $query = $connection->query(" SELECT * FROM `account` WHERE (`first_name` LIKE '%{$key}%' OR `email` LIKE '%{$key}%' OR `last_name` LIKE '%{$key}%')");
    while ($row = $query->fetch_assoc()) {
        array_push($array, $row['first_name'] . " " . $row['last_name']);
    }
    echo json_encode($array);
    //echo implode($array);
}
?>