<?php
$host = 'localhost';
$user = 'root';
$pass = "";
$db = "login";
$connection = new mysqli($host, $user, $pass, $db); //connecting to the database
if ($connection->connect_error) {
    echo "Failed to connect to database" . $connection->connect_error;
}
?>