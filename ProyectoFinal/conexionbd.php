<?php

$servername = "172.31.29.162";
$username = "phpmyadmin2";
$password = "sl3th2yw";
$bd= "appwebaseo";
// Create connection
$conn = new mysqli($servername, $username, $password,$bd);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Conexión falla " . $conn->connect_error);
}

?>
