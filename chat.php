<?php
$user = $_REQUEST['user'];
$message = $_REQUEST['message'];
$conn = new mysqli('localhost', 'root', 'packer', 'joineg') or die($con->error);
$conn->query("INSERT INTO `chat` (`user`, `message`) VALUES ('$user', '$message')");
$result = $conn->query('select *from chat order by id desc');
while ($fetched = $result->fetch_assoc()) {
    echo "<P class='text-info'>" . "<span class='label'>" . "</span>" . $fetched['user'] . ":" . $fetched['message'] . "</p>";
}
?>