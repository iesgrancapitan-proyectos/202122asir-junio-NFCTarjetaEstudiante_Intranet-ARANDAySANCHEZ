<?php

$servername = "localhost";
$username = "phpmyadmin";
$password = "sl3th2yw";
$bd= "AppWebAseo";
// Create connection
$conn = new mysqli($servername, $username, $password,$bd);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Conexión falla " . $conn->connect_error);
}

?>
