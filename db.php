<?php
//create variabls
$user = 'root';
$password = 'packer';
$database = 'users';
$host = 'localhost';
$connection = new mysqli($host, $user, $password, $database) or die($connection->error);
