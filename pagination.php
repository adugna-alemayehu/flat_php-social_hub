<html>
<?php
echo $_SERVER['PHP_SELF'];
//echo "<a href ='".$_SERVER['SCRIPT_NAME']."'?page=>Last 10 Records</a>";
//die;
?>
<head>
    <title>Paging Using PHP</title>
</head>

<body>
<?php
require('db.php');

$rec_limit = 10;
if (!$connection) {
    die('Could not connect: ');
}

/* Get total number of records */
$sql = "SELECT count(id) FROM account ";
$retval = $connection->query($sql);

if (!$retval) {
    die('Could not get data: ');
}
$row = $retval->fetch_array();
$rec_count = $row[0];

if (isset($_GET{'page'})) {
    $page = $_GET{'page'} + 1;
    $offset = $rec_limit * $page;
} else {
    $page = 0;
    $offset = 0;
}

$left_rec = $rec_count - ($page * $rec_limit);
$sql = "SELECT first_name,last_name,email " .
    "FROM account " .
    "LIMIT $offset, $rec_limit";

$retval = $connection->query($sql);

if (!$retval) {
    die('Could not get data: ');
}

while ($row = $retval->fetch_assoc()) {
    echo "EMP ID :{$row['first_name']}  <br> " .
        "EMP NAME : {$row['last_name']} <br> " .
        "EMP SALARY : {$row['email']} <br> " .
        "--------------------------------<br>";
}

if ($page > 0) {
    $last = $page - 2;
    //echo $last;
    echo $page;
    die;
    echo "<a href ='" . $_SERVER['SCRIPT_NAME'] . "'?page=$last>Last 10 Records</a>|";
    echo "<a href ='" . $_SERVER['SCRIPT_NAME'] . "'?page=$page>Last 10 Records</a>|";
} else if ($page == 0) {
    echo "<a href ='" . $_SERVER['SCRIPT_NAME'] . "'?page=$page>Last 10 Records</a>|";
    //echo $last;
    echo $page;
    die;
} else if ($left_rec < $rec_limit) {
    $last = $page - 2;
    echo "<a href ='" . $_SERVER['SCRIPT_NAME'] . "'?page=$last>Last 10 Records</a>|";
}

//mysql_close($conn);
?>

</body>
</html>