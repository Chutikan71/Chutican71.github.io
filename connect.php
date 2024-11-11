<?php
$db_host = 'localhost';
$db_name = 'login';
$db_user = 'root';
$db_pass = '';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Fail to Connect DB: " . $conn->connect_error);
}
?>
