<?php
$server = $_SERVER['SERVER_NAME'] ?? 'localhost';
$user = 'root';
$pass = '';
$db = 'udn';
$con = mysqli_connect($server, $user, $pass, $db);
if (!$con) {
    die('Lỗi kết nối CSDL: ' . mysqli_connect_error());
}
mysqli_set_charset($con, 'utf8mb4');
