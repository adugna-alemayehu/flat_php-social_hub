<?php
$conn = new mysqli('localhost', 'root', 'packer', 'joineg') or die($conn->error);
$result = $conn->query('select *from chat order by id desc');
while ($mess = $result->fetch_assoc()) {
    echo "<p><span class='text-primary'>" . $mess['user'] . "</span>" . ":->" . $mess['message'] . "</p>";
}
?>
