<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "farmers_market_v2";

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
